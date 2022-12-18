<?php 
include('includes/autoload.php'); 

date_default_timezone_set('Asia/kolkata');
require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$aid = $_SESSION['aid'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

?>
      <!-- Main Content -->
      <div class="main-content">
            <section class="section">
                  <div class="section-body">

                        <div class="row mt-4">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h4>All Events</h4>
                              </div>
                              <div class="card-body">
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <tr>
                                      <th>#</th>
                                      <th>Image</th>
                                      <th>Title</th>
                                      <th>Category</th>
                                      <th>Created At</th>
                                      <th>Start - End Date</th>
                                      <th>Registration Last Date</th>
                                      <th>Location</th>
                                      <th>Tags</th>
                                      <th>Status</th>
                                      <th>Type</th>
                                    </tr>
<?php
$fetchEvent = "SELECT * from event order by event_id desc";
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
  
  if($rowsEv['event_status'] == 'Active'){
      $val1 = "badge-success";
  } else if($rowsEv['event_status'] == 'Pending Verification'){
      $val1 = "badge-warning";
  } else {
      $val1 = "badge-danger";
  }
?>
                                    <tr>
                                      <td>#</td>
                                      <td>
                                        <a>
                                          <img alt="image" src="../seller/assets/uploads/event-banner/<?= $rowsEv['event_banner'] ?>" class="rounded-rectangle" width="100" height="60" 
                                            data-toggle="title" title="" style="margin-bottom: 10px; margin-top: 10px;">
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
                                      <td><?= date('d-M-Y H:i:s',strtotime($rowsEv['event_date'])) ?></td>
                                      <td><?= date('d-M-Y',strtotime($rowsEv['event_startDate'])) ?> - <?= date('d-M-Y',strtotime($rowsEv['event_endDate'])) ?></td>
                                      <td><?= date('d-M-Y',strtotime($rowsEv['event_regEndDate'])) ?></td>
                                      <td><?= $rowsEv['event_location'] ?></td>
                                      <td><?= $rowsEv['event_tags'] ?></td>
                                      <td>
                                        <div style="text-transform: uppercase;" class="badge <?= $val ?>"><?= $status ?></div>
                                      </td>
                                      <td>
                                        <div style="text-transform: uppercase;" class="badge <?= $val1 ?>"><?= $rowsEv['event_status'] ?></div>
                                      </td>
                                    </tr>
<?php } ?>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                  </div>
            </section>
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
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/codemirror/lib/codemirror.js"></script>
  <script src="assets/bundles/codemirror/mode/javascript/javascript.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/ckeditor/ckeditor.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/js/page/forms-advanced-forms.js"></script>
    <script src="assets/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>

  <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="assets/js/page/create-post.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/ckeditor.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- forms-editor.html  21 Nov 2019 03:55:16 GMT -->
</html>