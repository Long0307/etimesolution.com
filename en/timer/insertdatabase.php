<?php

require_once("../databaseAndModel/connectdatabase.php");

ob_start();

session_start();

if(isset($_GET['removeTimer'])){

	if(isset($_SESSION['timeandbegin'])){	

			$name = trim($_SESSION['timeandbegin'][1]);

			$start = $_SESSION['timeandbegin'][2];

			$stop = $_SESSION['timeandbegin'][3];

			$addressIP = $_SESSION['timeandbegin'][0];

			$timer = $_SESSION['timeandbegin'][5];

			$check = "SELECT * FROM `timer` WHERE timer.name = '$name'";
			$result = $conn->query($check);

		    if ($result->num_rows == 0) {

		    	$sql = "INSERT INTO `timer`(addressIP,name,start,stop,timer) 
				VALUES ('".$addressIP."', '".$name."', '".$start."', '".$stop."', '".$timer."' )";  

				if(mysqli_query($conn, $sql)){  

				 	echo "Record inserted successfully";  

				}else{  

					echo "Could not insert record: ". mysqli_error($conn);  

				}  
				unset($_SESSION['settedTime']);
				echo "xoá thành công";

            }  else {

            	unset($_SESSION['settedTime']);
				echo "xoá thành công";
            }


			// if(mysqli_query($conn, $check)){  

			// 	while () {
			// 		// code...
			// 	}

			// 	// unset($_SESSION['settedTime']);
			// 	// echo "xoá thành công";

			// }else{  

			// 	$sql = "INSERT INTO `timer`(addressIP,name,start,stop,timer) 
			// 	VALUES ('".$addressIP."', '".$name."', '".$start."', '".$stop."', '".$timer."' )";  

			// 	if(mysqli_query($conn, $sql)){  

			// 	 	echo "Record inserted successfully";  

			// 	}else{  

			// 		echo "Could not insert record: ". mysqli_error($conn);  

			// 	}  
			// 	unset($_SESSION['settedTime']);
			// 	echo "xoá thành công";

			// }  

	}else{
		echo "Không có gì để xoá cả";
	}
}

?>