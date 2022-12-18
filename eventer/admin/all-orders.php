<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

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
                      $sql = "SELECT * FROM eventregistration INNER JOIN eventpament ON eventregistration.orderId = eventpament.orderId ORDER BY erId DESC";
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
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span
                              class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>

      </div>
<?php include('includes/footer.php'); ?>