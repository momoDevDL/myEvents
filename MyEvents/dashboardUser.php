<?php
	session_start();

    if(!(isset($_SESSION['id_user']))){
        header("location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');
?>

<body> 
<div id="User-dash">
  <div id="User-header">
<?php
        require_once('UserNav.php');
      ?>
  </div>

      <section id="Users-Content">
      <div id='eventInfo'style="display:none;">
                <div id="eventInfoContent">
                <div id="popUpClose">+</div>
                <div id="circle">  </div>
                </div>
       </div>
      <div id="search_bar">
            <form method = "post" id="searchForm">
            <input id = "search_content" type="text" name="search_content" placeholder="Rechercher par : titre-evenement">
            <input id = "search-btn" type="submit" name="search-btn" class="btn btn-info" value="Rechercher">
            </form>
      </div>
      <div id="MyRows">
      <?php
        if (isset($_SESSION['id_role'])){
      		if($_SESSION['id_role']=="ADMIN"){
      			require_once('fetch_contributors_add_request.php');
      		}else{
      			require_once('fetch_events_user.php');
      		}
      	}
      ?>
      </div>
      
      </section>
</div>

<script src="../JSON/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../JS/dashboard.js"></script>

</body>