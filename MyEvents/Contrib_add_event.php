<?php
	
	if(!isset($_SESSION)){session_start();}
    $User_id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
    
	if (isset($_POST['submit'])){
		require_once('ConnexionBD.php');
			
		$sql="SELECT ID_THEME,NOM FROM THEME WHERE NOM='".$_POST['theme']."'";
		$resultat=$dbh->query($sql);
		
		if($resultat){
            
			if($resultat->rowCount()!=0){
                foreach($resultat as $row){
				 $theme=$row['NOM'];
				}
				echo $theme ." :  EXISTE DEJA DANS LA BASE ";
                $sql1="INSERT INTO EVENEMENTS(CREATEUR_ID,TITRE_EVENEMENTS,ADRESSE,LONGITUDE,LATITUDE,DATE_DEBUT,DATE_FIN,NBR_DE_PLACE,AGE_MINIMUM,NOMTHEME,IMAGE_URL) VALUES('$User_id','".$_POST['eventTitle']."','".$_POST['adresse']."','".$_POST['longitude']."','".$_POST['latitude']."','".$_POST['startingDate']."','".$_POST['endingDate']."','".$_POST['nbrPlace']."','".$_POST['minAge']."','$theme','".$_POST['imgUrl']."')";
                $dbh->query($sql1);
                header('location:dashboardUser.php');
            }else{
				$sql1="INSERT INTO EVENEMENTS(CREATEUR_ID,TITRE_EVENEMENTS,ADRESSE,LONGITUDE,LATITUDE,DATE_DEBUT,DATE_FIN,NBR_DE_PLACE,AGE_MINIMUM,NOMTHEME,IMAGE_URL) VALUES('".$_SESSION['id_user']."','".$_POST['eventTitle']."','".$_POST['adresse']."','".$_POST['longitude']."','".$_POST['latitude']."','".$_POST['startingDate']."','".$_POST['endingDate']."','".$_POST['nbrPlace']."','".$_POST['minAge']."','".$_POST['theme']."','".$_POST['imgUrl']."')";
                $dbh->query($sql1);
                header('location:dashboardUser.php');
			}
		}else{
			echo "error d'execution de la requete ";
		}
		
	}else{
		echo "Erreur de submit";
	}
?>