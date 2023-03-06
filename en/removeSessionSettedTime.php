<?php

require_once("databaseAndModel/connectdatabase.php");

ob_start();

session_start();

if(isset($_GET['removeSession'])){

	if(isset($_SESSION['settedTime'])){	

			// unset($_SESSION['settedTime']);
		// echo "xoá thành công";		

		if(isset($_SESSION['nameAddress'])){

			$name = $_SESSION['settedTime'][3];

			$start = $_SESSION['nameAddress'][5];

			$stop = $_SESSION['settedTime'][0].":".$_SESSION['settedTime'][1].":"."00";

			$addressIP = gethostbyname(trim(exec("hostname")));

			$sql = "INSERT INTO `onlinealarm`(addressIP,name,start,stop) 
			VALUES ('".$addressIP."', '".$name."', '".$start."', '".$stop."' )";  

			if(mysqli_query($conn, $sql)){  

			 	echo "Record inserted successfully";  

			}else{  

				echo "Could not insert record: ". mysqli_error($conn);  

			}  
			unset($_SESSION['settedTime']);
			echo "xoá thành công";
		}

		unset($_SESSION['settedTime']);
		echo "xoá thành công";

	}else{
		echo "Không có gì để xoá cả";
	}
}

?>