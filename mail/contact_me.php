<?php

require("sendgrid-php.php");
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	//return false;
   }
	
$sendgrid = new SendGrid('azure_4410e570cbd4ca0c77e546e02527857c@azure.com', 'ITKwgo7Vcjv400B');

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to = 'stacey.mulcahy@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "YOUNG GAME MAKERS:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";


$email = new SendGrid\Email();

$email->addTo($to)->
      
       setFrom('stacey.mulcahy@gmail.com')->
       setSubject('[Young Makers Inquiry]')->
       setText('stuff things');
       
$response = $sendgrid->send($email);
var_dump($response);
?>