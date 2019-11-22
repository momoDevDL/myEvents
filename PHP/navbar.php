<nav class="navbar  navbar-expand-md fixed-top navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">MyEvents</a>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                                <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="#">Contact Us</a>   
                                </li>
                        </ul>
                       <?php
    		        if (isset($_SESSION['id_user'])){
    			        echo '<p id="welcome_text">Bienvenue '.$_SESSION['id_user'].'</p>';
    		        }
    	                ?>
                </div>
                
</nav>