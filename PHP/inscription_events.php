<?php   
    session_start();

    if(isset($_SESSION['id_user'])){
        $id = $_POST['inscriptionButtonID'];
        $uid = $_SESSION['id_user'];
        require_once('keyLog.php');
        require_once('ConnexionBD.php');
        $sql ="SELECT * FROM INSCRIT WHERE ID_EVENEMENT = '$id' AND ID_USER  = '$uid' ";
        $res = $dbh->query($sql);
        if($res->rowCount() == 0){
            $insert = "INSERT INTO INSCRIT VALUES('$uid','$id')";
            $row = $dbh->query($insert);
            if($row->rowCount() == 0){
            	header('location:JaiTrouver.php');
        	}else{
            	echo "INSCRIT";
        	}
        }else{
            echo "</br><p id='errorInscr' class='btn btn-danger'>vous etes deja inscrit a cet evenement impossible de se reinscrire</p> ";
        }
    }else{
        echo "</br><p id='errorInscr' class = 'btn btn-danger'>vous ne pouvez pas s'inscrire sans authentification</p>";
    }

?>