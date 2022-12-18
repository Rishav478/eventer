<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

?>
      <!-- Main Content -->
      <div class="main-content">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New Employee</h4>
                  </div>
                  <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="form-group col-6">
                                  <label for="frist_name">Name</label>
                                  <input id="frist_name" type="text" class="form-control" name="name" autofocus>
                                </div>
                                <div class="form-group col-6">
                                  <label for="last_name">Email</label>
                                  <input id="last_name" type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                  <label for="frist_name">Moile</label>
                                  <input id="frist_name" type="text" class="form-control" name="mobile" autofocus>
                                </div>
                                <div class="form-group col-6">
                                  <label for="last_name">Email</label>
                                  <input id="last_name" type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                  <label for="frist_name">Name</label>
                                  <input id="frist_name" type="text" class="form-control" name="name" autofocus>
                                </div>
                                <div class="form-group col-6">
                                  <label for="last_name">Email</label>
                                  <input id="last_name" type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                  <button class="btn btn-primary" name="referral-publish">Create</button>
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

if (isset($_POST['referral-publish'])) {
  $firstName = strtolower($_POST['first-name']);
  $lastName = strtolower($_POST['last-name']);
  $email = $_POST['email'];

  $string_name=$firstName." ".$lastName;
  $rand_no = 999999;
    
  $part1 = substr($firstName, 0,2); //cut first name to 8 letters
  $part2 = substr($lastName, 0,2); //cut second name to 5 letters
  $part3 = ($rand_no)?rand(0, $rand_no):"";
  $str = "Admin";
  $part0 = substr(strtolower($str), 0,2);
      
  $code = $part0. $part1. str_shuffle($part2). $part3; //str_shuffle to randomly shuffle all characters 

  $refInsert = "INSERT into adminrefferals (name, email, promocode) values ('$string_name','$email','$code')";
  $resInsert = mysqli_query($con,$refInsert);
  if ($resInsert) {
    echo "<script>alert('Referral code created successfully.');window.location.href='add-referrals.php'</script>";
  } else {
    echo "<script>alert('Referral code creation failed.');window.location.href='add-referrals.php'</script>";
  }
}

?>