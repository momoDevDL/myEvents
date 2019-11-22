<?php
	
	session_start();
    
	if ($_POST) {
		require_once('connexionBDAntoine.php'); 
		extract($_POST);
			
		$password = md5($password);		
		$sql="SELECT * FROM UTILISATEUR WHERE U_ID ='$user_name' AND PASSWORD='$password'";
		$resultat=$dbh->query($sql);
		
		if($resultat){
			
			if($resultat->rowCount()==0){
				echo 'Utilisateur ou mot de passe incorrecte';
			}
			
			else{
				$user = $resultat->fetch();
				$_SESSION['id_user']=$user['U_ID'];
				header('location:dashboardUser.php');
			}
			if($bdd){
   				 $bdd = NULL;
			}
			$resultat = NULL;
		}
		
	}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
       page login
    </title>
</head>
<body>
<form action='login.php' method='POST'>
		<label>Nom d'utilisateur :</label>
		<input type="text" name="user_name" placeholder="Nom d'utilisateur " /><br />

		<label>Mot de passe :</label>
		<input type="password" name="password" placeholder="Mot de passe " /><br />

		<input type="submit" value="Se connecter" >
	</form>
	<button type="button" ><a href='index.php'>return</a></button>
</body>

</html>