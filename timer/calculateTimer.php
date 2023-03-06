<?php

if((isset($_GET['hour']) && isset($_GET['minute'])) 
	|| isset($_GET['soundName']) || isset($_GET['titleAlarm'])){


	if($_GET['titleAlarm'] == "haha"){

		$title = "Alarm".rand(999999999, 9999999999);

	}else{

		$title = $_GET['titleAlarm'];

	}

	$hour = $_GET['hour'];

	$minute = $_GET['minute'];

	$soundName = $_GET['soundName'];

	if($hour <= 9){

		$hour = "0".$hour;

	} 

	if(strlen($minute) < 2){

		$minute = "0".$minute;

	}else{

		$minute = $minute;

	}

	ob_start();

	session_start();

	$_SESSION['settedTime'] = [$hour,$minute,$soundName,$title];

	echo $hour."+".$minute;

} 
?>


