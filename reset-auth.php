<?php
include('includes/header.php');
use PHPMailer\PHPMailer\PHPMailer;
// Ignore from here
                    
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";
$mail = new PHPMailer();

if(isset($_GET['access-token'])){
    if(!empty($_GET['access-token'])){
        $token = $_GET['access-token'];
    } else {
        echo "<script>window.location.href='passwordReset.php';</script>";
    }
}

if(isset($_GET['email'])){
    if(!empty($_GET['email'])){
        $email = $_GET['email'];
    } else {
        echo "<script>window.location.href='passwordReset.php';</script>";
    }
}

$check = "SELECT * from user where token = '$token' and email = '$email'";
$res = mysqli_query($con,$check);
$count = mysqli_num_rows($res);
if($count == 1){
                    
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
							<!-- product -->
							<div class="col-md-6 col-xs-6">
								<h3>Reset Password</h3>
								<div class="product" style="padding: 20px;">
									<form method="POST">
										<div class="form-group">
											<label>Email</label>
											<input class="input" type="email" name="email" value="<?= $email ?>" style="background-color: gray;color:white" required readonly>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input class="input" type="password" name="password" placeholder="Enter New Password" required>
										</div>
										<div class="form-group">
											<label>Confirm Password</label>
											<input class="input" type="password" name="cpassword" placeholder="Enter Confirm Password" required>
										</div>
										<div class="form-group">
											<input class="input btn" style="background-color: #D10024; color: white;" type="submit" name="reset" value="Reset" required>
										</div>										
									</form>
								</div>
							</div>
							<!-- /product -->

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
} else {
    //echo mysqli_error($con);
    echo "<script>alert('Invalid token authorization. Try again later'); window.location.href='passwordReset.php';</script>";
}
if (isset($_POST['reset'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    
    if($password == $cpassword){
        
        $update = "UPDATE user set token = '', password = '$password' where email = '$email'";
        $rep = mysqli_query($con,$update);
            
        if($rep){
           echo "<script>alert('Passwored changed successfully.'); window.location.href='my-account.php';</script>";
    	} else {
    		echo "<script>alert('Password and confirm password must be same.');</script>";
    	}
        
    }

}



?>

<?php
include('includes/footer.php');
?>