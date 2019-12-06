<?php

if(isset($_POST['search_content'])){
    require_once('keyLog.php');

    require_once('ConnexionBD.php');
    
    if(!isset($_SESSION)){session_start();}
    $User_id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;

    $titre = $_POST['search_content'];
	if($_SESSION['id_role']=="CONTRIBUTEUR"){
      	$sql = "SELECT * FROM EVENEMENTS WHERE CREATEUR_ID = '$User_id' AND TITRE_EVENEMENTS LIKE '%$titre%' ";
    }else if($_SESSION['id_role']=="VISITEUR"){
    	$sql = "SELECT * FROM INSCRIT,EVENEMENTS WHERE ID_EVENEMENT = E_ID AND ID_USER = '$User_id' AND TITRE_EVENEMENTS LIKE '%$titre%' ";
    }else{
        $sql = "SELECT * FROM UTILISATEUR WHERE ROLE='CONTRIBUTEUR'";
    }
    $sql2 = "SELECT * FROM IMAGES";
    $row = $dbh->query($sql);
    $row2 = $dbh->query($sql2);
    $images = array();
    foreach($row2 as $img){
        $images[$img['THEME']] = $img['NOM']  ;
    }
    $resultat = "";
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
                    
                    
                      <input type='text' name='nbrPlace' placeholder='maximum number of attendance' /><br />
                      <input type='text' name='minAge' placeholder='minimum age' /><br />
                      
                      <input type='text' name='imgUrl' placeholder='image url' /><br />
                      </div>
                      <input type='submit' name='submit' value='add Event'>
                    
                      </form></div></div>";
        $resultat .= "<button id='ajoutEvent' type='button' class='btn btn-secondary'>Ajouter un Event</button>";
        }
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
                                <p class='card-text'>".$res['ADRESSE']."</p>";
                                if(($_SESSION['id_role']=="CONTRIBUTEUR")||($_SESSION['id_role']=="ADMIN")){
                                	$resultat .="<form method='post' class='SuppressionForm'>
                                				<input type='hidden' name='hidden' value='".$res['E_ID']."'>
                                				<input id='".$res['E_ID']."' type='submit' name='SuppressionButton' class='btn btn-danger' value='Supprimer'>
                                				</form>
                                				";
                                } else {
                                	$resultat .="<form method='post' class='DesinscriptionForm'>
                                				<input type='hidden' name='hidden' value='".$res['E_ID']."'>
                                				<input id='".$res['E_ID']."' type='submit' name='DesinscriptionButton' class='btn btn-danger' value='Se desinscrire'>
                                				</form>
                                				";
                                }
                      $resultat.="</div>
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