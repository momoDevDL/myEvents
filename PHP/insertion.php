<?php
require_once('keyLog.php');
try{
    $dbh = new PDO("mysql:host=localhost;dbname=myEvents", $user_name, $psswd,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
    } catch(PDOException $e){
    echo $e->getMessage() . "</br>";
    die("Connexion impossible !</br>");
    }

    $data = file_get_contents("../SQL/prototype.json",true);
    $array = json_decode($data,true,512,JSON_INVALID_UTF8_SUBSTITUTE);
    print_r($array);
   foreach($array as $row){
        $sql = "INSERT INTO EVENEMENTS  VALUES('".$row["recordid"]."','2','".$row["fields"]["title"]."', '".$row["fields"]["placename"]."','".$row["fields"]["date_start"]."','".$row["fields"]["date_end"]."','".$row["fields"]["uid"]."')";
        if($dbh->query($sql)){
            echo" DATA INSERTED CORRECTLY";
        }else{
            echo" ERROR ON ";
        }
    }
?>