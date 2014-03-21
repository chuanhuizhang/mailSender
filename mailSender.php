<?php
	function mailSender($toAddr){
	//PART 1 ///////// Include the file needed to create object  and create object ////////////////////////////
		require_once("class.phpmailer.php");
    	include("class.smtp.php"); 
		$mail = new PHPMailer;	// Create an object with the Class supplied by phpmailer
	//PART 2 ///////// Configuration of PHPMailer object///////////////////////////////////////////////////////
		$mail->CharSet = "UTF-8";			// Set encoding 
		$mail->IsSMTP();                    // Set mailer to use SMTP
		//$mail->SMTPDebug  = 2;           	// Enable SMTP debug, it will print information
											//	 of smtp on your page										 
                                            // 1 = errors and messages
                                            // 2 = messages only
		$mail->Host = 'smtp.googlemail.com';    		  // Specify main and backup server
		$mail->Port = 465;                   		      // SMTP Server port
		$mail->SMTPAuth = true;                           // Enable SMTP authentication
		$mail->Username = 'zhangcreativeworx@gmail.com';  // SMTP username
		$mail->Password = 'creativeworx';                 // SMTP password
		$mail->SMTPSecure = 'ssl';                        // Enable encryption
		$mail->From = 'zhangcreativeworx@gmail.com';	  // sender Email address shown on receiver page
		$mail->FromName = 'Chuanhui Zhang';				  // Sender name shown on receiver page
		$mail->addAddress($toAddr); 
		//$mail->addAddress('zchning@gmail.com', 'Chuanhui Zhang');  // Add a recipient
		//$mail->addAddress('princeny2014@gmail.com');               // Name is optional
		//Here you can also add more address, it will sent to them at the same time
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');
		$mail->Subject = 'HTML Form Test';    					// Subject of your Email message                       
		$mail->Body = 'Sent via HTML form using PHP to '. $toAddr;// The contents in you message
	//PART 3 ////////// Call send() function to send the mail /////////////////////////////////////////////////
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			exit;
		}
		echo 'Message has been sent';
	}

	if(!empty($_POST['sub'])){
		$toAddress = $_POST['emailAddress'];
		mailSender($toAddress);
	}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<script type="text/javascript">
	function checkForm(){
		var addr=document.forms["emailForm"]["emailAddress"].value;
		if(addr == null || addr == ""){
			alert("Please input an Email Address!");
			return false;
		}ß
		return true;		
	}
	function checkAddr(value) { 
		var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		if(!myreg.test(value)){
			document.getElementById("warning").innerHTML="<font color=‘blue’> *Invalidate Address!</font>";
		}else{
			document.getElementById("warning").innerHTML="<font color=‘green’> Validate Address</font>";
		}	
	} 
</script>
</head>
</html>

<form action="" name="emailForm" onsubmit="return checkForm()" method="post">
Email Address: 
<input type="text" id="emailAddress" name="emailAddress" onblur="checkAddr(this.value);"/>
<a id="warning" type="hidden"></a><br>
<input type="submit" name="sub" value="Send Message" />
