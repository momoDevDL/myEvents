<?php
	
	session_start();
    
	if ($_POST) {
		require_once('ConnexionBD');
		extract($_POST);
			
		$password = md5($password);		
		$sql="SELECT * FROM UTILISATEUR WHERE U_ID ='$user_name' AND PASSWORD='$password'";
		$resultat=$dbh->query($sql);
		
		if($resultat){
			
			if($resultat->rowCount()==0){
				echo 'Utilisateur ou mot de passe incorrecte';
				header('location:../index');
			}
			
			else{
				$user = $resultat->fetch();
				$_SESSION['id_user']=$user['U_ID'];
				$_SESSION['id_role']=$user['ROLE'];
				header('location:dashboardUser');
			}
			if($bdd){
   				 $bdd = NULL;
			}
			$resultat = NULL;
		}
		
	}
?>