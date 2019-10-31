<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');
?>
<body>
   <div id="main-header">
      <?php
        require_once('header.php');
      ?>
    </div>

    <section  class="main-content">
    	<?php
    		if (isset($_SESSION['id_user'])){
    			echo 'Vous êtes bien connecté Mr/Mme '.$_SESSION['id_user'].'</br>';
    		}
    	?>
        <div id="MyRows">
                        <div class="row">
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/happy-friends-making-cheers-glasses-450w-604422179.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/hiker-winter-mountains-snowshoeing-450w-164485298.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/male-hiker-standing-on-rock-450w-1513227257.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/hiker-winter-mountains-snowshoeing-450w-164485298.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                         </div>  
                         
                         <div class="row">
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/happy-friends-making-cheers-glasses-450w-604422179.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/hiker-winter-mountains-snowshoeing-450w-164485298.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/male-hiker-standing-on-rock-450w-1513227257.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/hiker-winter-mountains-snowshoeing-450w-164485298.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                         </div>  

                         <div class="row">
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/happy-friends-making-cheers-glasses-450w-604422179.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/hiker-winter-mountains-snowshoeing-450w-164485298.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/male-hiker-standing-on-rock-450w-1513227257.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                                        <div class="card" style="width: 18rem;">
                                                                        <img src="../IMAGES/hiker-winter-mountains-snowshoeing-450w-164485298.jpg" class="card-img-top" alt="event image">
                                                                                <div class="card-body">
                                                                                        <h5 class="card-title">Card title</h5>
                                                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                                                        <a href="#" class="btn btn-primary">S'inscrire</a>
                                                                                </div>
                                                        </div>
                                        </div>
                         </div>  
                         
        </div>
       
        
    </section>

    <section id="Map">

    </section>

        <?php
        require_once('footer.php');
        ?>
</body>
</html>


