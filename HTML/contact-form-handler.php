<?php 

$errors = '';
$myemail = 'anfal.faisal@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['BNID']) || 
   empty($_POST['Message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$BNID = $_POST['BNID']; 
$message = $_POST['Message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$BNID))
{
    $errors .= "\n Error: Invalid BRONCO ID, Your BRONCO ID should consist of 3 letters";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "ERROR 404 TICKET HAS BEEN CREATED: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $BNID \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $BNID";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: success.html');
	
} 
include 'form_submit.php';
?>
