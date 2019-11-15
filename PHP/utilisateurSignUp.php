<?php
echo "BONJOUR</br>";
    require_once('keyLog.php');
    require_once('ConnexionBDMomo.php');

    if(isset($_GET['formulaireVisiteur'])){
        $NEW_UID = $_GET['U_ID'];
        $sql = "SELECT * FROM UTILISATEUR WHERE U_ID='$NEW_UID'";
        $res =  $dbh->query($sql);
        if($res == false){
            echo "ERREUR EST SURVENU";
        }

        if( $res->rowCount() != 0 ){
            echo "Vous avez un compte existant, veuillez vous authentifier avec ce dernier ";
        }else{
            echo "avant insertion </br>";
            $insert = "INSERT INTO UTILISATEUR VALUES('".$_GET["U_ID"]."','VISITEUR','".$_GET["Pseudo"]."', '".$_GET["email"]."','".$_GET["date_Naiss"]."','".$_GET["passwd"]."','NOVICE')";
            $dbh->query($insert);
            session_start();
            $_SESSION['id_user'] = $NEW_UID; 
            //echo "<script>alert('Merci pour votre inscription vous aller etre redirigé vers la page d'acceuil')</script> ";
            header('Location:index.php');
        }
    }

    if(isset($_GET['formulaireContributeur'])){
        $NEW_UID = $_GET['U_ID'];
        $sql = "SELECT * FROM AJOUT_CONTRIB WHERE C_ID='$NEW_UID'";
        $res =  $dbh->query($sql);
        
        if( $res->rowCount() != 0 ){
            echo "VOTRE DEMANDE D'ADHESION EXISTE DÉJA DANS NOTRE BASE EST EN COURS DE TRAITMENT PAR L'ADMIN ";
        }else{
            $insert = "INSERT INTO AJOUT_CONTRIB VALUES('".$_GET["U_ID"]."','NULL')";
            $dbh->query($insert); 
            echo "<script>alert('Merci pour votre inscription vous aller etre redirigé vers la page d'acceuil')</script> ";
            header('Location:index.php');
        }
    }

    
?>
