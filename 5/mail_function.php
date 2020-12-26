<?php	

	if(isset($_POST['name']) && isset($_POST['email'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contacts=$_POST['contacts'];
	$product=$_POST['product'];
	$message=$_POST['message'];

	require_once('class.phpmailer.php');
	require_once('class.smtp.php');
	require_once('PHPMailerAutoload.php');
	
	$message_body = " Name : $name<br>Email : $email<br>Contact No. : $contacts<br>Product ID : $product<br>Message : $message ";
	$mail = new PHPMailer(true);
	
	$mail->isSMTP();
	
	$mail->SMTPDebug = 0;
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;

	$adminEmail = 'sakshikrishi4@gmail.com';
	$adminPaswd = '1to8CHE!';

	// Gmail ID which you want to use as SMTP server
	$mail->Username = $adminEmail; //enter your mail address here
	// Gmail Password
	$mail->Password = $adminPaswd; //enter your mail address password
	$mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Port = 587;

	$mail->setFrom($adminEmail, 'Sakshi Krishi');
	$mail->isHTML(true);

	$senddemail='sanghavishrey589@gmail.com';  //Change emailID here 
	$mail->addAddress($senddemail);
	$mail->Subject = "Inquiry on website";
	$mail->Body = $message_body;

	if($mail->Send()){
		$status="success";
		$response="Email is sent";
	}
	else{
		$status="failed";
		$response="Something wrong happened <br>".$mail->ErrorInfo;
	}
	 //echo $result;

	exit(json_encode(array("status"=>$status,"response"=>$response)));
}




	// function sendOTP($email,$otp) {
	// 	require('PHPmailer.php');
	// 	require('SMTP.php');
		
	// 	$message_body = "One Time Password for login authentication is:<br/><br/>" . $otp;
	// 	$mail = new PHPMailer();
		
	// 	$mail->IsSMTP();




	// 	$mail->SMTPDebug = 0;
	// 	$mail->SMTPAuth = TRUE;
	// 	$mail->SMTPSecure = 'tls'; // tls or ssl
	// 	$mail->Port     = "587";
	// 	$mail->Username = "shreedharmb22@gmail.com";
	// 	$mail->Password = "22062000shree!";
	// 	$mail->Host     = "smtp.gmail.com";
	// 	$mail->Mailer   = "smtp.gmail.com.";
	// 	$mail->SetFrom("shreedharmb22@gmail.com");
	// 	$mail->AddAddress($email);
	// 	$mail->Subject = "OTP to Login";
	// 	$mail->MsgHTML($message_body);
	// 	$mail->IsHTML(true);		
	// 	// $result = $mail->Send();
	// 	// echo $result;
	// 	// echo "hel";
	// 	//
		
	// 	if($mail->send())
	// 	{
	// 		echo "hel";
	// 		$result=1;
	// 	}
	// 	else{
	// 		echo "hellll";
	// 	}
	// }
	// return $result;
?>