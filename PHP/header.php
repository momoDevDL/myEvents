
<header>
            
            <nav class="navbar  navbar-expand-sm fixed-top navbar-dark bg-dark">
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
                        <div id="logButtons">
                        		<?php 
                        			if (isset($_SESSION['id_user'])){
    									echo "<button type='button' class='btn btn-primary'><a href='logout.php'>LOG OUT</a></button>";
    								} else {
                                        echo "<button type='button' class='btn btn-primary'><a href='login.php'>LOG IN</a></button>";
                                        echo "<button type='button' class='btn btn-secondary'><a href='signUp.php'>SIGN UP</a></button>";
    								}
                        		?>
                        </div>
                </div>
                
              </nav>
              <!--img src="../IMAGES/bg-main.jpg"-->
              <div id=main-title>
                    <h1>MY EVENTS</h1>
                    <p>We are not the only ones. But We are the best</p>
              </div>
            
</header>