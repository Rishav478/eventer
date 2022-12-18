<?php

include('includes/database.php');

if (isset($_POST['submit'])) {
	$event_id = $_POST['event_id'];
	$paramLink = $_POST['paramLink'];
	$event_name = $_POST['event_name'];
	$sellerId = $_POST['sellerId'];
	$epAmount = $_POST['epAmount'];
	$epMode = $_POST['epMode'];

	$sql = "INSERT into eventpayouts (event_name, event_id, paramLink, sellerId, epAmount, epMode) values ('$event_name', '$event_id', '$paramLink', '$sellerId', '$epAmount', '$epMode')";
	$result = mysqli_query($con,$sql);

	if ($result) {
		echo "<script>alert('Payout creation Success.');window.location.href='view-event-details.php?name=".$paramLink.".php';</script>";
	} else {
		echo "<script>alert('Payout creation failed.');window.location.href='view-event-details.php?name=".$paramLink.".php';</script>";
	}
}


?>