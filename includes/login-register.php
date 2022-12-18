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
								<h3>Login Now</h3>
								<div class="product" style="padding: 20px;">
									<form method="POST">
										<div class="form-group">
											<label>Email</label>
											<input class="input" type="email" name="email" placeholder="Email" required>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input class="input" type="password" name="password" placeholder="Password" required>
											<a href="passwordReset.php" style="float: right">Forgot Password</a><br>
										</div><br>
										<div class="form-group">
											<input class="input btn" style="background-color: #D10024; color: white;" type="submit" name="login" value="Login" required>
										</div>										
									</form>
								</div>
							</div>
							<!-- /product -->


							<div class="clearfix visible-sm visible-xs"></div>

							<!-- product -->
							<div class="col-md-6 col-xs-6">
								<h3>Register Now</h3>
								<div class="product" style="padding: 20px;">
									<form method="POST">
										<div class="form-group">
											<label>Name</label>
											<input class="input" type="name" name="name" placeholder="Name" required>
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
											<label>Date of Birth</label>
											<input class="input" type="date" name="dob" placeholder="Date of Birth" required>
										</div>
										<div class="form-group">
											<label>Gender</label>
											<select name="gender" class="form-control" required>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Other">Other</option>
											</select>
										</div>
										<div class="form-group">
											<input class="input btn" style="background-color: #D10024; color: white;" type="submit" name="register" value="Register" required>
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

if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];

	$check = "SELECT * from user where email = '$email' limit 1";
	$res = mysqli_query($con,$check);
	if (mysqli_num_rows($res) ==1) {
		echo "<script>alert('Account Already Created.'); window.location.href='my-account.php';</script>";
	} else {
		$sql = "INSERT into user (name, email, mobile, dob, gender, password) values ('$name', '$email', '$mobile', '$dob', '$gender', '$password')";
		$result = mysqli_query($con,$sql);

		if ($result) {
			echo "<script>alert('Account Created Successfully.'); window.location.href='my-account.php';</script>";
		} else {
			echo "<script>alert('Something Went Wrong.'); window.location.href='my-account.php';</script>";
		}
	}

}

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT * from user where email = '$email' and password = '$password' limit 1";
	$result = mysqli_query($con,$sql);
	if (mysqli_num_rows($result) ==1) {
		$row = mysqli_fetch_array($result);
		$_SESSION['uId'] = $row['id'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['email'] = $row['email'];
		echo "<script>window.location.href='events.php';</script>";
	} else {
		echo "<script>alert('Something Went Wrong.'); window.location.href='my-account.php';</script>";
	}
}

?>