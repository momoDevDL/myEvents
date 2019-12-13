<?php
    require_once('ConnexionBD.php');
    
    if(!isset($_SESSION)){session_start();}
    $User_id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
    if($User_id){
        $sql = "SELECT * FROM AJOUT_CONTRIB WHERE ADMIN_ID is NULL";
        $row = $dbh->query($sql);
    
        $resultat = "";
        if($row){
            $resultat .= "<div id='ContribTable'><table class='ContribTable'>
            <tr>
            <th>ID_Contributor</th> 
            <th>PSEUDO</th> 
            <th>DATE_NAISSANCE</th> 
            <th>EMAIL</th>
            <th></th>
            <th></th></tr>  ";
            foreach($row as $res){
               
            $resultat .= "<tr id='".$res['C_ID']."'>
            <td>".$res['C_ID']."</td>
            <td>".$res['PSEUDO']."</td>
            <td>".$res['EMAIL']."</td>
            <td>".$res['DATE_NAISSANCE']."</td>
            <td> <button id='acceptRequest' class='btn btn-primary'> ACCEPT </button></td>
            <td><button id='RefuseRequest' class='btn btn-danger'> REFUSE </button></td>
            
            </tr>"; 
    
            }
            $resultat .= "</table></div>";
        echo $resultat;
        }
    }
    
?>