<?php
	function debug($erreur){
		echo "<pre>".print_r($erreur, true).'</pre>';
	}

	function str_random($length){

		$alphabet ='azertyuiopqsdfghjklmwxcvbn0123456789AZERTYUIOPQSDFGHJKLMWXCVBN';
		return substr(str_shuffle(str_repeat($alphabet, $length)),0, $length);
	}

	function my_mail($user_mail, $pseudo,$message_sujet, $message_html){
		require 'PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'testmailcours@gmail.com';                 // SMTP username
		$mail->Password = 'Testmailcours2';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to
		$mail->setLanguage('fr', '/optional/path/to/language/directory/');

		$mail->setFrom('testmailcours@gmail.com', 'Zone Membre');
		$mail->addAddress($user_mail, $pseudo);     
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $message_sujet;
		$mail->Body    = $message_html;
		$mail->AltBody = $message_html;

		if(!$mail->send()) {
		    echo 'Message non envoyer.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
	}

	function user_only(){
		if(session_status() == PHP_SESSION_NONE){
		session_start();
		}
		if(!isset($_SESSION["auth"])){
		header('location: index.php');
		exit();
	}
	}

		function admin_only(){
		if(session_status() == PHP_SESSION_NONE){
		session_start();
		}
		
		if(!isset($_SESSION["auth"]) && $_SESSION['auth']->membre_rang < 4){
			header('location: http://localhost/Projet/index.php');
			exit();
	}
	}