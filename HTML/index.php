<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/main.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>MyEvents</title>
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
   <div id="main-header">
   
        <header>
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">MyEvents</a>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                                <li class="nav-item active">
                                        <a class="nav-link" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="#">Contact Us</a>   
                                </li>
                        </ul>
                        <div id="logButtons">
                                <button type="button" class="btn btn-primary">LOG IN</button>
                                <button type="button" class="btn btn-secondary">SIGN UP</button>
                        </div>
                </div>
                
              </nav>
              <!--img src="../IMAGES/bg-main.jpg"-->
              <div id=main-title>
                    <h1>MY EVENTS</h1>
                    <p>We are not the only ones. But We are the best</p>
              </div>
            
        </header>
    </div>

    <section id="main-content">
	
    </section>

    <section id="Map">
	
    </section>

    <footer>
	<?php
	echo "eoeoeoeoeo";
		if (isset($_SESSION)){
		$test = $_SESSION['id_user'];
		echo "ouais nickel </br>";
		echo $test;
		}
	?>
    </footer>
</body>
</html>