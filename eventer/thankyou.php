<?php
include('includes/header.php');
?>
<style>
	.card {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	  max-width: 300px;
	  margin: auto;
	  text-align: center;
	  font-family: arial;
	}

	.price {
	  color: grey;
	  font-size: 22px;
	}

	.card button {
	  border: none;
	  outline: 0;
	  padding: 12px;
	  color: white;
	  background-color: #000;
	  text-align: center;
	  cursor: pointer;
	  width: 100%;
	  font-size: 18px;
	}

	.card button:hover {
	  opacity: 0.7;
	}
	.dropdown {
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  padding: 12px 16px;
	  z-index: 1;
	}

	.dropdown:hover .dropdown-content {
	  display: block;
	}
</style>

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
			<!-- row -->
			<div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Thank You For Using Us...!</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
            	
					<?php  
					$p = "";
					$secretkey = "ab482bedc37effcee63448e1bd6e63afde84667d"; // test : ab482bedc37effcee63448e1bd6e63afde84667d  PROD : d9bb74aad0f76165f5493e9edf3a69d4f9f23384
					$orderId = $_POST["orderId"];
					$orderAmount = $_POST["orderAmount"];
					$referenceId = $_POST["referenceId"];
					$txStatus = $_POST["txStatus"];
					$paymentMode = $_POST["paymentMode"];
					$txMsg = $_POST["txMsg"];
					$txTime = $_POST["txTime"];
					$signature = $_POST["signature"];
					$data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
					$hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
					$computedSignature = base64_encode($hash_hmac);

					$sql = "SELECT * FROM eventregistration WHERE orderId = '$orderId'";
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($result);
					$user_id = $row['userId'];

					$query = "SELECT * FROM user WHERE id = '$user_id'";
					$results = mysqli_query($con,$query);
			        $countt = mysqli_num_rows($results);
			        if ($countt == 1) {
			            $rows = mysqli_fetch_array($results);
			            $_SESSION["uId"] = $rows["id"];
			            $_SESSION["name"] = $rows["name"];
			            $_SESSION['email'] = $rows["email"];
			            $_SESSION['mobile'] = $rows["mobile"];

			            $buyer_email = $_SESSION['email'];
			        }

					if ($signature == $computedSignature)
					{
						$querys = "SELECT * FROM eventpament WHERE orderId = '$orderId'";
						$resultss = mysqli_query($con,$querys);
				        $counts = mysqli_num_rows($resultss);
				        if ($counts == 1)
				        {
				        	$p = "Order Inserted.";
				        } else {
				        	$insert = "INSERT into eventpament (orderId,txnId,txnAmount,txnStatus) values ('$orderId','$referenceId','$orderAmount','$txStatus')";
				        	$feed = mysqli_query($con,$insert);
				        }
				    } else {
				    	$insert = "INSERT into eventpament (orderId,txnId,txnAmount,txnStatus) values ('$orderId','$referenceId','$orderAmount','$txStatus')";
				    	$feed = mysqli_query($con,$insert);
				    }
				        ?>
						    <h2 style="color: white">Payment Details!</h2>
							<table class="table table-bordered" style="">
								<tr>
									<th>Order Status :</th>
									<td><?php echo $txStatus; ?></td>
								</tr>
								<tr>
									<th>Order Id :</th>
									<td><?php echo $orderId; ?></td>
								</tr>
								<tr>
									<th>Service Paid Amount :</th>
									<td><?php echo $orderAmount; ?></td>
								</tr>
								<tr>
									<th>Transaction Id :</th>
									<td><?php echo $referenceId; ?></td>
								</tr>
								<tr>
							        <th>Payment Mode </th>
							        <td><?php echo $paymentMode; ?></td>
							    </tr>
							    <tr>
							        <th>Transaction Time</th>
							        <td><?php echo $txTime; ?></td>
							    </tr>
							</table>
            </div>
	</div>
</div>
<?php
include('includes/footer.php');
?>