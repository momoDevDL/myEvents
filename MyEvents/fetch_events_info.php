<?php
session_start();
if(isset($_POST['EventID'])){
$EID = $_POST['EventID'];
require_once('ConnexionBD.php');

$sql = "SELECT *,NOMBRE_PLACE_RESTANTE(E_ID)AS NBR FROM EVENEMENTS WHERE E_ID = '$EID'";
$sql2 = "SELECT * FROM IMAGES";
$r = $dbh->query($sql);
$row2 = $dbh->query($sql2);
$images = array();
foreach($row2 as $img){
    $images[$img['THEME']] = $img['NOM']  ;
}

foreach($r as $row ){
$resultat = "<div id ='T_Event'><h2>".$row['TITRE_EVENEMENTS']."</h2></div>";
$resultat .= "<div id='moreInfo'><h4>Event_ID : </h4><p>".$row['E_ID']."</p>";
$resultat .= "<h4> Created by : </h4><p>".$row['CREATEUR_ID']."</p>";
$resultat .= "<h4>Adresse : </h4><p>".$row['ADRESSE']."</p>";
$resultat .= "<h4> Date of Debut : </h4><p>".$row['DATE_DEBUT']."</p>";
$resultat .= "<h4> End Date: </h4><p>".$row['DATE_FIN']."</p>";
$resultat .= "<h4>Capacity : </h4><p>".$row['NBR_DE_PLACE']."</p>";
$resultat .= "<h4>Number of places left : </h4><p>".$row['NBR']."</p>";
$resultat .= "<h4>Minimum age required : </h4><p>".$row['AGE_MINIMUM']."</p>";

if( ($_SESSION['id_role']=='ADMIN') ){
    $resultat .="<form method='post' class='SuppressionForm'>
    <input type='hidden' name='hidden' value='".$row['E_ID']."'>
    <input id='".$row['E_ID']."' type='submit' name='SuppressionButton' class='btn btn-danger' value='Delete'>
    </form></div>";
}else if(($_SESSION['id_role']=='VISITEUR')){
    
    $resultat .= "<form method='post' class='InscriptionForm'>
    <input type='hidden' name='hidden' value='".$row['E_ID']."'>
    <input id='".$row['E_ID']."' type='submit' name='inscriptionButton' class='btn btn-primary' value='Register'>
    </form></div>";
}else{
    $resultat.="</div>";
}

if($row['IMAGE_URL'] !== ""){
    $resultat .= "<img id='eventInfoImg' src='".$row['IMAGE_URL']."'>";
}else{
    $resultat .= "<img id='eventInfoImg' src='../IMAGES/".$images[$row['ID_THEME']]."'>";
}

}
echo $resultat;
}
?>