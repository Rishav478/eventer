<?php
include('includes/header.php');
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
							<div class="col-md-12 col-xs-6">
								<h3>Register Now</h3>
								<div class="product" style="padding: 20px;">
									<form method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<label>Name</label>
											<input class="input" type="name" name="name" placeholder="Name" required>
										</div>
										<div class="form-group">
											<label>Organization Name</label>
											<input class="input" type="name" name="orgName" placeholder="Organization Name" required>
										</div>
										<div class="form-group">
											<label>Email</label>
											<input class="input" type="email" name="email" placeholder="Email" required>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input class="input" type="password" name="password" placeholder="Password" required>
										</div>
										<div class="form-group">
											<label>Mobile Number</label>
											<input class="input" type="mobile" name="mobile" placeholder="Mobile Number" required>
										</div>
										<div class="form-group">
											<label>Organization Profile Picture</label>
											<input class="input" type="file" name="profile" placeholder="Organization Profile Picture" required>
										</div>
										<div class="form-group">
											<label>Refferal Code ( Optional )</label>
											<input class="input" type="mobile" name="mobile" placeholder="Refferal Code ( Optional )">
										</div>
										<div class="form-group">
											<input class="input btn" style="background-color: #D10024; color: white;" type="submit" name="orgRegister" value="Register" required>
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

if (isset($_POST['orgRegister'])) {
	$name = $_POST['name'];
	$orgName = $_POST['orgName'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$mobile = $_POST['mobile'];
	$profile = $_FILES['profile']['name'];

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
					$sql = "INSERT into seller (name, orgName, email, password, mobile, profile) values ('$name', '$orgName', '$email', '$password', '$mobile', '$fileNameNew')";
					$result = mysqli_query($con,$sql);

					if ($result) {
						echo "<script>alert('Account Created Successfully.'); window.location.href='organizer-registrations.php';</script>";
					} else {
						echo "<script>alert('Something Went Wrong.'); window.location.href='organizer-registrations.php';</script>";
					}
				} else {
					echo "<script>alert('File size must be under 5 MB.'); window.location.href='organizer-registrations.php';</script>";
				}
			} else {
				echo "<script>alert('Error. Something went wrong.'); window.location.href='organizer-registrations.php';</script>";
			}
		} else {
			echo "<script>alert('You can only upload PNG, JPG or JPEG files.'); window.location.href='organizer-registrations.php';</script>";
			//echo mysqli_errno($con);
		}

	}

}

?>

<?php
include('includes/footer.php');
?>