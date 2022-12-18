<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php

include('includes/database.php');
session_start();
date_default_timezone_set('Asia/kolkata');
$id = $_SESSION['id'];
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

//$hint = "";
// lookup all hints from array if $q is different from ""
if ($q !="") {
  /*$q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }*/
$result=mysqli_query($con,"SELECT * FROM eventregistration WHERE orderId='$q' and sellerId='$id'");
$rowcount=mysqli_num_rows($result);
if($rowcount==1){
$ret=mysqli_query($con,"UPDATE eventregistration set status=1 where orderId='$q'");
  if($ret)
  {
    //echo $id;
    echo '<div class="alert alert-success" id="classname" style="color: #fff;"><strong>Approved!</strong> Ticket successfully accepted.<br>'.date('l jS \of F Y h:i:s A').'</div>';
    echo "
    <script>
        setTimeout(function(){document.getElementById('classname').style.display='none';},5000);
    </script>
    ";
  } else {
    
  }
}else{
//echo 'employee is already registered';  
    echo '<div class="alert alert-danger" id="classname" style="color: #fff;"><strong>Failed!</strong> You are not authorised to approve the ticket.</div>';
    echo "
    <script>
        setTimeout(function(){document.getElementById('classname').style.display='none';},5000);
    </script>
    ";
  }

}

// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
?>