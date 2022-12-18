<?php

session_start();

unset($_SESSION['uId']);
unset($_SESSION['email']);
unset($_SESSION['name']);

header('location: my-account.php');

?>