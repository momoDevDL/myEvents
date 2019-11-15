<?php
require_once('keyLog.php');
require_once('ConnexionBDMomo.php');

    $data = file_get_contents("../SQL/evenements-publics-openagenda.json",true);
    $array = json_decode($data,true);
    $sql = "SELECT * FROM UTILISATEUR WHERE ROLE='CONTRIBUTEUR'";
    $res = $dbh->query($sql);
    $createur = array();
    foreach($res as $row){
        $createur[] = $row['U_ID'];
    }   
    print_r($array);
   foreach($array as $row){
       $index = rand(0,sizeof($createur)-1);
       $index2 = rand(1,2);
        $sql = "INSERT INTO EVENEMENTS(E_ID,CREATEUR_ID,TITRE_EVENEMENTS,ADRESSE,LONGITUDE,LATITUDE,DATE_DEBUT,DATE_FIN,ID_THEME)  VALUES('".$row["fields"]["uid"]."','".$createur[$index]."','".$row["fields"]["title"]."', '".$row["fields"]["address"]."', '".$row["fields"]["latlon"][1]."','".$row["fields"]["latlon"][0]."','".$row["fields"]["date_start"]."','".$row["fields"]["date_end"]."','".$index2."')";
        if($dbh->query($sql)){
            echo" DATA INSERTED CORRECTLY </br>";
        }else{
            echo" GG ";
        }
    }
?>
