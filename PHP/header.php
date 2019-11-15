
<header>
<?php
require_once('navbar.php');
?>
              <div id="main-title">
                    <h1>FULLY ENJOY</h1>
                    <p>Because ensuring your happiness, is our main goal.</p>
                    <div id="logButtons">
                        		<?php 
                        			if (isset($_SESSION['id_user'])){
    									echo "<button type='button' class='btn btn-primary'><a href='logout.php'>LOG OUT</a></button>";
    								} else {
                                        echo "<button id='logIn' type='button' class='btn btn-primary'>LOG IN</button>";
                                        echo "<button id='signUp' type='button' class='btn btn-secondary'>SIGN UP</button>";
    								}
                        		?>
      <button id='checkEvents' type='button' class='btn btn-info'><a href="#search_bar">Check our events</a></button>;
                  </div>
              </div>

              <div id="popUp-bg" >
                    <div id="popUpContent">
                        <div id="popUpClose">+</div>
                          <form id="logInForm" action='login.php' method='POST' style="display:none">
		                  
		                  <input type="text" name="user_name" placeholder="Nom d'utilisateur " /><br />
                              
		                  
		                  <input type="password" name="password" placeholder="Mot de passe " /><br />

                              <input type="submit" class="btn btn-secondary" value="Se connecter" >
                              <button type="button" class="btn btn-secondary"><a href='index.php'>return</a></button>
	                  </form>
                        <form  id="signUpForm" action="utilisateurSignUp.php"  method="GET"  id="formulaireVisiteur"  style="display:none" >
                
                
                              <input type="text" name="U_ID" placeholder="NOM">
    
                
                               <input type="text" name="Pseudo" placeholder="PSEUDO">
                
                               <input type="email" name="email" placeholder="EMAIL">

                              <input type="text" name="date_Naiss" placeholder=" DATE DE NAISSANCE ( AAAA-MM-JJ )">

                              <input type="password" name="passwd" placeholder="MOT DE PASSE">
                
                              <input id="submit" class="btn btn-secondary" type="submit" name="formulaireVisiteur" value="SIGN UP">
                        </form>
                    </div>
              </div>
            
</header>

