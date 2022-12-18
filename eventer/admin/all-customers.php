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
                                <h5 class="font-15">Total Customers</h5>
                        <?php
                        $tPayouts = 0;
                        $tGet = "SELECT * from user order by id desc";
                        $tRes = mysqli_query($con,$tGet);
                        $counts = mysqli_num_rows($tRes);

                        ?>
                                <h2 class="mb-3 font-18"><?= $counts ?></h2>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact Number</th>
                          <th>Date of Birth</th>
                          <th>Gender</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                  <?php
                  $get = "SELECT * from user order by id desc";
                  $res = mysqli_query($con,$get);
                  while($row = mysqli_fetch_array($res)){
                  ?>
                        <tr>
                          <td>#</td>
                          <td><?= $row['name'] ?></td>
                          <td><?= $row['email'] ?></td>
                          <td><?= $row['mobile'] ?></td>
                          <td><?= $row['dob'] ?></td>
                          <td><?= $row['gender'] ?></td>
                          <td><?= $row['date'] ?></td>
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