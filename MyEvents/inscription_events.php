<?php   
    session_start();

    if(isset($_SESSION['id_user'])){
        $id = $_POST['inscriptionButtonID'];
        $uid = $_SESSION['id_user'];
        require_once('ConnexionBD.php');
        $sql ="SELECT * FROM INSCRIT WHERE ID_EVENEMENT = '$id' AND ID_USER  = '$uid' ";
        $res = $dbh->query($sql);
        if($res->rowCount() == 0){
        	$insert = "INSERT INTO INSCRIT VALUES('$uid','$id')";
        	$valRetour = "";
        	try { 
    			$dbh->exec($insert); 
			} catch (PDOException $e) { 
				$valRetour = $dbh->errorCode();
			}	
			
			if ($valRetour =="45000"){
				print("Your age is below the required age !");
			}else if ($valRetour =="45001"){
				print("event full !") ;
			}else{
				print("registered");
			}
        }else{
            echo "</br><p id='errorInscr' class='btn btn-danger'>You are already registered for this event</p> ";
        }
    }else{
        echo "</br><p id='errorInscr' class = 'btn btn-danger'>You cannot register without being logged in </p>";
    }

?>