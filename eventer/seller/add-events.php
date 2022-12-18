<?php 
include('includes/autoload.php'); 

date_default_timezone_set('Asia/kolkata');

require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];
include('check.php');

$error = '';
$alert = '';
$error_times = '';

?>
      <!-- Main Content -->
      <div class="main-content">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Event</h4>
                  </div>
                  <div class="card-body">
                    <div class="<?= $alert ?>">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span><?= $error_times ?></span>
                        </button>
                        <?= $error ?>
                      </div>
                    </div>
                        <form method="POST" enctype="multipart/form-data">
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Event Title</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-name" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                              <label class="custom-switch">
                                <input type="radio" onclick="javascript:Check();" name="event-category" id="event-category-paid" value="paid" class="custom-switch-input" required>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Paid</span>
                              </label>
                              <label class="custom-switch">
                                <input type="radio" onclick="javascript:Check();" name="event-category" id="event-category-free" value="free" class="custom-switch-input" required>
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
                                    <input type="number" name="event-price" class="form-control currency">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Event Details</label>
                            <div class="col-sm-12 col-md-7">
                              <textarea class="summernote" name="event-details" required></textarea>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event Start Date</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-start-date" class="form-control datepicker" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event End Date</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-end-date" class="form-control datepicker" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Registration End Date</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-registration-date" class="form-control datepicker" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event Banner</label>
                            <div class="col-sm-12 col-md-7">
                              <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose Banner</label>
                                <input type="file" name="banner" id="image-upload" required/>
                              </div>
                              <p class="text-danger">Image must be less then 5 mb..!</p>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Event Location</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-location" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event Tags</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="event-tag" class="form-control inputtags" required>
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
                              <button class="btn btn-primary" name="event-publish">Publish</button>
                            </div>
                          </div>
                        </form>
                  </div>
                </div>
              </div>
            </div>

      </div>

<script type="text/javascript">
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

  $event_name = mysqli_real_escape_string($con,$_POST['event-name']);
  $event_category = mysqli_real_escape_string($con,$_POST['event-category']);
  $event_price = mysqli_real_escape_string($con,$_POST['event-price']);
  $event_details = mysqli_real_escape_string($con,$_POST['event-details']);
  $event_startDate = mysqli_real_escape_string($con,$_POST['event-start-date']);
  $event_endDate = mysqli_real_escape_string($con,$_POST['event-end-date']);
  $event_regEndDate = mysqli_real_escape_string($con,$_POST['event-registration-date']);
  $event_banner = $_FILES['banner']['name'];
  $event_location = mysqli_real_escape_string($con,$_POST['event-location']);
  $event_tags = mysqli_real_escape_string($con,$_POST['event-tag']);

  if (empty($event_price)) {
    $event_price = 0;
  }

  if (empty($event_name) || empty($event_category) || empty($event_details) || empty($event_startDate) || empty($event_endDate) || empty($event_regEndDate) || empty($event_banner) || empty($event_location) || empty($event_tags)) {

    $error = "All field must be filled properly";
    $alert = "alert alert-danger alert-dismissible show fade";
    $error_times = "&times;";
  } else {

    $event_name_url = trim($event_name);
  
    $event_name_url = html_entity_decode($event_name_url);
    
    $event_name_url = strip_tags($event_name_url);
    
    $event_name_url = strtolower($event_name_url);
    
    $event_name_url = preg_replace('~[^ a-z0-9_\.]~', ' ', $event_name_url);
    
    $event_name_url = preg_replace('~ ~', '-', $event_name_url);
    
    $event_name_url = preg_replace('~-+~', '-', $event_name_url);

    $fetchLink = "SELECT * from event where paralLink = '$event_name_url' limit 1";
    $linkRes = mysqli_query($con,$fetchLink);
    if (($count = mysqli_num_rows($linkRes)) == 1) {
      $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      // Output: 54esmdr0qf
      $event_name_url = $event_name_url ."-". substr(str_shuffle($permitted_chars), 0, 10);
    } else {
      $event_name_url = $event_name_url;
    }

    $fileName = $_FILES['banner']['name'];
    $fileTmpName = $_FILES['banner']['tmp_name'];

    $fileSize = $_FILES['banner']['size'];

    $fileError = $_FILES['banner']['error'];
    $fileType = $_FILES['banner']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png', 'jpg', 'jpeg');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 5000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'assets/uploads/event-banner/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $insert = "INSERT into event (event_name,event_category,event_price,event_details,event_startDate,event_endDate,event_regEndDate,event_banner,event_location,event_tags,paralLink,sellerId) values ('$event_name','$event_category','$event_price','$event_details','$event_startDate','$event_endDate','$event_regEndDate','$fileNameNew','$event_location','$event_tags','$event_name_url','$id')";
          $result = mysqli_query($con,$insert);
          if($result) {
            echo "<script>alert('Event published successfully.');window.location.href='add-events.php'</script>";
          } else {

            $error = "Something went wrong";
            $alert = "alert alert-danger alert-dismissible show fade";
            $error_times = "&times;";

          }
          
        } else {
          $error = "File size is too high";
          $alert = "alert alert-danger alert-dismissible show fade";
          $error_times = "&times;";
        }
      } else {
        $error = "Error. Something went wrong";
        $alert = "alert alert-danger alert-dismissible show fade";
        $error_times = "&times;";
      }
    } else {
      $error = "You can only upload PNG, JPG or JPEG files!";
      $alert = "alert alert-danger alert-dismissible show fade";
      $error_times = "&times;";
    }
  }
}

?>