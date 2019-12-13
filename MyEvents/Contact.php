<div id="contact-container">
    <div id="contact-form">
        <h2>Contact Us</h2>
        <form action='sendMail.php' method="post" > 

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