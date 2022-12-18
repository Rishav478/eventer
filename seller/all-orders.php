<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

if(isset($_GET['searchOrder'])){
    $orderId = $_GET['orderId'];
    //echo "<script>alert('".$orderId."');</script>";
?>

      <!-- Main Content -->
      <div class="main-content">

            <div class="row ">
            </div>
        
                <div class="card">
                  <div class="card-header">
                    <h4>Total Orders #</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <thead>
                          <tr>
                            <th>#</th>
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
                      $sql1 = "SELECT * FROM eventregistration INNER JOIN eventpament ON eventregistration.orderId = eventpament.orderId WHERE eventregistration.orderId = '$orderId'";
                      $result1 = mysqli_query($con,$sql1);
                      $i=1;
                      while ($row1=mysqli_fetch_array($result1)){
                      ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><a href="view-event-details.php?name=<?= $row1['paramLink'] ?>"><?= $row1['event_name'] ?></a></td>
                            <td><?= $row1['name'] ?>:- <?= $row1['address'] ?> <?= $row1['city'] ?> <?= $row1['country'] ?> <?= $row1['zip'] ?> <?= $row1['mobile'] ?></td>
                            <td><?= $row1['orderId'] ?></td>
                            <td>
                              <?php
                              if ($row1['txnAmount'] == 0) {
                                echo "<b>FREE</b>";
                               } else {
                                echo "<b>₹".$row1['txnAmount']."</b>";
                               }
                              ?>
                              </td>
                            <td><?= $row1['txnId'] ?></td>
                            <td><b><?= $row1['txnStatus'] ?></b></td>
                            <td><?= date('d-M-Y', strtotime($row1['txnDate'])) ?></td>
                          </tr>
                      <?php $i=$i+1; } ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>

      </div>

<?php
} else {

?>
      <!-- Main Content -->
      <div class="main-content">

            <div class="row ">
            </div>
        
                <div class="card">
                  <div class="card-header">
                    <h4>Total Orders #</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <thead>
                          <tr>
                            <th>#</th>
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
                      $sql = "SELECT * FROM eventregistration INNER JOIN eventpament ON eventregistration.orderId = eventpament.orderId WHERE sellerId = '$id' ORDER BY erId DESC";
                      $result = mysqli_query($con,$sql);
                      $i=1;
                      while ($row=mysqli_fetch_array($result)){
                      ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><a href="view-event-details.php?name=<?= $row['paramLink'] ?>"><?= $row['event_name'] ?></a></td>
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
                      <?php $i=$i+1; } ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                </div>

      </div>
<?php 
}
include('includes/footer.php'); 
?>