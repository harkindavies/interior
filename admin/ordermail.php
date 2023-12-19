<?php
	//importmPHPMailer classes Into the global newspace
	//These must be the top of your script, not inside a function
	//use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\SMTP;
	//use PHPMailer\PHPMailer\Execption;

	//load composer's autoload
	//require 'vendor/autoload.php';
	require 'PHPMailer/PHPMailerAutoload.php';

	//Instantiation oand passing 'true' enables exceptions
	$mail = new PHPMailer(true);

	try{
		//server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->isSMTP();
		$mail->Host		='smtp.gmail.com';
		$mail->SMTPAuth	=true;
		$mail->Username ='DEasyMove@gmail.com';
		$mail->Password ='asdf1234567890qwerty';
		$mail->SMTPSecure='tls';
		$mail->Port=587;
		$mail->SetFrom('Akindavis_interior_decoration','CEO & Founder');
		$mail->addAddress('harkinpardeydavid@gmail.com');
		$mail->addReplyTo('DEasyMove@gmail.com','info');
		$mail->isHTML(true);
		$mail->Subject ='Reply to your Order';
		$mail->Body='<h3>This is to inform you that your order has been</h3><strong> successfully processed</strong>';

		if($mail->send())
		{
			echo'Mail sent';
		}
		else{
			echo'Mail not send';
		}
	}
?>