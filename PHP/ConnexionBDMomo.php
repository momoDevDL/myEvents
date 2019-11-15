<?php
try{
        $dbh = new PDO("mysql:host=localhost;dbname=MyEvents", $user_name, $psswd,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
        } catch(PDOException $e){
        echo $e->_getMessage() . "</br>";
        die("Connexion impossible !</br>");
}

?>