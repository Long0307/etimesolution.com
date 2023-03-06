<?php

if(isset($_GET['TotalSecondsCurrently']) && isset($_GET['totalSeconds'])) {

    $TotalSecondsCurrently = (int)$_GET['TotalSecondsCurrently'];
    $totalSeconds = (int)$_GET['totalSeconds'];

    

    try {
        
        $a = $TotalSecondsCurrently / $totalSeconds;

        $percent = $a * 100;

        echo round($percent);

    }
    catch(ErrorException $e){
        echo "got $e";
    }

}

?>