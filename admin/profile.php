<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

$fetch = "SELECT * from seller where id = '$id'";
$res = mysqli_query($con,$fetch);
$get = mysqli_fetch_array($res);

  $checkp = "SELECT * from sellerbio where sellerId = '$id' limit 1";
  $rest = mysqli_query($con,$checkp);

  if (mysqli_num_rows($rest) == 1) {
    $fetch = mysqli_fetch_array($rest);
    $bio = $fetch['bio'];
  } else {
    $bio = '';
  }

?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
<?php
  if ($profile == NULL) {
?>
                      <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row mb-4">
                          <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview">
                              <label for="image-upload" id="image-label" style="color: black;">Choose Organization Picture</label>
                              <input type="file" name="profilePicture" id="image-upload" />
                            </div>
                            <p class="text-danger">Image must be less then 5 mb..!</p>
                            <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary" name="uploadPicture">Upload</button>
                          </div>
                          </div>
                        </div>
                      </form>
<?php
} else {
?>
                      <img alt="image" src="assets/uploads/org-image/<?= $profile ?>" class=" author-box-picture" width="360px">
<?php } ?>
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?= $_SESSION['name'] ?></a>
                      </div>
                      <div class="author-box-job">Web Developer</div>
                    </div>
                    <div class="text-center">
                      <div class="author-box-description">
                        <p>
                          <?= $bio ?>
                        </p>
                      </div>
                      <div class="w-100 d-sm-none"></div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                          30-05-1998
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          +91-<?= $get['mobile'] ?>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          <?= $get['email'] ?>
                        </span>
                      </p>
                      <!--p class="clearfix">
                        <span class="float-left">
                          Facebook
                        </span>
                        <span class="float-right text-muted">
                          <a href="#">John Deo</a>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Twitter
                        </span>
                        <span class="float-right text-muted">
                          <a href="#">@johndeo</a>
                        </span>
                      </p-->
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Skills</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Java</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-primary" data-width="70%"></div>
                          </div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Web Design</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-warning" data-width="80%"></div>
                          </div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Photoshop</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-green" data-width="48%"></div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Setting</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="col-md-3 col-6 b-r">
                            <strong>Full Name</strong>
                            <br>
                            <p class="text-muted"><?= $_SESSION['name'] ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">+91-<?= $get['mobile'] ?></p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?= $get['email'] ?></p>
                          </div>
                          <div class="col-md-3 col-6">
                            <strong>Location</strong>
                            <br>
                            <p class="text-muted">India</p>
                          </div>
                        </div>
                        <?php

                        $getAboutMe = "SELECT * from aboutme where sellerId = '$id' limit 1";
                        $resAboutMe = mysqli_query($con,$getAboutMe);
                        while ($printAboutMe = mysqli_fetch_array($resAboutMe)) {
                          echo $printAboutMe['about'];
                        }

                        ?>
                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="post" class="needs-validation">
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Bio</label>
                                <textarea
                                  class="form-control summernote-simple" name="bio"><?= $bio ?></textarea>
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group mb-0 col-12">
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                                  <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                                  <div class="text-muted form-text">
                                    You will get new information about products, offers and promotions
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary" name="updateBio">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>


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
  <script src="assets/bundles/prism/prism.js"></script>
</body>


<!-- forms-editor.html  21 Nov 2019 03:55:16 GMT -->
</html>

<?php

if (isset($_POST['uploadPicture'])) {
    $fileName = $_FILES['profilePicture']['name'];
    $fileTmpName = $_FILES['profilePicture']['tmp_name'];

    $fileSize = $_FILES['profilePicture']['size'];

    $fileError = $_FILES['profilePicture']['error'];
    $fileType = $_FILES['profilePicture']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png', 'jpg', 'jpeg');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 5000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'assets/uploads/org-image/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $updateProfile = "UPDATE seller set profile = '$fileNameNew' where id = '$id'";
          $resultProfile = mysqli_query($con,$updateProfile);
          if($resultProfile) {
            echo "<script>alert('Profile Picture uploaded successfully.');window.location.href='profile.php'</script>";
          } else {

            echo "<script>alert('Something went wrong.');window.location.href='profile.php'</script>";

          }
          
        } else {
          echo "<script>alert('File size too high.');window.location.href='profile.php'</script>";
        }
      } else {
        echo "<script>alert('Something went wrong.');window.location.href='profile.php'</script>";
      }
    } else {
      echo "<script>alert('You can only upload PNG, JPG & JPEG format file.');window.location.href='profile.php'</script>";
    }
}


if (isset($_POST['updateBio'])) {
  $bio = $_POST['bio'];

  $sellerId = $id;

  $check = "SELECT * from sellerbio where sellerId = '$sellerId' limit 1";
  $res = mysqli_query($con,$check);

  if (mysqli_num_rows($res) == 1) {
    $update = "UPDATE sellerbio set bio = '$bio' where sellerId = '$sellerId'";
    $result = mysqli_query($con,$update);
    if ($result) {
      echo "<script>alert('Details updated successfully');window.location.href='profile.php';</script>";
    } else {
      //echo mysqli_error($con);
      echo "<script>alert('Details updated failed');window.location.href='profile.php';</script>";
    }
  } else {
    $insert = "INSERT into sellerbio (sellerId, bio) values ('$id','$bio')";
    $result = mysqli_query($con,$insert);
    if ($result) {
      echo "<script>alert('Details inserted successfully');window.location.href='profile.php';</script>";
    } else {
      echo "<script>alert('Details inserted failed');window.location.href='profile.php';</script>";
    }
  }
}

?>