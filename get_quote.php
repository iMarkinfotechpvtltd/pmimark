<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
require_once('class.phpmailer.php');
global $wpdb;


	if ( function_exists( 'ot_get_option' ) ) {
	   $to = ot_get_option( 'admin_email' );
	} 
if ($_POST['formType']=='quote')
{
	if (isset($_POST['name'])) {
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$message = strip_tags($_POST['message']);

	//generate email and send!
	//$to = 'pushpa@imarkinfotech.com';
	$email_subject = "Get a Quote form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n ".
	"Email: $email\n Message \n $message";
	$headers = "From: $to\n";
	$headers .= "Reply-To: $email";
	if(mail($to,$email_subject,$email_body,$headers))
	{
		echo "<span class=\"alert alert-success\" >Your message has been received. Thanks. </span><br><br>";
		
	} 

	}
}
if ($_POST['formType']=='pdf')
{
	$name = strip_tags($_POST['username']);
	$email = strip_tags($_POST['uemail']);
	$mail  = new PHPMailer(); // defaults to using php "mail()"
	$number = strip_tags($_POST['unumber']);
	$email_subject = "New request for 10 things you need to know to age wine correctly";
	$email_body = "You have received a new message. ".
	"Here are the details:\n Name: $name \n ".
	"Email: $email\n Number: \n $number";
	$headers = "From: $to\n";
	$headers .= "Reply-To: $email";
	if(mail($to,$email_subject,$email_body,$headers))
	{
		echo "<span class=\"thankyou-msg alert alert-success\" >Your message has been received.Thanks. </span><br><br>";
		
	} 
	

} 	
?>