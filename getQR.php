<?php
include('includes/database.php');
$output  = '';
if(isset($_POST['checking_qrBtn'])){
    
  $orderId = $_POST['orderId'];
    
    $output = '
        <center><img src="https://chart.googleapis.com/chart?cht=qr&chl='.$orderId.'&chs=280x280" /></center>
    ';
    echo $return = $output;
}

?>