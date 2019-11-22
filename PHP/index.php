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
    
        <div id="search_bar">
            <form method = "post" id="searchForm">
            <input id = "search_content" type="text" name="search_content" placeholder="Rechercher par : date - lieu - theme">
            <input id = "search-btn" type="submit" name="search-btn" class="btn btn-danger" value="Rechercher">
            </form>
        </div>

        <div id="MyRows">
                <?php 
                if(!isset($_POST['search-btn'])){
                        require_once('fetch_Evenements_Acceuil.php');
                }
                ?>
                       
        </div>
       
          <div class="showMore">
            <button id="showMore" class="btn btn-info">Show More</button>
          </div>
    </section>

    <section id="Map">
    <img id="markerProto" class="marker" src="../IMAGES/marker.png" width="50" height="50" />
            <div class="map" id="map">
            </div>
            <div id="events">
            <div id="accordion">
            <?php require_once("fetch_events_accordion.php");?>
            </div>
            </div>
    </section>

     <?php
        require_once('footer.php');
    ?>

<script src="../JSON/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../JSON/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="https://kit.fontawesome.com/08c54fbaa8.js" crossorigin="anonymous"></script>
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v6.0.1/build/ol.js"></script>
<script src="../JS/app.js" type="text/javascript"></script>
</body>

</html>


