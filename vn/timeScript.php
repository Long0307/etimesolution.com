<?php

    $CountryName = "";
    $CityName = "";
    $Latitude = "";
    $Longitude = "";
    $CurrencyCode = "";

    $nameAddress = "";

    ob_start();

    session_start();

    $currentDate = new DateTime();

    $time = time();
    $datetimeinfo = getdate($time);

    if($datetimeinfo['hours'] < 12){
        $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes'].":".$datetimeinfo['seconds']." AM";
    }else{
        $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes'].":".$datetimeinfo['seconds']." PM";
    }

    echo $CountryName."+".$runningTime."+".$currentDate->format('Y-m-d');

    $_SESSION['nameAddress'] = [$CountryName,$CityName,$Latitude,$Longitude,$CurrencyCode,$runningTime];

?>