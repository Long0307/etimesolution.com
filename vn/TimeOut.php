<?php

if(isset($_GET['timeout']) && isset($_GET['timeCurrently'])){

		// number 1
	$number1 = $_GET['timeCurrently'];
	$number2 = $_GET['timeout'];

	// echo "Đây là time left";

		// Tình giờ còn lại
		// Trường hợp thứ nhất number 2 > number 1

		// Tách thành giờ và phút để trừ

	$array1 = explode(":", $number1);
	$array2 = explode(":", $number2);

	$splitArray1 = explode(" ",$array1[2]);

	$hour1 = (int)$array1[0];
	$minute1 = (int)$array1[1];
	$seconds1 = (int)$splitArray1[0];
		//=======================================

	$hour2 = (int)$array2[0];
	$minute2 = (int)$array2[1];
	$seconds2 = (int)$array2[2];


	if(($hour2 > $hour1) && ($minute2 > $minute1) && ($seconds2 < $seconds1)){

			// Biển đổi giây

		$minute2bd = $minute2 - 1;

		$seconds2bd = $seconds2 + 60;

			//============================= 

		$hourExactly = $hour2 - $hour1;

		$minuteExactly = $minute2bd - $minute1;

		$secondExactly = $seconds2bd - $seconds1;

		if($hourExactly <= 9){

			$hourExactly = "0".$hourExactly;

		} 

		if($minuteExactly <= 9){

			$minuteExactly = "0".$minuteExactly;

		}

		if($secondExactly <= 9){

			$secondExactly = "0".$secondExactly;

		}

		echo $hourExactly.":".$minuteExactly.":".$secondExactly;

		// print_r($result);

	} else if(($hour2 > $hour1) && ($minute2 < $minute1) && ($seconds2 < $seconds1)){

		$hour2bd = $hour2 - 1;

		$minute2bd = $minute2 - 1;

		$minute2bd = $minute2bd + 60;

		$seconds2bd = $seconds2 + 60;

			//============================= 

		$hourExactly = $hour2 - $hour1;

		$minuteExactly = $minute2bd - $minute1;

		$secondExactly = $seconds2bd - $seconds1;

		if($hourExactly <= 9){

			$hourExactly = "0".$hourExactly;

		} 

		if($minuteExactly <= 9){

			$minuteExactly = "0".$minuteExactly;

		}

		if($secondExactly <= 9){

			$secondExactly = "0".$secondExactly;

		}

		echo $hourExactly.":".$minuteExactly.":".$secondExactly;

	} else if (($hour2 < $hour1) && ($minute2 < $minute1) && ($seconds2 < $seconds1)){

			// ======================================

		if ($minute2 < $minute1) {

			$hourExactly = $hour2 + 24;

			$hourExactlybd = $hourExactly - 1;

			$hourExactlybdOnceAgain = $hourExactlybd - $hour1;

			$minute2bd = $minute2 - 1;

			$minuteExactly = ($minute2bd + 60) - $minute1;

			$secondExactly = ($seconds2 + 60) - $seconds1;

			if($hourExactlybdOnceAgain <= 9){

				$hourExactlybdOnceAgain = "0".$hourExactlybdOnceAgain;

			} 

			if($minuteExactly <= 9){

				$minuteExactly = "0".$minuteExactly;

			}

			if($secondExactly <= 9){

				$secondExactly = "0".$secondExactly;

			}

			echo $hourExactlybdOnceAgain.":".$minuteExactly.":".$secondExactly;

		} else if ($minute2 > $minute1){

			// trường hợp mà lớn hơn rồi thì chỉ việc lo cho thằng giây thôi

			$hourExactly = $hour2 + 24;

			// ======================================

			if ($minute2 < $minute1) {

				$hourExactlybdOnceAgain = $hourExactly - $hour1;

				$minute2bd = $minute2 - 1;

				$minuteExactly = $minute2bd - $minute1;

				$secondExactly = ($seconds2 + 60) - $seconds1;

				if($hourExactlybdOnceAgain <= 9){

					$hourExactlybdOnceAgain = "0".$hourExactlybdOnceAgain;

				} 

				if($minuteExactly <= 9){

					$minuteExactly = "0".$minuteExactly;

				}

				if($secondExactly <= 9){

					$secondExactly = "0".$secondExactly;

				}

				echo $hourExactlybdOnceAgain.":".$minuteExactly.":".$secondExactly;

			}
		}
	} else if (($hour2 < $hour1) && ($minute2 > $minute1) && ($seconds2 < $seconds1)){

		$hourExactly = $hour2 + 24;

		$hourExactlybdOnceAgain = $hourExactly - $hour1;

		$minute2bd = $minute2 - 1;

		$minuteExactly = $minute2bd - $minute1;

		$secondExactly = ($seconds2 + 60) - $seconds1;

		if($hourExactlybdOnceAgain <= 9){

			$hourExactlybdOnceAgain = "0".$hourExactlybdOnceAgain;

		} 

		if($minuteExactly <= 9){

			$minuteExactly = "0".$minuteExactly;

		}

		if($secondExactly <= 9){

			$secondExactly = "0".$secondExactly;

		}

		echo $hourExactlybdOnceAgain.":".$minuteExactly.":".$secondExactly;

	}else if($hour2 == $hour1){

		if($minute2 > $minute1){

			$hourExactlybdOnceAgain = $hour2 - $hour1;

			$minute2bd = $minute2 - 1;

			$minuteExactly = $minute2bd - $minute1;

			$secondExactly = ($seconds2 + 60) - $seconds1;

			if($hourExactlybdOnceAgain <= 9){

				$hourExactlybdOnceAgain = "0".$hourExactlybdOnceAgain;

			} 

			if($minuteExactly <= 9){

				$minuteExactly = "0".$minuteExactly;

			}

			if($secondExactly <= 9){

				$secondExactly = "0".$secondExactly;

			}

			echo $hourExactlybdOnceAgain.":".$minuteExactly.":".$secondExactly;

		} else if($minute2 == $minute1){

			$hourExactly = $hour2 + 24;

			$hourExactlybd = $hourExactly - 1;

			$hourExactlybdOnceAgain = $hourExactlybd - $hour1;

			$minute2bd = $minute2 - 1;

			$minuteExactly = ($minute2bd + 60) - $minute1;

			$secondExactly = ($seconds2 + 60) - $seconds1;

			if($hourExactlybdOnceAgain <= 9){

				$hourExactlybdOnceAgain = "0".$hourExactlybdOnceAgain;

			} 

			if($minuteExactly <= 9){

				$minuteExactly = "0".$minuteExactly;

			}

			if($secondExactly <= 9){

				$secondExactly = "0".$secondExactly;

			}

			echo $hourExactlybdOnceAgain.":".$minuteExactly.":".$secondExactly;

		} else if ($minute2 < $minute1) {
			
			$hourExactly = $hour2 + 24;

			$hourExactlybd = $hourExactly - 1;

			$hourExactlybdOnceAgain = $hourExactlybd - $hour1;

			$minute2bd = $minute2 - 1;

			$minuteExactly = ($minute2bd + 60) - $minute1;

			$secondExactly = ($seconds2 + 60) - $seconds1;

			if($hourExactlybdOnceAgain <= 9){

				$hourExactlybdOnceAgain = "0".$hourExactlybdOnceAgain;

			} 

			if($minuteExactly <= 9){

				$minuteExactly = "0".$minuteExactly;

			}

			if($secondExactly <= 9){

				$secondExactly = "0".$secondExactly;

			}

			echo $hourExactlybdOnceAgain.":".$minuteExactly.":".$secondExactly;

		}

	}

}

?>