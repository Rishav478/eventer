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

<style>
    .container .wrapper{
        position: relative;
        height: 300px;
        border-radius: 10px;
        background: #fff;
        border: 2px dashed #c2cdda;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 10px;
    }
    .wrapper #img{
        position: absolute;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .wrapper #img img{
        height: 100%;
        width: 100%;
    }
    .wrapper .icon{
        font-size: 100px;
        color: #9658fe;
    }
    .wrapper .text{
        font-size: 20px;
        font-weight: 500;
        color: #5B5B7B;
    }
    .wrapper #cancel-btn{
        position: absolute;;
        right: 15px;
        top: 15px;
        font-size: 20px;
        cursor: pointer;
        color: #9658fe;
        display: none;
    }
    
    .form .grid {
  margin-top:50px;
  display:flex;
  justify-content:space-around;
  flex-wrap:wrap;
  gap:20px;
}
.form .grid .form-element {
  width:200px;
  height:200px;
  box-shadow:0px 0px 20px 5px rgba(100,100,100,0.1);
}
.form .grid .form-element input {
  display:none;
}
.form .grid .form-element img {
  width:100%;
  height:100%;
  object-fit:cover;
}
.form .grid .form-element div {
  position:relative;
  height:40px;
  margin-top:-40px;
  background:rgba(0,0,0,0.5);
  text-align:center;
  line-height:40px;
  font-size:13px;
  color:#f5f5f5;
  font-weight:600;
}
.form .grid .form-element div span {
  font-size:40px;
}
</style>

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
							<div class="col-md-12 col-xs-6">
								<h3>Register Now</h3>
								<div class="product" style="padding: 20px;">
									<form method="POST" enctype="multipart/form-data">
										<div class="form-group col-md-12">
											<label>Name</label>
											<input class="input" type="name" name="name" placeholder="Name" required>
										</div>
										<div class="form-group col-md-12">
											<label>Organization Name</label>
											<input class="input" type="name" name="orgName" placeholder="Organization Name" required>
										</div>
										<div class="form-group col-md-12">
											<label>Email</label>
											<input class="input" type="email" name="email" placeholder="Email" >
										</div>
										<div class="form-group col-md-12">
											<label>Password</label>
											<input class="input" type="password" name="password" placeholder="Password" required>
										</div>
										<div class="form-group col-md-12">
											<label>Mobile Number</label>
											<input class="input" type="text" name="mobile" placeholder="Mobile Number" required>
										</div>
										<!--div class="form-group col-md-12">
											<label class="col-md-12">Organization Profile Picture</label>
											<div class="wrapper col-md-4">
    											<div id="img">
    											    <img id="imgDisplay">
    											</div>
    											<div class="content" id="hides">
    										        <div class="icon"><center><i class="fa fa-cloud-upload"></i></center></div>
    										        <div class="text">No file chossen, yet!</div>
    										    </div>
    										</div>
    										<div class="" id="file"><input class="input"  onchange="loadFile(event)" type="file" name="profile" placeholder="Organization Profile Picture" required></div>
										</div-->
										
										<div class="form">
                                    	  <h4>Organization Profile Picture</h4>
                                    	  	<div class="grid">
                                    	    	<div class="form-element">
                                    	      		<input type="file"  name="profile" id="file-1" accept="image/*">
                                    	      		<label for="file-1" id="file-1-preview">
                                    		        	<img src="https://bit.ly/3ubuq5o" alt="">
                                    		        	<div>
                                    		          		<span>+</span>
                                    		        	</div>
                                    	      		</label>
                                    	    	</div>
                                    	  	</div>
                                    	</div>
										
										<div class="form-group col-md-12">
											<label>Refferal Code ( Optional )</label>
											<input class="input" type="text" name="referral" placeholder="Refferal Code ( Optional )">
										</div>
										<div class="form-group">
											<input class="input btn" style="background: linear-gradient(156deg, rgba(209,0,36,1) 37%, rgba(0,49,255,1) 100%, rgba(2,0,36,1) 100%); color: white;" type="submit" name="orgRegister" value="Register" required>
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
        <script>
            /*var loadFile = function(event) {
            	var image = document.getElementById('imgDisplay');
            	image.src = URL.createObjectURL(event.target.files[0]);
            	document.getElementById('hides').style.display='none';
            };*/
            	function previewBeforeUpload(id){
  document.querySelector("#"+id).addEventListener("change",function(e){
    if(e.target.files.length == 0){
      return;
    }
    let file = e.target.files[0];
    let url = URL.createObjectURL(file);
    document.querySelector("#"+id+"-preview div").innerText = file.name;
    document.querySelector("#"+id+"-preview img").src = url;
  });
}

previewBeforeUpload("file-1");
        </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php

if (isset($_POST['orgRegister'])) {
	$name = $_POST['name'];
	$orgName = $_POST['orgName'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$mobile = $_POST['mobile'];
	$profile = $_FILES['profile']['name'];
	$referral = $_POST['referral'];
	$otp = mt_rand(000000,999999);
	$a = hash('whirlpool', $otp);
	$url = "Thank you for creating your account. Please click on the link below to verify your account.<br><a href='https://goeventer.in/seller/verifyAccount.php?access-token=".$a."'>Verify Account</a>";
	
	
	if(empty($referral)){
	    $$referral = "";
	}

	$check = "SELECT * from seller where email = '$email' limit 1";
	$res = mysqli_query($con,$check);
	if (mysqli_num_rows($res) ==1) {
		echo "<script>alert('Email Already Registered.'); window.location.href='organizer-registrations.php';</script>";
	} else {

		$fileName = $_FILES['profile']['name'];
	    $fileTmpName = $_FILES['profile']['tmp_name'];

	    $fileSize = $_FILES['profile']['size'];

	    $fileError = $_FILES['profile']['error'];
	    $fileType = $_FILES['profile']['type'];

	    $fileExt = explode('.', $fileName);
	    $fileActualExt = strtolower(end($fileExt));

	    $allowed = array('png', 'jpg', 'jpeg');

	    if (in_array($fileActualExt, $allowed)) {
	      	if ($fileError === 0) {
		        if ($fileSize < 5000000) {
		          	$fileNameNew = uniqid('', true).".".$fileActualExt;
		          	$fileDestination = 'seller/assets/uploads/org-image/'.$fileNameNew;
		          	move_uploaded_file($fileTmpName, $fileDestination);
					$sql = "INSERT into seller (name, orgName, email, password, mobile, profile, token) values ('$name', '$orgName', '$email', '$password', '$mobile', '$fileNameNew', '$a')";
					$result = mysqli_query($con,$sql);

					if ($result) {
                            $name = "EVENTER";  // Name of your website or yours
                            $to = $email;  // mail of reciever
                            $subject = "Verify Your Account - Eventer";
                            $body = $url;
                            $from = "support@goeventer.in";  // you mail
                            $password = "#123Mummy";  // your mail password
                    

                    
                            //SMTP Settings
                            $mail->isSMTP();
                            $mail->SMTPDebug = 3;  //Keep It commented this is used for debugging                          
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
                                echo "<script>alert('Account Created Successfully.'); window.location.href='organizer-registrations.php';</script>";
                            } else {
                                echo "<script>alert('Account Created Successfully. Your account will be verified shortly.'); window.location.href='organizer-registrations.php';</script>";
                            }
                            
						
					} else {
						echo "<script>alert('Something Went Wrong.'); window.location.href='organizer-registrations.php';</script>";
					}
				} else {
					echo "<script>alert('File size must be under 5 MB.');</script>";
				}
			} else {
				echo "<script>alert('Error. Something went wrong.');</script>";
			}
		} else {
			echo "<script>alert('You can only upload PNG, JPG or JPEG files.');</script>";
			//echo mysqli_errno($con);
		}

	}

}

?>

<?php
include('includes/footer.php');
?>