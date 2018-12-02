<?php
if(isset($_POST['option']))
{
	if($_POST['option']=='link')
	{   $user_name = 'root';
		$password = '1234567';
		$db_name = 'aft';
		$con = new mysqli_connect('localhost',$user_name,$password,$db_name);
		if (! get_magic_quotes_gpc()){
			$email = addslashes($_POST['email']);
		}
		else{
			$email = $_POST['email'];
		}
		$sql = "SELECT id FROM user_info where EMAIL = '$email' ";
		$result = $con->query($sql,$con);

		if($result!=0)
		{
			require '/usr/share/php/phpmailer/PHPMailerAutoload.php';


			require '/usr/share/php/phpmailer/vendor/autoload.php';

			$mail = new PHPMailerOAuth;
			$mail->isSMTP();  
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';                                      
			$mail->Host = 'smtp.gmail.com';  
			$mail->SMTPAuth = true;                               
			$mail->SMTPSecure = 'tls';                            
			$mail->Port = 587;                                 
			$mail->AuthType = 'XOAUTH2';

			//User Email to use for SMTP authentication - user who gave consent to our app
			$mail->oauthUserEmail = "pandey.aditya579@gmail.com";

			//Obtained From Google Developer Console
			$mail->oauthClientId = "202861375415-g9j6d4qg94cn8fq3l49nqiah43mtm062.apps.googleusercontent.com";

			//Obtained From Google Developer Console
			$mail->oauthClientSecret = "FYJVAm5feR26C2kYvF7-mvK4";

			//Obtained By running get_oauth_token.php after setting up APP in Google Developer Console.
			//Set Redirect URI in Developer Console as [https/http]://<yourdomain>/<folder>/get_oauth_token.php
			// eg: http://localhost/phpmail/get_oauth_token.php
			$mail->oauthRefreshToken = "1/ALnpwO5D6oPe5pYTnSr2Tf2HbLHwTfw1R0jFNWzFrFs";
					                             // TCP port to connect to

			$mail->setFrom('pandey.aditya579', 'Mailer');
			$mail->addAddress($_POST['email'], $_POST['name']);     // Add a recipient
			

			$mail->Subject = 'PASSWORD RESET OTP';
			$mail->Body    = 'The password reset otp for your account with email id '. $_POST['email']. rand(time()).'\r\n';
			$mail->Body    .= 'Your otp is valid for only 2 hours';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Link has been sent';
			}
				
		}
		else 
		{
			echo '<script language="javascript">';
			echo 'alert("INVALID EMAIL")';
			echo '</script>';
		}
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
	  function check(){
	  if(document.getElementById("question").checked==true){
	  		var div = document.getElementById('fpassword');
	  		var content = 
	  }
}
</script>
	<title>FORGOT PASSWORD</title>
</head>
<body>
<div class="fpassword" id=fpassword>
	<form method="post" action="<?php $_PHP_SELF ?>">
	USER NAME <input type="text" name="name">
	EMAIL <input type="text" name="email" placeholder="email">
	<input type="radio" name="option" value="link"> GET A RESET LINK
	<input type="radio" name="option" value ="question"> GET OTP
	<input type="submit" name="submit" value="SUMBIT">
	</form>
</div>
</body>
</html>