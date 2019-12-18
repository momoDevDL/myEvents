<?php   
    session_start();


    if(isset($_SESSION['id_user'])){
        $id = $_POST['SuppressionButtonID'];
        $uid = $_SESSION['id_user'];
        require_once('ConnexionBD.php');
        $sql ="DELETE FROM EVENEMENTS WHERE E_ID = '$id'";
        $res2 = $dbh->query($sql); 
        if ($_SESSION['id_role']=='ADMIN'){
        	$sql2 = "SELECT * FROM EVENEMENTS ";
        }else {
        	$sql2 = "SELECT * FROM EVENEMENTS WHERE CREATEUR_ID = '$uid' ORDER BY E_ID DESC";
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
    if(($_SESSION['id_role']=="CONTRIBUTEUR")){
        $resultat.="<div id='popUp-bg' >
        <div id='popUpContent'>
        <div id='AjoutEventPopUpClose'>+</div>
                      <form action='Contrib_add_event.php' id='AddEventForm' method='POST' style='display:none'>
                      <div id='AddEventRightForm'>
                      <input type='text' name='eventTitle' placeholder='Event title' /><br />
                              
                      <input type='text' name='adresse' placeholder='adresse' /><br />
                      <input type='text' name='theme' placeholder='theme' /><br />
                      <input type='text' name='longitude' placeholder='longitude' /><br />
                              
                      <input type='text' name='latitude' placeholder='latitude' /><br />
                      </div>
                      <div id='AddEventLeftForm'>
                      <input type='text' name='startingDate' placeholder='starting-date : AAAA-MM-DD' /><br />
                      <input type='text' name='endingDate' placeholder='ending-date : AAAA-MM-DD' /><br />
                    
                    
                      <input type='text' name='nbrPlace' placeholder='Capacity' /><br />
                      <input type='text' name='minAge' placeholder='minimum age' /><br />
                      
                      <input type='text' name='imgUrl' placeholder='image url' /><br />
                      </div>
                      <input type='submit' name='submit' value='add Event'>
                    
                      </form></div></div>";
        $resultat .= "<button id='ajoutEvent' type='button' class='btn btn-secondary'>Add an event</button>";
        }
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
                                <input id='".$res['E_ID']."' type='submit' name='SuppressionButton' class='btn btn-danger' value='Delete'>
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