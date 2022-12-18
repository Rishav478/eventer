<?php

if (isset($_POST['type']) && $_POST['type'] == 'ajaxs') {
	
	$currentTime = date('H : i : s');
	return $currentTime;

} else {

	$currentTime = date('H : i : s');
	return $currentTime;

}

?>