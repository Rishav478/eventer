<?php

$host = "localhost";
$username = "u890993276_eventer";
$password = "abc@123#XYZ";
$db = "u890993276_eventer";

// Create connection
$con = new mysqli($host, $username, $password, $db);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>