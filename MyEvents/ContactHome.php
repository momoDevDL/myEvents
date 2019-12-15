<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/main.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script-->
    <title>MyEvents</title>
    <link rel="stylesheet" href="../JSON/jquery-ui-1.12.1/jquery-ui.css"></link>    
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v6.0.1/css/ol.css"/>
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
</head>

<?php
     
echo"<nav class='navbar  navbar-expand-md fixed-top navbar-dark bg-dark'>
                <a class='navbar-brand' href='../index.php'>MyEvents</a>
            
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <ul class='navbar-nav'>
                                <li class='nav-item'>
                                        <a class='nav-link' id='HomeLink' href='../index.php' >Home</a>
                                </li>
                                <li class='nav-item active'>
                                        <a class='nav-link' id='ContactLink' href='ContactHome.php'>Contact Us</a>   
                                </li>
                        </ul>
                </div>
                
</nav>";

?>

<div id="contact-container">
    <div id="contact-form">
        <h2>Contact Us</h2>
        <form method="post" > 

        <div id="contact-left-inputs">
        <label for="first-name"> First-Name :  </label>
            <input type="text" name="first-name" placeholder="First-Name">
        
        </div>
        
        <div id="contact-right-inputs">
        <label for="last-name"> Last-Name :  </label>
            <input type="text" name="last-name" placeholder="Last-Name">
        </div>

        <label for="email"> Email :  </label>
            <input type="text" name="email" placeholder="exemple@exemple.com"></br>
    
        <label class="emailContent" for="emailContent"> Email Content :  </label></br>
            <textarea class="emailContent" name="emailContent" placeholder="text"></textarea></br>
        <input id='submitContactForm' type='submit' name='submit' class='btn btn-info' value="Submit">
        
        </form>
    </div>

</div>