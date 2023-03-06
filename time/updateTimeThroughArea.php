<?php

  if(isset($_GET['currentTime'])){

      $currentTime = $_GET['currentTime'];

      $time = explode(", ", $currentTime);

      date_default_timezone_set($time[0]."/".$time[1]);

      $time = time();
      $datetimeinfo = getdate($time);

      if($datetimeinfo['hours'] < 12){
          $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes'].":".$datetimeinfo['seconds']." AM";
      }else{
          $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes'].":".$datetimeinfo['seconds']." PM";
      }

      echo $currentTime."+".$runningTime."+".date("l, F d, Y", time());

    }

?>