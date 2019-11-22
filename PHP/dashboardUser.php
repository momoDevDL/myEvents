<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once('head.php');
?>

<body> 
<div id="User-header">
<?php
        require_once('UserNav.php');
      ?>
</div>
<section id="Users-Content">
      <?php
        require_once('fetch_events_user.php');
      ?>
</section>
<script src="../JSON/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="../JS/dashboard.js"></script>

</body>