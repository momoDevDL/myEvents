<?php

    require_once('ConnexionBD');
    
    $sql = "SELECT CREATEUR_ID,TITRE_EVENEMENTS , LONGITUDE, LATITUDE FROM EVENEMENTS GROUP BY CREATEUR_ID,TITRE_EVENEMENTS,LONGITUDE,LATITUDE ";
    
    $row = $dbh->query($sql);
    $debut = false;
    $CreatorArray = array();
    if($row){
        
        foreach($row as $res){
            if(in_array($res['CREATEUR_ID'],$CreatorArray)){
                echo"<input  type='checkbox' data-lon='".$res['LONGITUDE']."' data-lat='".$res['LATITUDE']."'value='".$res['TITRE_EVENEMENTS']."'>";
                echo "<label>".$res['TITRE_EVENEMENTS']."</label></br>";

            }else{
                $CreatorArray[] = $res['CREATEUR_ID'];
                if($debut){
                echo "</div>";
                echo"<h3> ".$res['CREATEUR_ID']."</h3> ";        
                echo "<div class='accord'> 
                <input  type='checkbox' data-lon='".$res['LONGITUDE']."' data-lat='".$res['LATITUDE']."'value='".$res['TITRE_EVENEMENTS']."'>
                <label>".$res['TITRE_EVENEMENTS']."</label></br>";
                }else{
                $debut=true;
                echo"<h3> ".$res['CREATEUR_ID']."</h3> ";        
                echo "<div class='accord'> 
                <input  type='checkbox' data-lon='".$res['LONGITUDE']."' data-lat='".$res['LATITUDE']."' value='".$res['TITRE_EVENEMENTS']."'>
                <label>".$res['TITRE_EVENEMENTS']."</label></br>";
            }        
        }
    }
    }else{
        echo "la requete a echoué";
    }

?>