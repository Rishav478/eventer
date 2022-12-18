<?php  

include('includes/database.php');
session_start();

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$mobile = $_SESSION['mobile'];

if (isset($_POST['submit'])) {
  $orderId = $_POST['orderId'];
  $orderAmount = $_POST['orderAmount'];
  $serviceId = $_POST['serviceId'];
  $servicePlan = $_POST['servicePlan'];
  $vendorId = $_POST['vendorId'];
}

$sql="INSERT INTO  customer_order(orderId,orderAmount,servicePlan,serviceId,vendorId,mobile,user_id) VALUES('$orderId','$orderAmount','$servicePlan','$serviceId','$vendorId','$user_mobile','$user_id')";
if(mysqli_query($con,$sql))
{
  //echo "Success";
}
else {
  echo "Error.<br><a href='user-services.php'>Go Home</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>DGM Payment | Online GYM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body onload="document.frm1.submit()">


<?php 
$mode = "TEST"; //<------------ Change to TEST for test server, PROD for production

extract($_POST);
  $secretKey = "ab482bedc37effcee63448e1bd6e63afde84667d"; // Test : ab482bedc37effcee63448e1bd6e63afde84667d  PROD : d9bb74aad0f76165f5493e9edf3a69d4f9f23384
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
        <p style="text-align: center; color: white;font-size: 35px">Please wait. Do no refress the window.......</p>
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
