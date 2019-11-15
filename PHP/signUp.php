<?php

require_once('head.php');
echo "<div id='main-signUp-header'>";
require_once('navbar.php');
echo"<h1 id='main-SignUP-title'>WELCOME</h1>";
echo "</div>";
?>

<div id="userChoice">
<button type='button' class='btn btn-primary' id="visit"><a href='#'>VISITEUR</a></button>
 <button type='button' class='btn btn-secondary' id="contrib"><a href='#'>CONTRIBUTEUR</a></button>
</div>

<div id="container-signUpV" >

<form  action="utilisateurSignUp.php"  method="GET"  id="formulaireVisiteur" >
                
                <!--label for="U_ID" >NOM :</label-->
                <input type="text" name="U_ID" placeholder="NOM">
    
                <!--label for="Pseudo" >PSEUDO :</label-->
                <input type="text" name="Pseudo" placeholder="PSEUDO">
                
                <!--label for="U_ID" >EMAIL :</label-->
                <input type="email" name="email" placeholder="EMAIL">

                <!--label for="date_Naiss" >DATE DE NAISSANCE</label-->
                <input type="text" name="date_Naiss" placeholder=" DATE DE NAISSANCE ( AAAA-MM-JJ )">

                <!--label for="passwd" >MOT DE PASSE</label-->
                <input type="password" name="passwd" placeholder="MOT DE PASSE">
                
                <input id="submit" type="submit" name="formulaireVisiteur" value="SIGN UP">
</form>
</div>

<div id="container-signUpC">
<p>L'inscription des contributeurs se fait uniquement par accord de l'admin</p>
<form  action="utilisateurSignUp.php" id="formulaireContributeur" method="GET" >
               

                <input type="text" name="U_ID" placeholder="DUPONT">
    
                
                <input type="text" name="Pseudo" placeholder="DUPONTFX_THE_BEST">
                
                
                <input type="email" name="email" placeholder="DUPONT@-----.fr">

                
                <input type="text" name="date_Naiss" placeholder="AAAA-MM-JJ">

                
                <input type="password" name="passwd" placeholder="**************">

                <input type="submit" name="formulaireContributeur" value="SEND TO ADMIN">

</form>

</div>
<script type="text/javascript" src="../JS/manageForm.js"></script>
<?php
    require_once('footer.php');
?>
