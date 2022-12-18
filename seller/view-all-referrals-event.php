<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

if (isset($_GET['name'])) {
      if (empty($_GET['name'])) {
            echo "<script>window.location.href='view-events.php';</script>";
      } else {
            $paralLink = $_GET['name'];
      }
} else {
      echo "<script>window.location.href='view-events.php';</script>";
}

?>
      <!-- Main Content -->
      <div class="main-content">
            <section class="section">
                  <div class="section-body">

                        <div class="row mt-4">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-header">
                                <h4>All Referrals</h4>
                              </div>
                              <div class="card-body">
                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                  <table class="table table-striped">
                                    <tr></th>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Referral Code</th>
                                      <th>Total Referrals</th>
                                    </tr>
<?php
$fetchEvent = "SELECT * from referrals where sellerId = '$id' order by refId desc";
$resEvent = mysqli_query($con,$fetchEvent);
while ($rowsEv = mysqli_fetch_array($resEvent)) {
  $referralCode = $rowsEv['promoCode'];
  $counts = "SELECT * from eventregistration WHERE paramLink = '$paralLink' and referral = '$referralCode'";
  $rpvp = mysqli_query($con,$counts);
  $count = mysqli_num_rows($rpvp);
?>
                                    <tr>
                                      <td>#</td>
                                      <td><?= strtoupper($rowsEv['name']) ?></td>
                                      <td><?= $rowsEv['email'] ?></td>
                                      <td><?= $rowsEv['promoCode'] ?></td>
                                      <td><b><?= $count ?></b></td>
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

<script type="text/javascript">
  function restricted(){
    alert('You cannot delete refferals once added.');
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