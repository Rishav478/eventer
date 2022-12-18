<?php
include('includes/header.php');
?>

<?php
if (isset($_GET['name'])) {
	if (!empty($_GET['name'])) {
		$paralLink = $_GET['name'];
		$sql = "SELECT * from event where paralLink = '$paralLink'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$rDate = strtotime($row['event_regEndDate']);
  		$cDate = strtotime(date('Y-m-d'));

		$sellerId = $row['sellerId'];

		$check = "SELECT * from seller where id = '$sellerId'";
		$res = mysqli_query($con,$check);
		$rs = mysqli_fetch_array($res);
?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="seller/assets/uploads/event-banner/<?= $row['event_banner'] ?>" alt="<?= $row['event_banner'] ?>">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?= $row['event_name'] ?></h2>
							<p>Organizer: <strong><?= $rs['orgName'] ?></strong></p>
							<div>
								<h3 class="product-price">
									<span>
										<?php
									if ($row['event_price'] == 0) {
										echo $event_price = 'FREE';
									} else {
										echo $event_price = '₹'.$row['event_price'];
									}
									?>
									</span>
									<span>
									<?php
									if (isset($_SESSION['uId'])) {
										if ($cDate <= $rDate) {
									?>
										<a href="checkout.php?name=<?= $paralLink ?>&value=<?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?>" class="btn" style="background-color: #D10024; color: white;">Register Now</a>
									<?php
										}
									} else { ?>
										<a href="my-account.php" class="btn" style="background-color: #D10024; color: white;">Login First</a>
									<?php } ?>
									</span>
								</h3>
								<p><span>Evant Start Date: <?= $row['event_startDate'] ?></span><br><span>Event End Date: <?= $row['event_endDate'] ?></span><br>
								<span>Event Location: <?= $row['event_location'] ?></span></p>
							</div>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?= $row['event_details'] ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
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
