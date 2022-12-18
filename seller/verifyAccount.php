<?php
include('includes/database.php');
if(isset($_GET['access-token'])){
    if(empty($_GET['access-token'])){
        header('location: https://goeventer.in/seller/');
    } else {
        $token = $_GET['access-token'];
        
        $sql = "SELECT * from seller where token = '$token' limit 1";
        $res = mysqli_query($con,$sql);
        $count = mysqli_num_rows($res);
        if($count == 1){
          //echo $count;
          $update = "UPDATE seller set token = '', verificationStatus = 1 where token = '$token'";
          $res1 = mysqli_query($con,$update);
           echo "<script>alert('Accont verified successfully.');window.location.href='https://goeventer.in/seller/';</script>";
        } else {
           // echo $count;
         echo "<script>alert('Something went wrong. Please try again.');window.location.href='https://goeventer.in/seller/';</script>";
        }
        
        
    }
} else {
    header('location: https://goeventer.in/seller/');  
}
?>