<?php
include('includes/header.php');
?>

<?php
if (isset($_GET['name'])) {
	if (!empty($_GET['name'])) {
		$name = $_GET['name'];
		$sql = "SELECT * from seller where id = '$name'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);


		$check = "SELECT * from sellerbio where sellerId = '$name'";
		$res = mysqli_query($con,$check);
		$bio = mysqli_fetch_array($res);

		$checks = "SELECT * from aboutme where sellerId = '$name'";
		$ress = mysqli_query($con,$checks);
		$aboutme = mysqli_fetch_array($ress);


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
								<img src="seller/assets/uploads/org-image/<?= $row['profile'] ?>" alt="<?= $row['profile'] ?>">
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
					    <center><h1><?= $row['orgName'] ?></h1></center>
					    <hr>
						<div class="product-details">
							<h4>Bio</h4>
							<?= $bio['bio'] ?>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">About Us</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?= $aboutme['about'] ?></p>
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
