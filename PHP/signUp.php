<?php

require_once('head.php');
echo "<div id='main-signUp-header'>";
require_once('header.php');
echo "</div>";
?>
<div id="type_usr">
<button type='button' class='btn btn-primary' id="contrib">Contributeur</button>
<button type='button' class='btn btn-secondary' id="visit">UTILISATEUR</button>
</div>

<section id="container-signUp">

<form  action="action.php" id="formulaireVisiteur" method="GET" >
                
                <label for="nom" >NOM</label>
                <input type="text" id="nom" placeholder="DUPONT">
                <label for="clavier">Clavier logitech(10$)</label>
                <input value="cl logi" name="clavier" type="text">

                <select id="type Utilisateur" name="disque">
                    <option value="">Seagate 500 Go</option>
                    <option value="">Western 750 Go</option>
                    <option value="">Toshiba 250 Go</option>
                </select>

</form>
<form  action="action.php" id="formulaireContributeur" method="GET" >
                
                <label for="nom" >NOM</label>
                <input type="text" id="nom" placeholder="DUPONT">

</form>

</section>
<script src="../JS/manageForm.js"></script>

