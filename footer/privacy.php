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
                <li class="active"><a href="../index.php"><i class="fa-regular fa-bell"></i> <br><p>Báo thức online</p></a></li>
                <li><a href=""><i class="fa-regular fa-circle-arrow-down"></i><br><p>Đếm ngược online</p></a></li>
                <li><a href=""><i class="fa-regular fa-bolt"></i> <br><p>Bấm giờ online</p></a></li>
                <li><a href=""><i class="fa-regular fa-clock"></i><br><p>Đông hồ online</p></a></li>
                <li><a href=""><i class="fa-regular fa-calendar"></i><br><p>Đếm ngày online</p></a></li>
            </ul>
        </div>
        <div class="menuForMobile" style="width: 50%; height: 100vh; background-color: #3d3c3c; position: fixed;">
            <a href="index.html"><img src="../image/logo.png" id="logoForMobile" alt=""></a>
            <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
            <ul>
                <li class="active"><a href="../index.php"><i class="fa-regular fa-bell"></i> <br><p>Báo thức online</p></a></li>
                <li><a href=""><i class="fa-regular fa-circle-arrow-down"></i><br><p>Đếm ngược online</p></a></li>
                <li><a href=""><i class="fa-regular fa-bolt"></i> <br><p>Bấm giờ online</p></a></li>
                <li><a href=""><i class="fa-regular fa-clock"></i><br><p>Đông hồ online</p></a></li>
                <li><a href=""><i class="fa-regular fa-calendar"></i><br><p>Đếm ngày online</p></a></li>
            </ul>
        </div>
        <div class="content" id="content">
            <div class="box text-center" id="unset" style="background-color: white; padding-bottom: 1%; display: block;">
                <h1>Privacy Policy</h1>
            </div>


            <!-- =======================footer -->

            <div class="footer " style="width:100%;height: 50px; background-color: #1a1a1a;margin-top: 15px;text-align: center; padding: 15px 35px;color: #ddd; font-size: 13px; ">
                <a href="contactus.php" rel="nofollow " style="color: #ddd; ">Contacts</a> | <a href="terms.php " rel="nofollow " style="color: #ddd; ">Terms of use</a> | <a href="privacy.php" rel="nofollow " style="color: #ddd;
                    ">Privacy</a> | <span class="text-nowrap ">© 2022 otime.com</span>
            </div>

        </div>

    </div>
    <div class="editAlarm " style="display: none;width: 100%; height: 100vh; position: fixed; top: 0; left:0; z-index: 1; " onclick="exist(); "></div>
    <div class="tableEditAlarm ">
        <div class="headertable " style="width: 100%; height: 78.39px; background-color: #EF6262; padding: 20px 15px; position: absolute; border-radius: 5px 5px 0 0; ">
            <h4 style="color: white; ">Báo thức</h4>
            <i class="fa-solid fa-xmark " style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px; " onclick="exist(); "></i>
        </div>
        <div class="bodyTable " style="width: 100%; height: auto; padding: 42px 15px 0px 15px; position: absolute; top: 14%; border-radius: 5px 5px 0 0; ">
            <div class="row ">
                <div class="border " id="codeSounds " style="border-radius: 38px;height: 72px;width: 72px;position: relative;margin: 0 auto; ">
                    <img src="../image/alarm.png " style="width: 66px;position: absolute;top: 12px;left: 13px; " alt=" ">
                </div>
                <h4 style="color: black; text-align: center; margin-top: 20px; ">Báo thức</h4>
                <p style="color: black; text-align: center; margin-top: 10px; font-size: 20px; ">16:33</p>
            </div>
        </div>
        <div class="footertableAlarm " style="text-align: center;width: 100%; ">
            <button type="button " class="btn text-white px-3 " style="background-color: #EF6262; margin: 0 auto; " onclick="toggleMute(); ">OK</button>
        </div>
    </div>
    <div class="tableEdit ">
        <div class="headertable " style="width: 100%; height: 78.39px; background-color: #0090dd; padding: 20px 15px; position: absolute; border-radius: 5px 5px 0 0; ">
            <h4 style="color: white; ">Đặt thời gian thông báo</h4>
            <i class="fa-solid fa-xmark " style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px; " onclick="exist(); "></i>
        </div>
        <div class="bodyTable " style="width: 100%; height: auto; padding: 42px 15px 0px 15px; position: absolute; top: 14%; border-radius: 5px 5px 0 0; ">
            <form action=" " method="post " class="align-center ">
                <div class="row ">
                    <div class="boxHour col-md-6 col-6 ">
                        <select class="form-select " name="hour " id="hour " aria-label="Default select example ">
                        <option value="notvalue ">Giờ</option>
                        <?php
                        for ($i = 0; $i <= 23; $i++) { 
                            echo '<option value=" '.$i.' ">'.$i.'</option>';
                        }
                        ?>
                    </select>
                    </div>
                    <div class="boxHour col-md-6 col-6 ">
                        <select class="form-select " name="minute " id="minute " aria-label="Default select example ">
                        <option value="notvalue ">Phút</option>
                        <?php
                        for ($i = 0; $i <= 59; $i++) { 
                            echo '<option value=" '.$i.' ">'.$i.'</option>';
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <label for=" " style="padding-top: 10px; ">Âm thanh báo thức: </label>
                <select class="form-select " id="soundAlarm " aria-label="Âm thanh báo thức ">
                <option value="clock " checked>Đồng hồ báo thức</option>
                <option value="buzzer ">Tiếng bíp</option>
                <option value="roosters ">Gà trống</option>
                <option value="police-siren ">Còi cảnh sát</option>
                <option value="nuclear ">Hạt nhân</option>
                <option value="alien ">Người ngoài hành tinh</option>
                <option value="rain ">Mưa</option>
                <option value="bomb-explosion ">Bom</option>
                <option value="mystic ">Huyền bí</option>
                <option value="bell ">Chuông</option>
                <option value="white-noise ">Tiếng ồn trắng</option>
            </select>
                <label for=" " style="padding-top: 10px; ">Tên báo thức: </label>
                <div class="input-group mb-3 ">
                    <input type="text " id="titleAlarm " class="form-control " placeholder="Alarm " aria-label="Username " aria-describedby="basic-addon1 ">
                </div>
        </div>
        <div class="footertable ">
            <div class="row " id="controll ">
                <div class="align-left col-md-1 ">
                    <button type="button " class="btn btn-outline-secondary " onclick="return setAlarm(); ">Test</button>
                </div>
                <div class="text-right col-md-11 ">
                    <button type="button " class="btn btn-outline-secondary " onclick="exist(); ">Cancel</button>
                    <button type="button " class="btn btn-success " id="start ">Start</button>
                </div>
            </div>
        </div>
        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js " integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin=" anonymous "></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js'></script>
    <script type='text/javascript' src='../js/toggleswitch.js'></script>

    <script>
        function increaseFontSise() {

            // làm từ đoạn này chuyển theo kích cỡ

            $("h5#nation ").css('fontSize', '50px');
            $("h1#hourpc ").css('fontSize', '150px');
            $("h5#realDay ").css('fontSize', '52px');

            if (getCookie('decreaseFontSise') == 'decrease') {
                eraseCookie('decreaseFontSise');
                setCookie('increaseFontSise', 'increase', 30);

                $("i.fa-solid.fa-circle-plus.px-2.py-2 ").css('color', 'gray');
                $("i.fa-solid.fa-circle-plus.px-2.py-2 ").removeAttr('onclick');

                $("i.fa-solid.fa-circle-minus.px-2.py-2 ").css('color', 'black');
                $("i.fa-solid.fa-circle-minus.px-2.py-2 ").attr('onClick', 'decreaseFontSise()');

            } else {

                // làm từ đoạn này chuyển theo kích cỡ

                setCookie('increaseFontSise', 'increase', 30);
                $("i.fa-solid.fa-circle-plus.px-2.py-2 ").css('color', 'gray');
                $("i.fa-solid.fa-circle-plus.px-2.py-2 ").removeAttr('onclick');

                $("i.fa-solid.fa-circle-minus.px-2.py-2 ").css('color', 'black');
                $("i.fa-solid.fa-circle-minus.px-2.py-2 ").attr('onClick', 'decreaseFontSise()');

            }

        }

        function decreaseFontSise() {

            // làm từ đoạn này chuyển theo kích cỡ

            $("h5#nation ").css('fontSize', '25px');
            $("h1#hourpc ").css('fontSize', '118px');
            $("h5#realDay ").css('fontSize', '27px');

            if (getCookie('increaseFontSise') == 'increase') {
                eraseCookie('increaseFontSise');

                alert("th1 ");

                setCookie('decreaseFontSise', 'decrease', 30)

                $("i.fa-solid.fa-circle-minus.px-2.py-2 ").css('color', 'gray');
                $("i.fa-solid.fa-circle-minus.px-2.py-2 ").removeAttr('onclick');

                $("i.fa-solid.fa-circle-plus.px-2.py-2 ").css('color', 'black');
                $("i.fa-solid.fa-circle-plus.px-2.py-2 ").attr('onClick', 'increaseFontSise()');

            } else {
                setCookie('decreaseFontSise', 'decrease', 30);

                alert("th2 ");

                $("i.fa-solid.fa-circle-minus.px-2.py-2 ").css('color', 'gray');
                $("i.fa-solid.fa-circle-minus.px-2.py-2 ").removeAttr('onclick');

                $("i.fa-solid.fa-circle-plus.px-2.py-2 ").css('color', 'black');
                $("i.fa-solid.fa-circle-plus.px-2.py-2 ").attr('onClick', 'increaseFontSise()');
            }

        }

        function FullScreenMode() {

            clearInterval(interval);



            $("body ").load("coverIndex.php ");

        }

        function scrollShare() {
            $("html, body ").animate({
                scrollTop: $(document).height()
            }, 0.5);

            $("#share ").css('background-color', '#0d6efd');

            setTimeout(function() {
                // Code to run after the pause
                $("#share ").css('background-color', 'white');
            }, 2000);
        }

        function restartAlarm(id) {

            soundName = "clock ";

            titleAlarm = $("#titleAlarm_ " + id).text();

            if (titleAlarm == " ") {

                titleAlarm = "haha ";

            }

            HourAndMinute = $("#HourAndMinute_ " + id).text();

            splitString = HourAndMinute.split(": ");

            hour = splitString[0];

            minute = splitString[1];

            if (hour == "notvalue " || minute == "notvalue ") {
                alert("You have not selected the hour or minute to notify ")
            } else {
                $.ajax({
                    url: 'calculateTime.php',
                    type: 'get',
                    data: {
                        'hour': hour,
                        'minute': minute,
                        'soundName': soundName,
                        'titleAlarm': titleAlarm
                    },
                    success: function(data) {

                        console.log(data);

                        $("div.start ").css("display ", "none ");
                        $("div.editAlarm ").css("display ", "none ");
                        $("div.tableEdit ").css("display ", "none ");
                        $("div.howToUse ").css("display ", "none ");
                        $("div#unset ").css("display ", "none ");

                        // ĐẶT LẠI GIỜ BẰNG JQUERY ĐỒNG THỜI SESSION ĐẶT THẲNG BIẾN

                        $("div#currently ").css("display ", "block ");

                        handleData = data.split("+ ")

                        hour = handleData[0]

                        minute = handleData[1]

                        $("span#timeSeted ").text(hour + ": " + minute + ":00 ");

                        // cái này là khoảng thời gian còn lại 

                        $("div#alarmFuture ").css("display ", "block ");

                        // Tính giờ còn lại
                        setInterval(runtime, 1000);

                        window.location.href = window.location.href;

                    }
                });
            }

        }


        $(function() {
            $(window).scroll(function() {
                var aTop = 435;
                if ($(this).scrollTop() >= aTop) {
                    $("i.fa-solid.fa-ellipsis-vertical.action ").addClass('rotate');
                }
            });
        });


        function existPhone() {

            $("#settingAction ").css("display ", "none ");

            $(".action ").css("display ", "block ");

            $("div.box.text-center.px-3.boxForMobile ").load("index.php.divbox.text-center.px-3.boxForMobile ");

            $("#tableForMobile ").load("index.php #tableForMobile ");

            $("div.forPC ").load("index.php div.forPC ");

            $("div.forMB ").load("index.php div.forMB ");

        }

        function chooseAll() {
            $("#chooseAll ").remove();
            $(".checkbox-1 ").html('<div class="form-check ">' +
                '<input class="form-check-input " type="checkbox " onclick="return giveUpAll(); " id="giveUpAll " value="checkAll ">' + '</div>')
            $("input.form-check-input ").prop("checked ", true)
        }

        function giveUpAll() {
            $("#giveUpAll ").remove();
            $(".checkbox-1 ").html('<div class="form-check ">' +
                '<input class="form-check-input " type="checkbox " onclick="return chooseAll(); " id="chooseAll " value="checkAll ">' + '</div>')
            $("input.form-check-input ").prop("checked ", false)
        }

        function rolldown() {
            $("#function ").css('display', 'flex');
            $("#upanddown ").children().remove();
            $("#upanddown ").html('<i class="fa-solid fa-chevron-up p-1 " id="roll " style="border-bottom: 1px solid white; " onclick="return rollup() "></i>');
        }

        function rollup() {
            $("#function ").css('display', 'none');
            $("#upanddown ").children().remove();
            $("#upanddown ").html('<i class="fa-solid fa-chevron-down p-1 " id="roll " style="border-bottom: 1px solid white; " onclick="return rolldown() "></i>');
        }

        $("#navbar ").click(function(e) {
            e.preventDefault();
            $(".menuForMobile ").css('display', 'block');
        });

        function setCookie(cname, cvalue, exdays) {
            document.cookie = cname + "=" + cvalue + " ;expires=" + exdays;
        }


        if (document.cookie.split(" ; ")[0] == "showDate=off " ||
            document.cookie.split("; ")[1] == "showDate=off " ||
            document.cookie.split("; ")[2] == "showDate=off " ||
            document.cookie.split("; ")[3] == "showDate=off " ||
            document.cookie.split("; ")[4] == "showDate=off ") {

            $("#realDay ").css("display ", "none ");
            $("#showDate ").prop('checked', false)

        } else if (document.cookie.split("; ")[0] == "showDate=on " ||
            document.cookie.split("; ")[1] == "showDate=on " ||
            document.cookie.split("; ")[2] == "showDate=on " ||
            document.cookie.split("; ")[3] == "showDate=on " ||
            document.cookie.split("; ")[4] == "showDate=on ") {

            $("#realDay ").css("display ", "block ");
            $("#showDate ").prop('checked', true)

        }

        if (document.cookie.split("; ")[0] == "showNation=off " ||
            document.cookie.split("; ")[1] == "showNation=off " ||
            document.cookie.split("; ")[2] == "showNation=off " ||
            document.cookie.split("; ")[3] == "showNation=off " ||
            document.cookie.split("; ")[4] == "showNation=off ") {

            $("#nation ").css("display ", "none ");
            $("#showNation ").prop('checked', false)

        } else if (document.cookie.split("; ")[0] == "showNation=on " ||
            document.cookie.split("; ")[1] == "showNation=on " ||
            document.cookie.split("; ")[2] == "showNation=on " ||
            document.cookie.split("; ")[3] == "showNation=on " ||
            document.cookie.split("; ")[4] == "showNation=on ") {

            $("#nation ").css("display ", "block ");
            $("#showNation ").prop('checked', true)

        }

        if (document.cookie.split("; ")[0] == "colorHour=primary " ||
            document.cookie.split("; ")[1] == "colorHour=primary " ||
            document.cookie.split("; ")[2] == "colorHour=primary " ||
            document.cookie.split("; ")[3] == "colorHour=primary " ||
            document.cookie.split("; ")[4] == "colorHour=primary ") {

            $("span.dot ").css('border', '');
            $("span#bgPrimary ").css('border', '3px solid white');
            $("h5.days ").addClass('text-primary');
            $("strong h1.hour ").addClass('text-primary');

        } else if (document.cookie.split("; ")[0] == "colorHour=secondary " ||
            document.cookie.split("; ")[1] == "colorHour=secondary " ||
            document.cookie.split("; ")[2] == "colorHour=secondary " ||
            document.cookie.split("; ")[3] == "colorHour=secondary " ||
            document.cookie.split("; ")[4] == "colorHour=secondary ") {

            $("span.dot ").css('border', '');
            $("span#bgSecondary ").css('border', '3px solid white');
            $("h5.days ").addClass('text-secondary');
            $("strong h1.hour ").addClass('text-secondary');

        } else if (document.cookie.split("; ")[0] == "colorHour=success " ||
            document.cookie.split("; ")[1] == "colorHour=success " ||
            document.cookie.split("; ")[2] == "colorHour=success " ||
            document.cookie.split("; ")[3] == "colorHour=success " ||
            document.cookie.split("; ")[4] == "colorHour=success ") {

            $("span.dot ").css('border', '');
            $("span#bgSuccess ").css('border', '3px solid white');
            $("h5.days ").addClass('text-success');
            $("strong h1.hour ").addClass('text-success');

        } else if (document.cookie.split("; ")[0] == "colorHour=danger " ||
            document.cookie.split("; ")[1] == "colorHour=danger " ||
            document.cookie.split("; ")[2] == "colorHour=danger " ||
            document.cookie.split("; ")[3] == "colorHour=danger " ||
            document.cookie.split("; ")[4] == "colorHour=danger ") {

            $("span.dot ").css('border', '');
            $("span#bgDanger ").css('border', '3px solid white');
            $("h5.days ").addClass('text-danger');
            $("strong h1.hour ").addClass('text-danger');

        } else if (document.cookie.split("; ")[0] == "colorHour=warning " ||
            document.cookie.split("; ")[1] == "colorHour=warning " ||
            document.cookie.split("; ")[2] == "colorHour=warning " ||
            document.cookie.split("; ")[3] == "colorHour=warning " ||
            document.cookie.split("; ")[4] == "colorHour=warning ") {

            $("span.dot ").css('border', '');
            $("span#bgWarning ").css('border', '3px solid white');
            $("h5.days ").addClass('text-warning');
            $("strong h1.hour ").addClass('text-warning');

        } else if (document.cookie.split("; ")[0] == "colorHour=info " ||
            document.cookie.split("; ")[1] == "colorHour=info " ||
            document.cookie.split("; ")[2] == "colorHour=info " ||
            document.cookie.split("; ")[3] == "colorHour=info " ||
            document.cookie.split("; ")[4] == "colorHour=info ") {

            $("span.dot ").css('border', '');
            $("span#bgInfo ").css('border', '3px solid white');
            $("h5.days ").addClass('text-info');
            $("strong h1.hour ").addClass('text-info');

        } else if (document.cookie.split("; ")[0] == "colorHour=light " ||
            document.cookie.split("; ")[1] == "colorHour=light " ||
            document.cookie.split("; ")[2] == "colorHour=light " ||
            document.cookie.split("; ")[3] == "colorHour=light " ||
            document.cookie.split("; ")[4] == "colorHour=light ") {

            $("span.dot ").css('border', '');
            $("span#bgLight ").css('border', '3px solid blue');
            $("h5.days ").addClass('text-light');
            $("strong h1.hour ").addClass('text-light');

        } else if (document.cookie.split("; ")[0] == "colorHour=dark " ||
            document.cookie.split("; ")[1] == "colorHour=dark " ||
            document.cookie.split("; ")[2] == "colorHour=dark " ||
            document.cookie.split("; ")[3] == "colorHour=dark " ||
            document.cookie.split("; ")[4] == "colorHour=dark ") {

            $("span.dot ").css('border', '');
            $("span#bgDark ").css('border', '3px solid white');
            $("h5.days ").addClass('text-dark');
            $("strong h1.hour ").addClass('text-dark');

        }


        if (document.cookie.split("; ")[0] == "color=moon " ||
            document.cookie.split("; ")[1] == "color=moon " ||
            document.cookie.split("; ")[2] == "color=moon " ||
            document.cookie.split("; ")[3] == "color=moon " ||
            document.cookie.split("; ")[4] == "color=moon ") {

            $("#moon ").removeClass('fa-moon').addClass('fa-sun');
            $("div.container-fluid.bg-primary.text-white.header ").removeClass("bg-primary ").addClass("bg-dark ")
                .addClass("text-info ").css("border-bottom ", "1px solid #404a62 ")
            $("div.menu ").addClass("bg-dark ").css("border-right ", "1px solid #404a62 ")
            $("div.content ").addClass("bg-dark ")
            $("div.box ").addClass("bg-dark ").css("border ", "1px solid #404a62 ")
            $("body ").addClass("text-white ")
            $("table ").addClass("text-white ")

            $("input#nightMode ").prop("checked ", true)

        } else if (document.cookie.split("; ")[0] == "color=sun " ||
            document.cookie.split("; ")[1] == "color=sun " ||
            document.cookie.split("; ")[2] == "color=sun " ||
            document.cookie.split("; ")[3] == "color=sun " ||
            document.cookie.split("; ")[4] == "color=sun ") {

            $("#moon ").removeClass('fa-sun').addClass('fa-moon');
            $("div.container-fluid.text-white.header.bg-dark.text-info ").removeClass("bg-dark ").addClass("bg-primary ").addClass("text-dark ").css("border-bottom ", " ")
            $("div.menu ").removeClass("bg-dark ").css("border-right ", " ")
            $("div.content ").removeClass("bg-dark ")
            $("div.box ").removeClass("bg-dark ").css("border ", " ")
            $("body ").removeClass("text-white ")
            $("table ").removeClass("text-white ")

            $("input#nightMode ").prop("checked ", false)

        }

        function moon() {

            if ($("#moon ").hasClass('fa-moon')) {

                $("#moon ").removeClass('fa-moon').addClass('fa-sun');
                $("div.container-fluid.bg-primary.text-white.header ").removeClass("bg-primary ").addClass("bg-dark ")
                    .addClass("text-info ").css("border-bottom ", "1px solid #404a62 ")
                $("div.menu ").addClass("bg-dark ").css("border-right ", "1px solid #404a62 ")
                $("div.content ").addClass("bg-dark ")
                $("div.box ").addClass("bg-dark ").css("border ", "1px solid #404a62 ")
                $("body ").addClass("text-white ")
                $("table ").addClass("text-white ")

                setCookie("color ", "moon ", 30)

            } else if ($("#moon ").hasClass('fa-sun')) {

                $("#moon ").removeClass('fa-sun').addClass('fa-moon');
                $("div.container-fluid.text-white.header.bg-dark.text-info ").removeClass("bg-dark ").addClass("bg-primary ").addClass("text-dark ").css("border-bottom ", " ")
                $("div.menu ").removeClass("bg-dark ").css("border-right ", " ")
                $("div.content ").removeClass("bg-dark ")
                $("div.box ").removeClass("bg-dark ").css("border ", " ")
                $("body ").removeClass("text-white ")
                $("table ").removeClass("text-white ")

                setCookie("color ", "sun ", 30)

            }

        }

        jQuery(document).ready(function($) {
            $('.toggleswitch').toggleSwitch({

                    onClick: function() {
                        console.log('Toggle Switch was clicked');
                    },
                    onChangeOn: function() {

                        if ($(this).attr('name') == "showDate ") {
                            $("#realDay ").css("display ", "block ");
                            setCookie("showDate ", "on ", 30)
                            console.log('Toggle Switch was changed to the ON position');
                        } else if ($(this).attr('name') == "showNation ") {
                            setCookie("showNation ", "on ", 30)
                            $("#nation ").css("display ", "block ");
                            console.log('Toggle Switch was changed to the ON position');
                        } else if ($(this).attr('name') == "nightMode ") {

                            $("#moon ").removeClass('fa-moon').addClass('fa-sun');
                            $("div.container-fluid.bg-primary.text-white.header ").removeClass("bg-primary ").addClass("bg-dark ")
                                .addClass("text-info ").css("border-bottom ", "1px solid #404a62 ")
                            $("div.menu ").addClass("bg-dark ").css("border-right ", "1px solid #404a62 ")
                            $("div.content ").addClass("bg-dark ")
                            $("div.box ").addClass("bg-dark ").css("border ", "1px solid #404a62 ")
                            $("body ").addClass("text-white ")
                            $("table ").addClass("text-white ")

                            setCookie("color ", "moon ", 30)

                        }
                    },
                    onChangeOff: function() {
                        if ($(this).attr('name') == "showDate ") {
                            $("#realDay ").css("display ", "none ");
                            setCookie("showDate ", "off ", 30)
                            console.log('Toggle Switch was changed to the OFF position');
                        } else if ($(this).attr('name') == "showNation ") {
                            setCookie("showNation ", "off ", 30)
                            $("#nation ").css("display ", "none ");
                            console.log('Toggle Switch was changed to the OFF position');
                        } else if ($(this).attr('name') == "nightMode ") {

                            $("#moon ").removeClass('fa-sun').addClass('fa-moon');
                            $("div.container-fluid.text-white.header.bg-dark.text-info ").removeClass("bg-dark ").addClass("bg-primary ").addClass("text-dark ").css("border-bottom ", " ")
                            $("div.menu ").removeClass("bg-dark ").css("border-right ", " ")
                            $("div.content ").removeClass("bg-dark ")
                            $("div.box ").removeClass("bg-dark ").css("border ", " ")
                            $("body ").removeClass("text-white ")
                            $("table ").removeClass("text-white ")

                            setCookie("color ", "sun ", 30)
                        }
                    }

                })
                // $("#opt2 ").trigger("click "); // turn it on
        });


        $("#setAlarm ").click(() => {
            $("div.editAlarm ").css("display ", "block ");
            $("div.tableEdit ").css("display ", "block ");
        })

        $("#gear ").click(() => {
            $("div.editAlarm ").css("display ", "block ");
            // alert(1);
            $("div#editGear ").css("display ", "block ");
        })

        function exist() {
            $("div.menuForMobile ").css("display ", "none ");
            $("div#editGear ").css("display ", "none ");
            $("div.start ").css("display ", "none ");
            $("div.editAlarm ").css("display ", "none ");
            $("div.tableEdit ").css("display ", "none ");
            $("div.howToUse ").css("display ", "none ");
            $("div.tableEditAlarm ").css("display ", "none ");
            $("#settings ").css('display', 'none');
        }

        $("span#bgPrimary ").click(function(event) {
            /* Act on the event */
            $("span.dot ").css('border', '');
            $(this).css('border', '3px solid white');

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-success')) {
                $('h5.days').removeClass('text-success')
                $("strong h1.hour ").removeClass('text-success');
            }

            if ($('h5.days').hasClass('text-danger')) {
                $('h5.days').removeClass('text-danger')
                $("strong h1.hour ").removeClass('text-danger');
            }

            if ($('h5.days').hasClass('text-warning')) {
                $('h5.days').removeClass('text-warning')
                $("strong h1.hour ").removeClass('text-warning');
            }

            if ($('h5.days').hasClass('text-info')) {
                $('h5.days').removeClass('text-info')
                $("strong h1.hour ").removeClass('text-info');
            }

            if ($('h5.days').hasClass('text-light')) {
                $('h5.days').removeClass('text-light')
                $("strong h1.hour ").removeClass('text-light');
            }

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-dark')) {
                $('h5.days').removeClass('text-dark')
                $("strong h1.hour ").removeClass('text-dark');
            }

            $("h5.days ").addClass('text-primary');
            $("strong h1.hour ").addClass('text-primary');

            setCookie("colorHour ", "primary ", 30)

        });

        $("span#bgSecondary ").click(function(event) {
            /* Act on the event */
            $("span.dot ").css('border', '');
            $(this).css('border', '3px solid white');
            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-success')) {
                $('h5.days').removeClass('text-success')
                $("strong h1.hour ").removeClass('text-success');
            }

            if ($('h5.days').hasClass('text-danger')) {
                $('h5.days').removeClass('text-danger')
                $("strong h1.hour ").removeClass('text-danger');
            }

            if ($('h5.days').hasClass('text-warning')) {
                $('h5.days').removeClass('text-warning')
                $("strong h1.hour ").removeClass('text-warning');
            }

            if ($('h5.days').hasClass('text-info')) {
                $('h5.days').removeClass('text-info')
                $("strong h1.hour ").removeClass('text-info');
            }

            if ($('h5.days').hasClass('text-light')) {
                $('h5.days').removeClass('text-light')
                $("strong h1.hour ").removeClass('text-light');
            }

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-dark')) {
                $('h5.days').removeClass('text-dark')
                $("strong h1.hour ").removeClass('text-dark');
            }
            $("h5.days ").addClass('text-secondary');
            $("strong h1.hour ").addClass('text-secondary');
            setCookie("colorHour ", "secondary ", 30)
        });

        $("span#bgSuccess ").click(function(event) {
            /* Act on the event */
            $("span.dot ").css('border', '');
            $(this).css('border', '3px solid white');
            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-success')) {
                $('h5.days').removeClass('text-success')
                $("strong h1.hour ").removeClass('text-success');
            }

            if ($('h5.days').hasClass('text-danger')) {
                $('h5.days').removeClass('text-danger')
                $("strong h1.hour ").removeClass('text-danger');
            }

            if ($('h5.days').hasClass('text-warning')) {
                $('h5.days').removeClass('text-warning')
                $("strong h1.hour ").removeClass('text-warning');
            }

            if ($('h5.days').hasClass('text-info')) {
                $('h5.days').removeClass('text-info')
                $("strong h1.hour ").removeClass('text-info');
            }

            if ($('h5.days').hasClass('text-light')) {
                $('h5.days').removeClass('text-light')
                $("strong h1.hour ").removeClass('text-light');
            }

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-dark')) {
                $('h5.days').removeClass('text-dark')
                $("strong h1.hour ").removeClass('text-dark');
            }
            $("h5.days ").addClass('text-success');
            $("strong h1.hour ").addClass('text-success');
            setCookie("colorHour ", "success ", 30)
        });

        $("span#bgDanger ").click(function(event) {
            /* Act on the event */
            $("span.dot ").css('border', '');
            $(this).css('border', '3px solid white');
            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-success')) {
                $('h5.days').removeClass('text-success')
                $("strong h1.hour ").removeClass('text-success');
            }

            if ($('h5.days').hasClass('text-danger')) {
                $('h5.days').removeClass('text-danger')
                $("strong h1.hour ").removeClass('text-danger');
            }

            if ($('h5.days').hasClass('text-warning')) {
                $('h5.days').removeClass('text-warning')
                $("strong h1.hour ").removeClass('text-warning');
            }

            if ($('h5.days').hasClass('text-info')) {
                $('h5.days').removeClass('text-info')
                $("strong h1.hour ").removeClass('text-info');
            }

            if ($('h5.days').hasClass('text-light')) {
                $('h5.days').removeClass('text-light')
                $("strong h1.hour ").removeClass('text-light');
            }

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-dark')) {
                $('h5.days').removeClass('text-dark')
                $("strong h1.hour ").removeClass('text-dark');
            }
            $("h5.days ").addClass('text-danger');
            $("strong h1.hour ").addClass('text-danger');
            setCookie("colorHour ", "danger ", 30)
        });

        $("span#bgWarning ").click(function(event) {
            /* Act on the event */
            $("span.dot ").css('border', '');
            $(this).css('border', '3px solid white');
            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-success')) {
                $('h5.days').removeClass('text-success')
                $("strong h1.hour ").removeClass('text-success');
            }

            if ($('h5.days').hasClass('text-danger')) {
                $('h5.days').removeClass('text-danger')
                $("strong h1.hour ").removeClass('text-danger');
            }

            if ($('h5.days').hasClass('text-warning')) {
                $('h5.days').removeClass('text-warning')
                $("strong h1.hour ").removeClass('text-warning');
            }

            if ($('h5.days').hasClass('text-info')) {
                $('h5.days').removeClass('text-info')
                $("strong h1.hour ").removeClass('text-info');
            }

            if ($('h5.days').hasClass('text-light')) {
                $('h5.days').removeClass('text-light')
                $("strong h1.hour ").removeClass('text-light');
            }

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-dark')) {
                $('h5.days').removeClass('text-dark')
                $("strong h1.hour ").removeClass('text-dark');
            }
            $("h5.days ").addClass('text-warning');
            $("strong h1.hour ").addClass('text-warning');
            setCookie("colorHour ", "warning ", 30)
        });

        $("span#bgInfo ").click(function(event) {
            /* Act on the event */
            $("span.dot ").css('border', '');
            $(this).css('border', '3px solid white');
            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-success')) {
                $('h5.days').removeClass('text-success')
                $("strong h1.hour ").removeClass('text-success');
            }

            if ($('h5.days').hasClass('text-danger')) {
                $('h5.days').removeClass('text-danger')
                $("strong h1.hour ").removeClass('text-danger');
            }

            if ($('h5.days').hasClass('text-warning')) {
                $('h5.days').removeClass('text-warning')
                $("strong h1.hour ").removeClass('text-warning');
            }

            if ($('h5.days').hasClass('text-info')) {
                $('h5.days').removeClass('text-info')
                $("strong h1.hour ").removeClass('text-info');
            }

            if ($('h5.days').hasClass('text-light')) {
                $('h5.days').removeClass('text-light')
                $("strong h1.hour ").removeClass('text-light');
            }

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-dark')) {
                $('h5.days').removeClass('text-dark')
                $("strong h1.hour ").removeClass('text-dark');
            }
            $("h5.days ").addClass('text-info');
            $("strong h1.hour ").addClass('text-info');
            setCookie("colorHour ", "info ", 30)
        });

        $("span#bgLight ").click(function(event) {
            /* Act on the event */
            $("span.dot ").css('border', '');
            $(this).css('border', '3px solid blue');
            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-success')) {
                $('h5.days').removeClass('text-success')
                $("strong h1.hour ").removeClass('text-success');
            }

            if ($('h5.days').hasClass('text-danger')) {
                $('h5.days').removeClass('text-danger')
                $("strong h1.hour ").removeClass('text-danger');
            }

            if ($('h5.days').hasClass('text-warning')) {
                $('h5.days').removeClass('text-warning')
                $("strong h1.hour ").removeClass('text-warning');
            }

            if ($('h5.days').hasClass('text-info')) {
                $('h5.days').removeClass('text-info')
                $("strong h1.hour ").removeClass('text-info');
            }

            if ($('h5.days').hasClass('text-light')) {
                $('h5.days').removeClass('text-light')
                $("strong h1.hour ").removeClass('text-light');
            }

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-dark')) {
                $('h5.days').removeClass('text-dark')
                $("strong h1.hour ").removeClass('text-dark');
            }
            $("h5.days ").addClass('text-light');
            $("strong h1.hour ").addClass('text-light');
            setCookie("colorHour ", "light ", 30)
        });

        $("span#bgDark ").click(function(event) {
            /* Act on the event */
            $("span.dot ").css('border', '');
            $(this).css('border', '3px solid white');
            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-success')) {
                $('h5.days').removeClass('text-success')
                $("strong h1.hour ").removeClass('text-success');
            }

            if ($('h5.days').hasClass('text-danger')) {
                $('h5.days').removeClass('text-danger')
                $("strong h1.hour ").removeClass('text-danger');
            }

            if ($('h5.days').hasClass('text-warning')) {
                $('h5.days').removeClass('text-warning')
                $("strong h1.hour ").removeClass('text-warning');
            }

            if ($('h5.days').hasClass('text-info')) {
                $('h5.days').removeClass('text-info')
                $("strong h1.hour ").removeClass('text-info');
            }

            if ($('h5.days').hasClass('text-light')) {
                $('h5.days').removeClass('text-light')
                $("strong h1.hour ").removeClass('text-light');
            }

            if ($('h5.days').hasClass('text-secondary')) {
                $('h5.days').removeClass('text-secondary')
                $("strong h1.hour ").removeClass('text-secondary');
            }

            if ($('h5.days').hasClass('text-dark')) {
                $('h5.days').removeClass('text-dark')
                $("strong h1.hour ").removeClass('text-dark');
            }
            $("h5.days ").addClass('text-dark');
            $("strong h1.hour ").addClass('text-dark');
            setCookie("colorHour ", "dark ", 30)
        });
        // <span id="bgPrimary " class="dot me-2 mb-2 bg-primary "></span>
        // <span id="bgSecondary " class="dot me-2 mb-2 bg-secondary "></span>
        // <span id="bgSuccess " class="dot me-2 mb-2 bg-success "></span>
        // <span id="bgDanger " class="dot me-2 mb-2 bg-danger "></span>
        // <span id="bgWarning " class="dot me-2 mb-2 bg-warning "></span>
        // <span id="bgInfo " class="dot me-2 mb-2 bg-info "></span>
        // <span id="bgLight " class="dot me-2 mb-2 bg-light "></span>
        // <span id="bgDark " class="dot me-2 mb-2 bg-dark "></span>
    </script>
</body>

</html>