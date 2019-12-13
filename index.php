<?php
        session_start();
        if(isset($_SESSION['id_user'])){
                header("location:MyEvents/dashboardUser");
        }
?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('MyEvent/head');
?>
<body>
<div id="popUp-bg" >
        <div id="popUpContent">
        <div id="popUpClose">+</div>
        <div id="circle">  </div>
                      <form id="logInForm" action='MyEvent/login' method='POST' style="display:none">
		                  
		                  <input type="text" name="user_name" placeholder="Nom d'utilisateur " /><br />
                              
		                  
		                  <input type="password" name="password" placeholder="Mot de passe " /><br />

                              <input type="submit" class="btn btn-secondary" value="Se connecter" >
                              <button type="button" class="btn btn-secondary"><a href='index'>return</a></button>
	                  </form>
                        <form  id="signUpForm" action="MyEvent/utilisateurSignUp"  method="GET"  style="display:none" >
                        <p>Choose your Role : </p>
                        <div id="UserRole1">
                        <input  id="RoleContribButton" type="button" name="Contributor" value="Contributor">
                        </div>
        
                        <div id="UserRole2">
                          <input id="RoleEventSurferButton" type="button" name="EventSurfer" value="EventSurfer">
                     
                        </div>
                        <input type="hidden" name="role" value="Event">
                        <input type="text" name="U_ID" placeholder="NOM">
    
                               <input type="text" name="Pseudo" placeholder="PSEUDO">
                
                               <input type="email" name="email" placeholder="EMAIL">

                              <input type="text" name="date_Naiss" placeholder=" DATE DE NAISSANCE ( AAAA-MM-JJ )">

                              <input type="password" name="passwd" placeholder="MOT DE PASSE">
                
                              <input id="submit" class="btn btn-secondary" type="submit" name="SignUpForm" value="SIGN UP">
                        </form>
                    </div>
              </div>
</div>  

<div id="main-header">
      <?php
        require_once('MyEvent/header');
      ?>
    </div>

    <section  class="main-content">
    <div id='eventInfo'style="display:none;">
                <div id="eventInfoContent">
                <div id="popUpClose">+</div>
                <div id="circle">  </div>
                </div>
        </div>
    <div id="search_bar">
            <form method = "post" id="searchForm">
            <input id = "search_content" type="text" name="search_content" placeholder="Rechercher par : titre evenements">
            <input id = "search-btn" type="submit" name="search-btn" class="btn btn-danger" value="Rechercher">
            </form>
        </div>

        <div id="MyRows">
      
                <?php 
                if(!isset($_POST['search-btn'])){
                        require_once('MyEvent/fetch_Evenements_Acceuil');
                }
                ?>
                       
        </div>
       
    </section>

    <section id="Map">
    <img id="markerProto" class="marker" src="IMAGES/marker.png" width="50" height="50" style="display:none" />
            <div class="map" id="map">
            </div>
            <div id="events">
            <div id="accordion">
            <?php require_once("MyEvent/fetch_events_accordion");?>
            </div>
            </div>
    </section>

     <?php
        require_once('MyEvent/footer');
    ?>

<script src="JSON/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="JSON/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/08c54fbaa8.js" crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v6.0.1/build/ol.js"></script>
<script src="JS/app.js" type="text/javascript"></script>
</body>

</html>


