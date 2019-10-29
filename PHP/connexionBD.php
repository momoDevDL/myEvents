<?php
	/*define("serveur","localhost");
	define("utilisateur","root");
	define("mot_de_passe",'root');
	define("base","myEvents");*/

	//$bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base) or die(mysqli_connect_error());
	
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=myEvents;charset=UTF8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,));
	} catch(PDOException $e){
		echo $e->getMessage();
		die("Connexion impossible !");
	}
	// $bdd=mmysqli_connect(serveur,utilisateur,mot_de_passe,base) or die(mysqli_connect_error());
?>