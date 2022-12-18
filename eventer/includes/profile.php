<style>
.ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 100%;
  background-color: #f1f1f1;
}

.li .a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

.li .a.active {
  background-color: #D10024;
  color: white;
}

.li .a:hover:not(.active) {
  background-color: #D10024;
  color: white;
}
</style>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-2">
						<ul class="ul">
							<li class="li"><a class="a active" href="#my-Order" onclick="orders()">My Orders</a></li>
						</ul>
					</div>
					<div class="col-md-10 table-responsive" id="my-orders">
						<table class="table">
							<thead>
			                    <tr style="font-size: 15px">
			                      
			                      <th scope="col">Event Name</th>
			                      <th scope="col">Registered For</th>
			                      <th scope="col">Order Id</th>
			                      <th scope="col">Order Amount</th>
			                      <th scope="col">Transaction Id</th>
			                      <th scope="col">Transaction Status</th>
			                      <th scope="col">Transaction Date</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                <?php
			                $user_id = $_SESSION['uId'];
			                $sql = "SELECT * FROM eventregistration INNER JOIN eventpament ON eventregistration.orderId = eventpament.orderId WHERE userId = '$user_id' ORDER BY erId DESC";
			                $result = mysqli_query($con,$sql);
			                while ($row=mysqli_fetch_array($result)){
			                ?>
			                  	<tr>
			                  		<td><a href="event-details.php?name=<?= $row['paramLink'] ?>"><?= $row['event_name'] ?></a></td>
			                  		<td><?= $row['name'] ?>:- <?= $row['address'] ?> <?= $row['city'] ?> <?= $row['country'] ?> <?= $row['zip'] ?> <?= $row['mobile'] ?></td>
			                  		<td><?= $row['orderId'] ?></td>
			                  		<td>
			                  			<?php
			                  			if ($row['txnAmount'] == 0) {
			                  			 	echo "<b>FREE</b>";
			                  			 } else {
			                  			 	echo "<b>₹".$row['txnAmount']."</b>";
			                  			 }
			                  			?>
			                  			</td>
			                  		<td><?= $row['txnId'] ?></td>
			                  		<td><b><?= $row['txnStatus'] ?></b></td>
			                  		<td><?= date('d-M-Y', strtotime($row['txnDate'])) ?></td>
			                  	</tr>
			                <?php } ?>
			                  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

<script type="text/javascript">
	
</script>