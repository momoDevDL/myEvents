<?php
if(isset($POST['submit'])){
$name = $_POST['first-name'];
$email = $_POST['email'];
$message = $_POST['emailContent'];
$formcontent="From: $name \n Message: $message";
$recipient = "mohamedmasbahaboulaich@outlook.fr";
$subject = "Contact Form of MyEvents";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header("location:dashboardUser");
echo "<p> email sent </p>";

}
?>