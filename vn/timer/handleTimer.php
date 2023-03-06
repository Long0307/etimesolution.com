<?php

if(isset($_GET['hour']) && isset($_GET['minute']) && isset($_GET['seconds']) 
&& isset($_GET['sounds']) && isset($_GET['title'])){

    $hour = $_GET['hour'];

    $minute = $_GET['minute'];

    $seconds = $_GET['seconds']; 

    $sounds = $_GET['sounds']; 
    
    $title = $_GET['title'];
    
    if($title == "Timer"){
        $name = $title.rand(999999999, 9999999999);
    }else{
        $name = $title;
    }
    

    $settedTime = $hour.":".$minute.":".$seconds;
    
    $newdate = strtotime('-1 second' , strtotime(date($settedTime)));

    // echo strtotime(date($_SESSION['current']));

    // tính số giây

    $secondsexactly = $seconds;

    $minuteexactlyconvert = $minute * 60;

    $hourexactlyconvert = $hour * 60 * 60;

    $totalSe = $secondsexactly + $minuteexactlyconvert + $hourexactlyconvert;

    $haha = strtotime('+'.$totalSe.' second' , strtotime(date("H:i:s")));

    $startTime = date('H:i:s' ,strtotime(date("H:i:s")));

    $timeInform = date('H:i:s' ,$haha);

    $endTime = date('H:i:s' ,strtotime(date($timeInform)));

    $addressIP = gethostbyname(trim(exec("hostname")));

    // Biến này cho kết thúc và bắt đầu

    session_start();

    $_SESSION['timeandbegin'] = [$addressIP,$name,$startTime,$endTime,$sounds,$settedTime];

    $newdate = date('H:i:s' ,$newdate);

    $_SESSION['timeInform'] = $timeInform;

    echo $timeInform."+".$newdate;
    
}else if(isset($_GET['hour']) && isset($_GET['minute']) && isset($_GET['seconds'])){

    $hour = $_GET['hour'];

    $minute = $_GET['minute'];

    $seconds = $_GET['seconds']; 

    $settedTime = $hour.":".$minute.":".$seconds;
    
    $newdate = strtotime('-1 second' , strtotime(date($settedTime)));
    $newdate = date ('H:i:s' ,$newdate);

    echo $newdate;

}

?>