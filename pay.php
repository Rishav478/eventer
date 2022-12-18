<?php

include('includes/database.php');

use PHPMailer\PHPMailer\PHPMailer;
// Ignore from here
                    
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";
$mail = new PHPMailer();
                    
// To Here

$userId = $_SESSION['uId'];

if (isset($_POST['paid'])) {
	$orderId = $_POST['orderId'];
	$name = $_POST['customerName'];
	$email = $_POST['customerEmail'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$zip = $_POST['zip'];
	$mobile = $_POST['customerPhone'];
	$eventName = $_POST['eventName'];
	$paramLink = $_POST['paramLink'];
	$eventPrice = $_POST['orderAmount'];
	$event_id = $_POST['event_id'];
	$city = $_POST['city'];
	$sellerId = $_POST['sellerId'];
	$referral = $_POST['referral'];
	if($referral == ''){
	    $referral = $referral;
	}


	$sql="INSERT INTO  eventregistration(orderId,event_id,paramLink,event_price,event_name,userId,name,email,address,city,country,zip,mobile,amount,sellerId,referral) VALUES('$orderId','$event_id','$paramLink','$eventPrice','$eventName','$userId','$name','$email','$address','$city','$country','$zip','$mobile','$eventPrice','$sellerId','$referral')";
	if(mysqli_query($con,$sql))
	{
	  //echo "Success";
	}
	else {
	  echo "Error.<br><a href='events.php'>Go Home</a>";
	}
?>
	<!DOCTYPE html>
	<html>
		<head>
		  <title>Eventer - Online Event Management</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1">

		</head>
		<body onload="document.frm1.submit()">


		<?php 
		$mode = "PROD"; //<------------ Change to TEST for test server, PROD for production

		extract($_POST);
		  $secretKey = "d9bb74aad0f76165f5493e9edf3a69d4f9f23384"; // Test : ab482bedc37effcee63448e1bd6e63afde84667d  PROD : d9bb74aad0f76165f5493e9edf3a69d4f9f23384
		  $postData = array( 
		  "appId" => $appId, 
		  "orderId" => $orderId, 
		  "orderAmount" => $orderAmount, 
		  "orderCurrency" => $orderCurrency, 
		  "customerName" => $customerName, 
		  "customerPhone" => $customerPhone, 
		  "customerEmail" => $customerEmail,
		  "orderNote" => $orderNote, 
		  "returnUrl" => $returnUrl, 
		);
		ksort($postData);
		$signatureData = "";
		foreach ($postData as $key => $value){
		    $signatureData .= $key.$value;
		}
		$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
		$signature = base64_encode($signature);

		if ($mode == "PROD") {
		  $url = "https://www.cashfree.com/checkout/post/submit";
		} else {
		  $url = "https://test.cashfree.com/billpay/checkout/post/submit";
		}

		?>
		  <form action="<?php echo $url; ?>" name="frm1" method="post">
		      <center>
		        <div style="width: auto; height: auto; background-color: #3B8894; margin-top: 15%">
		          <br>
		        <p style="text-align: center; color: white;font-size: 35px">Please wait. Do not refresh the window.......</p>
		        <p style="text-align: center; color: white;font-size: 35px">Your transaction is under process.......</p>
		        <br>
		      </div>
		      </center>
		      <input type="hidden" name="signature" value='<?php echo $signature; ?>'/>
		      <input type="hidden" name="orderCurrency" value='<?php echo $orderCurrency; ?>'/>
		      <input type="hidden" name="customerName" value='<?php echo $customerName; ?>'/>
		      <input type="hidden" name="customerEmail" value='<?php echo $customerEmail; ?>'/>
		      <input type="hidden" name="customerPhone" value='<?php echo $customerPhone; ?>'/>
		      <input type="hidden" name="orderAmount" value='<?php echo $orderAmount; ?>'/>
		      <input type ="hidden" name="returnUrl" value='<?php echo $returnUrl; ?>'/>
		      <input type="hidden" name="appId" value='<?php echo $appId; ?>'/>
		      <input type="hidden" name="orderId" value='<?php echo $orderId; ?>'/>
		      <input type="hidden" name="orderNote" value='<?php echo $orderNote; ?>'/>
		  </form>
		</body>
	</html>
<?php
}

if (isset($_POST['free'])) {

	$orderId = $_POST['orderId'];
	$name = $_POST['customerName'];
	$email = $_POST['customerEmail'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$zip = $_POST['zip'];
	$mobile = $_POST['customerPhone'];
	$eventName = $_POST['eventName'];
	$paramLink = $_POST['paramLink'];
	$eventPrice = $_POST['orderAmount'];
	$event_id = $_POST['event_id'];
	$city = $_POST['city'];
	$sellerId = $_POST['sellerId'];
	$referral = $_POST['referral'];
	if($referral == ''){
	    $referral = $referral;
	}

	$subject = "ORDER CONFIRMATION | #".$orderId."- EVENTER";
	$body = "This is a confirmation mail that you have successfuly registered for the event '<b>".$eventName."'</b>.<br> Check my-account section to get more details about that.<br><br><br>Best Regards<br>EVENTER";
	$alertSuccess = "You have successfully registeres on the event.";
	$redirectSuccess = "index.php";

	$alertError = "Something went wrong.";
	$redirectError = "index.php";
	
	$sql="INSERT INTO  eventregistration(orderId,event_id,paramLink,event_price,event_name,userId,name,email,address,city,country,zip,mobile,amount,sellerId,referral) VALUES('$orderId','$event_id','$paramLink','$eventPrice','$eventName','$userId','$name','$email','$address','$city','$country','$zip','$mobile','$eventPrice', '$sellerId','$referral')";
	$result = mysqli_query($con,$sql);

	if ($result) {
		$insert = "INSERT into eventpament (orderId,txnId,txnAmount,txnStatus) values ('$orderId','$orderId','$eventPrice','SUCCESS')";
		$res = mysqli_query($con,$insert);
		if ($res) {

			include('includes/mailerCode.php');

		} else {
			echo "<script>alert('Something went wrong.');window.location.href='index.php';</script>";
		}
	} else {
		echo "<script>alert('Something went wrong.');window.location.href='index.php';</script>";
	}

}

?>