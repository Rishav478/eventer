<?php
include('includes/database.php');
?>
<!DOCTYPE html>
<html lang="en">


<!-- auth-reset-password.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
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
                <h4>Reset Password</h4>
              </div>
              <div class="card-body">
              <?php
              $error_times = '';
              $error = '';

              if (isset($_GET['token'])) {
                $token = $_GET['token'];

                $currentTime = strtotime(date('d-m-Y H:i:s'));

                $fetch = "SELECT * from seller where token = '$token' limit 1";
                $res = mysqli_query($con,$fetch);
                if (mysqli_num_rows($res) == 1) {
                  $getData = mysqli_fetch_array($res);
                  $email = $getData['email'];
                  $expTime = $getData['expTime'];
                  if (($currentTime-$expTime)>300) {
                    echo '
                    <div class="alert alert-danger show fade">
                      <div class="alert-body text-center">
                        <b>Reset Link Expired</b>
                      </div><br>
                      <center><a href="index.php" class="btn btn-outline-primary">Go Home</a></center>
                    </div>
                    ';
                  } else {
              ?>
                <p class="text-muted">Enter Your New Password</p>
                <form method="POST">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?= $email ?>" tabindex="1" required  readonly>
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                      name="password" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password"
                      tabindex="2" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="reset" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>
                <?php

                  }

                } else {
                  echo '
                    <div class="alert alert-danger show fade">
                      <div class="alert-body text-center">
                        <b>Reset Link Invalid</b>
                      </div><br>
                      <center><a href="index.php" class="btn btn-outline-primary">Go Home</a></center>
                    </div>
                    ';
                } 
              }
              ?>
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


<!-- auth-reset-password.html  21 Nov 2019 04:05:02 GMT -->
</html>

<?php

if (isset($_POST['reset'])) {
  $password = md5($_POST['password']);
  $confirmPassword = md5($_POST['confirm-password']);

  if ($password == $confirmPassword) {
    $update = "UPDATE seller set password = '$password', token = NULL, expTime = NULL where email = '$email'";
    $result = mysqli_query($con,$update);
    if ($result) {
      echo "<script>alert('Password changed successfully');window.location.href='logout.php';</script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again');</script>";
    }
  } else {
    echo "<script>alert('Password & Confirm Password must be same');</script>";
  }
}

?>