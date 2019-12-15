<?php
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=MyEvents;charset=UTF8','debian-sys-maint','t5n8O9FMkWEb4ssP',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
	} catch(PDOException $e){
		echo $e->getMessage();
		die(" FUCK Connexion impossible !");
    }

?>