<?php   
    session_start();


    if(isset($_SESSION['id_user'])){
        $id = $_POST['contrib_id'];
        $uid = $_SESSION['id_user'];

        require_once('ConnexionBD');
        $sql ="DELETE FROM AJOUT_CONTRIB  WHERE C_ID = '$id' ";
        $res = $dbh->query($sql); 
        $sql3 = "SELECT * FROM AJOUT_CONTRIB WHERE ADMIN_ID is NULL";
        $row = $dbh->query($sql3);

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