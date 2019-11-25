<?php
    require_once('keyLog.php');

    require_once('ConnexionBDMomo.php');
    if(!isset($_SESSION)){session_start();}
    $User_id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;

    $sql = "SELECT * FROM EVENEMENTS WHERE E_ID NOT IN ( SELECT ID_EVENEMENT FROM INSCRIT WHERE ID_USER = '$User_id')" ;
    $sql2 = "SELECT * FROM IMAGES";
    $row = $dbh->query($sql);
    $row2 = $dbh->query($sql2);
    $images = array();
    foreach($row2 as $img){
        $images[$img['THEME']] = $img['NOM']  ;
    }
    
    $max_events = 8;
    $count = 0;
    $endOfRow = true;
    $resultat = " ";
    if($row){
        $resultat .= "<div class='row'> ";
        foreach($row as $res){
            if($count <= 4 ){
                $resultat .="<div class='col-md-2'>
                <div class='card' >";

                if($res['IMAGE_URL'] !== ""){
                    $resultat .= "<img src='".$res['IMAGE_URL']."' class='card-img-top' alt='event image'>";
                }else{
                    $resultat .= "<img src='../IMAGES/".$images[$res['ID_THEME']]."' class='card-img-top' alt='event image'>";
                }
                    $resultat .= "<div class='card-body'>
                                <h5 class='card-title'>".$res['TITRE_EVENEMENTS']."</h5>
                                <p class='card-text'>".$res['ADRESSE']."</p>
                                <form method='post' class='InscriptionForm'>
                                <input type='hidden' name='hidden' value='".$res['E_ID']."'>
                                <input id='".$res['E_ID']."' type='submit' name='inscriptionButton' class='btn btn-primary' value='S`inscrire'>
                                </form>
                        </div>
                </div>
            </div>";
            $count+=1;
            $max_events--;
            }else{
                if($max_events <0){
                    $resultat .= "</div><div class='row' style='display :none;'> ";
                }else{
                    $resultat .= "</div><div class='row'> ";
                }
                
                $count = 0; 
            }
        
        }
        $resultat .= "</div>";
    }else{
        $resultat .= "la requete a echoué";
    }
    $resultat .="<div class='showMore'>
    <button id='showMore' class='btn btn-info'>Show More</button>
  </div>" ;
    echo $resultat;

?>