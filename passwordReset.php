<?php
include('includes/header.php');
use PHPMailer\PHPMailer\PHPMailer;
// Ignore from here
                    
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";
$mail = new PHPMailer();
                    
// To Here
?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- STORE -->
					<div id="store" class="col-md-12">

						<!-- store products -->
						<div class="row">
						<center>
							<!-- product -->
							<div class="col-md-6 col-xs-6">
								<h3>Reset Password</h3>
								<div class="product" style="padding: 20px;">
									<form method="POST">
										<div class="form-group">
											<label>Email</label>
											<input class="input" type="email" name="email" placeholder="Email" required>
										</div>
										<div class="form-group">
											<input class="input btn" style="background-color: #D10024; color: white;" type="submit" name="reset" value="Reset" required>
										</div>										
									</form>
								</div>
							</div>
							<!-- /product -->

                        </center>
							<div class="clearfix visible-sm visible-xs"></div>
						
						</div>
						<!-- /store products -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


<?php

if (isset($_POST['reset'])) {
	$email = $_POST['email'];

	$check = "SELECT * from user where email = '$email' limit 1";
	$res = mysqli_query($con,$check);
	if (mysqli_num_rows($res) ==1) {
	    
	    $otp = mt_rand(000000,999999);
        $a = hash('whirlpool', $otp);
        $url = "Your reset password link is generated. Please click on the link below to verify your account.<br><a href='https://goeventer.in/reset-auth.php?access-token=".$a."&email=".$email."'>Verify Account</a>";
        
        $update = "UPDATE user set token = '$a' where email = '$email'";
        $rep = mysqli_query($con,$update);
        
        if($rep){
        
            $name = "EVENTER";  // Name of your website or yours
            $to = $email;  // mail of reciever
            $subject = "Reset Password Link - Eventer";
            $body = $url;
            $from = "support@goeventer.in";  // you mail
            $password = "#123Mummy";  // your mail password
                        
    
                        
            //SMTP Settings
            $mail->isSMTP();
            //$mail->SMTPDebug = 3;  //Keep It commented this is used for debugging                          
            $mail->Host = "smtp.hostinger.com"; // smtp address of your email
            $mail->SMTPAuth = true;
            $mail->Username = $from;
            $mail->Password = $password;
            $mail->Port = 465;  // port
            $mail->SMTPSecure = "ssl";  // tls or ssl
            $mail->smtpConnect([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                ]
            ]);
                        
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($from, $name);
            $mail->addAddress($to); // enter email address whom you want to send
            $mail->Subject = ("$subject");
            $mail->Body = $body;
            if ($mail->send()) {
                echo "<script>alert('Reset link sent successfully to your registered email address.'); window.location.href='my-account.php';</script>";
            } else {
                echo "<script>alert('Reset link sent failed. Try again later.'); window.location.href='passwordReset.php';</script>";
            }
        } else {
            echo "<script>alert('Something Went Wrong.'); window.location.href='passwordReset.php';</script>";
        }
		
	} else {
		echo "<script>alert('Invalid Email Address.'); window.location.href='passwordReset.php';</script>";
	}

}



?>

<?php
include('includes/footer.php');
?>