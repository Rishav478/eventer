<?php
include('includes/database.php');
$output  = '';
if(isset($_POST['checking_viewBtn'])){
    
  $param_link = $_POST['param_link'];
  $sellerId = $_POST['seller_id'];
    
  $fetchEvent = "SELECT * from event where sellerId = '$sellerId' and paralLink = '$param_link'";
  $resEvent = mysqli_query($con,$fetchEvent);
  $rowsEv = mysqli_fetch_array($resEvent);
  $event_category = $rowsEv['event_category'];
  if ($event_category == 'paid') {
    $event_background = 'badge-success';
    $chck = "checked";
    $chck1 = "";
  } else {
    $event_background = 'badge-warning';
    $chck = "";
    $chck1 = "checked";
  }
  $virtual_event = $rowsEv['virtual_event'];
  if ($virtual_event == 'yes') {
    $event_background = 'badge-success';
    $chck2 = "checked";
    $chck3 = "";
  } else {
    $event_background = 'badge-warning';
    $chck2 = "";
    $chck3 = "checked";
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
    
    $output = '
                        <form method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="paralLink" class="form-control" value="'.$param_link.'" required>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Event Title</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-name" class="form-control" value="'.$rowsEv['event_name'].'" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                              <label class="custom-switch">
                                <input type="radio" '.$chck.'  onclick="javascript:Check();" name="event-category" id="event-category-paid" value="paid" class="custom-switch-input" required>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Paid</span>
                              </label>
                              <label class="custom-switch">
                                <input type="radio" '.$chck1.' onclick="javascript:Check();" name="event-category" id="event-category-free" value="free" class="custom-switch-input" required>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Free</span>
                              </label>
                            </div>
                          </div>
                          <div class="form-group row mb-4" id="event-price" style="visibility:hidden">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event Price</label>
                            <div class="col-sm-12 col-md-7">
                              <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        ₹
                                      </div>
                                    </div>
                                    <input type="number" name="event-price" value="'.$rowsEv['event_price'].'" class="form-control currency">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Event Type</label>
                            <div class="col-sm-12 col-md-7">
                              <label class="custom-switch">
                                <input type="radio" '.$chck2.'  onclick="" name="virtual_event" id="" value="yes" class="custom-switch-input" required>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Virtual</span>
                              </label>
                              <label class="custom-switch">
                                <input type="radio" '.$chck3.' onclick="" name="virtual_event" id="" value="no" class="custom-switch-input" required>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Offline</span>
                              </label>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Event Details</label>
                            <div class="col-sm-12 col-md-7">
                              <textarea class="summernote" id="summernote" name="event-details" required>'.$rowsEv['event_details'].'</textarea>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event Start Date</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-start-date" value="'.$rowsEv['event_startDate'].'" class="form-control datepicker" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event End Date</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-end-date" value="'.$rowsEv['event_endDate'].'" class="form-control datepicker" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Registration End Date</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-registration-date" value="'.$rowsEv['event_regEndDate'].'" class="form-control datepicker" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Event Location</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-location" value="'.$rowsEv['event_location'].'" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event Tags</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-tag" value="'.$rowsEv['event_tags'].'" class="form-control inputtags" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                              <label class="custom-switch">
                                <input type="radio" name="accept" class="custom-switch-input" required>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">I agree with terms and conditions</span>
                              </label>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                              <button class="btn btn-primary" name="event-publish">Update</button>
                            </div>
                          </div>
                        </form>

<script>
    $(document).ready(function(){
    var chk = $("#event-category-paid:checked").val();
     if(chk == "paid"){
      $("#event-price").css("visibility","visible");
     } else {
      $("#event-price").css("visibility","hidden");
     }
    });
</script>

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
    ';
    echo $return = $output;
}

?>