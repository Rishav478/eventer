<?php

$error = '';
$success = '';
$alert = '';
$error_times = '';
$success_alert = '';
$success_times = '';
$token = '';
date_default_timezone_set('Asia/kolkata');


function auth_token(){
	$token = bin2hex(random_bytes(32));
	$_SESSION['token'] = $token;
	return $token;
}

//--------Login Asset----------------//

if (isset($_POST['btn-login'])) {

	$Ltoken = $_POST['Ltoken'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	if (empty($Ltoken)) {
		$error = "Security token is not valid. Please refresh the page and try again.";
		$alert = "alert alert-danger alert-dismissible show fade";
		$error_times = "&times;";
	} elseif (empty($email)) {
		$error = "Email cannot be empty";
		$alert = "alert alert-danger alert-dismissible show fade";
		$error_times = "&times;";
	} elseif (empty($password)) {
		$error = "Password cannot be empty";
		$alert = "alert alert-danger alert-dismissible show fade";
		$error_times = "&times;";
	} elseif ($Ltoken != $_SESSION['token']) {
		$error = "Security token is not valid. Please refresh the page and try again.";
		$alert = "alert alert-danger alert-dismissible show fade";
		$error_times = "&times;";
	} else {
		$sql = "SELECT * from admin where email = '$email' and password = '$password' limit 1";
		$result = mysqli_query($con,$sql);
		$count = mysqli_num_rows($result);
		if ($count == 1) {
			$success = "Success";
			$success_alert= "alert alert-success alert-dismissible show fade";
			$success_times = "&times;";

			$rows = mysqli_fetch_array($result);
			$aId = $rows['aId'];
			$name = $rows['name'];
			$date = date('d-M-Y H:i:s');
			$_SESSION['aid'] = $aId;
			$_SESSION['aname'] = $name;
			$_SESSION['LAST_LOGIN'] = $date;
			$_SESSION['LAST_ACTIVE_LOGIN'] = time();
			
		} else {
			$error = "Failed";
			$alert = "alert alert-danger alert-dismissible show fade";
			$error_times = "&times;";
		}

	}

}


//---------------------------Event Publish------------------------//




?>