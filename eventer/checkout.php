<?php
include('includes/header.php');
$userId = $_SESSION['uId'];
?>

<?php
if (isset($_GET['name'])) {
	if (!empty($_GET['name'])) {
		$paralLink = $_GET['name'];
		$sql = "SELECT * from event where paralLink = '$paralLink'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);

		$sellerId = $row['sellerId'];

		$check = "SELECT * from seller where id = '$sellerId'";
		$res = mysqli_query($con,$check);
		$rs = mysqli_fetch_array($res);

		if ($row['event_price'] == 0) {
			$submitButtonName = 'free';
		} else {
			$submitButtonName = 'paid';
		}
?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<form method="POST" action="pay.php">

						<div class="col-md-7">
							<!-- Billing Details -->
							<div class="billing-details">
								<div class="section-title">
									<h3 class="title">Billing address</h3>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="customerName" placeholder="Name" required>
								</div>
								<div class="form-group">
									<input class="input" type="email" name="customerEmail" placeholder="Email" required>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="address" placeholder="Address" required>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="city" placeholder="City" required>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="country" placeholder="Country" required>
								</div>
								<div class="form-group">
									<input class="input" type="text" name="zip" placeholder="ZIP Code" required>
								</div>
								<div class="form-group">
									<input class="input" type="tel" name="customerPhone" placeholder="Telephone" required>
								</div>
								<input type="hidden" name="eventName" value="<?= $row['event_name'] ?>">
								<input type="hidden" name="paramLink" value="<?= $row['paralLink'] ?>">
								<input type="hidden" name="orderAmount" value="<?= $row['event_price'] ?>">
								<input type="hidden" name="event_id" value="<?= $row['event_id'] ?>">
								<input type="hidden" name="appId" value="177459375a2dc129084f2d1df54771" />
								<input type="hidden" name="orderId" value="<?= 'ORDS-EVRG-'.date('mdY').'-'.rand(0000,999999) ?>">
								<input type="hidden" name="orderNote" value="<?= $userId ?>">
								<input type="hidden" name="returnUrl" value="http://localhost/eventer/thankyou.php">
								<input type="hidden" name="orderCurrency" value="INR">
								<input type="hidden" name="sellerId" value="<?= $sellerId ?>">
							</div>
							<!-- /Billing Details -->
						</div>

						<!-- Order Details -->
						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">Your Order</h3>
							</div>
							<div class="order-summary">
								<div class="order-col">
									<div><strong>EVENT</strong></div>
									<div><strong>PRICE</strong></div>
								</div>
								<div class="order-products">
									<div class="order-col">
										<div><?= $row['event_name'] ?><br>Location: <?= $row['event_location'] ?></div>
										<div>₹<?= $row['event_price'] ?></div>
									</div>
								</div>
								<div class="order-col">
									<div><strong>TOTAL</strong></div>
									<div><strong class="order-total">₹<?= $row['event_price'] ?></strong></div>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="terms" required>
								<label for="terms">
									<span></span>
									I've read and accept the terms & conditions
								</label>
							</div>
							<input type="submit" class="primary-btn order-submit" name="<?= $submitButtonName ?>" value="Confirm Registration">
						</div>
						<!-- /Order Details -->

					</form>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php
	} else {
		echo "<script>window.location.href='events.php';</script>";
	}
} else {
	echo "<script>window.location.href='events.php';</script>";
}
?>

<?php
include('includes/footer.php');
?>