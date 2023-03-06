<?php

ob_start();
session_start();
require_once("../databaseAndModel/connectdatabase.php");

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://raw.githack.com/jamiebicknell/Toggle-Switch/master/toggleswitch.css" rel="stylesheet" />
    <link href="../fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../fontawesome/css/brands.css" rel="stylesheet">
    <link href="../fontawesome/css/solid.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>oTime</title>
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
</head>

<body id="long" style="display:block;">
    <div class="bg-primary text-white header">
        <div class="row">
            <div class="col-md-2 col-xs-2 px-2">
                <a href="index.html"><img src="../image/logo.png" id="logo" alt=""></a>
                <span id=navbar>
                    <i class="fa-solid fa-bars"></i>
                </span>
                <span id="title" style="border: none;"><h3 style="text-align: center;">Báo thức online - oTime</h3></span>
            </div>
            <div class="col-md-5 col-xs-5 px-2">
            </div>
            <div class="col-md-5 col-xs-5 px-2" style="float: right;">
                <i class="iconic fa-regular fa-gear fa-bars p-4" style="font-size: 30px;float: right;" id="gear"></i>
                <i class="iconic fa-regular fa-moon fa-bars p-4" style="font-size: 30px;float: right;" id="moon" onclick="return moon();"></i>
                <i class="iconic fa-regular fa-lightbulb p-4" style="font-size: 30px;float: right;" onclick="return openFullscreen();"></i>
                <i class="iconic fa-solid fa-language fa-bars p-4" style="font-size: 30px;float: right;"></i>
                <i class="iconic fa-solid fa-code fa-bars p-4" style="font-size: 30px;float: right;"></i>
            </div>
        </div>
    </div>
    <div class="settingAction align-center px-3" id="settingAction">
        <Button class="btn btn-success my-2">ĐẶT LẠI</Button>
        <button type="button" class="btn btn-outline-secondary align-right mx-3" onclick="existPhone();" style="position: absolute; right: 80px; top: 8px;"><i class="fa-solid fa-trash-can"></i>HUỶ</button>
        <button type="button" class="btn btn-outline-danger align-right mx-3" onclick="return removeAlarmMobile();" style="position: absolute; right: 2px; top: 8px;">
            <i class="fa-solid fa-trash-can"></i>XOÁ</button>
        </div>
        <div class="container-fluid bg-dark text-white headerForMobile" style="position: fixed; width: 100%;">
            <div class="row p-2" id="upanddown">
                <i class="fa-solid fa-chevron-down p-1" id="roll" style="border-bottom: 1px solid white;" onclick="return rolldown()"></i>
            </div>
            <div class="row" style="display: none;" id="function">
                <i class="iconic fa-regular fa-moon fa-bars p-4" style="font-size: 30px;display:block; width: 25%;" id="moon" onclick="return moon();"></i>
                <i class="iconic fa-regular fa-lightbulb p-4" style="font-size: 30px;display:block; width: 25%;" onclick="return openFullscreen();"></i>
                <i class="iconic fa-solid fa-language fa-bars p-4" style="font-size: 30px;display:block; width: 25%;"></i>
                <i class="iconic fa-solid fa-code fa-bars p-4" style="font-size: 30px;display:block; width: 25%;"></i>
            </div>
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
                <h5 class="p-3" style="color: white; border-bottom: 1px solid white;">Cài đặt
                    <i class="fa-solid fa-xmark me-3" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
                </h5>
            </div>
            <div class="setting row text-white">
                <form action="">
                    <!--                 <div class="row my-2">
                    <div class="col-md-8">
                        <h6>12 hours(am/pm)</h6>
                    </div>
                    <div class="col-md-4">
                        <input type='checkbox' name='opt1' id='opt1' value='1' class='toggleswitch'/>
                    </div>
                </div> -->
                <div class="row my-2">
                    <div class="col-md-8">
                        <h6>Show Date</h6>
                    </div>
                    <div class="col-md-4">
                        <input type='checkbox' name='showDate' id='showDate' value='1' class='toggleswitch' checked="checked" />
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-8">
                        <h6>Show Nation</h6>
                    </div>
                    <div class="col-md-4">
                        <input type='checkbox' name='showNation' id='showNation' value='1' class='toggleswitch' checked="checked" />
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-8">
                        <h6>Night Mode</h6>
                    </div>
                    <div class="col-md-4">
                        <input type='checkbox' name='nightMode' id='nightMode' value='1' class='toggleswitch' />
                    </div>
                </div>
                <div class="row my-2">
                    <h6 class="mb-3">Colors</h6>
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
        </div>
    </div>
    <div class="body" style="display: flex; width: 100%;">
        <div class="menu" style="width: 100px; height: 100vh; background-color: #3d3c3c; position: fixed; margin-top: 5.7%;">
            <ul>
                <li><a href="../"><i class="fa-regular fa-bell"></i> <br><p>Báo thức online</p></a></li>
                <li><a href="../timer/"><i class="fa-regular fa-circle-arrow-down"></i><br><p>Đếm ngược online</p></a></li>
                <li class="active"><a href="../stopwatch/"><i class="fa-regular fa-bolt"></i> <br><p>Bấm giờ online</p></a></li>
                <li><a href=""><i class="fa-regular fa-clock"></i><br><p>Đông hồ online</p></a></li>
                <li><a href=""><i class="fa-regular fa-calendar"></i><br><p>Đếm ngày online</p></a></li>
            </ul>
        </div>
        <div class="menuForMobile" style="width: 50%; height: 100vh; background-color: #3d3c3c; position: fixed;">
            <a href="index.html"><img src="../image/logo.png" id="logoForMobile" alt=""></a>
            <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
            <ul>
                <li><a href="../"><i class="fa-regular fa-bell"></i> <br><p>Báo thức online</p></a></li>
                <li>
                    <a href="../timer/"><i class="fa-regular fa-circle-arrow-down"></i><br><p>Đếm ngược online</p></a></li>
                    <li class="active"><a href="../stopwatch/"><i class="fa-regular fa-bolt"></i> <br><p>Bấm giờ online</p></a></li>
                    <li><a href=""><i class="fa-regular fa-clock"></i><br><p>Đông hồ online</p></a></li>
                    <li><a href=""><i class="fa-regular fa-calendar"></i><br><p>Đếm ngày online</p></a></li>
                </ul>
            </div>
            <div class="content" id="content">
                <div class="box text-center" id="unset" style="background-color: white; padding-bottom: 1%; display: block;">
                    <div class="function p-2" style="text-align: right !important; font-size: 25px;">
                        <i class="fa-regular fa-share px-2 py-2" onclick="return scrollShare();"></i>
                        <i class="fa-solid fa-circle-plus px-2 py-2" onclick="return increaseFontSise();"></i>
                        <i class="fa-solid fa-circle-minus px-2 py-2" onclick="return decreaseFontSise();"></i>
                        <i class="fa-solid fa-expand fa-bars px-2 py-2" onclick="return FullScreenMode();"></i>
                    </div>
                    <strong style="text-align:center;">
                        <h1 class="hour" id="hourpc" style="margin: 0; font-size: 132px; color: #555;">
                            <span id="canChange">
                                <span id="hours">00</span>:
                                <span id="minutes">00</span>:
                                <span id="seconds">00</span>:
                                <span id="miliseconds">00</span>
                            </span>
                        </h1>
                    </strong>
                    <div class="resetandstart">
                        <button type="button" class="btn btn-warning mb-3 text-light" id="reset">Đặt lại</button>
                        <button type="button" class="btn btn-success mb-3" id="start">Bắt đầu</button>
                    </div>
                    <div class="lapandstop" style="display: none;">
                        <button type="button" class="btn btn-primary mb-3 text-light" id="lap">Vòng</button>
                        <button type="button" class="btn btn-danger mb-3" id="stop">Dừng</button>
                    </div>
                </div>

                <div class="box text-center openTable" style="background-color: white; padding-bottom: 1%; display: none;margin-top: 15px;padding: 15px;">
                    <table id="showStopWatchLap" style="margin: auto; font-family: digitalFont; font-size: 26px;">
                        <thead>
                            <tr>
                                <th scope="col" style="padding: 0 17px;">LAP</th>
                                <th scope="col" style="padding: 0 17px;">TIME</th>
                                <th scope="col" style="padding: 0 17px;">TOTAL TIME</th>
                            </tr>
                        </thead>
                        <tbody id=checkEveryThing>
                            <tr id="showData"></tr>
                        </tbody>
                    </table>
                </div>

                <!-- ============================ -->

                <div class="box text-center p-3" id="tutor" style="background-color: white; padding-bottom: 1%; margin-top: 15px; padding-top: 15px; width: 100%;">
                    <h4>Cách đặt một đồng hồ bấm giờ online</h4>
                    <p>Bước 1: Đặt Số giờ, Số phút và Số giây mà bạn muốn hẹn giờ hoặc chọn một số phút hoặc giây bất kì có sẵn từ danh sách tuỳ chọn. </p>
                    <p>Bước 2: Cài đặt Âm thanh báo động bằng cách nhấn vào dấu mũi tên rồi chọn một loại âm thanh từ danh sách tuỳ chọn.</p>
                    <p>Bước 3: Đặt Tên đồng hồ hẹn giờ hoặc dùng tên mặc định có sẵn.</p>
                    <p>Bước 4: Nhấn vào nút Bắt đầu hẹn giờ để bắt đầu quá trình hẹn giờ của bạn.</p>
                    <p>Để đặt nhiều đồng hồ hẹn giờ hơn, hãy mở một cửa sổ trình duyệt mới và lặp lại các bước ở trên.</p>
                </div>

                <div class="box text-center" id="share" style="background-color: white; padding-bottom: 1%; margin-top: 15px; padding-top: 15px;">
                    <div class="input-group flex-nowrap p-3">
                        <input type="text" class="form-control" placeholder="https://otime.com/#time=18:34&title=Alarm" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="image">
                        <img src="../image/facebook.png" alt="">
                        <img src="../image/whatsapp.png" alt="">
                        <img src="../image/zalo.png" alt="">
                        <img src="../image/pinterest.png" alt="">
                        <img src="../image/twitter.png" alt="">
                    </div>
                </div>

                <!-- =======================footer -->

                <div class="footer" style="width:100%;height: 50px; background-color: #1a1a1a;margin-top: 15px;text-align: center;
                padding: 15px 35px;color: #ddd; font-size: 13px;">
                <a href="footer/contactus.php" rel="nofollow " style="color: #ddd; ">Contacts</a> | <a href="footer/terms.php " rel="nofollow " style="color: #ddd; ">Terms of use</a> | <a href="footer/privacy.php" rel="nofollow " style="color: #ddd;
                ">Privacy</a> | <span class="text-nowrap">© 2022 otime.com</span>
            </div>

        </div>

    </div>
    <div class="editAlarm" style="display: none;width: 100%; height: 100vh; position: fixed; top: 0; left:0; z-index: 1;" onclick="exist();"></div>
    <div class="tableEditAlarm">
        <div class="headertable" style="width: 100%; height: 78.39px; background-color: #EF6262; padding: 20px 15px; position: absolute; border-radius: 5px 5px 0 0;">
            <h4 style="color: white;">Báo thức</h4>
            <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
        </div>
        <div class="bodyTable" style="width: 100%; height: auto; padding: 42px 15px 0px 15px; position: absolute; top: 14%; border-radius: 5px 5px 0 0;">
            <div class="row">
                <div class="border" id="codeSounds" style="border-radius: 38px;height: 72px;width: 72px;position: relative;margin: 0 auto;">
                    <img src="../image/alarm.png" style="width: 66px;position: absolute;top: 12px;left: 13px;" alt="">
                </div>
                <h4 style="color: black; text-align: center; margin-top: 20px;">Báo thức</h4>
                <p style="color: black; text-align: center; margin-top: 10px; font-size: 20px;">16:33</p>
            </div>
        </div>
        <div class="footertableAlarm" style="text-align: center;width: 100%;">
            <button type="button" class="btn text-white px-3" style="background-color: #EF6262; margin: 0 auto;" onclick="toggleMute();">OK</button>
        </div>
    </div>
    <style>
        .rotate {
            border: 1px solid black;
            padding: 11px 11px 11px 60px;
            border-radius: 5px;
            animation: rotation 0.5s forwards;
            width: 10%;
        }

        @keyframes rotation {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(10%);
                position: fixed;
                top: 23%;
                right: 0;
                padding: 11px 18px 11px 11px;
            }
        }
    </style>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js'></script>
    <script type='text/javascript' src='../js/toggleswitch.js'></script>
</body>
<script type ="text/javascript">

    let hours           = 00;
    let minutes         = 00;
    let seconds         = 00;
    let milliseconds    = 00;

    var interval_id = [];

    const hoursContainer        = document.getElementById("hours"); 
    const minutesContainer      = document.getElementById("minutes");
    const secondsContainer      = document.getElementById("seconds");
    const millisecondsContainer = document.getElementById("miliseconds"); 

    const start     = document.getElementById("start"); 
    const stop      = document.getElementById("stop");
    const reset     = document.getElementById("reset");
    const lap       = document.getElementById("lap");

    function startWatch(){

        milliseconds++; 
        if(milliseconds < 9){ 
            millisecondsContainer.innerHTML = `0${milliseconds}`;
        }else if(milliseconds > 99){
            milliseconds = 0;
            millisecondsContainer.innerHTML = "00";
            seconds++;
        } else{
            millisecondsContainer.innerHTML = milliseconds;
        }

        if(seconds <10){

            secondsContainer.innerHTML = `0${seconds}`;
        }else if(seconds > 59){
            minutes++;
            seconds = 0;
            secondsContainer.innerHTML = 00;
        }else {
            secondsContainer.innerHTML = seconds;
        }

        if(minutes < 10){ 
            minutesContainer.innerHTML = `0${minutes}`;
        } else if(minutes > 59) {
            hours++;
            minutes = 0;
            minutesContainer.innerHTML = minutes;
        } else {
            minutesContainer.innerHTML = minutes;
        }

        if(hours < 10){
            hoursContainer.innerHTML = `0${hours}`;
        }else{
            hoursContainer.innerHTML = hours;
        }

        $(".resetandstart").css("display","none");
        $(".lapandstop").css("display","block");

    }

        // Liều ============================================

    let hoursForRun         = 00;
    let minutesForRun       = 00;
    let secondsForRun       = 00;
    let millisecondsForRun  = 00;

    function startWatchForRun(){

        millisecondsForRun++; 
        if(millisecondsForRun < 9){ 
            $("#milisecondsForRun").text(`0${millisecondsForRun}`);
        }else if(millisecondsForRun > 99){
            millisecondsForRun = 0;
            $("#milisecondsForRun").text("00");
            secondsForRun++;
        } else{
            $("#milisecondsForRun").text(millisecondsForRun);
        }

        if(secondsForRun <10){
            $("#secondsForRun").text(`0${secondsForRun}`);
        }else if(secondsForRun > 59){
            minutesContainerForRun++;
            secondsForRun = 0;
            $("#secondsForRun").text(00);
        }else {
            $("#secondsForRun").text(secondsForRun);
        }

        if(minutesForRun < 10){ 
            $("#minutesForRun").text(`0${minutesForRun}`);
        } else if(minutesForRun > 59) {
            hours++;
            minutesForRun = 0;
            $("#minutesForRun").text(minutesForRun);
        } else {
            $("#minutesForRun").text(minutesForRun);
        }

        if(hoursForRun < 10){
            $("#hoursForRun").text(`0${hoursForRun}`);
        }else{
            $("#hoursForRun").text(hoursForRun);
        }

    }

    const startTimer = () => {

     interval_id.map((a) => {
        console.log(a)
        clearInterval(a);
        interval_id = [];
    })
     interval_id.push(setInterval(startWatch, 10));

 }

 const stopTimer = () => { 
     interval_id.map((a) => {
        console.log(a)
        clearInterval(a);
        interval_id = [];
    })
     $(".resetandstart").css("display","block");
     $(".lapandstop").css("display","none");
 }

 const resetTimer = () =>{
    milliseconds = 0;
    seconds = 0; 
    minutes = 0;
    hours = 0;
    millisecondsContainer.innerHTML = "00"; 
    secondsContainer.innerHTML = "00"; 
    minutesContainer.innerHTML = "00";
    hoursContainer.innerHTML = "00"; 
    clearInterval(interval_id);
}

var i = 1;

const lapTimer = () => {

    $(".openTable").css('display', 'block');

    if(i == 1){

        $("#showData").after('<tr id="createRow_'+i+'">'
            +'<td scope="row" style="padding: 0 17px;">'+i+'</td>'
            +'<td style="padding: 0 17px;">'+$("#canChange").text()+'</td>'
            +'<td style="padding: 0 17px;">'+$("#canChange").text()+'</td>'
            +'</tr>');

    } else if (i > 1){

                // cho chạy trước

                // Biên
        if( (i%2) > 0 ){

         interval_id.map((a) => {
            console.log(a)
            clearInterval(a);
            interval_id = [];
        })
         
            //         // chứa số lẻ là ra kết quả

            //         // Chạy chỉ còn thằng này duy nhất

            //     // check

            //     // alert("số lẻ");

         if($("#createRow").length == 1){

                    // Total time

            $("#createRow").attr('id', 'createRow_'+(i-1));

            hoursResult = $("#hoursForRun").text();
            minutesResult = $("#minutesForRun").text();
            secondsResult = $("#secondsForRun").text();
            milisecondsResult = $("#milisecondsForRun").text();

                    //====================================================================

            hoursForMaintainning = $("#hoursForMaintainning").text();
            minutesForMaintainning = $("#minutesForMaintainning").text();
            secondsForMaintainning = $("#secondsForMaintainning").text();
            milisecondsForMaintainning = $("#milisecondsForMaintainning").text();

            $("#showData").after(''
                +'<tr id="createRow_'+i+'">'
                +'<td scope="row" style="padding: 0 17px;">'+(i)+'</td>'
                +'<td style="padding: 0 17px;">'
                +'<span id="canChangeForResult">'
                +'<span id="hoursResult">'+hoursResult+'</span>:'
                +'<span id="minutesResult">'+minutesResult+'</span>:'
                +'<span id="secondsResult">'+secondsResult+'</span>:'
                +'<span id="milisecondsResult">'+milisecondsResult+'</span>'
                +'</span>'
                +'</td>'
                +'<td style="padding: 0 17px;" id="maintainResult">'
                +'<span id="canChangeForResult">'
                +'<span id="hoursForResult">'+hoursResult+'</span>:'
                +'<span id="minutesForResult">'+minutesForMaintainning+'</span>:'
                +'<span id="secondsForResult">'+secondsForMaintainning+'</span>:'
                +'<span id="milisecondsForResult">'+milisecondsForMaintainning+'</span>'
                +'</span>'
                +'</td>'
                +'</tr>');

        }

    } else {

                // chứa số chắn là chạy

        $("#showData").after(''
            +'<tr id="createRow">'
            +'<td scope="row" style="padding: 0 17px;">'+i+'</td>'
            +'<td style="padding: 0 17px;">'
            +'<span id="canChangeForRun">'
            +'<span id="hoursForRun">00</span>:'
            +'<span id="minutesForRun">00</span>:'
            +'<span id="secondsForRun">00</span>:'
            +'<span id="milisecondsForRun">00</span>'
            +'</span>'
            +'</td>'
            +'<td style="padding: 0 17px;" id="maintainForRun">'
            +'<span id="canChangeForMaintainning">'
            +'<span id="hoursForMaintainning">00</span>:'
            +'<span id="minutesForMaintainning">00</span>:'
            +'<span id="secondsForMaintainning">00</span>:'
            +'<span id="milisecondsForMaintainning">00</span>'
            +'</span>'
            +'</td>'
            +'</tr>');
        interval_id.map((a) => {
            console.log(a)
            clearInterval(a);
            interval_id = [];
        })

        interval_id.push(setInterval(test, 10));
        interval_id.push(setInterval(startWatchForRun, 10));
                // interval_id = [setInterval(test, 10),setInterval(startWatchForRun, 10)];

    }

}

i++;

}

function test(){

    hoursTest = $("#hours").text();
    minutesTest = $("#minutes").text();
    secondsTest = $("#seconds").text();
    milisecondsTest = $("#miliseconds").text();

    $("#hoursForMaintainning").text(hoursTest);
    $("#minutesForMaintainning").text(minutesTest);
    $("#secondsForMaintainning").text(secondsTest);
    $("#milisecondsForMaintainning").text(milisecondsTest);

}




        // "==========================================================="

start.addEventListener("click", startTimer);
stop.addEventListener("click", stopTimer);
reset.addEventListener("click", resetTimer);
lap.addEventListener("click", lapTimer);

        // var i = 1;
        // $("#lap").click(() => {


        // });


function increaseFontSise() {

                // làm từ đoạn này chuyển theo kích cỡ

    $("h5#nation").css('fontSize', '50px');
    $("h1#hourpc").css('fontSize', '150px');
    $("h5#realDay").css('fontSize', '52px');

    if (getCookie('decreaseFontSise') == 'decrease') {
        eraseCookie('decreaseFontSise');
        setCookie('increaseFontSise', 'increase', 30);

        $("i.fa-solid.fa-circle-plus.px-2.py-2").css('color', 'gray');
        $("i.fa-solid.fa-circle-plus.px-2.py-2").removeAttr('onclick');

        $("i.fa-solid.fa-circle-minus.px-2.py-2").css('color', 'black');
        $("i.fa-solid.fa-circle-minus.px-2.py-2").attr('onClick', 'decreaseFontSise()');

    } else {

                    // làm từ đoạn này chuyển theo kích cỡ

        setCookie('increaseFontSise', 'increase', 30);
        $("i.fa-solid.fa-circle-plus.px-2.py-2").css('color', 'gray');
        $("i.fa-solid.fa-circle-plus.px-2.py-2").removeAttr('onclick');

        $("i.fa-solid.fa-circle-minus.px-2.py-2").css('color', 'black');
        $("i.fa-solid.fa-circle-minus.px-2.py-2").attr('onClick', 'decreaseFontSise()');

    }

}

function decreaseFontSise() {

                // làm từ đoạn này chuyển theo kích cỡ

    $("h5#nation").css('fontSize', '25px');
    $("h1#hourpc").css('fontSize', '118px');
    $("h5#realDay").css('fontSize', '27px');

    if (getCookie('increaseFontSise') == 'increase') {
        eraseCookie('increaseFontSise');

        setCookie('decreaseFontSise', 'decrease', 30)

        $("i.fa-solid.fa-circle-minus.px-2.py-2").css('color', 'gray');
        $("i.fa-solid.fa-circle-minus.px-2.py-2").removeAttr('onclick');

        $("i.fa-solid.fa-circle-plus.px-2.py-2").css('color', 'black');
        $("i.fa-solid.fa-circle-plus.px-2.py-2").attr('onClick', 'increaseFontSise()');

    } else {
        setCookie('decreaseFontSise', 'decrease', 30);

        $("i.fa-solid.fa-circle-minus.px-2.py-2").css('color', 'gray');
        $("i.fa-solid.fa-circle-minus.px-2.py-2").removeAttr('onclick');

        $("i.fa-solid.fa-circle-plus.px-2.py-2").css('color', 'black');
        $("i.fa-solid.fa-circle-plus.px-2.py-2").attr('onClick', 'increaseFontSise()');
    }

}

function FullScreenMode() {

    clearInterval(interval);

    $("body").load("coverIndex.php");

}

function scrollShare() {
    $("html, body").animate({
        scrollTop: $(document).height()
    }, 0.5);

    $("#share").css('background-color', '#0d6efd');

    setTimeout(function() {
                    // Code to run after the pause
        $("#share").css('background-color', 'white');
    }, 2000);
}

function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999;';
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

$(function() {
    $(window).scroll(function() {
        var aTop = 435;
        if ($(this).scrollTop() >= aTop) {
            $("i.fa-solid.fa-ellipsis-vertical.action").addClass('rotate');
        }
    });
});

$(".action").click(function(e) {
    e.preventDefault();

    $("#settingAction").css("display", "block");
                // checkbox-1        
    $(".checkbox-1").html('<div class="form-check">' +
        '<input class="form-check-input" type="checkbox" onclick="return chooseAll();" id="chooseAll" value="checkAll">' + '</div>')
    $(".boxForMobile").scrollLeft("100%");
    $(".action").css("display", "none");

    for ($i = 1; $i <= $(".checkBox").length; $i++) {
        $("#checkbox_" + $i).html('<div class="form-check">' +
            '<input class="form-check-input checking" id="checking_' + $i + '" type="checkbox" value="' + $i + '">' + '</div>')
    }

});

function removeAlarmMobile() {

    for ($i = 1; $i <= $(".checkBox").length; $i++) {

        if ($("#checking_" + $i).prop('checked') == true) {
            id = $("#checkboxName_" + $i).val();
            removeAlarm(id);
        }

    }

    $("table#tableForMobile").load("index.php table#tableForMobile");

    $("div.forPC").load("index.php div.forPC");

    $("div.forMB").load("index.php div.forMB");

}

function existPhone() {

    $("#settingAction").css("display", "none");

    $(".action").css("display", "block");

    $("div.box.text-center.px-3.boxForMobile").load("index.php.divbox.text-center.px-3.boxForMobile");

    $("#tableForMobile").load("index.php #tableForMobile");

    $("div.forPC").load("index.php div.forPC");

    $("div.forMB").load("index.php div.forMB");

}

function chooseAll() {
    $("#chooseAll").remove();
    $(".checkbox-1").html('<div class="form-check">' +
        '<input class="form-check-input" type="checkbox" onclick="return giveUpAll();" id="giveUpAll" value="checkAll">' + '</div>')
    $("input.form-check-input").prop("checked", true)
}

function giveUpAll() {
    $("#giveUpAll").remove();
    $(".checkbox-1").html('<div class="form-check">' +
        '<input class="form-check-input" type="checkbox" onclick="return chooseAll();" id="chooseAll" value="checkAll">' + '</div>')
    $("input.form-check-input").prop("checked", false)
}

function rolldown() {
    $("#function").css('display', 'flex');
    $("#upanddown").children().remove();
    $("#upanddown").html('<i class="fa-solid fa-chevron-up p-1" id="roll" style="border-bottom: 1px solid white;" onclick="return rollup()"></i>');
}

function rollup() {
    $("#function").css('display', 'none');
    $("#upanddown").children().remove();
    $("#upanddown").html('<i class="fa-solid fa-chevron-down p-1" id="roll" style="border-bottom: 1px solid white;" onclick="return rolldown()"></i>');
}

$("#navbar").click(function(e) {
    e.preventDefault();
    $(".menuForMobile").css('display', 'block');
});

function setCookie(cname, cvalue, exdays) {
    document.cookie = cname + "=" + cvalue + ";expires=" + exdays;
}


if (document.cookie.split("; ")[0] == "showDate=off" ||
    document.cookie.split("; ")[1] == "showDate=off" ||
    document.cookie.split("; ")[2] == "showDate=off" ||
    document.cookie.split("; ")[3] == "showDate=off" ||
    document.cookie.split("; ")[4] == "showDate=off") {

    $("#realDay").css("display", "none");
    $("#showDate").prop('checked', false)

} else if (document.cookie.split("; ")[0] == "showDate=on" ||
    document.cookie.split("; ")[1] == "showDate=on" ||
    document.cookie.split("; ")[2] == "showDate=on" ||
    document.cookie.split("; ")[3] == "showDate=on" ||
    document.cookie.split("; ")[4] == "showDate=on") {

    $("#realDay").css("display", "block");
    $("#showDate").prop('checked', true)

}

if (document.cookie.split("; ")[0] == "showNation=off" ||
    document.cookie.split("; ")[1] == "showNation=off" ||
    document.cookie.split("; ")[2] == "showNation=off" ||
    document.cookie.split("; ")[3] == "showNation=off" ||
    document.cookie.split("; ")[4] == "showNation=off") {

    $("#nation").css("display", "none");
    $("#showNation").prop('checked', false)

} else if (document.cookie.split("; ")[0] == "showNation=on" ||
    document.cookie.split("; ")[1] == "showNation=on" ||
    document.cookie.split("; ")[2] == "showNation=on" ||
    document.cookie.split("; ")[3] == "showNation=on" ||
    document.cookie.split("; ")[4] == "showNation=on") {

    $("#nation").css("display", "block");
    $("#showNation").prop('checked', true)

}

if (document.cookie.split("; ")[0] == "colorHour=primary" ||
    document.cookie.split("; ")[1] == "colorHour=primary" ||
    document.cookie.split("; ")[2] == "colorHour=primary" ||
    document.cookie.split("; ")[3] == "colorHour=primary" ||
    document.cookie.split("; ")[4] == "colorHour=primary") {

    $("span.dot").css('border', '');
    $("span#bgPrimary").css('border', '3px solid white');
    $("h5.days").addClass('text-primary');
    $("strong h1.hour").addClass('text-primary');

} else if (document.cookie.split("; ")[0] == "colorHour=secondary" ||
    document.cookie.split("; ")[1] == "colorHour=secondary" ||
    document.cookie.split("; ")[2] == "colorHour=secondary" ||
    document.cookie.split("; ")[3] == "colorHour=secondary" ||
    document.cookie.split("; ")[4] == "colorHour=secondary") {

    $("span.dot").css('border', '');
    $("span#bgSecondary").css('border', '3px solid white');
    $("h5.days").addClass('text-secondary');
    $("strong h1.hour").addClass('text-secondary');

} else if (document.cookie.split("; ")[0] == "colorHour=success" ||
    document.cookie.split("; ")[1] == "colorHour=success" ||
    document.cookie.split("; ")[2] == "colorHour=success" ||
    document.cookie.split("; ")[3] == "colorHour=success" ||
    document.cookie.split("; ")[4] == "colorHour=success") {

    $("span.dot").css('border', '');
    $("span#bgSuccess").css('border', '3px solid white');
    $("h5.days").addClass('text-success');
    $("strong h1.hour").addClass('text-success');

} else if (document.cookie.split("; ")[0] == "colorHour=danger" ||
    document.cookie.split("; ")[1] == "colorHour=danger" ||
    document.cookie.split("; ")[2] == "colorHour=danger" ||
    document.cookie.split("; ")[3] == "colorHour=danger" ||
    document.cookie.split("; ")[4] == "colorHour=danger") {

    $("span.dot").css('border', '');
    $("span#bgDanger").css('border', '3px solid white');
    $("h5.days").addClass('text-danger');
    $("strong h1.hour").addClass('text-danger');

} else if (document.cookie.split("; ")[0] == "colorHour=warning" ||
    document.cookie.split("; ")[1] == "colorHour=warning" ||
    document.cookie.split("; ")[2] == "colorHour=warning" ||
    document.cookie.split("; ")[3] == "colorHour=warning" ||
    document.cookie.split("; ")[4] == "colorHour=warning") {

    $("span.dot").css('border', '');
    $("span#bgWarning").css('border', '3px solid white');
    $("h5.days").addClass('text-warning');
    $("strong h1.hour").addClass('text-warning');

} else if (document.cookie.split("; ")[0] == "colorHour=info" ||
    document.cookie.split("; ")[1] == "colorHour=info" ||
    document.cookie.split("; ")[2] == "colorHour=info" ||
    document.cookie.split("; ")[3] == "colorHour=info" ||
    document.cookie.split("; ")[4] == "colorHour=info") {

    $("span.dot").css('border', '');
    $("span#bgInfo").css('border', '3px solid white');
    $("h5.days").addClass('text-info');
    $("strong h1.hour").addClass('text-info');

} else if (document.cookie.split("; ")[0] == "colorHour=light" ||
    document.cookie.split("; ")[1] == "colorHour=light" ||
    document.cookie.split("; ")[2] == "colorHour=light" ||
    document.cookie.split("; ")[3] == "colorHour=light" ||
    document.cookie.split("; ")[4] == "colorHour=light") {

    $("span.dot").css('border', '');
    $("span#bgLight").css('border', '3px solid blue');
    $("h5.days").addClass('text-light');
    $("strong h1.hour").addClass('text-light');

} else if (document.cookie.split("; ")[0] == "colorHour=dark" ||
    document.cookie.split("; ")[1] == "colorHour=dark" ||
    document.cookie.split("; ")[2] == "colorHour=dark" ||
    document.cookie.split("; ")[3] == "colorHour=dark" ||
    document.cookie.split("; ")[4] == "colorHour=dark") {

    $("span.dot").css('border', '');
    $("span#bgDark").css('border', '3px solid white');
    $("h5.days").addClass('text-dark');
    $("strong h1.hour").addClass('text-dark');

}


if (document.cookie.split("; ")[0] == "color=moon" ||
    document.cookie.split("; ")[1] == "color=moon" ||
    document.cookie.split("; ")[2] == "color=moon" ||
    document.cookie.split("; ")[3] == "color=moon" ||
    document.cookie.split("; ")[4] == "color=moon") {

    $("#moon").removeClass('fa-moon').addClass('fa-sun');
    $("div.container-fluid.bg-primary.text-white.header").removeClass("bg-primary").addClass("bg-dark")
    .addClass("text-info").css("border-bottom", "1px solid #404a62")
    $("div.menu").addClass("bg-dark").css("border-right", "1px solid #404a62")
    $("div.content").addClass("bg-dark")
    $("div.box").addClass("bg-dark").css("border", "1px solid #404a62")
    $("body").addClass("text-white")
    $("table").addClass("text-white")

    $("input#nightMode").prop("checked", true)

} else if (document.cookie.split("; ")[0] == "color=sun" ||
    document.cookie.split("; ")[1] == "color=sun" ||
    document.cookie.split("; ")[2] == "color=sun" ||
    document.cookie.split("; ")[3] == "color=sun" ||
    document.cookie.split("; ")[4] == "color=sun") {

    $("#moon").removeClass('fa-sun').addClass('fa-moon');
    $("div.container-fluid.text-white.header.bg-dark.text-info").removeClass("bg-dark").addClass("bg-primary").addClass("text-dark").css("border-bottom", "")
    $("div.menu").removeClass("bg-dark").css("border-right", "")
    $("div.content").removeClass("bg-dark")
    $("div.box").removeClass("bg-dark").css("border", "")
    $("body").removeClass("text-white")
    $("table").removeClass("text-white")

    $("input#nightMode").prop("checked", false)

}

function moon() {

    if ($("#moon").hasClass('fa-moon')) {

        $("#moon").removeClass('fa-moon').addClass('fa-sun');
        $("div.container-fluid.bg-primary.text-white.header").removeClass("bg-primary").addClass("bg-dark")
        .addClass("text-info").css("border-bottom", "1px solid #404a62")
        $("div.menu").addClass("bg-dark").css("border-right", "1px solid #404a62")
        $("div.content").addClass("bg-dark")
        $("div.box").addClass("bg-dark").css("border", "1px solid #404a62")
        $("body").addClass("text-white")
        $("table").addClass("text-white")

        setCookie("color", "moon", 30)

    } else if ($("#moon").hasClass('fa-sun')) {

        $("#moon").removeClass('fa-sun').addClass('fa-moon');
        $("div.container-fluid.text-white.header.bg-dark.text-info").removeClass("bg-dark").addClass("bg-primary").addClass("text-dark").css("border-bottom", "")
        $("div.menu").removeClass("bg-dark").css("border-right", "")
        $("div.content").removeClass("bg-dark")
        $("div.box").removeClass("bg-dark").css("border", "")
        $("body").removeClass("text-white")
        $("table").removeClass("text-white")

        setCookie("color", "sun", 30)

    }

}

var elem = document.documentElement;

function openFullscreen() {
    if (elem.requestFullscreen) {
        document.getElementById("long").setAttribute('style', 'display:none');
        elem.requestFullscreen();
    }
}

window.addEventListener('resize', (evt) => {
    if (window.innerHeight == screen.height) {
        console.log('FULL SCREEN');
    } else {
        document.getElementById("long").setAttribute('style', 'display:block');
        console.log('NORMAL SCREEN');
    }
});

jQuery(document).ready(function($) {
    $('.toggleswitch').toggleSwitch({

        onClick: function() {
            console.log('Toggle Switch was clicked');
        },
        onChangeOn: function() {

            if ($(this).attr('name') == "showDate") {
                $("#realDay").css("display", "block");
                setCookie("showDate", "on", 30)
                console.log('Toggle Switch was changed to the ON position');
            } else if ($(this).attr('name') == "showNation") {
                setCookie("showNation", "on", 30)
                $("#nation").css("display", "block");
                console.log('Toggle Switch was changed to the ON position');
            } else if ($(this).attr('name') == "nightMode") {

                $("#moon").removeClass('fa-moon').addClass('fa-sun');
                $("div.container-fluid.bg-primary.text-white.header").removeClass("bg-primary").addClass("bg-dark")
                .addClass("text-info").css("border-bottom", "1px solid #404a62")
                $("div.menu").addClass("bg-dark").css("border-right", "1px solid #404a62")
                $("div.content").addClass("bg-dark")
                $("div.box").addClass("bg-dark").css("border", "1px solid #404a62")
                $("body").addClass("text-white")
                $("table").addClass("text-white")

                setCookie("color", "moon", 30)

            }
        },
        onChangeOff: function() {
            if ($(this).attr('name') == "showDate") {
                $("#realDay").css("display", "none");
                setCookie("showDate", "off", 30)
                console.log('Toggle Switch was changed to the OFF position');
            } else if ($(this).attr('name') == "showNation") {
                setCookie("showNation", "off", 30)
                $("#nation").css("display", "none");
                console.log('Toggle Switch was changed to the OFF position');
            } else if ($(this).attr('name') == "nightMode") {

                $("#moon").removeClass('fa-sun').addClass('fa-moon');
                $("div.container-fluid.text-white.header.bg-dark.text-info").removeClass("bg-dark").addClass("bg-primary").addClass("text-dark").css("border-bottom", "")
                $("div.menu").removeClass("bg-dark").css("border-right", "")
                $("div.content").removeClass("bg-dark")
                $("div.box").removeClass("bg-dark").css("border", "")
                $("body").removeClass("text-white")
                $("table").removeClass("text-white")

                setCookie("color", "sun", 30)
            }
        }

    })
                    // $("#opt2").trigger("click"); // turn it on
});





$("#gear").click(() => {
    $("div.editAlarm").css("display", "block");
                // alert(1);
    $("div#editGear").css("display", "block");
})

function exist() {
    $("div.menuForMobile").css("display", "none");
    $("div#editGear").css("display", "none");
    $("div.start").css("display", "none");
    $("div.editAlarm").css("display", "none");
    $("div.tableEdit").css("display", "none");
    $("div.howToUse").css("display", "none");
    $("div.tableEditAlarm").css("display", "none");
    $("#settings").css('display', 'none');
    toggleMute();
}

$("span#bgPrimary").click(function(event) {
                /* Act on the event */
    $("span.dot").css('border', '');
    $(this).css('border', '3px solid white');

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-success')) {
        $('h5.days').removeClass('text-success')
        $("strong h1.hour").removeClass('text-success');
    }

    if ($('h5.days').hasClass('text-danger')) {
        $('h5.days').removeClass('text-danger')
        $("strong h1.hour").removeClass('text-danger');
    }

    if ($('h5.days').hasClass('text-warning')) {
        $('h5.days').removeClass('text-warning')
        $("strong h1.hour").removeClass('text-warning');
    }

    if ($('h5.days').hasClass('text-info')) {
        $('h5.days').removeClass('text-info')
        $("strong h1.hour").removeClass('text-info');
    }

    if ($('h5.days').hasClass('text-light')) {
        $('h5.days').removeClass('text-light')
        $("strong h1.hour").removeClass('text-light');
    }

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-dark')) {
        $('h5.days').removeClass('text-dark')
        $("strong h1.hour").removeClass('text-dark');
    }

    $("h5.days").addClass('text-primary');
    $("strong h1.hour").addClass('text-primary');

    setCookie("colorHour", "primary", 30)

});

$("span#bgSecondary").click(function(event) {
                /* Act on the event */
    $("span.dot").css('border', '');
    $(this).css('border', '3px solid white');
    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-success')) {
        $('h5.days').removeClass('text-success')
        $("strong h1.hour").removeClass('text-success');
    }

    if ($('h5.days').hasClass('text-danger')) {
        $('h5.days').removeClass('text-danger')
        $("strong h1.hour").removeClass('text-danger');
    }

    if ($('h5.days').hasClass('text-warning')) {
        $('h5.days').removeClass('text-warning')
        $("strong h1.hour").removeClass('text-warning');
    }

    if ($('h5.days').hasClass('text-info')) {
        $('h5.days').removeClass('text-info')
        $("strong h1.hour").removeClass('text-info');
    }

    if ($('h5.days').hasClass('text-light')) {
        $('h5.days').removeClass('text-light')
        $("strong h1.hour").removeClass('text-light');
    }

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-dark')) {
        $('h5.days').removeClass('text-dark')
        $("strong h1.hour").removeClass('text-dark');
    }
    $("h5.days").addClass('text-secondary');
    $("strong h1.hour").addClass('text-secondary');
    setCookie("colorHour", "secondary", 30)
});

$("span#bgSuccess").click(function(event) {
                /* Act on the event */
    $("span.dot").css('border', '');
    $(this).css('border', '3px solid white');
    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-success')) {
        $('h5.days').removeClass('text-success')
        $("strong h1.hour").removeClass('text-success');
    }

    if ($('h5.days').hasClass('text-danger')) {
        $('h5.days').removeClass('text-danger')
        $("strong h1.hour").removeClass('text-danger');
    }

    if ($('h5.days').hasClass('text-warning')) {
        $('h5.days').removeClass('text-warning')
        $("strong h1.hour").removeClass('text-warning');
    }

    if ($('h5.days').hasClass('text-info')) {
        $('h5.days').removeClass('text-info')
        $("strong h1.hour").removeClass('text-info');
    }

    if ($('h5.days').hasClass('text-light')) {
        $('h5.days').removeClass('text-light')
        $("strong h1.hour").removeClass('text-light');
    }

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-dark')) {
        $('h5.days').removeClass('text-dark')
        $("strong h1.hour").removeClass('text-dark');
    }
    $("h5.days").addClass('text-success');
    $("strong h1.hour").addClass('text-success');
    setCookie("colorHour", "success", 30)
});

$("span#bgDanger").click(function(event) {
                /* Act on the event */
    $("span.dot").css('border', '');
    $(this).css('border', '3px solid white');
    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-success')) {
        $('h5.days').removeClass('text-success')
        $("strong h1.hour").removeClass('text-success');
    }

    if ($('h5.days').hasClass('text-danger')) {
        $('h5.days').removeClass('text-danger')
        $("strong h1.hour").removeClass('text-danger');
    }

    if ($('h5.days').hasClass('text-warning')) {
        $('h5.days').removeClass('text-warning')
        $("strong h1.hour").removeClass('text-warning');
    }

    if ($('h5.days').hasClass('text-info')) {
        $('h5.days').removeClass('text-info')
        $("strong h1.hour").removeClass('text-info');
    }

    if ($('h5.days').hasClass('text-light')) {
        $('h5.days').removeClass('text-light')
        $("strong h1.hour").removeClass('text-light');
    }

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-dark')) {
        $('h5.days').removeClass('text-dark')
        $("strong h1.hour").removeClass('text-dark');
    }
    $("h5.days").addClass('text-danger');
    $("strong h1.hour").addClass('text-danger');
    setCookie("colorHour", "danger", 30)
});

$("span#bgWarning").click(function(event) {
                /* Act on the event */
    $("span.dot").css('border', '');
    $(this).css('border', '3px solid white');
    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-success')) {
        $('h5.days').removeClass('text-success')
        $("strong h1.hour").removeClass('text-success');
    }

    if ($('h5.days').hasClass('text-danger')) {
        $('h5.days').removeClass('text-danger')
        $("strong h1.hour").removeClass('text-danger');
    }

    if ($('h5.days').hasClass('text-warning')) {
        $('h5.days').removeClass('text-warning')
        $("strong h1.hour").removeClass('text-warning');
    }

    if ($('h5.days').hasClass('text-info')) {
        $('h5.days').removeClass('text-info')
        $("strong h1.hour").removeClass('text-info');
    }

    if ($('h5.days').hasClass('text-light')) {
        $('h5.days').removeClass('text-light')
        $("strong h1.hour").removeClass('text-light');
    }

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-dark')) {
        $('h5.days').removeClass('text-dark')
        $("strong h1.hour").removeClass('text-dark');
    }
    $("h5.days").addClass('text-warning');
    $("strong h1.hour").addClass('text-warning');
    setCookie("colorHour", "warning", 30)
});

$("span#bgInfo").click(function(event) {
                /* Act on the event */
    $("span.dot").css('border', '');
    $(this).css('border', '3px solid white');
    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-success')) {
        $('h5.days').removeClass('text-success')
        $("strong h1.hour").removeClass('text-success');
    }

    if ($('h5.days').hasClass('text-danger')) {
        $('h5.days').removeClass('text-danger')
        $("strong h1.hour").removeClass('text-danger');
    }

    if ($('h5.days').hasClass('text-warning')) {
        $('h5.days').removeClass('text-warning')
        $("strong h1.hour").removeClass('text-warning');
    }

    if ($('h5.days').hasClass('text-info')) {
        $('h5.days').removeClass('text-info')
        $("strong h1.hour").removeClass('text-info');
    }

    if ($('h5.days').hasClass('text-light')) {
        $('h5.days').removeClass('text-light')
        $("strong h1.hour").removeClass('text-light');
    }

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-dark')) {
        $('h5.days').removeClass('text-dark')
        $("strong h1.hour").removeClass('text-dark');
    }
    $("h5.days").addClass('text-info');
    $("strong h1.hour").addClass('text-info');
    setCookie("colorHour", "info", 30)
});

$("span#bgLight").click(function(event) {
                /* Act on the event */
    $("span.dot").css('border', '');
    $(this).css('border', '3px solid blue');
    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-success')) {
        $('h5.days').removeClass('text-success')
        $("strong h1.hour").removeClass('text-success');
    }

    if ($('h5.days').hasClass('text-danger')) {
        $('h5.days').removeClass('text-danger')
        $("strong h1.hour").removeClass('text-danger');
    }

    if ($('h5.days').hasClass('text-warning')) {
        $('h5.days').removeClass('text-warning')
        $("strong h1.hour").removeClass('text-warning');
    }

    if ($('h5.days').hasClass('text-info')) {
        $('h5.days').removeClass('text-info')
        $("strong h1.hour").removeClass('text-info');
    }

    if ($('h5.days').hasClass('text-light')) {
        $('h5.days').removeClass('text-light')
        $("strong h1.hour").removeClass('text-light');
    }

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-dark')) {
        $('h5.days').removeClass('text-dark')
        $("strong h1.hour").removeClass('text-dark');
    }
    $("h5.days").addClass('text-light');
    $("strong h1.hour").addClass('text-light');
    setCookie("colorHour", "light", 30)
});

$("span#bgDark").click(function(event) {
                /* Act on the event */
    $("span.dot").css('border', '');
    $(this).css('border', '3px solid white');
    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-success')) {
        $('h5.days').removeClass('text-success')
        $("strong h1.hour").removeClass('text-success');
    }

    if ($('h5.days').hasClass('text-danger')) {
        $('h5.days').removeClass('text-danger')
        $("strong h1.hour").removeClass('text-danger');
    }

    if ($('h5.days').hasClass('text-warning')) {
        $('h5.days').removeClass('text-warning')
        $("strong h1.hour").removeClass('text-warning');
    }

    if ($('h5.days').hasClass('text-info')) {
        $('h5.days').removeClass('text-info')
        $("strong h1.hour").removeClass('text-info');
    }

    if ($('h5.days').hasClass('text-light')) {
        $('h5.days').removeClass('text-light')
        $("strong h1.hour").removeClass('text-light');
    }

    if ($('h5.days').hasClass('text-secondary')) {
        $('h5.days').removeClass('text-secondary')
        $("strong h1.hour").removeClass('text-secondary');
    }

    if ($('h5.days').hasClass('text-dark')) {
        $('h5.days').removeClass('text-dark')
        $("strong h1.hour").removeClass('text-dark');
    }
    $("h5.days").addClass('text-dark');
    $("strong h1.hour").addClass('text-dark');
    setCookie("colorHour", "dark", 30)
});
            // <span id="bgPrimary" class="dot me-2 mb-2 bg-primary"></span>
            // <span id="bgSecondary" class="dot me-2 mb-2 bg-secondary"></span>
            // <span id="bgSuccess" class="dot me-2 mb-2 bg-success"></span>
            // <span id="bgDanger" class="dot me-2 mb-2 bg-danger"></span>
            // <span id="bgWarning" class="dot me-2 mb-2 bg-warning"></span>
            // <span id="bgInfo" class="dot me-2 mb-2 bg-info"></span>
            // <span id="bgLight" class="dot me-2 mb-2 bg-light"></span>
            // <span id="bgDark" class="dot me-2 mb-2 bg-dark"></span>
</script>
</html>