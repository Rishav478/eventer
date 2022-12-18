<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

  $checkp = "SELECT * from aboutme where sellerId = '$id' limit 1";
  $rest = mysqli_query($con,$checkp);

  if (mysqli_num_rows($rest) == 1) {
    $fetch = mysqli_fetch_array($rest);
    $about = $fetch['about'];
  } else {
    $about = '';
  }
?>
      <!-- Main Content -->
      <div class="main-content">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add About Your Organization</h4>
                  </div>
                  <div class="card-body">
                        <form method="POST">
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add About Your Organization</label>
                            <div class="col-sm-12 col-md-7">
                              <textarea class="summernote" name="about-me" required><?= $about ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                              <button class="btn btn-primary" name="about-me-publish">Publish</button>
                            </div>
                          </div>
                        </form>
                  </div>
                </div>
              </div>
            </div>
        
      </div>
<?php include('includes/footer.php'); ?>

<?php

if (isset($_POST['about-me-publish'])) {
  $about = mysqli_real_escape_string($con,$_POST['about-me']);

  $check = "SELECT * from aboutme where sellerId = '$id' limit 1";
  $res = mysqli_query($con,$check);

  if (mysqli_num_rows($res) == 1) {
    $update = "UPDATE aboutme set about = '$about' where sellerId = '$id'";
    $result = mysqli_query($con,$update);
    if ($result) {
      echo "<script>alert('Details updated successfully');window.location.href='about-me.php';</script>";
    } else {
      //echo mysqli_error($con);
      echo "<script>alert('Details updated failed');window.location.href='about-me.php';</script>";
    }
  } else {
    $insert = "INSERT into aboutme (sellerId, about) values ('$id','$about')";
    $result = mysqli_query($con,$insert);
    if ($result) {
      echo "<script>alert('Details inserted successfully');window.location.href='about-me.php';</script>";
    } else {
      echo "<script>alert('Details inserted failed');window.location.href='about-me.php';</script>";
    }
  }

}

?>