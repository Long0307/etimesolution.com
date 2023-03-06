<?php

$ip = $_SERVER["REMOTE_ADDR"];

if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
    $ip = $_SERVER['HTTP_CLIENT_IP'];

$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip));


if(isset($ipdat)){
    $CountryName = $ipdat->geoplugin_countryName;
    $CityName = $ipdat->geoplugin_city;
    $Latitude = $ipdat->geoplugin_latitude;
    $Longitude = $ipdat->geoplugin_longitude;
    $CurrencyCode = $ipdat->geoplugin_currencyCode;

    $nameAddress = $CountryName."+".$CityName."+".$Latitude."+".$Longitude."+".$CurrencyCode;

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

    echo $ipdat->geoplugin_countryName."+".$runningTime."+".$datetimeinfo['weekday']." - ".$datetimeinfo['month']." ".$datetimeinfo['mday'].". ".$datetimeinfo['year'];

    $_SESSION['nameAddress'] = [$CountryName,$CityName,$Latitude,$Longitude,$CurrencyCode,$runningTime];
}else{

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

    echo $CountryName."+".$runningTime."+".$datetimeinfo['weekday']." - ".$datetimeinfo['month']." ".$datetimeinfo['mday'].". ".$datetimeinfo['year'];;

    $_SESSION['nameAddress'] = [$CountryName,$CityName,$Latitude,$Longitude,$CurrencyCode,$runningTime];
}



?>