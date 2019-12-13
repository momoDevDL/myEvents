<?php   
    session_start();


if(isset($_SESSION['id_user'])){
    $id = $_POST['utilisateur_sup_id'];
    $uid = $_SESSION['id_user'];
    require_once('ConnexionBD.php');
    $sql ="DELETE FROM UTILISATEUR WHERE U_ID='$id'";
    $res2 = $dbh->query($sql); 
    $sql2 = "SELECT * , AGE(U_ID) AS age FROM UTILISATEUR ORDER BY ROLE, STATUT";
    $row = $dbh->query($sql2);
   	
    $resultat = "";
    if($row){
        $resultat .= "<div id='AllUsersTable'><table class='UsersTable'>
        <tr>
        <th>Role</th> 
        <th>Statut</th>
        <th>U_Id</th> 
        <th>Pseudo</th> 
        <th>Age</th> 
        <th>Email</th>
        <th></th>
        <th></th></tr>  ";
        foreach($row as $res){
           
        $resultat .= "<tr id='".$res['U_ID']."'>
        <td>".$res['ROLE']."</td>
        <td>".$res['STATUT']."</td>
        <td>".$res['U_ID']."</td>
        <td>".$res['PSEUDO']."</td>
        <td>".$res['age']."</td>
        <td>".$res['EMAIL']."</td>";
        if ($res['ROLE']!='ADMIN'){
        	$resultat .="
        	<td><button id='SuppressionUtilisateur' class='btn btn-danger'> Supprimer </button></td>";
        }    
        $resultat .="</tr>"; 
    
    }
    $resultat .= "</table></div>";
    echo $resultat;
    }
}
?>