<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
    <style>

    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        div.option {
            font-size: 16px;
            padding: 4px 10px;
            margin: 0 2px;
            border-radius: 4px;
            color: #aaaaaa;
            user-select: none;
            -webkit-user-select: none;
            transition: color .2s cubic-bezier(.4, 0, .2, 1), background-color .2s cubic-bezier(.4, 0, .2, 1);
            will-change: color, background-color;
        }
        
        div.option:hover {
            background-color: blue;
            opacity: 0.5;
            color: white;
        }
        
        .active {
            background-color: blue;
            color: white !important;
        }

        @media only screen and (min-width: 360px) and (max-width: 1319px) {
            div#settings{
                width: 97%;
                height: 98vh;
                background-color: rgba(51, 51, 51, 0.84);
                position: absolute;
                bottom: 4px;
                right: 7px;
                border-radius: 4px;
                padding: 10px;
                display: block;
                z-index: 1000;
                overflow-y: auto;
            }

            .hahaha{
                overflow-y: auto;
                display: block;
            }
        }
    </style>
</head>

<body>
    <div class="box text-center" id="unset" style="padding-bottom: 1%;
     display: block; height: 100vh; color: white; position: relative;">
        <div class="imageEffect" style="width: 100%; height: 100vh;background-image: url('image/background-default.jpg');"></div>
        <div class="function p-2 userForHide" style="text-align: right !important;font-size: 25px;background-color: black;
        opacity: 0.8;position: absolute;top: 5px;right: 63px;border-radius: 5px;">
            <i class="fa-solid fa-xmark fa-bars px-2 py-2" onclick="return existFullscreen();"></i>
        </div>
        <div class="function p-2 useForExist" style="text-align: right !important; font-size: 25px; background-color: black; 
        opacity: 0.8; position: absolute; top: 5px; right: 5px; border-radius: 5px;">
            <i class="fa-solid fa-expand fa-bars px-2 py-2" onclick="return openFullscreen();"></i>
        </div>
        <h5 class="days" id="nation" style="display: none;">Vietnam</h5>
        <strong>
                <h1 class="hour" id="hourpc" style="display: none;margin: 0; text-align:center; font-size: 132px;"> 18:48:02 PM</h1>
                <h1 class="hour" id="hourpcFullscreen" style="position: absolute; top: 11%;
    left: 10%;
    width: 80%;
    height: 58%;
    display: flex;
    align-items: center;
    justify-content: center;font-size: 40px;color: white !important;">
                    <span id="hour">18</span>:<span id="minute">48</span>:<span id="seconds">02</span> <span class="AMorPM"> PM</span>
                </h1>
             </strong>
        <strong>
                 <h1 class="hour" id="hourForMobile"
                  style="margin: 0; text-align:center; font-size: 75px; display:none;">18:48:02 PM</h1>
             </strong>
        <h5 class="days" id="realDays" style="position: absolute;top: 11%;left: 10%;width: 80%;height: 79%;display: flex;
        align-items: center;justify-content: center;font-size: 40px;color: white;">
            <span id="day">Monday</span><span id="month"> January</span><span id="timeofweek"> 01/09/2023 </span>
        </h5>
        <!-- 				<div class="function p-2" style="font-size: 25px; background-color: black; opacity: 0.8; position: absolute; bottom: 5px; right: 52px; border-radius: 5px;">
					<i class="fa-solid fa-download px-2 py-2" onclick="return download();"></i>
				</div> -->
        <div class="function p-2" style="font-size: 25px; background-color: black; opacity: 0.8; position: absolute; bottom: 5px; right: 5px; border-radius: 5px; width: 42px;">
            <i class="fa-solid fa-ellipsis-vertical px-2 py-2" onclick="settingScreen();"></i>
        </div>
        <div class="editAlarm" style="display: none;width: 100%; height: 100vh; background-color: #787878; position: fixed; top: 0; left:0; opacity: 0; z-index: 1;" onclick="exist();"></div>
        <div id="settings" style="width: 537.27px;
                height: auto;
                background-color: rgba(51, 51, 51, 0.84);
                position: absolute;
                bottom: 65px;
                right: 17px;
                border-radius: 4px; padding: 10px; display: none; z-index: 1000">
            <div class="hahaha" style="display: flex;">
                <div class="left">
                    <div class="theme">
                        <h6 style="color: #eeeeee;
                            font-size: 20px;
                            cursor: default;
                            transition: color .2s cubic-bezier(.4,0,.2,1);
                            will-change: color; text-align: left; margin-left: 12px;">Theme</h6>
                        <div class="options" style="display: flex;">
                            <div class="option optionTheme" id="system" onclick="return system();">System</div>
                            <div class="option optionTheme" id="light" onclick="return light();">Light</div>
                            <div class="option optionTheme" id="dark" onclick="return dark();">Dark</div>
                            <div class="option optionTheme" id="defaultTheme" onclick="return DefaulTheme();">DefaulTheme</div>
                        </div>
                    </div>
                    <div class="theme">
                        <div class="optionn">
                            <form>
                                <label for="firstImg" class="input-label" style="cursor: pointer;">Click here to upload your theme</label>
                                <input type="file" id="firstImg" name="image" style="visibility: none;display: none;" />
                            </form>
                        </div>
                    </div>
                    <div class="theme">
                        <h6 style="color: #eeeeee;
                            font-size: 20px;
                            cursor: default;
                            transition: color .2s cubic-bezier(.4,0,.2,1);
                            will-change: color; text-align: left; margin-left: 12px;">Seconds</h6>
                        <div class="options" style="display: flex;">
                            <div class="option option_5 optionSeconds active" id="SecondsShow" onclick="showAndOffSeconds('show');">Show</div>
                            <div class="option option_6 optionSeconds" id="SecondsHide" onclick="showAndOffSeconds('hide');">Hide</div>
                        </div>
                    </div>
                    <div class="theme">
                        <h6 style="color: #eeeeee;
                            font-size: 20px;
                            cursor: default;
                            transition: color .2s cubic-bezier(.4,0,.2,1);
                            will-change: color; text-align: left; margin-left: 12px;">Hours</h6>
                        <div class="options" style="display: flex;">
                            <div class="option option_7 optionHours" id="change24Hours" onclick="return changeHours('change24');">24</div>
                            <div class="option option_8 optionHours" id="change12Hours" onclick="return changeHours('change12');">12</div>
                            <div class="option option_9 optionHours active" id="change12AndAMPM" onclick="return changeHours('change12plusAMPM');">12 + AM/PM</div>
                        </div>
                    </div>
                    <div class="theme">
                        <h6 style="color: #eeeeee;
                            font-size: 20px;
                            cursor: default;
                            transition: color .2s cubic-bezier(.4,0,.2,1);
                            will-change: color; text-align: left; margin-left: 12px;">Date</h6>
                        <div class="options" style="display: flex;">
                            <div class="option option_10 optionDate" id="hideDate" onclick="return kindofDate('hideDate');">Hide</div>
                            <div class="option option_11 optionDate" id="kindofD" onclick="return kindofDate('kindofD');">D</div>
                            <div class="option option_12 optionDate" id="kindofDDMM" onclick="return kindofDate('kindofDDMM');">DD/MM</div>
                            <div class="option option_13 optionDate active" id="kindofMMĐD" onclick="return kindofDate('kindofMMĐD');">MM/DD</div>
                        </div>
                    </div>
                    <div class="theme">
                        <h6 style="color: #eeeeee;
                            font-size: 20px;
                            cursor: default;
                            transition: color .2s cubic-bezier(.4,0,.2,1);
                            will-change: color; text-align: left; margin-left: 12px;">Day</h6>
                        <div class="options" style="display: flex;">
                            <div class="option option_14 optionDay active" id="FullDay" onclick="return kindofDay('FullDay');">Full</div>
                            <div class="option option_15 optionDay" id="HideDay" onclick="return kindofDay('HideDay');">Hide</div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="theme">
                        <h6 style="color: #eeeeee;
                            font-size: 20px;
                            cursor: default;
                            transition: color .2s cubic-bezier(.4,0,.2,1);
                            will-change: color; text-align: left; margin-left: 12px;">Month</h6>
                        <div class="options" style="display: flex;">
                            <div class="option option_16 optionMonth" id="ShortMonth" onclick="return kindofMonth('ShortMonth');">Short</div>
                            <div class="option option_17 optionMonth active" id="FullMonth" onclick="return kindofMonth('FullMonth');">Full</div>
                            <div class="option option_18 optionMonth" id="HideMonth" onclick="return kindofMonth('HideMonth');">Hide</div>
                        </div>
                    </div>
                    <div class="theme">
                        <h6 style="color: #eeeeee;
                            font-size: 20px;
                            cursor: default;
                            transition: color .2s cubic-bezier(.4,0,.2,1);
                            will-change: color; text-align: left; margin-left: 12px;">Year</h6>
                        <div class="options" style="display: flex;">
                            <div class="option option_19 optionYear" id="ShortYears" onclick="return kindofYear('ShortYears');">Short</div>
                            <div class="option option_20 optionYear active" id="FullYears" onclick="return kindofYear('FullYears');">Full</div>
                            <div class="option option_21 optionYear" id="HideYears" onclick="return kindofYear('HideYears');">Hide</div>
                        </div>
                    </div>
                    <div class="theme">
                        <h6 style="color: #eeeeee;
                            font-size: 20px;
                            cursor: default;
                            transition: color .2s cubic-bezier(.4,0,.2,1);
                            will-change: color; text-align: left; margin-left: 12px;">Image Effect</h6>
                        <div class="options" style="display: flex;">
                            <div class="option option_22 optionImageEffect active" id="NormalImageEffect" onclick="return settingImageEffect('normal');">Normal</div>
                            <div class="option option_23 optionImageEffect" id="BlurImageEffect" onclick="return settingImageEffect('blur');">Blur</div>
                            <div class="option option_24 optionImageEffect" id="DarkenImageEffect" onclick="return settingImageEffect('darken');">Darken</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="createdby">
                Created by oTime
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
        function eraseCookie(name) {
            document.cookie = name + '=; Max-Age=-99999999;';
        }

        function runningTime() {
            $.ajax({
                url: 'timeScript.php',
                success: function(data) {
                    splitArray = data.split("+");
                    $('#hourpcFullscreen').html(splitArray[1]);
                },
            });
        }

        // Theme

        if ($(".imageEffect").css("background-image", "url(image/background-default.jpg)")) {
            DefaulTheme();
        }

        if (getCookie("theme") == "system") {
            system();
        } else if (getCookie("theme") == "light") {
            light();
        } else if (getCookie("theme") == "dark") {
            dark();
        } else if (getCookie("theme") == "DefaulTheme") {
            DefaulTheme();
        }

        function system() {

            $(".optionTheme").css("backgroundColor", "").css("color", "#aaaaaa");
            $(".imageEffect").css("backgroundColor", "");
            $(".imageEffect").css("background-image", "");
            $("h5").css("color", "black");
            $("h1").css("color", "black");
            $("#system").css("backgroundColor", "blue");
            $("#system").css("color", "white");

            eraseCookie("theme");
            setCookie("theme", "system", 30)

        }

        function light() {
            $(".optionTheme").css("backgroundColor", "").css("color", "#aaaaaa");
            $(".imageEffect").css("backgroundColor", "");
            $(".imageEffect").css("background-image", "");
            $("h5").css("color", "black");
            $("h1").css("color", "black");
            $("#light").css("backgroundColor", "blue");
            $("#light").css("color", "white");

            eraseCookie("theme");
            setCookie("theme", "light", 30)
        }

        function dark() {
            $(".optionTheme").css("backgroundColor", "").css("color", "#aaaaaa");
            $(".imageEffect").css("background-image", "");
            $(".imageEffect").css("backgroundColor", "black");
            $("h5").css("color", "white");
            $("h1").css("color", "white");
            $("#dark").css("backgroundColor", "blue");
            $("#dark").css("color", "white");

            eraseCookie("theme");
            setCookie("theme", "dark", 30)
        }

        function DefaulTheme() {
            $(".optionTheme").css("backgroundColor", "").css("color", "#aaaaaa");
            $(".imageEffect").css("backgroundColor", "");
            $(".imageEffect").css("background-image", "url(image/background-default.jpg)");
            $("h5").css("color", "white");
            $("h1").css("color", "white");
            $("#defaultTheme").css("backgroundColor", "blue");
            $("#defaultTheme").css("color", "white");

            eraseCookie("theme");
            setCookie("theme", "DefaulTheme", 30);
        }

        $("#firstImg").change(function() {

            eraseCookie("theme");

            var image = $('#firstImg').prop('files')[0];

            var form_data = new FormData();
            form_data.append('file', image);

            $.ajax({
                url: 'loadImage.php', // <-- point to server-side PHP script 
                dataType: 'text', // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data) {
                    $(".imageEffect").css("background-image", "url(image/" + data + ")");
                    $.ajax({
                        url: 'loadNameImage.php', // <-- point to server-side PHP script 
                        dataType: 'text', // <-- what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(data) {
                            $(".imageEffect").css("background-image", "url(image/" + data + ")");
                            $("h5").css("color", "white");
                            $("h1").css("color", "white");
                        }
                    });
                }
            });

        });

        // ==================================================================

        // Seconds

        // Handle

        function showAndOffSeconds(status) {

            $(".optionSeconds.active").removeClass("active");

            if (status == "show") {

                $("#SecondsShow").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else {

                $("#SecondsHide").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            }

        }

        function changeHours(change) {

            $(".optionHours.active").removeClass("active");

            if (change == "change24") {

                $("#change24Hours").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (change == "change12") {

                $("#change12Hours").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (change == "change12plusAMPM") {

                $("#change12AndAMPM").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            }
        }

        function kindofDate(typeofDate) {

            $(".optionDate.active").removeClass("active");

            if (typeofDate == "hideDate") {

                $("#hideDate").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (typeofDate == "kindofD") {

                $("#kindofD").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (typeofDate == "kindofDDMM") {

                $("#kindofDDMM").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (typeofDate == "kindofMMĐD") {

                $("#kindofMMĐD").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            }

        }

        function kindofDay(kindofDay) {

            $(".optionDay.active").removeClass("active");

            if (kindofDay == "FullDay") {

                $("#FullDay").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else {

                $("#HideDay").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            }

        }

        function kindofMonth(kindofMonth) {

            $(".optionMonth.active").removeClass("active");

            if (kindofMonth == "ShortMonth") {

                $("#ShortMonth").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (kindofMonth == "FullMonth") {

                $("#FullMonth").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (kindofMonth == "HideMonth") {

                $("#HideMonth").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            }
        }

        function kindofYear(kindofYear) {

            $(".optionYear.active").removeClass("active");

            if (kindofYear == "ShortYears") {

                $("#ShortYears").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (kindofYear == "FullYears") {

                $("#FullYears").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            } else if (kindofYear == "HideYears") {

                $("#HideYears").addClass("active");

                window.setTimeout(function() {
                    controll();
                }, 600);

            }
        }

        $(document).ready(function() {

            interval = setInterval(controll, 1000);

        });

        var arrayFunction = [];

        function controll() {

            for (var i = 5; i <= $(".option").length; i++) {

                if ($(".option_" + i).css("background-color") == "rgb(0, 0, 255)") {

                    if ((i == 5) || (i == 6)) {

                        seconds = $(".option_" + i).attr("id");

                        arrayFunction[0] = seconds;

                    } else if ((i == 7) || (i == 8) || (i == 9)) {

                        hours = $(".option_" + i).attr("id");

                        arrayFunction[1] = hours;

                    } else if ((i == 10) || (i == 11) || (i == 12) || (i == 13)) {

                        date = $(".option_" + i).attr("id");

                        arrayFunction[2] = date;

                    } else if ((i == 14) || (i == 15)) {

                        day = $(".option_" + i).attr("id");

                        arrayFunction[3] = day;

                    } else if ((i == 16) || (i == 17) || (i == 18)) {

                        month = $(".option_" + i).attr("id");

                        arrayFunction[4] = month;

                    } else if ((i == 19) || (i == 20) || (i == 21)) {

                        year = $(".option_" + i).attr("id");

                        arrayFunction[5] = year;

                    }

                }

            }

            $.ajax({
                url: 'handleWithSettings.php',
                type: 'get',
                data: {
                    'seconds': arrayFunction[0],
                    'hours': arrayFunction[1],
                    'date': arrayFunction[2],
                    'day': arrayFunction[3],
                    'month': arrayFunction[4],
                    'year': arrayFunction[5],
                },
                success: function(data) {

                    splitdata = data.split("+");

                    $("#hourpcFullscreen").text(splitdata[0]);

                    $("#realDays").text(splitdata[1]);

                }
            });

        }

        function settingImageEffect(kindOfBackground) {

            $(".optionImageEffect.active").removeClass("active");

            if (kindOfBackground == "normal") {

                $("#NormalImageEffect").addClass("active");
                $(".imageEffect").css("filter", "none");
                $("h5").css("color", "white");
                $("h1").css("color", "white");

                eraseCookie("formatBackground");
                setCookie("formatBackground", "normal", 30);

            } else if (kindOfBackground == "blur") {

                $("#BlurImageEffect").addClass("active");
                $(".imageEffect").css("filter", "brightness(1) blur(8px)");
                $("h5").css("color", "white");
                $("h1").css("color", "white");

                eraseCookie("formatBackground");
                setCookie("formatBackground", "blur", 30);

            } else if (kindOfBackground == "darken") {

                $("#DarkenImageEffect").addClass("active");
                $(".imageEffect").css("filter", "brightness(.72) blur(0)");
                $("h5").css("color", "white");
                $("h1").css("color", "white");

                eraseCookie("formatBackground");
                setCookie("formatBackground", "darken", 30);

            }

        }

        function settingScreen() {

            if ($("#settings").css('display') == 'block') {
                $("div.editAlarm").css('display', 'none')
                $("#settings").css('display', 'none');

            } else {
                $("div.editAlarm").css('display', 'block')
                $("#settings").css('display', 'block');
            }

        }

        var elem = document.documentElement;

        function openFullscreen() {
            if (elem.requestFullscreen) {
                $("div.useForExist").html('<i class="fa-solid fa-compress px-2 py-2" onclick="return offFullscreen();"></i>');
                $("div.userForHide").css('display', 'none');
                elem.requestFullscreen();
            }
        }

        function existFullscreen() {

            window.location.href = window.location.href;

        }

        function offFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { /* Safari */
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE11 */
                document.msExitFullscreen();
            }

            $("div.useForExist").html('<i class="fa-solid fa-expand fa-bars px-2 py-2" onclick="return openFullscreen();"></i>');
            $("div.userForHide").css('display', 'block');
        }

        window.addEventListener('resize', (evt) => {
            if (window.innerHeight == screen.height) {
                console.log('FULL SCREEN');
            } else {
                console.log('NORMAL SCREEN');
            }
        });

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

        function setCookie(cname, cvalue, exdays) {
            document.cookie = cname + "=" + cvalue + ";expires=" + exdays;
        }
    </script>
</body>

</html>