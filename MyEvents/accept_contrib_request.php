<?php   
    session_start();


    if(isset($_SESSION['id_user'])){
        $id = $_POST['contrib_id'];
        $uid = $_SESSION['id_user'];
        require_once('ConnexionBD.php');
        $sql ="UPDATE AJOUT_CONTRIB set ADMIN_ID='$uid' WHERE C_ID = '$id' ";
         $res = $dbh->query($sql); 
        $sql2 = "INSERT INTO UTILISATEUR VALUES('$id','CONTRIBUTEUR',(SELECT PSEUDO FROM AJOUT_CONTRIB WHERE C_ID = '$id'),(SELECT EMAIL FROM AJOUT_CONTRIB WHERE C_ID = '$id'),(SELECT DATE_NAISSANCE FROM AJOUT_CONTRIB WHERE C_ID = '$id'),(SELECT PASSWORD FROM AJOUT_CONTRIB WHERE C_ID = '$id'),'NOVICE' )";
        $res2 = $dbh->query($sql2);
        $sql3 = "SELECT * FROM AJOUT_CONTRIB WHERE ADMIN_ID is NULL";
        $row = $dbh->query($sql3);

    $resultat = "";
    if($row){
        $resultat .= "<div id='ContribTable'><table class='ContribTable'>
        <tr>
        <th>ID_Contributor</th> 
        <th>PSEUDO</th> 
        <th>Birthday</th> 
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