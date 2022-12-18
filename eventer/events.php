<?php
include('includes/header.php');
?>

<?php
if (isset($_GET['type'])) {
	if ($_GET['type'] == 'free') { ?>

		<!-- SECTION FREE-->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- STORE -->
					<div id="store" class="col-md-12">

						<!-- store products -->
						<div class="row">
						<?php
							$sql = "SELECT * from event where event_price = 0 order by event_id desc";
							$result = mysqli_query($con,$sql);
							while ($row = mysqli_fetch_array($result)) {
								$rDate = strtotime($row['event_regEndDate']);
  								$cDate = strtotime(date('Y-m-d'));
  								$paralLink = $row['paralLink'];
  								if ($row['event_price'] == 0) {
									$event_price = 'FREE';
								} else {
									$event_price = '₹'.$row['event_price'];
								}
  								if ($cDate <= $rDate) {
						?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="seller/assets/uploads/event-banner/<?= $row['event_banner'] ?>" height="280px" alt="">
										<div class="product-label">
											<span class="news" style="text-transform: uppercase; background-color: red; color: white;">Live</span>
											<span class="new" style="text-transform: uppercase;"><?= $row['event_category'] ?></span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category" style="text-transform: uppercase;"><?= $row['event_category'] ?></p>
										<h3 class="product-name"><a href="event-details.php?name=<?= $row['paralLink'] ?>&value=<?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?>"><?= $row['event_name'] ?></a></h3>
										<h4 class="product-price"><?= $event_price ?></h4>
									</div>
								</div>
							</div>
							<!-- /product -->


							<div class="clearfix visible-sm visible-xs"></div>
						<?php
							} }
						?>	
						</div>
						<!-- /store products -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION FREE-->

<?php
	} elseif ($_GET['type'] == 'paid') { ?>

		<!-- SECTION PAID-->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- STORE -->
					<div id="store" class="col-md-12">

						<!-- store products -->
						<div class="row">
						<?php
							$sql = "SELECT * from event where event_price > 0 order by event_id desc";
							$result = mysqli_query($con,$sql);
							while ($row = mysqli_fetch_array($result)) {
								$rDate = strtotime($row['event_regEndDate']);
  								$cDate = strtotime(date('Y-m-d'));
  								$paralLink = $row['paralLink'];
  								if ($row['event_price'] == 0) {
									$event_price = 'FREE';
								} else {
									$event_price = '₹'.$row['event_price'];
								}
  								if ($cDate <= $rDate) {
						?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="seller/assets/uploads/event-banner/<?= $row['event_banner'] ?>" height="280px" alt="">
										<div class="product-label">
											<span class="news" style="text-transform: uppercase; background-color: red; color: white;">Live</span>
											<span class="new" style="text-transform: uppercase;"><?= $row['event_category'] ?></span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category" style="text-transform: uppercase;"><?= $row['event_category'] ?></p>
										<h3 class="product-name"><a href="event-details.php?name=<?= $row['paralLink'] ?>&value=<?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?>"><?= $row['event_name'] ?></a></h3>
										<h4 class="product-price"><?= $event_price ?></h4>
									</div>
								</div>
							</div>
							<!-- /product -->


							<div class="clearfix visible-sm visible-xs"></div>
						<?php
							} }
						?>	
						</div>
						<!-- /store products -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION PAID-->

<?php
	} else { ?>

		<!-- SECTION ALL-->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- STORE -->
					<div id="store" class="col-md-12">

						<!-- store products -->
						<div class="row">
						<?php
							$sql = "SELECT * from event order by event_id desc";
							$result = mysqli_query($con,$sql);
							while ($row = mysqli_fetch_array($result)) {
								$rDate = strtotime($row['event_regEndDate']);
  								$cDate = strtotime(date('Y-m-d'));
  								$paralLink = $row['paralLink'];
  								if ($row['event_price'] == 0) {
									$event_price = 'FREE';
								} else {
									$event_price = '₹'.$row['event_price'];
								}
  								if ($cDate <= $rDate) {
						?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="seller/assets/uploads/event-banner/<?= $row['event_banner'] ?>" height="280px" alt="">
										<div class="product-label">
											<span class="news" style="text-transform: uppercase; background-color: red; color: white;">Live</span>
											<span class="new" style="text-transform: uppercase;"><?= $row['event_category'] ?></span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category" style="text-transform: uppercase;"><?= $row['event_category'] ?></p>
										<h3 class="product-name"><a href="event-details.php?name=<?= $row['paralLink'] ?>&value=<?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?>"><?= $row['event_name'] ?></a></h3>
										<h4 class="product-price"><?= $event_price ?></h4>
									</div>
								</div>
							</div>
							<!-- /product -->


							<div class="clearfix visible-sm visible-xs"></div>
						<?php
							} }
						?>	
						</div>
						<!-- /store products -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION ALL-->

<?php
	}
} else { ?>
		<!-- SECTION ALL-->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- STORE -->
					<div id="store" class="col-md-12">

						<!-- store products -->
						<div class="row">
						<?php
							$sql = "SELECT * from event order by event_id desc";
							$result = mysqli_query($con,$sql);
							while ($row = mysqli_fetch_array($result)) {
								$rDate = strtotime($row['event_regEndDate']);
  								$cDate = strtotime(date('Y-m-d'));
  								$paralLink = $row['paralLink'];
  								if ($row['event_price'] == 0) {
									$event_price = 'FREE';
								} else {
									$event_price = '₹'.$row['event_price'];
								}
  								if ($cDate <= $rDate) {
						?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="seller/assets/uploads/event-banner/<?= $row['event_banner'] ?>" height="280px" alt="">
										<div class="product-label">
											<span class="news" style="text-transform: uppercase; background-color: red; color: white;">Live</span>
											<span class="new" style="text-transform: uppercase;"><?= $row['event_category'] ?></span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category" style="text-transform: uppercase;"><?= $row['event_category'] ?></p>
										<h3 class="product-name"><a href="event-details.php?name=<?= $row['paralLink'] ?>&value=<?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?>"><?= $row['event_name'] ?></a></h3>
										<h4 class="product-price"><?= $event_price ?></h4>
									</div>
								</div>
							</div>
							<!-- /product -->


							<div class="clearfix visible-sm visible-xs"></div>
						<?php
							} }
						?>	
						</div>
						<!-- /store products -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION ALL-->
<?php
}
?>

<?php
include('includes/footer.php');
?>
