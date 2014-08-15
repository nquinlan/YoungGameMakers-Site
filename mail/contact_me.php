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
	

$email = new SendGrid\Email();
$email->to('stacey.mulcahy@gmail.com')->
$email->addTo('stacey.mulcahy@gmail.com')->
         setFrom('stacey.mulcahy@gmail.com')->
       setSubject('[Young Makers Inquiry]')->
       setText('stuff things');
var_dump($email);

$response = $sendgrid->send($email);
var_dump($response);
print ("stacey this has been updated");
?>