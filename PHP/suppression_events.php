<?php   
    session_start();


    if(isset($_SESSION['id_user'])){
        $id = $_POST['SuppressionButtonID'];
        $uid = $_SESSION['id_user'];
        require_once('keyLog.php');
        require_once('ConnexionBDAntoine.php');
        $sql ="DELETE FROM EVENEMENTS WHERE E_ID = '$id'";
        $res2 = $dbh->query($sql); 
        if ($_SESSION['id_role']=='ADMIN'){
        	$sql2 = "SELECT * FROM EVENEMENTS ";
        }else {
        	$sql2 = "SELECT * FROM EVENEMENTS WHERE CREATEUR_ID = '$uid' ";
        }
        
        $sql3 = "SELECT * FROM IMAGES";
        $row = $dbh->query($sql2);
        $row2 = $dbh->query($sql3);
        $images = array();
        foreach($row2 as $img){
        $images[$img['THEME']] = $img['NOM']  ;
        }
     $resultat = " ";
     $max_events = 8;
     $count = 0;
     $endOfRow = true;
    if($row){
        $resultat .= "<div class='row'> ";
        foreach($row as $res){
            if($count <=  5 ){
                $resultat .= "<div class='col-md-2'><div class='card' >";

                if($res['IMAGE_URL'] !== ""){
                    $resultat .="<img src='".$res['IMAGE_URL']."' class='card-img-top' alt='event image'>";
                }else{
                    $resultat .= "<img src='../IMAGES/".$images[$res['ID_THEME']]."' class='card-img-top' alt='event image'>";
                }
                    $resultat .= "<div class='card-body'>
                                <h5 class='card-title'>".$res['TITRE_EVENEMENTS']."</h5>
                                <p class='card-text'>".$res['ADRESSE']."</p>
                                <form method='post' class='SuppressionForm'>
                                <input type='hidden' name='hidden' value='".$res['E_ID']."'>
                                <input id='".$res['E_ID']."' type='submit' name='SuppressionButton' class='btn btn-danger' value='Supprimer'>
                                </form>
                        </div>
                </div>
            </div>";
            $count+=1;
            $max_events--;
            }else{
                if($max_events <0){
                    $resultat .=  "</div><div class='row' style='display :none;'> ";
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


    }    

?>