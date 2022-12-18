<?php 
include('includes/autoload.php'); 

date_default_timezone_set('Asia/kolkata');

require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];
$todayDate = date('Y-m-d');
include('totalCount.php'); 
?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Today Registrations</h5>
                <?php
                $todayDate = date("d-m-Y");
                $tRegCount = 0;
                $tReg = "SELECT * FROM eventregistration INNER JOIN eventpament ON eventregistration.orderId = eventpament.orderId WHERE sellerId = '$id'";
                $tRegRes = mysqli_query($con,$tReg);
                while($tRegRow = mysqli_fetch_array($tRegRes)){
                $tDate = date("d-m-Y", strtotime($tRegRow['txnDate']));
                if ($todayDate == $tDate) {
                  $tRegCount = $tRegCount + 1;
                }
                }
                
                //$tRegCount = mysqli_num_rows($tRegRes);
                ?>
                          <h2 class="mb-3 font-18"><?= $tRegCount ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Live Events</h5>
                          <h2 class="mb-3 font-18"><?= $countLiveEventsValue ?></h2>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Revenue</h5>
                    <?php
                    $tRevenue = 0;
                    $Revenue = 0;
                    $tRev = "SELECT * FROM eventregistration INNER JOIN eventpament ON eventregistration.orderId = eventpament.orderId WHERE sellerId = '$id'";
                    $tRevRes = mysqli_query($con,$tRev);
                    while($tRevRow = mysqli_fetch_array($tRevRes)){
                      $Revenue = $Revenue + $tRevRow['txnAmount'];
                    }
                    $precentage = ($Revenue * 10)/100;
                    $tRevenue = $Revenue - $precentage;
                    ?>
                          <h2 class="mb-3 font-18">₹<?= $tRevenue ?></h2>
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
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Total Sales</h5>
                          <h2 class="mb-3 font-18">₹<?= $Revenue ?></h2>
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
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Event List</h4>
                  <div class="card-header-form">
                    <a href="view-events.php" style="text-decoration: none;">View All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th class="text-center">#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Start - End Date</th>
                        <th>Registration Last Date</th>
                        <th>Location</th>
                        <th>Tags</th>
                        <th>Status</th>
                      </tr>
<?php
$fetchEvent = "SELECT * from event where sellerId = '$id' order by event_id desc limit 7";
$resEvent = mysqli_query($con,$fetchEvent);
while ($rowsEv = mysqli_fetch_array($resEvent)) {

  $event_category = $rowsEv['event_category'];
  if ($event_category == 'paid') {
    $event_background = 'badge-success';
  } else {
    $event_background = 'badge-warning';
  }
  $rDate = strtotime($rowsEv['event_regEndDate']);
  $cDate = strtotime(date('Y-m-d'));

  if ($cDate <= $rDate) {
    $status = "Live";
    $val = "badge-success";
  } else {
    $status = "Closed";
    $val = "badge-danger";
  }
?>
                      <tr>
                        <td>#</td>
                        <td>
                          <a>
                            <img alt="image" src="assets/uploads/event-banner/<?= $rowsEv['event_banner'] ?>" class="rounded-rectangle" width="100" height="80" 
                                            data-toggle="title" title="">
                          </a>
                        </td>
                        <td><?= $rowsEv['event_name'] ?>
                          <div class="table-links">
                            <a href="view-event-details.php?name=<?= $rowsEv['paralLink'] ?>">View</a>
                            <!--div class="bullet"></div>
                            <a href="#">Edit</a>
                            <div class="bullet"></div>
                            <a href="#" class="text-danger">Trash</a-->
                          </div>
                        </td>
                        <td>
                          <div style="text-transform: uppercase;" class="badge <?= $event_background ?>"><?= $event_category ?></div>
                        </td>
                        <td><?= $rowsEv['event_date'] ?></td>
                        <td><?= $rowsEv['event_startDate'] ?> - <?= $rowsEv['event_endDate'] ?></td>
                        <td><?= $rowsEv['event_regEndDate'] ?></td>
                        <td><?= $rowsEv['event_location'] ?></td>
                        <td><?= $rowsEv['event_tags'] ?></td>
                        <td>
                          <div style="text-transform: uppercase;" class="badge <?= $val ?>"><?= $status ?></div>
                        </td>
                      </tr>
<?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
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
                      $get = "SELECT * from eventpayouts where sellerId = '$id' order by epId desc limit 10";
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
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php include('includes/model.php'); ?>
      <footer class="main-footer">
        <div class="footer-left">
          <i class="fas fa-copyright"></i> Copyright | Eventer
        </div>
        <div class="footer-right">
          All Right Reserve
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/ckeditor/ckeditor.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>

  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/js/page/forms-advanced-forms.js"></script>
  <script src="assets/js/login_auth.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>