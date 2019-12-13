
<header>
<?php
require_once('navbar');
?>
              <div id="main-title">
                    <h1>FULLY ENJOY</h1>
                    <p>Because ensuring your happiness, is our main goal.</p>
                    <div id="logButtons">
                        		<?php 
                        			if (isset($_SESSION['id_user'])){
    									echo "<button type='button' class='btn btn-primary'>LOG OUT</button>";
    								} else {
                                        echo "<button id='logIn' type='button' class='btn btn-primary'>LOG IN</button>";
                                        echo "<button id='signUp' type='button' class='btn btn-secondary'>SIGN UP</button>";
    								}
                        		?>
      <button id='checkEvents' type='button' class='btn btn-info'><a href="#search_bar">Check our events</a></button>
                  </div>
              </div>
</header>

