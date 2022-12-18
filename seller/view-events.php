<?php 
include('includes/autoload.php'); 

date_default_timezone_set('Asia/kolkata');
require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                                      <th>Shared Link</th>
                                      <th>Created At</th>
                                      <th>Start - End Date</th>
                                      <th>Registration Last Date</th>
                                      <th>Location</th>
                                      <th>Tags</th>
                                      <th>Status</th>
                                      <th>Event</th>
                                      <th>Action</th>
                                    </tr>
<?php
$fetchEvent = "SELECT * from event where sellerId = '$id' order by event_id desc";
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
                                      <td class="paramLink" hidden><?= $rowsEv['paralLink'] ?></td>
                                      <td class="sellerId" hidden><?= $id ?></td>
                                      <td>#</td>
                                      <td>
                                        <a>
                                          <img alt="image" src="assets/uploads/event-banner/<?= $rowsEv['event_banner'] ?>" class="rounded-rectangle" width="100" height="60" 
                                            data-toggle="title" title="" style="margin-bottom: 10px; margin-top: 10px;">
                                        </a>
                                      </td>
                                      <td><?= $rowsEv['event_name'] ?>
                                        <div class="table-links">
                                          <a href="view-event-details.php?name=<?= $rowsEv['paralLink'] ?>">View</a>
                                        </div>
                                      </td>
                                      <td>
                                        <div style="text-transform: uppercase;" class="badge <?= $event_background ?>"><?= $event_category ?></div>
                                      </td>
                                      <td><a href="https://goeventer.in/event-details.php?name=<?= $rowsEv['paralLink'] ?>&value=<?= password_hash($rowsEv['paralLink'], PASSWORD_DEFAULT) ?><?= password_hash($rowsEv['paralLink'], PASSWORD_DEFAULT) ?><?= password_hash($rowsEv['paralLink'], PASSWORD_DEFAULT) ?><?= password_hash($rowsEv['paralLink'], PASSWORD_DEFAULT) ?>" target="_blank">Link</a></td>
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
                                      <td><?php
                                      if($rowsEv['event_status'] == 'Blocked'){?>
                                          <a href="#" class="btn btn-primary view_data"><i class="fas fa-edit"></i></a>
                                      <?php }
                                      ?></td>
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
      
<!-- Modal -->
<div class="modal fade" id="updateEvent" tabindex="-1" role="dialog" aria-labelledby="updateEventLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateEventLabel">Update Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="event-details">
          <div class="model_viewing_data"></div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

    $('#summernote').summernote();
      
    $('.view_data').click(function(){
      //e.preventDefault();
      
      //alert('Hello..!');
      
      var param_link = $(this).closest('tr').find('.paramLink').text();
      var seller_id = $(this).closest('tr').find('.sellerId').text();
      //console.log(param_link);
      
      $.ajax({
          
          type: "post",
          url: "postModel.php",
          data: {
              "checking_viewBtn": true,
              "param_link": param_link,
              "seller_id": seller_id,
          },
          success: function(response){
              //console.log(response);
              $('.model_viewing_data').html(response);
              $('#updateEvent').modal('show');
          }
          
      });

    });
    
  });

function Check() {
  if (document.getElementById('event-category-paid').checked) {
      document.getElementById('event-price').style.visibility = 'visible';
  }
  else document.getElementById('event-price').style.visibility = 'hidden';
}
</script>

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

<?php

if (isset($_POST['event-publish'])) {
  $paralLink = $_POST['paralLink'];
  $event_name = mysqli_real_escape_string($con,$_POST['event-name']);
  $event_category = mysqli_real_escape_string($con,$_POST['event-category']);
  $event_price = mysqli_real_escape_string($con,$_POST['event-price']);
  $virtual_event = mysqli_real_escape_string($con,$_POST['virtual_event']);
  $event_details = mysqli_real_escape_string($con,$_POST['event-details']);
  $event_startDate = mysqli_real_escape_string($con,$_POST['event-start-date']);
  $event_endDate = mysqli_real_escape_string($con,$_POST['event-end-date']);
  $event_regEndDate = mysqli_real_escape_string($con,$_POST['event-registration-date']);
  $event_location = mysqli_real_escape_string($con,$_POST['event-location']);
  $event_tags = mysqli_real_escape_string($con,$_POST['event-tag']);

  if (empty($event_price)) {
    $event_price = 0;
  }
  if ($event_category == 'free') {
    $event_price = 0;
  }
  $update = "UPDATE event set event_name = '$event_name', event_category = '$event_category', event_price = '$event_price', event_details = '$event_details', event_startDate = '$event_startDate', event_endDate = '$event_endDate', event_regEndDate = '$event_regEndDate', event_location = '$event_location', event_tags = '$event_tags', event_status = 'Pending Verification', virtual_event = '$virtual_event'  where paralLink = '$paralLink'";
    $result = mysqli_query($con,$update);
    if($result) {

      echo "<script>alert('Event updated successfully.');window.location.href='view-events.php'</script>";

    } else {
        //echo mysqli_error($con);
      echo "<script>alert('Something went wrong.');window.location.href='view-events.php'</script>";

    }
}

?>