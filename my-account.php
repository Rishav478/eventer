<?php
include('includes/header.php');
?>

<?php

if (isset($_SESSION['uId'])) {
	include('includes/profile.php');
} else {
	include('includes/login-register.php');
}

?>

<?php
include('includes/footer.php');
?>