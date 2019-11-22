/*
Fichier : Creation_GroupeM.sql
Auteurs : 
Antoine AFFLATET 
Mohamed MASBAH ABOU LAICH 21611213
Nom du groupe : M
*/

/*
A METTTRE OBLIGATOIREMENT AU DEBUT 
- SUPPRESSION DE LA BASE DE DONNEES
- CREATION DE LA BASE DE DONNEES
- SUPPRESSIONS DE TOUTES LES BASES CREEES POUR LE PROJET
*/


DROP DATABASE IF EXISTS MyEvents;
CREATE DATABASE  MyEvents;
USE MyEvents;

/*
Création de la base de  données
*/

DROP TABLE IF EXISTS UTILISATEUR;
DROP TABLE IF EXISTS THEMES;
DROP TABLE IF EXISTS EVENEMENTS;
DROP TABLE IF EXISTS INSCRIT;
DROP TABLE IF EXISTS AJOUT_CONTRIB;
-- **************************************   UTILISATEUR  
/**/

CREATE TABLE   UTILISATEUR  
(
   U_ID            VARCHAR(45)  NOT NULL,
   ROLE            VARCHAR(45) NOT NULL, /* 3 ROLES SEULEMENT : admin / contributeur / visiteur*/
   PSEUDO	   VARCHAR(45) NOT NULL,
   EMAIL           varchar(150) NOT NULL ,
   DATE_NAISSANCE  DATE         NOT NULL,
   PASSWORD        VARCHAR(45) NOT NULL,
   STATUT          VARCHAR(45) NOT NULL,

CONSTRAINT USR_PK PRIMARY KEY ( U_ID ),
CONSTRAINT EMAIL_CT CHECK( EMAIL LIKE '%@%')

);

-- **************************************  CONTRIBUTEUR 

CREATE TABLE  AJOUT_CONTRIB 
(
  C_ID         VARCHAR(45)  NOT NULL ,
  ADMIN_ID     VARCHAR(45)  NOT NULL ,

CONSTRAINT CONTRIB_PK PRIMARY KEY ( C_ID,ADMIN_ID ),
CONSTRAINT  CONTRIB_ID_FK FOREIGN KEY( C_ID ) REFERENCES  UTILISATEUR  ( U_ID ) ON  DELETE CASCADE,
CONSTRAINT  CONTRIB_ADMIN_ID_FK FOREIGN KEY( ADMIN_ID ) REFERENCES  UTILISATEUR  ( U_ID ) ON DELETE CASCADE
);


-- **************************************   THEME  

CREATE TABLE THEME  
(
   ID_THEME      varchar(45) NOT NULL ,
   NOM           varchar(45) NOT NULL ,

CONSTRAINT THEME_PK PRIMARY KEY ( ID_THEME )
);



-- **************************************  EVENEMENTS 
/* ON CONSIDERE QUE SI  LE NOMBRE DE PLACE EST NULL 
LE NOMBRE DE PLACE EN VRAI EST ILLIMITÉ*/

CREATE TABLE EVENEMENTS
(
  E_ID             varchar(45) NOT NULL ,
  CREATEUR_ID      VARCHAR(45) NOT NULL ,
  TITRE_EVENEMENTS  varchar(500) NOT NULL ,
  ADRESSE           varchar(500) NOT NULL ,
  LONGITUDE         DECIMAL(10,8) NOT NULL,
  LATITUDE          DECIMAL(11,8) NOT NULL,
  DATE_DEBUT        date NOT NULL ,
  DATE_FIN          date NULL ,
  NBR_DE_PLACE      NUMERIC(3),
  AGE_MINIMUM       NUMERIC(3) ,
  ID_THEME          varchar(45) NOT NULL ,
  IMAGE_URL         VARCHAR(500) NOT NULL,

CONSTRAINT EVENT_PK PRIMARY KEY ( E_ID ),

CONSTRAINT  THEME_EVT_FK  FOREIGN KEY ( ID_THEME ) REFERENCES  THEME( ID_THEME ) ON DELETE CASCADE,
CONSTRAINT  CREATOR_EVT_FK  FOREIGN KEY ( CREATEUR_ID ) REFERENCES UTILISATEUR ( U_ID ) ON DELETE CASCADE
);

CREATE TABLE IMAGES(
  NOM VARCHAR(100) ,
  THEME VARCHAR(45) ,
  CONSTRAINT PK_IMAGES PRIMARY KEY (NOM,THEME),
  CONSTRAINT FK_THEME_IN_IMAGE FOREIGN KEY (THEME) REFERENCES THEME ( ID_THEME ) ON DELETE CASCADE
);

CREATE TABLE  INSCRIT 
(	
  ID_USER   VARCHAR(45)  NOT NULL ,
  ID_EVENEMENT varchar(45) NOT NULL ,

CONSTRAINT INSCRIT_PK PRIMARY KEY ( ID_USER,ID_EVENEMENT),
CONSTRAINT  INSCRIT_USR_FK FOREIGN KEY ( ID_USER ) REFERENCES  UTILISATEUR  ( U_ID ) ON DELETE CASCADE,
CONSTRAINT  INSCRIT_EVENT_FK FOREIGN KEY ( ID_EVENEMENT ) REFERENCES  EVENEMENTS  ( E_ID ) ON DELETE CASCADE

);

CREATE TABLE LOGERROR  (
  ID INT(11) AUTO_INCREMENT,
  MESSAGE VARCHAR(255) DEFAULT NULL,
  THETIME TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT PK_LOGERROR PRIMARY KEY (ID)
);	




/*------------------------------------- 
Définion de triggers
--------------------------------------*/
/*DROP TRIGGER IF EXISTS INSERT_ON_INSCRIPTION;

DELIMITER $$
CREATE TRIGGER INSERT_ON_INSCRIPTION
BEFORE INSERT ON INSCRIT
FOR EACH ROW BEGIN
 DECLARE AGE NUMERIC(3) ;
 DECLARE AGE_MIN NUMERIC;
 
SET AGE_MIN =( SELECT AGE_MINIMUM  FROM EVENEMENTS WHERE E_ID = NEW.ID_EVENEMENT) ;
SET AGE = (SELECT YEAR(CURRENT_DATE())-YEAR(DATE_NAISSANCE) FROM UTILISATEUR WHERE U_ID = NEW.ID_USER);
 
IF AGE < AGE_MIN THEN
 INSERT INTO LOGERROR(MESSAGE) VALUES (CONCAT("ATTENTION, TON AGE DOIT ETRE SUPERIEUR A L AGE MINIMUM REQUIS"));
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ATTENTION, TON AGE DOIT ETRE SUPERIEUR A L AGE MINIMUM REQUIS';
END IF; 

    DECLARE NB_DE_PLACE_MAX NUMERIC ;
    DECLARE NB_DE_PLACE_ACTUEL NUMERIC;
    
    SET NB_DE_PLACE_MAX = (SELECT NBR_DE_PLACE  FROM EVENEMENTS WHERE E_ID = NEW.ID_EVENEMENT );
    SET NB_DE_PLACE_ACTUEL = (SELECT COUNT(*) FROM INSCRIT WHERE  ID_EVENEMENT = NEW.ID_EVENEMENT  );	

    IF NB_DE_PLACE_ACTUEL >= NB_DE_PLACE_MAX THEN
       INSERT INTO LOGERROR(MESSAGE) VALUES ("ERREUR LE NOMBRE DE PLACE MAXIMUM EST ATTEINT VOUS NE POUVEZ PLUS SINSCRIRE");
       SIGNAL SQLSTATE VALUE '45000' SET MESSAGE_TEXT ="LE NOMBRE MAXIMUM EST ATTEINT DSL";
   END IF;

   	DECLARE NBR_EVENT NUMERIC;

SET NBR_EVENT = ( SELECT COUNT(*) FROM INSCRIT WHERE ID_USER = NEW.ID_USER );

IF NBR_EVENT >= 100 THEN
   	UPDATE UTILISATEUR SET STATUT = 'GOLDEN' WHERE U_ID= NEW.ID_USER ;
ELSEIF NBR_EVENT >= 50 THEN    
       UPDATE   UTILISATEUR SET STATUT = 'ADVANCED' WHERE U_ID= NEW.ID_USER ;
ELSEIF NBR_EVENT >=20 THEN
       UPDATE   UTILISATEUR SET STATUT = 'EXPERIMENTED' WHERE U_ID= NEW.ID_USER ;
ELSEIF NBR_EVENT >= 10 THEN
       UPDATE   UTILISATEUR SET STATUT = 'BRONZE' WHERE U_ID= NEW.ID_USER ;
END IF;
END $$
DELIMITER ;*/

/*----------------------------------------------------------
LANCEMENT DE TRIGGER QUAND AU MOMENT D'UNE MODIFICATION 
DES CLES PRIMAIRE DANS LA TABLE UTILISATEUR POUR APPLIQUER LA MODIF 
POUR LES CLES ETRANGERES QU'ELLE REFERENCENT
----------------------------------------------------------*/
DROP TRIGGER IF EXISTS UPDATE_UTILISATEUR;
DELIMITER $$
CREATE TRIGGER UPDATE_UTILISATEUR
AFTER UPDATE ON UTILISATEUR
FOR EACH ROW
BEGIN 
IF OLD.U_ID <> NEW.U_ID THEN
UPDATE INSCRIT SET ID_USER = NEW.U_ID WHERE ID_USER = OLD.U_ID ;
UPDATE AJOUT_CONTRIB SET C_ID = NEW.U_ID WHERE C_ID = OLD.U_ID ;
UPDATE AJOUT_CONTRIB SET ADMIN_ID = NEW.U_ID WHERE ADMIN_ID = OLD.U_ID ;
UPDATE EVENEMENTS SET CREATEUR_ID = NEW.U_ID WHERE CREATEUR_ID = OLD.U_ID ;
END IF;
END $$
DELIMITER ;
/*----------------------------------------------------------
LANCEMENT DE TRIGGER QUAND AU MOMENT D'UNE INSCRIPTION 
D'UN VISITEUR SON AGE EST INFERIEUR A L'AGE MINIMUM REQUIS POUR L'EVENT
----------------------------------------------------------*/
DROP TRIGGER IF EXISTS AGE_MINIMUM_REQUIS;

DELIMITER $$
CREATE TRIGGER AGE_MINIMUM_REQUIS
BEFORE INSERT ON INSCRIT
FOR EACH ROW BEGIN
 DECLARE AGE NUMERIC(3) ;
 DECLARE AGE_MIN NUMERIC;
 
SET AGE_MIN =( SELECT AGE_MINIMUM  FROM EVENEMENTS WHERE E_ID = NEW.ID_EVENEMENT) ;
SET AGE = (SELECT YEAR(CURRENT_DATE())-YEAR(DATE_NAISSANCE) FROM UTILISATEUR WHERE U_ID = NEW.ID_USER);
 
IF AGE < AGE_MIN THEN
 INSERT INTO LOGERROR(MESSAGE) VALUES (CONCAT("ATTENTION, TON AGE DOIT ETRE SUPERIEUR A L AGE MINIMUM REQUIS"));
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ATTENTION, TON AGE DOIT ETRE SUPERIEUR A L AGE MINIMUM REQUIS';
END IF; 
END $$
DELIMITER ;
/*----------------------------------------------------------
LANCEMENT DE TRIGGER QUAND AU MOMENT D'UNE INSCRIPTION 
DANS UN EVENT LE NOMBRE MAXIMAL DE PERSONNE PRESENT DANS L'EVENT 
EST ATTEINT
----------------------------------------------------------*/

DROP TRIGGER IF EXISTS NBR_PLACE_ATTEINT;
DELIMITER $$
CREATE TRIGGER NBR_PLACE_ATTEINT
       BEFORE INSERT ON INSCRIT
       FOR EACH ROW
BEGIN

    DECLARE NB_DE_PLACE_MAX NUMERIC ;
    DECLARE NB_DE_PLACE_ACTUEL NUMERIC;
    
    SET NB_DE_PLACE_MAX = (SELECT NBR_DE_PLACE  FROM EVENEMENTS WHERE E_ID = NEW.ID_EVENEMENT );
    SET NB_DE_PLACE_ACTUEL = (SELECT COUNT(*) FROM INSCRIT WHERE  ID_EVENEMENT = NEW.ID_EVENEMENT  );	

    IF NB_DE_PLACE_ACTUEL >= NB_DE_PLACE_MAX THEN
       INSERT INTO LOGERROR(MESSAGE) VALUES ("ERREUR LE NOMBRE DE PLACE MAXIMUM EST ATTEINT VOUS NE POUVEZ PLUS SINSCRIRE");
       SIGNAL SQLSTATE VALUE '45000' SET MESSAGE_TEXT ="LE NOMBRE MAXIMUM EST ATTEINT DSL";
   END IF;
END $$
DELIMITER ;

/*-------------------------------------------------------------------------------
LANCEMENT D'UN TRIGGER QUI CHANGE LE STATUT D'UN UTILISATEUR PAR RAPPORT 
AU NOMBRE DES EVENTS AUQUELS IL EST INSCRIT
------------------------------------------------------------------------------------*/
DROP TRIGGER IF EXISTS CHANGE_STATUT_VISITEUR;
DELIMITER $$
CREATE TRIGGER CHANGE_STATUT_VISITEUR
       BEFORE INSERT ON INSCRIT
       FOR EACH ROW
BEGIN
	DECLARE NBR_EVENT NUMERIC;

SET NBR_EVENT = ( SELECT COUNT(*) FROM INSCRIT WHERE ID_USER = NEW.ID_USER );

IF NBR_EVENT >= 100 THEN
   	UPDATE UTILISATEUR SET STATUT = 'GOLDEN' WHERE U_ID= NEW.ID_USER ;
ELSEIF NBR_EVENT >= 50 THEN    
       UPDATE   UTILISATEUR SET STATUT = 'ADVANCED' WHERE U_ID= NEW.ID_USER ;
ELSEIF NBR_EVENT >=20 THEN
       UPDATE   UTILISATEUR SET STATUT = 'EXPERIMENTED' WHERE U_ID= NEW.ID_USER ;
ELSEIF NBR_EVENT >= 10 THEN
       UPDATE   UTILISATEUR SET STATUT = 'BRONZE' WHERE U_ID= NEW.ID_USER ;
END IF;
END $$
DELIMITER ;


/*------------------------------------- 
Définion des fonctions
--------------------------------------*/

/*
Définition de la fonction taille d'un événement, qui étant donné un évenement 
(via son nombre de personne maximale)
 décrit la taille de l'évenement par trois niveau de taille: 
 - PETIT: événement de moins de 20 personnes;
 - MOYEN: événement de taille comprise entre 20 et 100 personnes;
 - GROS: événement de plus de 100 personnes.
*/

DROP FUNCTION IF EXISTS TAILLE_EVENEMENT;
DELIMITER $$
CREATE FUNCTION TAILLE_EVENEMENT(EVENEMENT VARCHAR(45))
RETURNS VARCHAR(20)
DETERMINISTIC
BEGIN
	DECLARE TAILLE NUMERIC(6,0);
    DECLARE NIVEAU VARCHAR(20);
    
    SELECT NBR_DE_PLACE into TAILLE FROM EVENEMENTS WHERE E_ID = EVENEMENT;
   
    IF TAILLE > 100 OR TAILLE IS NULL THEN
        SET NIVEAU = 'GRAND';
    ELSEIF (TAILLE >= 20 AND 
           	TAILLE <= 100) THEN
        SET NIVEAU = 'MOYEN';
    ELSEIF TAILLE < 20 THEN
        SET NIVEAU = 'PETIT';
    END IF;
    RETURN (NIVEAU);
END$$
DELIMITER ;

/*
Définition de la fonction nombre de place restante, qui étant donné un évenement 
(via son nombre de personne maximale et son nombre d'inscrit)
renvoie le nombre de place restante.
*/

DROP FUNCTION IF EXISTS NOMBRE_PLACE_RESTANTE;
DELIMITER $$
CREATE FUNCTION NOMBRE_PLACE_RESTANTE (EVENEMENT VARCHAR(45))
RETURNS VARCHAR(45)
DETERMINISTIC
BEGIN
    DECLARE NB_INSCRIT NUMERIC(6,0);
    DECLARE NB_MAX_PARTICIPANT NUMERIC(6,0);
    DECLARE RES VARCHAR(45);
    
    SELECT COUNT(*) into NB_INSCRIT FROM INSCRIT WHERE ID_EVENEMENT = EVENEMENT;
    SELECT NBR_DE_PLACE into NB_MAX_PARTICIPANT FROM EVENEMENTS WHERE E_ID = EVENEMENT;
    
    IF NB_MAX_PARTICIPANT IS NULL THEN
       SET RES = 'ILLIMITÉ';
   ELSEIF ( NB_MAX_PARTICIPANT -NB_INSCRIT ) > 0 THEN
    	SET RES = (NB_MAX_PARTICIPANT -NB_INSCRIT );
    ELSEIF (NB_MAX_PARTICIPANT -NB_INSCRIT ) <= 0 THEN
    	SET RES = '0';
    END IF;
    
    RETURN (RES);
END$$
DELIMITER ;



/*DEFINITION DE LA FONCTION AGE QUI POUR UN UTILISATEUR CALCULE SON AGE A PARTIR DE SA DATE 
DE NAISSANCE */

DROP FUNCTION IF EXISTS AGE;
DELIMITER $$
CREATE FUNCTION AGE(ID_USR VARCHAR(45))
RETURNS NUMERIC(3)
DETERMINISTIC
BEGIN
	DECLARE DATE_DE_JOUR DATE;

	DECLARE AGE NUMERIC(3);
	
	SET DATE_DE_JOUR = CURRENT_DATE();
	
	SELECT YEAR(DATE_DE_JOUR)-YEAR(DATE_NAISSANCE) INTO AGE FROM UTILISATEUR WHERE U_ID = ID_USR;

	RETURN (AGE);
END $$
DELIMITER ;

	
/*
Définition de la fonction moyen d'age, qui étant donné un événement 
(via l'age des participant)
renvoie la moyen d'age des participant à cet événement.
*/


DROP FUNCTION IF EXISTS MOYEN_AGE;
DELIMITER $$
CREATE FUNCTION MOYEN_AGE(EVENEMENT VARCHAR(45))
RETURNS NUMERIC(4,2)
DETERMINISTIC
BEGIN
	DECLARE MOYEN_AGE_EVENT NUMERIC(4,3);
	
	SELECT AVG(AGE) AS MOYENNE_AGE INTO MOYEN_AGE_EVENT FROM (SELECT AGE(ID_USER) AS AGE FROM INSCRIT WHERE ID_EVENEMENT = EVENEMENT ) AS CALCUL_AGE;
	
	RETURN MOYEN_AGE_EVENT;
END $$
DELIMITER ;



/* ------------------------------------
Insertion de tuples dans les relations
--------------------------------------*/
 

INSERT INTO UTILISATEUR (U_ID,ROLE,PSEUDO , EMAIL,DATE_NAISSANCE,PASSWORD,STATUT) VALUES ('SENTES','ADMIN','SENTES','antoine.afflatet@gmail.com','1998-05-03',md5('HALELLUJAH'),'ADMIN');
INSERT INTO UTILISATEUR ( U_ID,ROLE , PSEUDO , EMAIL,DATE_NAISSANCE,PASSWORD,STATUT ) VALUES ('MOMOMAN852','ADMIN','MOMOMOAN852','momo.man@gmail.com','1898-10-07',md5('HALELLUJAH'),'ADMIN');
INSERT INTO UTILISATEUR (U_ID, ROLE , PSEUDO , EMAIL,DATE_NAISSANCE,PASSWORD,STATUT ) VALUES ('RYU','CONTRIBUTEUR','RYU','RYU.PAJ@gmail.com','1982-05-28',md5('HALELLUJAH'),'NOVICE');
INSERT INTO UTILISATEUR (U_ID,ROLE , PSEUDO , EMAIL,DATE_NAISSANCE,PASSWORD,STATUT ) VALUES ('TANAKA', 'CONTRIBUTEUR','TANAKA','TANA.KA@gmail.com','1998-11-09',md5('HALELLUJAH'),'NOVICE');
INSERT INTO UTILISATEUR ( U_ID,ROLE , PSEUDO , EMAIL,DATE_NAISSANCE,PASSWORD,STATUT ) VALUES ('GON','CONTRIBUTEUR','GON','GON.HUNTER@gmail.com','1998-12-03',md5('HALELLUJAH'),'NOVICE');
INSERT INTO UTILISATEUR ( U_ID,ROLE , PSEUDO , EMAIL,DATE_NAISSANCE,PASSWORD,STATUT ) VALUES ('KARIMON','VISITEUR','KARIMON','kari.mon@gmail.com','1999-02-22',md5('HALELLUJAH'),'NOVICE');
INSERT INTO UTILISATEUR ( U_ID,ROLE , PSEUDO , EMAIL,DATE_NAISSANCE,PASSWORD,STATUT ) VALUES ('DORAIMON4585','VISITEUR','DORAIMON','dora.imon@gmail.com','1998-11-21',md5('HALELLUJAH'),'NOVICE');
INSERT INTO UTILISATEUR ( U_ID,ROLE , PSEUDO , EMAIL,DATE_NAISSANCE,PASSWORD,STATUT ) VALUES ('SALEH','VISITEUR','dass','saleh.dassouki@gmail.com','2000-12-28',md5('HALELLUJAH'),'NOVICE');

INSERT INTO AJOUT_CONTRIB(C_ID,ADMIN_ID) SELECT U2.U_ID,U1.U_ID FROM UTILISATEUR U1,UTILISATEUR U2 WHERE U1.U_ID = 'MOMOMAN852' AND U2.ROLE = 'CONTRIBUTEUR';


INSERT INTO THEME VALUES ('1','CULTURE');
INSERT INTO THEME VALUES ('2','SPORT');


INSERT INTO EVENEMENTS VALUES ('1','RYU','VISITE DE MUSEE','MONTPELLIER',3.8968,43.5984,'2019-11-08 ','2019-11-07  ',5,30,'1','IMAGES/grass-sport-football-soccer-102448.jpg');
INSERT INTO EVENEMENTS VALUES ('2','GON','VISITE DE MUSEE','PARIS',2.287592, 48.862725 ,'2019-12-24 ','2019-12-24 ',8,10,'1','IMAGES/grass-sport-football-soccer-102448.jpg');

INSERT INTO EVENEMENTS VALUES ('3','GON','TOURNOI DE FOOT','MONTPELLIER',3.8968,43.5984,'2020-01-01 ','2020-01-02 ',NULL,18,'2','IMAGES/red-art-relaxation-girl-20967.jpg');

INSERT INTO EVENEMENTS VALUES ('4','RYU','TOURNOI DE FOOT','MONTPELLIER',3.8968,43.5984,'2020-01-01 ','2020-01-02 ',2,18,'2','IMAGES/red-art-relaxation-girl-20967.jpg');

INSERT INTO INSCRIT VALUES('DORAIMON4585','4');
INSERT INTO INSCRIT VALUES('SALEH','3');
INSERT INTO INSCRIT(ID_USER,ID_EVENEMENT) VALUES ('SALEH','4');
INSERT INTO INSCRIT(ID_USER,ID_EVENEMENT) VALUES ('DORAIMON4585','3');


INSERT INTO IMAGES VALUES ('red-art-relaxation-girl-20967.jpg','1');
INSERT INTO IMAGES VALUES ('grass-sport-football-soccer-102448.jpg','2');
/* ------------------------------------
Affichages des tuples 
--------------------------------------*/
SELECT * FROM UTILISATEUR;
SELECT * FROM AJOUT_CONTRIB;
SELECT * FROM THEME;
SELECT * FROM EVENEMENTS;
SELECT * FROM INSCRIT;
SELECT * FROM IMAGES;

