<?php
    require_once('keyLog.php');

    require_once('ConnexionBDMomo.php');
    
    $sql = "SELECT * FROM EVENEMENTS ";
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
    if($row){
        echo "<div class='row'> ";
        foreach($row as $res){
            if($count <= 2 ){
                echo "<div class='col-md-4'>
                <div class='card' >";

                if($res['IMAGE_URL'] !== ""){
                    echo"<img src='".$res['IMAGE_URL']."' class='card-img-top' alt='event image'>";
                }else{
                    echo"<img src='../IMAGES/".$images[$res['ID_THEME']]."' class='card-img-top' alt='event image'>";
                }
                    echo"<div class='card-body'>
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
                    echo "</div><div class='row' style='display :none;'> ";
                }else{
                    echo "</div><div class='row'> ";
                }
                
                $count = 0; 
            }
        
        }
        echo"</div>";
    }else{
        echo "la requete a echoué";
    }

?>