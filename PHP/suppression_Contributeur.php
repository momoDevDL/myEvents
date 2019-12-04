<?php   
    session_start();


if(isset($_SESSION['id_user'])){
    $id = $_POST['SuppressionContributeurButtonID'];
    $uid = $_SESSION['id_user'];
    require_once('keyLog.php');
    require_once('ConnexionBDAntoine.php');
    $sql ="DELETE FROM UTILISATEUR WHERE U_ID = '$id'";
    $res2 = $dbh->query($sql); 
    $sql2 = "SELECT * FROM UTILISATEUR WHERE ROLE = 'CONTRIBUTEUR'";
    $row = $dbh->query($sql2);
    $resultat = "";
    $max_contributeur = 8;
    $count = 0;
    $endOfRow = true;
   	if($row){
    	$resultat .= "<div class='row'> ";
        foreach($row as $res){
            if($count <=  4 ){
                $resultat .= "<div class='col-md-2'><div class='card' >";

                    $resultat .= "<div class='card-body'>
                                <h5 class='card-title'>".$res['PSEUDO']."</h5>
                                <p class='card-text'>".$res['ROLE']."</p>
                                ";
                                if($_SESSION['id_role']=="ADMIN"){
                                	$resultat .="<p class='card-text'>".$res['EMAIL']."</p>
                                				<p class='card-text'>".$res['DATE_NAISSANCE']."</p>
                                				<form method='post' class='SuppressionContributeurForm'>
                                				<input type='hidden' name='hidden' value='".$res['U_ID']."'>
                                				<input id='".$res['U_ID']."' type='submit' name='SuppressionContributeurButton' class='btn btn-danger' value='Supprimer'>
                                				</form>
                                				";
                                }
                                $resultat .="
                                
                        </div>
                </div>
            </div>";
            $count+=1;
            $max_contributeur--;
            }else{
                if($max_contributeur <0){
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