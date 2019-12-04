<?php
require_once('keyLog.php');
require_once('ConnexionBDMomo.php');

    $data = file_get_contents("../JSON/prototype2.json",true);
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
       $index2 = rand(0,sizeof($themes)-1);
       $age_min = rand(10,40);
       $nbrDePlace = rand(5,50000);
        if($row["event"]["x"] != null && $row["event"]["y"] != null){
            if(strlen($row["event"]["field_date"]) <= 19){
            $sql = "INSERT INTO EVENEMENTS (CREATEUR_ID,TITRE_EVENEMENTS,ADRESSE,LONGITUDE,LATITUDE,DATE_DEBUT,DATE_FIN,NBR_DE_PLACE,AGE_MINIMUM,ID_THEME,IMAGE_URL) VALUES('".$createur[$index]."','".$row["event"]["titre"]."', '".$row["event"]["field_lieu"]."', '".$row["event"]["x"]."','".$row["event"]["y"]."','".$row["event"]["field_date"]."','".$row["event"]["field_date"]."','".$nbrDePlace."','".$age_min."','".$themes[$index2]."','".$row["event"]["field_vignette"]["src"]."')";
            if($dbh->query($sql)){
               echo" DATA INSERTED CORRECTLY </br>";
            }else{
                echo " SOMETHING WENT WRONG ";
            }
        }else{
            echo "date format is not correct";
        }
}else{
        echo "coord are null";
    }
      }
?>
