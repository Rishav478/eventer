<?php

session_start();

unset($_SESSION['aid']);
unset($_SESSION['aname']);
unset($_SESSION['aLAST_LOGIN']);
unset($_SESSION['aLAST_ACTIVE_LOGIN']);

header('location: index.php');


?>