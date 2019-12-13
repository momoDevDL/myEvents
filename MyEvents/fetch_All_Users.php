<?php
    require_once('ConnexionBD.php');
    
    if(!isset($_SESSION)){session_start();}
    $User_id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;
    if($User_id){
        $sql = "SELECT * , AGE(U_ID) AS age FROM UTILISATEUR ORDER BY ROLE, STATUT";
        $row = $dbh->query($sql);
    
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