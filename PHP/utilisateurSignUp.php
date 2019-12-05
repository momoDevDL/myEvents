<?php
echo "BONJOUR</br>";
    require_once('keyLog.php');
    require_once('ConnexionBDMomo.php');

    if(isset($_GET['SignUpForm'])){
        $NEW_UID = $_GET['U_ID'];
        $Role= $_GET['role'];
        $sql = "SELECT * FROM UTILISATEUR WHERE U_ID='$NEW_UID'";
        $res =  $dbh->query($sql);
        if($res == false){
            echo "ERREUR EST SURVENU";
        }

        if( $res->rowCount() != 0 ){
            echo "Vous avez un compte existant, veuillez vous authentifier avec ce dernier ";
        }else{
            echo "avant insertion </br>";
            if($Role == "VISITEUR"){
            $insert = "INSERT INTO UTILISATEUR VALUES('".$_GET["U_ID"]."','$Role','".$_GET["Pseudo"]."', '".$_GET["email"]."','".$_GET["date_Naiss"]."','".md5($_GET["passwd"])."','NOVICE')";
            $dbh->query($insert);
            session_start();
            $_SESSION['id_user'] = $NEW_UID; 
            //echo "<script>alert('Merci pour votre inscription vous aller etre redirigé vers la page d'acceuil')</script> ";
            header('Location:dashboardUser.php');
            }else{
            $insert = "INSERT INTO AJOUT_CONTRIB(C_ID,PSEUDO,EMAIL,DATE_NAISSANCE,PASSWORD,STATUT) VALUES('$NEW_UID','".$_GET["Pseudo"]."', '".$_GET["email"]."','".$_GET["date_Naiss"]."','".md5($_GET["passwd"])."','NOVICE')";
            $dbh->query($insert) ;
            echo"<p> Votre demande va etre envoyé à l'admin pour traitement</p>";
            header('Location:index.php');
            }

        }
    }
    
?>
