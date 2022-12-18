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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
			                      <th scope="col">View Ticket</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                <?php
			                $user_id = $_SESSION['uId'];
			                $sql = "SELECT * FROM eventregistration INNER JOIN eventpament ON eventregistration.orderId = eventpament.orderId WHERE userId = '$user_id' ORDER BY erId DESC";
			                $result = mysqli_query($con,$sql);
			                while ($row=mysqli_fetch_array($result)){
			                    $paramLink = $row['paramLink'];
			                ?>
			                  	<tr>
			                  		<td><a href="event-details.php?name=<?= $row['paramLink'] ?>"><?= $row['event_name'] ?></a></td>
			                  		<td><?= $row['name'] ?>:- <?= $row['address'] ?> <?= $row['city'] ?> <?= $row['country'] ?> <?= $row['zip'] ?> <?= $row['mobile'] ?></td>
			                  		<td class="orderId"><?= $row['orderId'] ?></td>
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
			                  		<td><?php
			                  		$get = "SELECT * from event where paralLink = '$paramLink'";
			                  		$pp = mysqli_query($con,$get);
			                  		$rps = mysqli_fetch_array($pp);
			                  		if($rps['virtual_event'] == 'yes'){
			                  		    echo "Virtual event does not required ticket.";
			                  		} else {
			                  		    if($row['status'] == 1){
			                  		    echo "<span class='text-success'>Ticket Approved.</span>";} else{
			                  		    echo "<a href='#' class='btn view_ticket' style='background-color: #042e6f;color: #fff'>View Ticket</a>";}
			                  		}
			                  		?></td>
			                  	</tr>
			                <?php } ?>
			                  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


<!-- Modal -->
<div class="modal fade" id="ticketQR" tabindex="-1" role="dialog" aria-labelledby="updateEventLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"style="width:300px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateEventLabel">Event Pass</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="event-details">
          <div class="qR_viewing_data"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      
    $('.view_ticket').click(function(){
      //e.preventDefault();
      
      //alert('Hello..!');
      
      var orderId = $(this).closest('tr').find('.orderId').text();
      //console.log(param_link);
      
      $.ajax({
          
          type: "post",
          url: "getQR.php",
          data: {
              "checking_qrBtn": true,
              "orderId": orderId,
          },
          success: function(response){
              //console.log(response);
              $('.qR_viewing_data').html(response);
              $('#ticketQR').modal('show');
          }
          
      });

    });
    
  });
</script>