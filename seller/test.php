<?php

/*if (isset($_POST['about-me-publish'])) {
	echo $aboutMe = $_POST['about-me'];
}

$email = 'navjot.s.ota456@gmail.com';
if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)){
	echo "Ok";
} else {
	echo "Not Ok";
}

echo date_default_timezone_set('Asia/kolkata');

$date = date('d-m-Y H:i:s');

$url = base64_encode(json_decode(json_encode('navjot.s.ota456@gmail.com')));

$urls = password_hash('navjot.s.ota456@gmail.com', PASSWORD_BCRYPT);

$pt =  strtotime($date);

echo $url."<br>".$urls."<br>".$date."<br>".$pt."<br>";

echo date('d-m-Y H:i:s',$pt);
$string_name="Mike Tyson is a boy";
$rand_no = 999999;
$username_parts = array_filter(explode(" ", strtolower($string_name))); //explode and lowercase name
$username_parts = array_slice($username_parts, 0, 2); //return only first two arry part
	
$part1 = (!empty($username_parts[0]))?substr($username_parts[0], 0,2):""; //cut first name to 8 letters
$part2 = (!empty($username_parts[1]))?substr($username_parts[1], 0,2):""; //cut second name to 5 letters
$part3 = ($rand_no)?rand(0, $rand_no):"";
		
$username = $part1. str_shuffle($part2). $part3; //str_shuffle to randomly shuffle all characters 
	
	$string_name = trim($string_name);
	
	$string_name = html_entity_decode($string_name);
    
    $string_name = strip_tags($string_name);
    
    $string_name = strtolower($string_name);
    
    $string_name = preg_replace('~[^ a-z0-9_\.]~', ' ', $string_name);
    
    $string_name = preg_replace('~ ~', '-', $string_name);
    
    $string_name = preg_replace('~-+~', '-', $string_name);

    echo $string_name;

date_default_timezone_set('Asia/kolkata');
    $oldDate = "09-02-2022";
    $oDtae = strtotime($oldDate);

    $newDate = date('d-m-Y');
    $nDate = strtotime($newDate);

    if ($nDate == $oDtae) {
    	echo 1;
    } else {
    	echo 0;
    }*/

    define('orderIds', 'ORDS-'.date('mdY').'-'.rand(0000,999999));

    echo orderIds;


?>