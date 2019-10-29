

/*DROP TABLE UTILISATEUR;
DROP TABLE CONTRIBUTEUR;
DROP TABLE ADMINISTRATEUR;
DROP TABLE VISITEUR;
DROP TABLE COMPTES;
DROP TABLE THEMES;
DROP TABLE EVENEMENTS;
DROP TABLE INSCRIT;*/
-- **************************************   UTILISATEUR  

CREATE TABLE   UTILISATEUR  
(
   U_ID            numeric NOT NULL ,
   NOM             varchar(45) NOT NULL ,
   PRENOM          varchar(45) NOT NULL ,
   ADRESSE         varchar(200) NOT NULL ,
   EMAIL           varchar(150) NOT NULL ,
   NUMERO_DE_TEL   varchar(45) NOT NULL ,
   ID_COMPTE       varchar(45) NOT NULL ,

CONSTRAINT USR_PK PRIMARY KEY ( U_ID )

);


-- **************************************  CONTRIBUTEUR 

CREATE TABLE  CONTRIBUTEUR 
(
  C_ID         numeric NOT NULL ,
  ADMIN_ID      numeric NOT NULL ,

CONSTRAINT CONTRIB_PK PRIMARY KEY ( C_ID ),
CONSTRAINT  CONTRIBID_FK FOREIGN KEY( C_ID ) REFERENCES  UTILISATEUR  ( U_ID )
);



-- **************************************   VISITEUR  

CREATE TABLE   VISITEUR  
(
   V_ID   numeric NOT NULL ,
   
CONSTRAINT VISIT_PK PRIMARY KEY ( V_ID ),
CONSTRAINT    VISIT_ID_FK FOREIGN KEY(  V_ID  ) REFERENCES   UTILISATEUR   (  U_ID  )

);



-- **************************************  ADMIN 

CREATE TABLE  ADMINISTRATEUR 
(
  A_ID  numeric NOT NULL ,

CONSTRAINT ADMIN_PK PRIMARY KEY ( A_ID ),
CONSTRAINT  ADMIN_FK FOREIGN KEY ( A_ID ) REFERENCES  UTILISATEUR  ( U_ID )
);


-- **************************************  COMPTES 

CREATE TABLE  COMPTES 
(
  ID_COMPTE   varchar(45) NOT NULL ,
  PASSWORD_1  varchar(45) NOT NULL ,
  USER_ACCOUNT_ID numeric NOT NULL,
  
CONSTRAINT COMPTES_PK PRIMARY KEY ( ID_COMPTE ),
CONSTRAINT  COMPTES_USR_FK FOREIGN KEY ( USER_ACCOUNT_ID ) REFERENCES  UTILISATEUR  ( U_ID )
);



CREATE TABLE  INSCRIT 
(
  ID_USER   numeric NOT NULL ,
  ID_EVENEMENT numeric NOT NULL ,

CONSTRAINT INSCRIT_PK PRIMARY KEY ( ID_USER,ID_EVENEMENT )

);








-- **************************************   THEME  

CREATE TABLE   THEME  
(
   ID_THEME      varchar(45) NOT NULL ,
   NOM           varchar(45) NOT NULL ,
   DESCRIPTION   varchar(120) NOT NULL ,

CONSTRAINT THEME_PK PRIMARY KEY ( ID_THEME )
);



-- **************************************  EVENEMENTS 

CREATE TABLE EVENEMENTS
(
E_ID             varchar(45) NOT NULL ,
CREATEUR_ID          numeric	  NOT NULL ,
  TITRE_EVENEMENTS  varchar(45) NOT NULL ,
  ADRESSE           varchar(45) NOT NULL ,
  DATE_DEBUT        date NOT NULL ,
  DATE_FIN          date NOT NULL ,
  ID_THEME          varchar(45) NOT NULL ,


CONSTRAINT EVENT_PK PRIMARY KEY ( E_ID ),

CONSTRAINT  THEME_EVT_FK  FOREIGN KEY ( ID_THEME ) REFERENCES  THEME( ID_THEME ),
CONSTRAINT  CREATOR_EVT_FK  FOREIGN KEY ( CREATEUR_ID ) REFERENCES CONTRIBUTEUR ( C_ID )
);


/*ALTER TABLE UTILISATEUR ADD CONSTRAINT   ACCOUNT_FK  FOREIGN KEY(  ID_COMPTE  ) REFERENCES   COMPTES   (  ID_COMPTE  );*/

ALTER TABLE CONTRIBUTEUR ADD CONSTRAINT  ADMIN_CONTRIB_FK  FOREIGN KEY ( ADMIN_ID ) REFERENCES  ADMINISTRATEUR  ( A_ID );







