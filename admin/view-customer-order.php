<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

if (isset($_GET['id'])) {
      if (empty($_GET['id'])) {
            echo "<script>window.location.href='all-customers.php';</script>";
      } else {
            $id = $_GET['id'];
      }
} else {
      echo "<script>window.location.href='all-customers.php';</script>";
}

if (isset($_GET['name'])) {
      if (empty($_GET['name'])) {
            echo "<script>window.location.href='all-customers.php';</script>";
      } else {
            $name = $_GET['name'];
      }
} else {
      echo "<script>window.location.href='all-customers.php';</script>";
}
?>
      <!-- Main Content -->
      <div class="main-content">
        
        <div class="row">
            
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Customer Order: <b><?= $name ?></b></h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
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
                  $sql = "SELECT * FROM eventregistration INNER JOIN eventpament ON eventregistration.orderId = eventpament.orderId WHERE userId = '$id' ORDER BY erId DESC";
			      $result = mysqli_query($con,$sql);
			      $count = mysqli_num_rows($result);
                  while($row = mysqli_fetch_array($result)){
                  ?>
                        <tr>
                          <td><?= $row['event_name'] ?></td>
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
          </div>

      </div>
<?php include('includes/footer.php'); ?>