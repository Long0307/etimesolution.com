<?php
	ob_start();
	session_start();

	if(isset($_GET['checkdata'])){
		if(isset($_SESSION['settedTime'])){
			echo $_SESSION['settedTime'][0]."+".$_SESSION['settedTime'][1];
		}else{
			echo "Khong tim thay session";
		}
	}
	
?>