<?php
include('includes/database.php');

$success_times = '';
$success = '';
$error_times = '';
$error = '';

if (isset($_POST['forget-password'])) {
  $email = $_POST['email'];

  $token = password_hash($email, PASSWORD_BCRYPT);
  $expTime = strtotime(date('d-m-Y H:i:s'));

  $url = "http://localhost/eventer/seller/auth-reset-password.php?token=".$token;

  $check = "SELECT * from seller where email = '$email' limit 1";
  $res = mysqli_query($con,$check);
  if (mysqli_num_rows($res) == 1) {
    $update = "UPDATE seller set token = '$token', expTime = '$expTime' where email = '$email'";
    $result = mysqli_query($con,$update);
    if ($result) {
      $success = "Reset link sent successfully to your registered email address<br><a href='".$url."' target='_blank'>URL</a>";
      $success_alert= "alert alert-success alert-dismissible show fade";
      $success_times = "&times;";
    } else {
      $error = "Something went wrong";
      $alert = "alert alert-danger alert-dismissible show fade";
      $error_times = "&times;";
    }
  } else {
    $error = "Invalid email address";
    $alert = "alert alert-danger alert-dismissible show fade";
    $error_times = "&times;";
  }
}

?>
<!DOCTYPE html>
<html lang="en">


<!-- auth-forgot-password.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Eventer - Seller Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Forgot Password</h4>
              </div>
              <div class="card-body">
                <div class="<?= $success_alert ?>">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span><?= $success_times ?></span>
                    </button>
                    <?= $success ?>
                  </div>
                </div>
                <div class="<?= $alert ?>">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span><?= $error_times ?></span>
                    </button>
                    <?= $error ?>
                  </div>
                </div>
                <p class="text-muted">To reset your password mail us with your registered email address and Organization name to <a href="mailto:support@goeventer.in">support@goeventer.in</a></p>
                
                  <div class="form-group">
                    <a class="btn btn-primary btn-lg btn-block" tabindex="4" href="index.php">
                      Continue Home
                    </a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-forgot-password.html  21 Nov 2019 04:05:02 GMT -->
</html>

<?php



?>