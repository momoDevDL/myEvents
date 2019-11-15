<?php

if(isset($_POST['search_content'])){
        require_once('keyLog.php');
        require_once('ConnexionBDMomo.php');
        
        $titre = $_POST['search_content'];
        $sql = "SELECT * FROM EVENEMENTS WHERE TITRE_EVENEMENTS LIKE '%$titre%'";
        $sql2 = "SELECT * FROM IMAGES";
        $row2 = $dbh->query($sql2);
        $request = $dbh->query($sql);
        $images = array();
        foreach($row2 as $img){
                $images[$img['THEME']] = $img['NOM']  ;
        }

        $resultat="<div class='row'> ";
        $taille = 4;
        foreach($request as $row){
            if( $taille == 0){
                $resultat = "</div> <div class='row'>";
                $taille = 4;
         }   
            $resultat.="<div class='col-md-2'>
            <div class='card' style='width: 18rem;'>
            <img src='../IMAGES/".$images[$row['ID_THEME']]."' class='card-img-top' alt='event image'>
                    <div class='card-body'>
                            <h5 class='card-title'>".$row['TITRE_EVENEMENTS']."</h5>
                            <p class='card-text'>".$row['ADRESSE']."</p>
                            <form method='post' class='InscriptionForm'>
                            <input type='hidden' name='hidden' value='".$row['E_ID']."'>
                            <input id='".$row['E_ID']."' type='submit' name='inscriptionButton' class='btn btn-primary' value='S`inscrire'>
                            </form>
                    </div>
            </div>
        </div>";
         $taille--;
        }
        
        echo $resultat;
        }else{
                echo"no content is inserted";
        }
?>