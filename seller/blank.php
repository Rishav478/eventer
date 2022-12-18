<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

?>
      <!-- Main Content -->
      <div class="main-content">
        
      </div>
<?php include('includes/footer.php'); ?>