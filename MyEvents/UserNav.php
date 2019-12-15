  
    
    <div class="info">
        <?php 
            echo "<p id='pseudo'> Bienvenue " . $_SESSION['pseudo'] ."</p>";
        ?>
        <!--img id="profilePic"  src="../IMAGES/man-holing-microphone-in-front-of-crowd-2183361.jpg"-->
        <a id="logOut" data-active="false" class='nav-link' href="logout.php">LOG OUT</a>
    </div>

    <div id="onglets">
    <?php 
    	$resultat = "";
          
        $resultat.="<a id='AllEvents' data-active='false' class='nav-link'>All Events</a>";
            
        if($_SESSION['id_role']=="ADMIN"){
    		$resultat .= "<a id='AllUsers'  class='nav-link' data-active='false'>All Users</a>
    	      			  <a id='ContributorsRequests'  class='nav-link' data-active='true'>Contributors Requests</a>";
        }else {
         	$resultat .= "<a id='YourEvents'  class='nav-link' data-active='true'>Your Events</a>
    	      			  <a id='OurContributors'  class='nav-link' data-active='false'>Our Contributors</a>";
		}
    	$resultat .= "<a  id='Contact' class='nav-link' data-active='false'>Contact Us</a>"; 
    	echo $resultat;
    ?>
    <footer id="dashboardFooter">
        <p>ALL COPYRIGHTS RESERVED</p>  
    </footer>
    </div>