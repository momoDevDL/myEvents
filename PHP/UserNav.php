  
    <div class="info">
        <?php 
            echo "<p id='pseudo'> Bienvenue " . $_SESSION['id_user'] ."</p>";
        ?>
        <!--img id="profilePic"  src="../IMAGES/man-holing-microphone-in-front-of-crowd-2183361.jpg"-->
        <a id="logOut" data-active="false" class='nav-link' href="logout.php">LOG OUT</a>
    </div>

    <div id="onglets">
    <?php 
    	$resultat = "";
          
        $resultat.="<a id='AllEvents' data-active='false' class='nav-link'>All Events</a>";
            
        if($_SESSION['id_role']=="ADMIN"){
    		$resultat .= "<a id='AllContributors'  class='nav-link' data-active='false'>All Contributors</a>
    	      			  <a id='ContributorsRequests'  class='nav-link' data-active='false'>Contributors Requests</a>";
        }else {
         	$resultat .= "<a id='YourEvents'  class='nav-link' data-active='false'>Your Events</a>
    	      			  <a id='OurContributors'  class='nav-link' data-active='false'>Our Contributors</a>";
		}
    	$resultat .= "<a  id='Contact' class='nav-link' data-active='false'>Contact Us</a>"; 
    	echo $resultat;
    ?>
    <footer id="dashboardFooter">
        <p>ALL COPYRIGHTS RESERVED</p>  
    </footer>
    </div>