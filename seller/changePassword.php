<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$sellerName = $_SESSION['name'];
$sellerEmail = $_SESSION['email'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];
?>
      <!-- Main Content -->
      <div class="main-content">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Change Password</h4>
                  </div>
                  <div class="card-body">
                        <form method="POST">
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Enter New Password</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="password" name="cPassword" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                              <button class="btn btn-primary" name="account-publish">Change Password</button>
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

if (isset($_POST['account-publish'])) {
  $password = md5($_POST['cPassword']);

  $accInsert = "UPDATE seller set password = '$password' where email = '$sellerEmail'";
  $accInsert = mysqli_query($con,$accInsert);
  if ($accInsert) {
    echo "<script>alert('Password changed successfully. Please relogin.');window.location.href='logout.php'</script>";
  } else {
    echo "<script>alert('Something went wrong.');window.location.href='dashboard.php'</script>";
  }
}

?>