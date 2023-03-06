<?php

ob_start();
session_start();

// echo $_SERVER['REQUEST_URI'];

if($_SERVER['REQUEST_URI'] === "/"){
    
    require_once("databaseAndModel/connectdatabase.php");
    
}else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/")){

    require_once("../databaseAndModel/connectdatabase.php");

}else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/timer/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/timer/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/stopwatch/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/stopwatch/")
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/time/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/time/")){

    require_once("../../databaseAndModel/connectdatabase.php");

}else{

    require_once("../databaseAndModel/connectdatabase.php");

}


if($_SERVER['REQUEST_URI'] == "/etimesolution.com/"){ 
    $titleForMobile = "Alarm Clock"; 
}else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/timer/"){
    $titleForMobile = "Online Timer";
}else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/stopwatch/"){
    $titleForMobile = "Stopwatch";
}else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/time/"){
    $titleForMobile = "Clock";
}

$language = "";
if(strpos($_SERVER['REQUEST_URI'], 'en') === true){

    $language = "en";

    $settingAction = array(

        'en' => array(

            'Reset', 'Cancel', 'Delete'

        ),

    );

    $meta = array(

        'en' => array(

            'Set your free online alarm clock by selecting hours, minutes, seconds. Wake up on time with the sound that you have pre-set. In addition, the alarm volume is the volume your device is setting.',
            'online alarm clock, alarm clock, alarm clocks, online clock, wake up, alarm clock for free, alarm clock app, internet alarm clock, virtual alarm clock, free alarm clock, hours, minutes, virtual clock,vClock,clock,digital,time,digital clock,online clock,beautiful clock,beautiful online clock,online beautiful clock,clock app,desktop clock,desktop clock app,pwa',
            'Set your free online alarm clock by selecting hours, minutes, seconds. Wake up on time with the sound that you have pre-set. In addition, the alarm volume is the volume your device is setting.',

        ),

    );

    $top_nav = array(
        'en'=>array('Online Alarm Clock','Online Timer','Online Stopwatch','Online Clock','Settings','Show Date','Night Mode', 'Colors'),
    );

    if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/"){ 
        $titleForMobile = "Alarm Clock"; 
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/timer/"){
        $titleForMobile = "Online Timer";
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/stopwatch/"){
        $titleForMobile = "Stopwatch";
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/time/"){
        $titleForMobile = "Clock";
    }

}else if(strpos($_SERVER['REQUEST_URI'], 'vn') === true){
    $language = "vn";

    $settingAction = array(

        'vn' => array(

            'Đặt lại', 'Huỷ', 'Xoá'

        ),

    );

    $meta = array(

        'vn' => array(

            'Đặt một đòng hồ báo thức online miễn phí của bạn bằng cách chọn giờ, phút, giây. Thức dậy đúng giờ với âm thanh mà bạn đã đặt từ trước. Thêm vào đó, âm lượng của báo thức là âm lượng mà máy của bạn đang cài đặt.',
            'đồng hồ báo thức trực tuyến, đồng hồ báo thức, đồng hồ báo thức, đồng hồ trực tuyến, thức dậy, đồng hồ báo thức miễn phí, ứng dụng đồng hồ báo thức, đồng hồ báo thức internet, đồng hồ báo thức ảo, đồng hồ báo thức miễn phí, giờ, phút, đồng hồ ảo, vClock, đồng hồ, kỹ thuật số, thời gian, đồng hồ kỹ thuật số, đồng hồ trực tuyến, đồng hồ đẹp, đồng hồ đẹp trực tuyến, đồng hồ đẹp trực tuyến, ứng dụng đồng hồ, đồng hồ máy tính để bàn, ứng dụng đồng hồ máy tính để bàn, pwa',
            'Đặt một đòng hồ báo thức online miễn phí của bạn bằng cách chọn giờ, phút, giây. Thức dậy đúng giờ với âm thanh mà bạn đã đặt từ trước. Thêm vào đó, âm lượng của báo thức là âm lượng mà máy của bạn đang cài đặt.',

        ),

    );

    $top_nav = array(
        'vn'=>array('Báo thức online','Đếm ngược online','Bấm giờ online','Đồng hồ online', 'Cài đặt', 'Hiển thị ngày tháng','Chế độ đêm','Màu sắc'),
    ); 

    if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){ 
        $titleForMobile = "Báo thức"; 
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/timer/"){
        $titleForMobile = "Đếm ngược";
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/stopwatch/"){
        $titleForMobile = "Bấm giờ";
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/time/"){
        $titleForMobile = "Đồng hồ";
    }

}else{
    $language = "en";

    $settingAction = array(

        'en' => array(

            'Reset', 'Cancel', 'Delete'

        ),

    );

    $meta = array(

        'en' => array(

            'Set your free online alarm clock by selecting hours, minutes, seconds. Wake up on time with the sound that you have pre-set. In addition, the alarm volume is the volume your device is setting.',
            'online alarm clock, alarm clock, alarm clocks, online clock, wake up, alarm clock for free, alarm clock app, internet alarm clock, virtual alarm clock, free alarm clock, hours, minutes, virtual clock,vClock,clock,digital,time,digital clock,online clock,beautiful clock,beautiful online clock,online beautiful clock,clock app,desktop clock,desktop clock app,pwa',
            'Set your free online alarm clock by selecting hours, minutes, seconds. Wake up on time with the sound that you have pre-set. In addition, the alarm volume is the volume your device is setting.',

        ),

    );

    $top_nav = array(
        'en'=>array('Online Alarm Clock','Online Timer','Online Stopwatch','Online Clock','Settings','Show Date', 'Night Mode', 'Colors'),
    );

    if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/"){ 
        $titleForMobile = "Alarm Clock"; 
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/timer/"){
        $titleForMobile = "Online Timer";
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/stopwatch/"){
        $titleForMobile = "Stopwatch";
    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/time/"){
        $titleForMobile = "Clock";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Title -->
    <title><?php echo $titleForMobile; ?></title>
    <?php

    if($_SERVER['REQUEST_URI'] == "/etimesolution.com/"){
        ?>
        <link rel="shortcut icon" href="image/favicon.ico" />
        <?php
    }else{
        ?>
        <link rel="shortcut icon" href="../image/favicon.ico" />
        <?php
    }
    ?>

    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="<?php echo $meta[$language][0]; ?>">
    <meta name="keywords" content="<?php echo $meta[$language][1]; ?>">
    <meta name="author" content="PHLONG">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Online Time with alarm">
    <meta property="og:description" content="<?php echo $meta[$language][2]; ?>">
    <meta property="og:url" content="https://etimesolution.com.com/">
    <meta property="og:image" content="https://etimesolution.com.com/logo-moon.png">

    <!-- Twitter -->

    <!-- Thêm sau -->

<!--     <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@otime">
    <meta name="twitter:title" content="@otime">
    <meta name="twitter:description" content="@otime">
    <meta name="twitter:image" content="@otime">  -->

    <link rel="canonical" href="https://etimesolution.com.com/">
    <link rel="alternate" href="https://etimesolution.com.com/" hreflang="x-default" />
    <link rel="alternate" href="https://etimesolution.com.com/en/" hreflang="en" />
    <link rel="alternate" href="https://etimesolution.com.com/vi/" hreflang="vi" />
    <!-- cái sitemap để mua hosting về -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://raw.githack.com/jamiebicknell/Toggle-Switch/master/toggleswitch.css" rel="stylesheet" />
    <?php

    if($_SERVER['REQUEST_URI'] == "/etimesolution.com/"){
        ?>
        <link href="fontawesome/css/fontawesome.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link href="fontawesome/css/brands.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link href="fontawesome/css/solid.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link href="css/style.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">

        <noscript id="deferred-styles">
            <link rel="stylesheet" href="fontawesome/css/fontawesome.css" as="style"/>
            <link rel="stylesheet" href="fontawesome/css/brands.css" as="style"/>
            <link rel="stylesheet" href="fontawesome/css/solid.css" as="style"/>
            <link rel="stylesheet" type="text/css" href="css/style.css" as="style"/>
        </noscript>
        <?php
    }else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/timer/") 
        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/timer/") 
        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/stopwatch/") 
        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/stopwatch/")
        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/time/") 
        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/time/")){
            ?>
            <link href="../../fontawesome/css/fontawesome.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
            <link href="../../fontawesome/css/brands.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
            <link href="../../fontawesome/css/solid.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
            <link href="../../css/style.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">

            <noscript id="deferred-styles">
                <link rel="stylesheet" href="../../fontawesome/css/fontawesome.css" as="style"/>
                <link rel="stylesheet" href="../../fontawesome/css/brands.css" as="style"/>
                <link rel="stylesheet" href="../../fontawesome/css/solid.css" as="style"/>
                <link rel="stylesheet" type="text/css" href="../../css/style.css" as="style"/>
            </noscript>
            <?php
        } else{
            ?>
            <link href="../fontawesome/css/fontawesome.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
            <link href="../fontawesome/css/brands.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
            <link href="../fontawesome/css/solid.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">
            <link href="../css/style.css"  rel="preload"  as="style" onload="this.onload=null;this.rel='stylesheet'">

            <noscript id="deferred-styles">
                <link rel="stylesheet" href="../fontawesome/css/fontawesome.css" as="style"/>
                <link rel="stylesheet" href="../fontawesome/css/brands.css" as="style"/>
                <link rel="stylesheet" href="../fontawesome/css/solid.css" as="style"/>
                <link rel="stylesheet" type="text/css" href="../css/style.css" as="style"/>
            </noscript>
            <?php
        }

        ?>
        <title>etimesolution.com.com</title>
        <style>
            /* Standard syntax */

            :-webkit-full-screen {
                background-color: black;
            }
            /* IE11 */

            :-ms-fullscreen {
                background-color: black;
            }
            /* Standard syntax */

            body:fullscreen {
                background-color: black;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    </head>

    <body id="long" style="display:block;">
        <div class="bg-primary text-white header">
            <div class="row">
                <div class="col-md-2 col-xs-2 px-2">
                    <?php

                    if($_SERVER['REQUEST_URI'] == "/etimesolution.com/"){
                        ?>
                        <a href="index.html">
                            <img src="image/logo.png" height="60px" style="margin-top: 5px;margin-left: 5px;" id="logo" alt="">
                        </a>
                        <?php
                    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/"){
                        ?>
                        <a href="index.html">
                            <img src="../image/logo.png" height="60px" style="margin-top: 5px;margin-left: 5px;" id="logo" alt="">
                        </a>
                        <?php
                    }if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){
                        ?>
                        <a href="index.html">
                            <img src="../image/logo.png" height="60px" style="margin-top: 5px;margin-left: 5px;" id="logo" alt="">
                        </a>
                        <?php
                    }else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/timer/") 
                        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/timer/") 
                        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/stopwatch/") 
                        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/stopwatch/")
                        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/time/") 
                        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/time/")){
                            ?>
                            <a href="index.html">
                                <img src="../../image/logo.png" height="60px" style="margin-top: 5px;margin-left: 5px;" id="logo" alt="">
                            </a>
                            <?php
                        }else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/timer/") 
                        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/stopwatch/")
                        || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/time/")){
                            ?>
                            <a href="index.html">
                                <img src="../image/logo.png" height="60px" style="margin-top: 5px;margin-left: 5px;" id="logo" alt="">
                            </a>
                            <?php
                        }else{
                            ?>
                            <a href="index.html">
                                <img src="../image/logo.png" height="60px" style="margin-top: 5px;margin-left: 5px;" id="logo" alt="">
                            </a>
                            <?php
                        }

                        ?>
                        <span id="navbar">
                            <i class="fa-solid fa-bars"></i>
                        </span>
                        <span id="title" style="border: none;">
                            <h1 style="line-height: 27px; margin-left: 6px;">
                                <?php

                                echo $titleForMobile;

                                ?>
                            </h1>
                        </span>
                    </div>
                    <div class="col-md-5 col-xs-5 px-2">
                    </div>
                    <div class="col-md-5 col-xs-5 px-2" style="float: right;">
                        <i class="iconic fa-regular fa-gear fa-bars px-4" style="font-size: 30px;float: right;line-height: 70px;" id="gear"></i>
                        <i class="iconic fa-regular fa-moon fa-bars px-4" style="font-size: 30px;float: right;line-height: 70px;" id="moon" onclick="return moon();"></i>
                        <i class="iconic fa-regular fa-lightbulb px-4" style="font-size: 30px;float: right;line-height: 70px;" onclick="return openFullscreen();"></i>
                        <div id="language" class="fixmobile" style="cursor: pointer;float: right;font-size: 19px;display: flex; margin-right: 15px;">
                            <?php
                    // Xử lý chữ
                            if($_SERVER['REQUEST_URI'] == "/etimesolution.com/"){
                                ?>
                                <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
                                <img src="image/english.png" style="width: 27px;
                                height: 27px;
                                margin-top: 15px;
                                margin-left: 10px;" alt="">
                                <div id="languagechoose" style="position: fixed;
                                display: none;
                                cursor: pointer;
                                width: 174px;
                                background-color: white;
                                top: 8.5%;
                                right: 16.2%;
                                height: 66px;
                                padding-left: 10px;
                                padding-right: 10px;
                                border-bottom-left-radius: 6px;
                                border-bottom-right-radius: 6px;
                                box-shadow: 0 8px 8px rgb(10 10 10 / 10%);
                                z-index: 12;
                                height: 70px;">
                                <div id="languageChooseElement" style="display: flex;">
                                    <a href="vn/">
                                        <h5 style="margin-top: 20px; margin-right: 13px; color: black;">TIẾNG VIỆT</h5>
                                    </a>
                                    <img src="image/viet-nam.png" style="width: 27px;
                                    height: 23px;
                                    margin-top: 19px;
                                    margin-left: 10px;" alt="">
                                </div>
                            </div>
                            <?php
                        }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/"){
                            ?>
                            <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
                            <img src="../image/english.png" style="width: 27px;
                            height: 27px;
                            margin-top: 15px;
                            margin-left: 10px;" alt="">
                            <div id="languagechoose" style="position: fixed;
                            display: none;
                            cursor: pointer;
                            width: 174px;
                            background-color: white;
                            top: 8.5%;
                            right: 16.2%;
                            height: 66px;
                            padding-left: 10px;
                            padding-right: 10px;
                            border-bottom-left-radius: 6px;
                            border-bottom-right-radius: 6px;
                            box-shadow: 0 8px 8px rgb(10 10 10 / 10%);
                            z-index: 12;
                            height: 70px;">
                            <div id="languageChooseElement" style="display: flex;">
                                <a href="../vn/">
                                    <h5 style="margin-top: 20px; margin-right: 13px; color: black;">TIẾNG VIỆT</h5>
                                </a>
                                <img src="../image/viet-nam.png" style="width: 27px;
                                height: 23px;
                                margin-top: 19px;
                                margin-left: 10px;" alt="">
                            </div>
                        </div>
                        <?php
                    }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){
                        ?>
                        <h5 style="margin-top: 22px; margin-right: 10px;">TIẾNG VIỆT</h5>
                        <img src="../image/viet-nam.png" style="width: 27px;
                        height: 27px;
                        margin-top: 15px;
                        margin-left: 10px;" alt="">
                        <div id="languagechoose" style="position: fixed;
                        display: none;
                        cursor: pointer;
                        width: 153px;
                        background-color: white;
                        top: 8.5%;
                        right: 16.2%;
                        height: 66px;
                        padding-left: 10px;
                        padding-right: 10px;
                        border-bottom-left-radius: 6px;
                        border-bottom-right-radius: 6px;
                        box-shadow: 0 8px 8px rgb(10 10 10 / 10%);
                        z-index: 12;
                        height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="../en/">
                                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">ENGLISH</h5>
                            </a>
                            <img src="../image/english.png" style="width: 27px;
                            height: 23px;
                            margin-top: 19px;
                            margin-left: 10px;" alt="">
                        </div>
                    </div>
                    <?php
                }else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/timer/") 
                    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/time/")
                    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/stopwatch/")){
                        ?>
                        <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
                        <img src="../../image/english.png" style="width: 27px;
                        height: 27px;
                        margin-top: 15px;
                        margin-left: 10px;" alt="">
                        <div id="languagechoose" style="position: fixed;
                        display: none;
                        cursor: pointer;
                        width: 174px;
                        background-color: white;
                        top: 8.5%;
                        right: 16.2%;
                        height: 66px;
                        padding-left: 10px;
                        padding-right: 10px;
                        border-bottom-left-radius: 6px;
                        border-bottom-right-radius: 6px;
                        box-shadow: 0 8px 8px rgb(10 10 10 / 10%);
                        z-index: 12;
                        height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="<?php

                            $url = $_SERVER['REQUEST_URI'];

                            $splitData = explode("/", $url);

                            echo "../../vn/".$splitData[3];
                        ?>">
                        <h5 style="margin-top: 20px; margin-right: 13px; color: black;">TIẾNG VIỆT</h5>
                    </a>
                    <img src="../../image/viet-nam.png" style="width: 27px;
                    height: 23px;
                    margin-top: 19px;
                    margin-left: 10px;" alt="">
                </div>
            </div>
            <?php
        }else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/timer/") 
            || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/time/")
            || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/stopwatch/")){
                ?>
                <h5 style="margin-top: 22px; margin-right: 10px;">TIẾNG VIỆT</h5>
                <img src="../../image/viet-nam.png" style="width: 27px;
                height: 27px;
                margin-top: 15px;
                margin-left: 10px;" alt="">
                <div id="languagechoose" style="position: fixed;
                display: none;
                cursor: pointer;
                width: 153px;
                background-color: white;
                top: 8.5%;
                right: 16.2%;
                height: 66px;
                padding-left: 10px;
                padding-right: 10px;
                border-bottom-left-radius: 6px;
                border-bottom-right-radius: 6px;
                box-shadow: 0 8px 8px rgb(10 10 10 / 10%);
                z-index: 12;
                height: 70px;">
                <div id="languageChooseElement" style="display: flex;">
                    <a href="
                    <?php

                    $url = $_SERVER['REQUEST_URI'];

                    $splitData = explode("/", $url);

                    echo "../../en/".$splitData[3];
                    ?>
                    ">
                    <h5 style="margin-top: 20px; margin-right: 13px; color: black;">ENGLISH</h5>
                </a>
                <img src="../../image/english.png" style="width: 27px;
                height: 23px;
                margin-top: 19px;
                margin-left: 10px;" alt="">
            </div>
        </div>
        <?php
    }else{
        ?>
        <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
        <img src="../image/english.png" style="width: 27px;
        height: 27px;
        margin-top: 15px;
        margin-left: 10px;" alt="">
        <div id="languagechoose" style="position: fixed;
        display: none;
        cursor: pointer;
        width: 174px;
        background-color: white;
        top: 8.5%;
        right: 16.2%;
        height: 66px;
        padding-left: 10px;
        padding-right: 10px;
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
        box-shadow: 0 8px 8px rgb(10 10 10 / 10%);
        z-index: 12;
        height: 70px;">
        <div id="languageChooseElement" style="display: flex;">
            <a href="../vn/">
                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">TIẾNG VIỆT</h5>
            </a>
            <img src="../image/viet-nam.png" style="width: 27px;
            height: 23px;
            margin-top: 19px;
            margin-left: 10px;" alt="">
        </div>
    </div>
    <?php
}
?>
</div>
</div>
</div>
</div>
<style>

    #languagechoose:hover{
        background-color: #00000069 !important;
    }

    .mobileDesignForSuperSmall{
        display: none !important;
    }

    @media only screen and (min-width: 1100) and (max-width: 1200px) {

        #languagechoose{
            right: 14% !important;
            z-index: 12 !important;
        }

        .iconicsetting{
            display: block !important;
        }

        .mobileDesign{
            display: none !important;
        }

        .mobileDesignForSuperSmall{
            display: none !important;
        }

    }

    @media only screen and (min-width: 800px) and (max-width: 1100px) {

        #languagechoose{
            right: 10% !important;
            z-index: 12 !important;
        }

        .iconicsetting{
            display: block !important;
        }

        .mobileDesign{
            display: none !important;
        }

        .mobileDesignForSuperSmall{
            display: none !important;
        }

    }

    @media only screen and (max-width: 800px) {

        #languagechoose{
            right: 14% !important;
            z-index: 12 !important;
        }

        .iconicsetting{
            display: block !important;
        }

        .mobileDesignForSuperSmall{
            display: none !important;
        }

    }

    @media only screen and (max-width: 620px) {

        .fixmobile{
            display: none !important;
        }


        .mobileDesignForSuperSmall{
            display: flex !important;
        }
    }

    @media only screen and (max-width: 440px) {

        .fixmobile{
            display: none !important;
        }

        .mobileDesignForSuperSmall{
            display: flex !important;
        }

    }

    #language:hover #languagechoose {
        display: block !important;
    }

</style>
<div class="settingAction px-3" id="settingAction">
    <Button class="btn btn-success my-2"><?php echo $settingAction[$language][0]; ?></Button>
    <button type="button" class="btn btn-outline-secondary align-right mx-5" onclick="existPhone();" style="position: absolute; right: 80px; top: 8px;"><i class="fa-solid fa-trash-can"></i><?php echo $settingAction[$language][1]; ?></button>
    <button type="button" class="btn btn-outline-danger align-right mx-3" onclick="return removeAlarmMobile();" style="position: absolute; right: 2px; top: 8px;">
        <i class="fa-solid fa-trash-can"></i><?php echo $settingAction[$language][2]; ?></button>
    </div>

    <style>
        .dot {
            height: 25px;
            width: 25px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
        }

        .switch {
            position: relative;
            width: 37px;
            height: 16px;
            overflow: hidden;
            cursor: pointer;
            border-radius: 11px;
            margin-left: 20px;
        }

    </style>

    <div id="editGear" class="p-3" style="width: 20%; height: 100vh; background-color: #3d3c3c; position: fixed; top: 0px; right: 0px; display: none; z-index: 11;">
        <div class="row px-3">
            <h5 class="p-3" style="color: white; border-bottom: 1px solid white;">
                <?php echo $top_nav[$language][4]; ?>
            <i class="iconicsetting iconic fa-regular fa-moon fa-bars px-4" style="display: none;float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 45px;" id="moon" onclick="return moon();"></i>
            <i class="iconicsetting iconic fa-regular fa-lightbulb px-4" style="display: none;float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 90px;" onclick="return openFullscreen();"></i>
            <i class="fa-solid fa-xmark me-3" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
        </h5>
    </div>
    <div class="setting row text-white">
        <form action="">
            <div class="row my-2">
                <div class="col-md-8">
                    <h6><?php echo $top_nav[$language][5]; ?></h6>
                </div>
                <div class="col-md-4">
                    <input type='checkbox' name='showDate' id='showDate' value='1' class='toggleswitch' checked="checked" />
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-8">
                    <h6><?php echo $top_nav[$language][6]; ?></h6>
                </div>
                <div class="col-md-4">
                    <input type='checkbox' name='nightMode' id='nightMode' value='1' class='toggleswitch' />
                </div>
            </div>
            <div class="row my-2">
                <h6 class="mb-3"><?php echo $top_nav[$language][7]; ?></h6>
                <div>
                    <span id="bgPrimary" class="dot me-2 mb-2 bg-primary"></span>
                    <span id="bgSecondary" class="dot me-2 mb-2 bg-secondary"></span>
                    <span id="bgSuccess" class="dot me-2 mb-2 bg-success"></span>
                    <span id="bgDanger" class="dot me-2 mb-2 bg-danger"></span>
                    <span id="bgWarning" class="dot me-2 mb-2 bg-warning"></span>
                    <span id="bgInfo" class="dot me-2 mb-2 bg-info"></span>
                    <span id="bgLight" class="dot me-2 mb-2 bg-light"></span>
                    <span id="bgDark" class="dot me-2 mb-2 bg-dark"></span>
                </div>
            </div>
            <button type="button" class="btn btn-primary" style="width: 100%;" onclick="return exist();"> OK </button>
        </form>
        <div id="language" class="mobileDesignForSuperSmall" style="cursor: pointer;float: right;font-size: 19px;display: flex; margin-right: 15px;">
            <?php
            // Xử lý chữ
                if($_SERVER['REQUEST_URI'] == "/etimesolution.com/"){
                ?>

                    <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
                    <img src="image/english.png" style="width: 27px; height: 17px;margin-top: 28px;" alt="">

                    <div id="languagechoose" style="position: fixed; display: none;cursor: pointer;
                    width: 152px;background-color: white;top: 50.5%;
                    left: 4% !important;height: 66px;padding-left: 10px;background-color: #fff;border-bottom-left-radius: 6px;
                    border-bottom-right-radius: 6px;box-shadow: 0 8px 8px rgb(10 10 10 / 10%);z-index: 12;height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="vn/">
                                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">VIỆT NAM</h5>
                            </a>

                                <img src="image/viet-nam.png" style="width: 27px;
                                height: 27px;
                                margin-top: 15px;
                                margin-left: 10px;" alt="">
                        </div>
                    </div>

                <?php
                }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/"){
                ?>

                    <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
                    <img src="image/english.png" style="width: 27px; height: 17px;margin-top: 28px;" alt="">

                    <div id="languagechoose" style="position: fixed; display: none;cursor: pointer;
                    width: 152px;background-color: white;top: 50.5%;
                    left: 4% !important;height: 66px;padding-left: 10px;background-color: #fff;border-bottom-left-radius: 6px;
                    border-bottom-right-radius: 6px;box-shadow: 0 8px 8px rgb(10 10 10 / 10%);z-index: 12;height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="../vn/">
                                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">TIẾNG VIỆT</h5>
                            </a>

                                <img src="image/viet-nam.png" style="width: 27px;
                                height: 27px;
                                margin-top: 15px;
                                margin-left: 10px;" alt="">
                        </div>
                    </div>

                <?php
                }else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){
                ?>

                    <h5 style="margin-top: 22px; margin-right: 10px;">TIẾNG VIỆT</h5>
                    <img src="image/viet-nam.png" style="width: 27px; height: 17px;margin-top: 28px;" alt="">

                    <div id="languagechoose" style="position: fixed; display: none;cursor: pointer;
                    width: 152px;background-color: white;top: 50.5%;
                    left: 4% !important;height: 66px;padding-left: 10px;background-color: #fff;border-bottom-left-radius: 6px;
                    border-bottom-right-radius: 6px;box-shadow: 0 8px 8px rgb(10 10 10 / 10%);z-index: 12;height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="../en/">
                                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">ENGLISH</h5>
                            </a>

                                <img src="image/english.png" style="width: 27px;
                                height: 27px;
                                margin-top: 15px;
                                margin-left: 10px;" alt="">
                        </div>
                    </div>

                <?php
                }else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/timer/") 
                    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/time/")
                    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/stopwatch/")){
                ?>

                    <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
                    <img src="image/english.png" style="width: 27px; height: 17px;margin-top: 28px;" alt="">

                    <div id="languagechoose" style="position: fixed; display: none;cursor: pointer;
                    width: 152px;background-color: white;top: 50.5%;
                    left: 4% !important;height: 66px;padding-left: 10px;background-color: #fff;border-bottom-left-radius: 6px;
                    border-bottom-right-radius: 6px;box-shadow: 0 8px 8px rgb(10 10 10 / 10%);z-index: 12;height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="<?php

                                $url = $_SERVER['REQUEST_URI'];

                                $splitData = explode("/", $url);

                                echo "../../en/".$splitData[3];
                            ?>">
                                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">ENGLISH</h5>
                            </a>

                                <img src="image/english.png" style="width: 27px;
                                height: 27px;
                                margin-top: 15px;
                                margin-left: 10px;" alt="">
                        </div>
                    </div>

                <?php
                }else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/timer/") 
                || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/time/")
                || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/stopwatch/")){
                ?>

                    <h5 style="margin-top: 22px; margin-right: 10px;">TIẾNG VIỆT</h5>
                    <img src="../../image/viet-nam.png" style="width: 27px; height: 17px;margin-top: 28px;" alt="">

                    <div id="languagechoose" style="position: fixed; display: none;cursor: pointer;
                    width: 152px;background-color: white;top: 50.5%;
                    left: 4% !important;height: 66px;padding-left: 10px;background-color: #fff;border-bottom-left-radius: 6px;
                    border-bottom-right-radius: 6px;box-shadow: 0 8px 8px rgb(10 10 10 / 10%);z-index: 12;height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="<?php

                                $url = $_SERVER['REQUEST_URI'];

                                $splitData = explode("/", $url);

                                echo "../../vn/".$splitData[3];
                            ?>">
                                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">ENGLISH</h5>
                            </a>

                                <img src="../image/english.png" style="width: 27px;
                                height: 27px;
                                margin-top: 15px;
                                margin-left: 10px;" alt="">
                        </div>
                    </div>

                <?php
                } else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/timer/") 
                || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/time/")
                || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/stopwatch/")){
                ?>

                    <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
                    <img src="../image/english.png" style="width: 27px; height: 17px;margin-top: 28px;" alt="">

                    <div id="languagechoose" style="position: fixed; display: none;cursor: pointer;
                    width: 152px;background-color: white;top: 50.5%;
                    left: 4% !important;height: 66px;padding-left: 10px;background-color: #fff;border-bottom-left-radius: 6px;
                    border-bottom-right-radius: 6px;box-shadow: 0 8px 8px rgb(10 10 10 / 10%);z-index: 12;height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="<?php
                                $url = $_SERVER['REQUEST_URI'];

                                $splitData = explode("/", $url);

                                echo "../vn/".$splitData[2];
                            ?>">
                                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">TIẾNG VIỆT</h5>
                            </a>

                                <img src="../image/viet-nam.png" style="width: 27px;
                                height: 27px;
                                margin-top: 15px;
                                margin-left: 10px;" alt="">
                        </div>
                    </div>

                <?php
                }else{
                ?>

                    <h5 style="margin-top: 22px; margin-right: 10px;">ENGLISH</h5>
                    <img src="image/english.png" style="width: 27px; height: 17px;margin-top: 28px;" alt="">

                    <div id="languagechoose" style="position: fixed; display: none;cursor: pointer;
                    width: 152px;background-color: white;top: 50.5%;
                    left: 4% !important;height: 66px;padding-left: 10px;background-color: #fff;border-bottom-left-radius: 6px;
                    border-bottom-right-radius: 6px;box-shadow: 0 8px 8px rgb(10 10 10 / 10%);z-index: 12;height: 70px;">
                        <div id="languageChooseElement" style="display: flex;">
                            <a href="<?php
                                $url = $_SERVER['REQUEST_URI'];

                                $splitData = explode("/", $url);

                                echo "../../vn/".$splitData[3];
                            ?>">
                                <h5 style="margin-top: 20px; margin-right: 13px; color: black;">TIẾNG VIỆT</h5>
                            </a>
                            <img src="image/viet-nam.png" style="width: 27px;
                                height: 27px;
                                margin-top: 15px;
                                margin-left: 10px;" alt="">
                        </div>
                    </div>

                <?php
                }
            ?>

    </div>
</div>
</div>

<?php
if($_SERVER['REQUEST_URI'] == '/etimesolution.com/en/'){

    ?>
    <div class="body" style="display: flex; width: 100%;">
        <div class="menu" style="width: 100px; height: 100vh; background-color: #3d3c3c; position: fixed; margin-top: 5.2%;">
            <ul>
                <li class="<?php if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/"){ echo "active"; } ?>">
                    <a href=""><i class="fa-regular fa-bell"></i> <br>
                        <p>
                            <?php
                            echo $top_nav[$language][0];
                            ?>
                        </p>
                    </a>
                </li>
                <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer") === true){ echo "active"; } ?>">
                    <a href="timer/"><i class="fa-regular fa-circle-arrow-down"></i><br>
                        <p> <?php
                        echo $top_nav[$language][1];
                        ?>
                    </p>
                </a>
            </li>
            <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>">
                <a href="stopwatch/"><i class="fa-regular fa-bolt"></i> <br>
                    <p><?php echo $top_nav[$language][2]; ?></p>
                </a>
            </li>
            <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>">
                <a href="time/">
                    <i class="fa-regular fa-clock"></i><br>
                    <p><?php echo $top_nav[$language][3]; ?></p>
                </a>
            </li>
        </ul>
    </div>      
    <div class="menuForMobile" style="width: 70%; height: 100vh; background-color: #3d3c3c; position: fixed; z-index: 2;">

        <a href="index.html">
            <img src="../image/logo.png" id="logoForMobile" style="width: 80%;margin-left: 6px;
    margin-top: 13px;
    margin-bottom: 5px;" alt="">
        </a>

        <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
        <ul>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/"){ echo "active"; } ?>"><a href=""><i class="fa-regular fa-bell"></i><?php
            echo $top_nav[$language][0];
        ?></a></li>
        <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer")  === true){ echo "active"; } ?>">
            <a href="timer/"><i class="fa-regular fa-circle-arrow-down"></i><?php
            echo $top_nav[$language][1];
        ?></a></li>
        <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>"><a href="stopwatch/"><i class="fa-regular fa-bolt"></i><?php
        echo $top_nav[$language][2];
    ?></a></li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>"><a href="time/"><i class="fa-regular fa-clock"></i><?php
    echo $top_nav[$language][3];
?></a></li>
</ul>
</div>
<?php

}else if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){
    ?>
    <div class="body" style="display: flex; width: 100%;">
        <div class="menu" style="width: 100px; height: 100vh; background-color: #3d3c3c; position: fixed; margin-top: 5.2%;">
            <ul>
                <li class="<?php if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){ echo "active"; } ?>">
                    <a href=""><i class="fa-regular fa-bell"></i> <br>
                        <p>
                            <?php
                            echo $top_nav[$language][0];
                            ?>
                        </p>
                    </a>
                </li>
                <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer") === true){ echo "active"; } ?>">
                    <a href="timer/"><i class="fa-regular fa-circle-arrow-down"></i><br>
                        <p> <?php echo $top_nav[$language][1]; ?>
                    </p>
                </a>
            </li>
            <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>"><a href="stopwatch/"><i class="fa-regular fa-bolt"></i> <br><p><?php
            echo $top_nav[$language][2];
        ?></p></a></li>
        <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>">
            <a href="time/"><i class="fa-regular fa-clock"></i><br><p><?php
            echo $top_nav[$language][3];
        ?></p></a></li>
    </ul>
</div>      
<div class="menuForMobile" style="width: 70%; height: 100vh; background-color: #3d3c3c; position: fixed; z-index: 2;">
    <a href="index.html">
        <img src="../image/logo.png" style="width: 80%;
    margin-top: 13px;
    margin-bottom: 5px;" id="logoForMobile" alt="">
    </a>
    <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
    <ul>
        <li class="<?php if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){ echo "active"; } ?>"><a href="../../"><i class="fa-regular fa-bell"></i><?php
        echo $top_nav[$language][0];
    ?></a></li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer") === true){ echo "active"; } ?>">
        <a href="timer/"><i class="fa-regular fa-circle-arrow-down"></i><?php
        echo $top_nav[$language][1];
    ?></a></li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>"><a href="stopwatch/"><i class="fa-regular fa-bolt"></i><?php
    echo $top_nav[$language][2];
?></a></li>
<li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>"><a href="time/"><i class="fa-regular fa-clock"></i><?php
echo $top_nav[$language][3];
?></a></li>
</ul>
</div>
<?php
}else if($_SERVER['REQUEST_URI'] === "/etimesolution.com/"){
    ?>
    <div class="body" style="display: flex; width: 100%;">
        <div class="menu" style="width: 100px; height: 100vh; background-color: #3d3c3c; position: fixed; margin-top: 5.2%;">
            <ul>
                <li class="active">
                    <a href=""><i class="fa-regular fa-bell"></i> <br>
                        <p>
                            <?php
                            echo $top_nav[$language][0];
                            ?>
                        </p>
                    </a>
                </li>
                <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer") === true){ echo "active"; } ?>">
                    <a href="timer/"><i class="fa-regular fa-circle-arrow-down"></i><br>
                        <p> <?php
                        echo $top_nav[$language][1];
                        ?>
                    </p>
                </a>
            </li>
            <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>">
                <a href="stopwatch/"><i class="fa-regular fa-bolt"></i> <br>
                    <p><?php echo $top_nav[$language][2]; ?></p>
                </a>
            </li>
            <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>">     <a href="time/"><i class="fa-regular fa-clock"></i><br>
                <p><?php echo $top_nav[$language][3]; ?></p>
            </a>
        </li>
    </ul>
</div>      
<div class="menuForMobile" style="width: 70%; height: 100vh; background-color: #3d3c3c; position: fixed; z-index: 2;">
    <a href=""><img src="image/logo.png" id="logoForMobile" style="width: 80%;margin-left: 6px;
    margin-top: 13px;
    margin-bottom: 5px;" alt=""></a>
    <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
    <ul>
        <li class="active"><a href=""><i class="fa-regular fa-bell"></i><?php
        echo $top_nav[$language][0];
    ?></a></li>
    <li>
        <a href="timer/"><i class="fa-regular fa-circle-arrow-down"></i><?php
        echo $top_nav[$language][1];
    ?></a></li>
    <li><a href="stopwatch/"><i class="fa-regular fa-bolt"></i><?php
    echo $top_nav[$language][2];
?></a></li>
<li><a href="time/"><i class="fa-regular fa-clock"></i><?php
echo $top_nav[$language][3];
?></a></li>
</ul>
</div>
<?php
}else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/timer/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/timer/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/stopwatch/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/stopwatch/")
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/time/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/time/")){
        ?>

        <div class="body" style="display: flex; width: 100%;">
            <div class="menu" style="width: 100px; height: 100vh; background-color: #3d3c3c; position: fixed; margin-top: 5.2%;">
                <ul>
                    <li class="">
                        <a href="../"><i class="fa-regular fa-bell"></i> <br>
                            <p>
                                <?php
                                echo $top_nav[$language][0];
                                ?>
                            </p>
                        </a>
                    </li>
                    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer") === true){ echo "active"; } ?>">
                        <a href="../timer/"><i class="fa-regular fa-circle-arrow-down"></i><br>
                            <p> <?php echo $top_nav[$language][1]; ?>
                        </p>
                    </a>
                </li>
                <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>"><a href="../stopwatch/"><i class="fa-regular fa-bolt"></i> <br><p><?php
                echo $top_nav[$language][2];
            ?></p></a></li>
            <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>">
                <a href="../time/"><i class="fa-regular fa-clock"></i><br><p><?php
                echo $top_nav[$language][3];
            ?></p></a></li>
        </ul>
    </div>      
    <div class="menuForMobile" style="width: 70%; height: 100vh; background-color: #3d3c3c; position: fixed; z-index: 2;">
        <a href="index.html">
            <img src="../../image/logo.png" id="logoForMobile" style="width: 80%;margin-left: 6px;
    margin-top: 13px;
    margin-bottom: 5px;" alt="">
        </a>
        <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
        <ul>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){ echo "active"; } ?>"><a href="../"><i class="fa-regular fa-bell"></i><?php
            echo $top_nav[$language][0];
        ?></a></li>
        <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer") === true){ echo "active"; } ?>">
            <a href="../timer/"><i class="fa-regular fa-circle-arrow-down"></i><?php
            echo $top_nav[$language][1];
        ?></a></li>
        <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>"><a href="../stopwatch/"><i class="fa-regular fa-bolt"></i><?php
        echo $top_nav[$language][2];
    ?></a></li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>"><a href="../time/"><i class="fa-regular fa-clock"></i><?php
    echo $top_nav[$language][3];
?></a></li>
</ul>
</div>
<?php
}else if(($_SERVER['REQUEST_URI'] == "/etimesolution.com/timer/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/stopwatch/") 
    || ($_SERVER['REQUEST_URI'] == "/etimesolution.com/time/")){
        ?>

        <div class="body" style="display: flex; width: 100%;">
            <div class="menu" style="width: 100px; height: 100vh; background-color: #3d3c3c; position: fixed; margin-top: 5.2%;">
                <ul>
                    <li class="">
                        <a href="../"><i class="fa-regular fa-bell"></i> <br>
                            <p>
                                <?php
                                echo $top_nav[$language][0];
                                ?>
                            </p>
                        </a>
                    </li>
                    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer") === true){ echo "active"; } ?>">
                        <a href="../timer/"><i class="fa-regular fa-circle-arrow-down"></i><br>
                            <p> <?php echo $top_nav[$language][1]; ?>
                        </p>
                    </a>
                </li>
                <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>"><a href="../stopwatch/"><i class="fa-regular fa-bolt"></i> <br><p><?php
                echo $top_nav[$language][2];
            ?></p></a></li>
            <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>">
                <a href="../time/"><i class="fa-regular fa-clock"></i><br><p><?php
                echo $top_nav[$language][3];
            ?></p></a></li>
        </ul>
    </div>      
    <div class="menuForMobile" style="width: 70%; height: 100vh; background-color: #3d3c3c; position: fixed; z-index: 2;">
        <a href="index.html">
            <img src="../image/logo.png" id="logoForMobile" style="width: 80%;margin-left: 6px;
    margin-top: 13px;
    margin-bottom: 5px;" alt="">
        </a>
        <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
        <ul>
            <li class="<?php if($_SERVER['REQUEST_URI'] == "/etimesolution.com/vn/"){ echo "active"; } ?>"><a href="../"><i class="fa-regular fa-bell"></i><?php
            echo $top_nav[$language][0];
        ?></a></li>
        <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "timer") === true){ echo "active"; } ?>">
            <a href="../timer/"><i class="fa-regular fa-circle-arrow-down"></i><?php
            echo $top_nav[$language][1];
        ?></a></li>
        <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch") === true){ echo "active"; } ?>"><a href="../stopwatch/"><i class="fa-regular fa-bolt"></i><?php
        echo $top_nav[$language][2];
    ?></a></li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>"><a href="../time/"><i class="fa-regular fa-clock"></i><?php
    echo $top_nav[$language][3];
?></a></li>
</ul>
</div>

<?php

}else{
    ?>
    <div class="body" style="display: flex; width: 100%;">
        <div class="menu" style="width: 100px; height: 100vh; background-color: #3d3c3c; position: fixed; margin-top: 5.2%;">
            <ul>
                <li class="<?php if($_SERVER['REQUEST_URI'] === '/etimesolution.com'){ echo "active"; } ?>">
                    <a href="../"><i class="fa-regular fa-bell"></i> <br><p><?php
                    echo $top_nav[$language][0];
                ?></p></a>
            </li>
            <li class="<?php if(strpos($_SERVER['REQUEST_URI'], 'timer/') === true){ echo "active"; } ?>">
                <a href="../timer/"><i class="fa-regular fa-circle-arrow-down"></i><br>
                    <p><?php
                    echo $top_nav[$language][1];
                ?></p>
            </a>
        </li>
        <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "stopwatch/") === true){ echo "active"; } ?>">
            <a href="../stopwatch/"><i class="fa-regular fa-bolt"></i> <br><p>
                <?php
                echo $top_nav[$language][2];
            ?></p>
        </a>
    </li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], "/time/") === true){ echo "active"; } ?>">
        <a href="../time/"><i class="fa-regular fa-clock"></i><br><p>
            <?php echo $top_nav[$language][3];?></p>
        </a>
    </li>
</ul>
</div>
<div class="menuForMobile" style="width: 70%; height: 100vh; background-color: #3d3c3c; position: fixed; z-index: 2;">
    <a href="../"><img src="../image/logo.png" id="logoForMobile"  style="width: 80%;margin-left: 6px;
    margin-top: 13px;
    margin-bottom: 5px;" alt=""></a>
    <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
    <ul>
        <li class="<?php if($_SERVER['REQUEST_URI'] == "/etimesolution.com/en/"){ echo "active"; } ?>">
            <a href="../"><i class="fa-regular fa-bell"></i><?php
            echo $top_nav[$language][0];
        ?></a>
    </li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], 'en/timer/') === true){ echo "active"; } ?>">
        <a href="../timer/"><i class="fa-regular fa-circle-arrow-down"></i><?php
        echo $top_nav[$language][1];
        ?>
    </a></li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], 'en/stopwatch/') === true){ echo "active"; } ?>">
        <a href="../stopwatch/"><i class="fa-regular fa-bolt"></i><?php
        echo $top_nav[$language][2];
        ?>
    </a></li>
    <li class="<?php if(strpos($_SERVER['REQUEST_URI'], 'en/time/') === true){ echo "active"; } ?>"><a href="../time/"><i class="fa-regular fa-clock"></i><?php
    echo $top_nav[$language][3];
?></a></li>
</ul>
</div>
<?php
}

?>
