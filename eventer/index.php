<?php
include('includes/header.php');
?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- shop -->
					<div class="col-md-6 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="img/banner1.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Free<br>Events</h3>
								<a href="events.php?type=free" class="cta-btn">View now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-6 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/banner2.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Paid<br>Events</h3>
								<a href="events.php?type=paid" class="cta-btn">View now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Events</h3>

							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a href="events.php">View More</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
							<?php
							$sql = "SELECT * from event order by event_id desc limit 5";
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
										<div class="product">
											<div class="product-img">
												<img src="seller/assets/uploads/event-banner/<?= $row['event_banner'] ?>" height="280px" alt="">
												<div class="product-label">
													<span class="new" style="text-transform: uppercase;"><?= $row['event_category'] ?></span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category" style="text-transform: uppercase;"><?= $row['event_category'] ?></p>
												<h3 class="product-name"><a href="event-details.php?name=<?= $row['paralLink'] ?>&value=<?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?><?= password_hash($paralLink, PASSWORD_DEFAULT) ?>"><?= $row['event_name'] ?></a></h3>
												<h4 class="product-price"><?= $event_price ?></h4>
											</div>
										</div>
										<!-- /product -->
							<?php
							} }
							?>
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php
include('includes/footer.php');
?>