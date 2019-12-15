<?php
require_once('ConnexionBD.php');

    $data = file_get_contents("../JSON/evenements-publics-openagenda.json",true);
    $array = json_decode($data,true);
    $sql = "SELECT * FROM UTILISATEUR WHERE ROLE='CONTRIBUTEUR'";
    $sql2 = "SELECT * FROM THEME ";
    $res = $dbh->query($sql);
    $res2 = $dbh->query($sql2);
    $createur = array();
    foreach($res as $row){
        $createur[] = $row['U_ID'];
    }
    $themes = array();
    foreach($res2 as $row){
        $themes[] = $row['ID_THEME'];
    }   
    print_r($array);
   foreach($array as $row){
       $index = rand(0,sizeof($createur)-1);
       $index2 = rand(1,sizeof($themes));
       $age_min = rand(10,40);
       $nbrDePlace = rand(5,50000);
        $sql = "INSERT INTO EVENEMENTS (CREATEUR_ID,TITRE_EVENEMENTS,ADRESSE,LONGITUDE,LATITUDE,DATE_DEBUT,DATE_FIN,NBR_DE_PLACE,AGE_MINIMUM,ID_THEME,IMAGE_URL) VALUES('".$createur[$index]."','".$row["fields"]["title"]."', '".$row["fields"]["placename"]."', '".$row["fields"]["latlon"][1]."','".$row["fields"]["latlon"][0]."','".$row["fields"]["date_start"]."','".$row["fields"]["date_end"]."','".$nbrDePlace."','".$age_min."','".$index2."','".$row["fields"]["image"]."')";
        if($dbh->query($sql)){
            echo" DATA INSERTED CORRECTLY </br>";
        }else{
            echo " SOMETHING WENT WRONG ";
        }
    }
?>
