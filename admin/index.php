<?php
include('includes/database.php');
session_start();

if (isset($_SESSION['aid'])) {
  echo "<script>window.location.href='dashboard.php'</script>";
}

$success_times = "";
$success = "";
$error_times = "";
$error = "";

?>
<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Eventer - Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
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
                <h4>Login</h4>
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
                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.php" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="btn-login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
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


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>

<?php

if (isset($_POST['btn-login'])) {

  $email = $_POST['email'];
  $password = md5($_POST['password']);

    $sql = "SELECT * from admin where email = '$email' and password = '$password' limit 1";
    $result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {

      $rows = mysqli_fetch_array($result);
      $aId = $rows['aId'];
      $name = $rows['name'];
      $date = date('d-M-Y H:i:s');
      $_SESSION['aid'] = $rows['aId'];;
      $_SESSION['aname'] = $rows['name'];
      $_SESSION['LAST_LOGIN'] = date('d-M-Y H:i:s');
      $_SESSION['LAST_ACTIVE_LOGIN'] = time();
      echo "<script>window.location.href='dashboard.php';</script>";
      
    } else {
      echo "<script>alert('Something went wrong!');window.location.href='index.php';</script>";
    }

}

?>