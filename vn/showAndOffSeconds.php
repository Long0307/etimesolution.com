<?php

    if(isset($_GET['showAndOff'])){
        $seconds = $_GET['showAndOff'];

        if($seconds == "show"){

            $currentDate = new DateTime();

            $time = time();
            $datetimeinfo = getdate($time);

            $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes'].":".$datetimeinfo['seconds'];

            echo $runningTime;

        } else if ($seconds == "hide"){

            $currentDate = new DateTime();

            $time = time();
            $datetimeinfo = getdate($time);

            $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes'];

            echo $runningTime;

        }
    }

?>