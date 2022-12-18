<?php

session_start();

unset($_SESSION['id']);
unset($_SESSION['LAST_LOGIN']);
unset($_SESSION['LAST_ACTIVE_LOGIN']);

header('location: index.php');


?>