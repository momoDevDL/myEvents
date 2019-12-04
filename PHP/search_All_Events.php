<?php
session_start();
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
        $taille = 6;
        $max_events = 12;
        foreach($request as $row){

            if( $taille == 0 ){
                if($max_events > 0){
                $resultat.= "</div> <div class='row'>";
                $taille = 6;
                }else{
                $resultat .= "</div><div class='row' style='display :none;'> ";
                $taille = 6;   
                }
            }else{

            $resultat.="<div class='col-md-2'>
            <div class='card' >";

            if($row['IMAGE_URL'] !== ""){
                $resultat .= "<img src='".$row['IMAGE_URL']."' class='card-img-top' alt='event image'>";
            }else{
                $resultat .= "<img src='../IMAGES/".$images[$row['ID_THEME']]."' class='card-img-top' alt='event image'>";
            }
             $resultat .= " <div class='card-body'>
                            <h5 class='card-title'>".$row['TITRE_EVENEMENTS']."</h5>
                            <p class='card-text'>".$row['ADRESSE']."</p>";
                            if($_SESSION['id_role']=="ADMIN"){
                                $resultat .="<form method='post' class='SuppressionForm'>
                                            <input type='hidden' name='hidden' value='".$row['E_ID']."'>
                                            <input id='".$row['E_ID']."' type='submit' name='SuppressionButton' class='btn btn-danger' value='Supprimer'>
                                            ";
                            }else if (($_SESSION['id_role']=="VISITEUR")||(!isset($_SESSION['id_role']))){
                                $resultat .= "<form method='post' class='InscriptionForm'>
                            <input type='hidden' name='hidden' value='".$row['E_ID']."'>
                            <input id='".$row['E_ID']."' type='submit' name='inscriptionButton' class='btn btn-primary' value='S`inscrire'>";
                            
                            }
                            $resultat .= "
                            </form>
                    </div>
            </div>
        </div>";
         $taille--;
         $max_events--;
        }
    }
        $resultat .="</div><div class='showMore'>
    <button id='showMore' class='btn btn-info'>Show More</button>
  </div>" ;
        echo $resultat;
        }else{
                echo"no content is inserted";
        }
        
?>