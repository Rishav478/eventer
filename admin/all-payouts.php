<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

?>
      <!-- Main Content -->
      <div class="main-content">
        
        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                      <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                          <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                              <div class="card-content">
                                <h5 class="font-15">Total Payouts</h5>
                        <?php
                        $tPayouts = 0;
                        $tGet = "SELECT * from eventpayouts order by epId desc";
                        $tRes = mysqli_query($con,$tGet);
                        while($tRow = mysqli_fetch_array($tRes)){
                          $tPayouts = $tPayouts + $tRow['epAmount'];
                        }

                        ?>
                                <h2 class="mb-3 font-18">₹<?= $tPayouts ?></h2>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                              <div class="banner-img">
                                <img src="assets/img/banner/4.png" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Event Payouts</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Event Name</th>
                          <th>Date</th>
                          <th>Payment Method</th>
                          <th>Amount</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                  <?php
                  $get = "SELECT * from eventpayouts order by epId desc";
                  $res = mysqli_query($con,$get);
                  while($row = mysqli_fetch_array($res)){
                  ?>
                        <tr>
                          <td>#</td>
                          <td><a href="view-event-details.php?name=<?= $row['paramLink'] ?>"><?= $row['event_name'] ?></a></td>
                          <td><?= $row['epDate'] ?></td>
                          <td><?= $row['epMode'] ?></td>
                          <td><?= $row['epAmount'] ?></td>
                          <td><?= $row['epStatus'] ?></td>
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