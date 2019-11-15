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
            <div class="map">
                <h1 align=center>map</h1>
            </div>
            <div class="events">
               
            </div>
    </section>

     <?php
        require_once('footer.php');
    ?>


<script src="app.js" type="text/javascript"></script>


</body>

</html>


