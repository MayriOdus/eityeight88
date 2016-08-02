<?php

### INCLUDE PHPMAILER  ###

include ("class.phpmailer.php");

class mail extends PHPMailer

{

	var $email;

		

	function mail(){

		$this->email			= new PHPMailer();

		$this->sender_name		= "EityEight.com"; //

		$this->sender_email		= "alert@eityeight.com"; //

		$this->sender_pass		= "Ycg137g?";
		///admintodo@todothailand.com todo@1234@56 todo
		//allcarread@carread.com car@0151@read

		$this->sender_email_1	= md5("alert@eityeight.com");

		$this->seneder_host		= "mail.eityeight.com";  // "ssl://mail.avisthailand.com,mail.avisthailand.com";

		$this->seneder_port		= 25;  //change 465 -> 25

	}

	

	### FUNCTION SEND MAIL ####

	function send() {

		

		$this->email->From     = $this->sender_email;

		$this->email->FromName = $this->sender_name;

		

		$this->email->AddAddress($this->to_email,$this->to_name);

		$this->email->AddReplyTo($this->sender_email_1,"NoReply");

		$this->email->Subject	= $this->subject;

		$this->email->Body		= $this->body_html;

		$this->email->AltBody	= $this->body_text;

		$this->email->IsHTML (true);

		

		//$this->email->IsSMTP(); // before IsMail()

		$this->email->IsMail();

		//$mail->Host = 'ssl://smtp.gmail.com';

		$this->email->Host = $this->seneder_host;

		$this->email->Port = $this->seneder_port;

		$this->email->SMTPAuth		= true;

		//$mail->SMTPDebug	= true;

		$this->email->Username = $this->sender_email;

		$this->email->Password = $this->sender_pass;

		

		$result = $this->email->Send();

		$this->email->ClearAddresses();

		return $result;

	}



}





?>