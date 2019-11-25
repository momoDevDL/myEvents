  
    <div class="info">
        <?php 
            echo "<p id='pseudo'> Bienvenue " . $_SESSION['id_user'] ."</p>";
        ?>
        <img id="profilePic"  src="../IMAGES/man-holing-microphone-in-front-of-crowd-2183361.jpg">
        <a id="logOut" data-active="false" class='nav-link' href="logout.php">LOG OUT</a>
    </div>

    <div id="onglets">
    <a id="AllEvents" data-active="false" class='nav-link' href="AllEvents.php">All Events</a>
    <a id="YourEvents"  class='nav-link' data-active="true" href="YourEvents.php">Your Events</a>
    <a id="OurContributors"  class='nav-link' data-active="false" href="contributors.php">Our Contributors</a>
    <a  id="Contact" class='nav-link' data-active="false" href="contact.php">Contact Us</a>

    <footer id="dashboardFooter">
        <p>ALL COPYRIGHTS RESERVED</p>  
    </footer>
    </div>
