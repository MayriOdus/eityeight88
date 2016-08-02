<?php

include('conn.php');
	 
require("../phpmailer/class.sendmail.php");

$mail = new mail();
	   
$to_name = "administrator";
$to_email = "oom34299@hotmail.com"; //$email;//"fon_0151@hotmail.com"; //
$sender_name = "dev@eityeight.com";
$sender_email = "dev@eityeight.com"; 
$sender_pass = "Tv13z$a7";

  // dev@eityeight.com
	   	// Tv13z$a7


$body_html = "";
$body_html .= "TEST";
$subject = "Contact Us Alert";

$mail->to_name = $to_name;
$mail->to_email = $to_email;
$mail->subject = $subject;
$mail->body_html = $body_html; 

$mail->sender_email = $sender_email; //
$mail->sender_pass = $sender_pass;


$mail->body_text  = "";

//echo $body_html;

$mail->send();

echo "SENT";
echo "<br>";
echo "USERNAME : " . $sender_name;
echo "<br>";
echo $to_email;
echo "<br>";




?>