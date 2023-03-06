<?php
require_once('../router/header.php');

?>
<div class="content" id="content">
    <div class="box text-center" id="unset" style="background-color: white; padding-bottom: 1%; display: block;">
        <div class="function p-2" style="text-align: right !important; font-size: 25px;">
            <i class="fa-regular fa-share px-2 py-2" onclick="return scrollShare();"></i>
            <i class="fa-solid fa-circle-plus px-2 py-2" onclick="return increaseFontSise();"></i>
            <i class="fa-solid fa-circle-minus px-2 py-2" onclick="return decreaseFontSise();"></i>
            <i class="fa-solid fa-expand fa-bars px-2 py-2" onclick="return FullScreenMode();"></i>
        </div>
        <h5 class="days" id="nation" style="text-align:center; font-size: 32px;"></h5>
        <strong>
            <h1 class="hour" id="hourpc" style="margin: 0; text-align:center; font-size: 132px; color: #555;">
            </h1>
        </strong>
        <strong>
            <h1 class="hour" id="hourForMobile" style="margin: 0; text-align:center; font-size: 75px; color: #555;">
            </h1>
        </strong>
        <h5 class="days" id="realDay" style="text-align:center; font-size: 40px;"></h5>
        <button type="button" class="btn btn-success mb-3" id="setAlarm">Đặt báo thức</button>
    </div>

    <!-- ============================ -->

    <div class="box text-center" id="currently" style="background-color: white; padding-bottom: 1%;display: none;">
        <div class="function p-2" style="text-align: right !important; font-size: 25px;">
            <i class="fa-regular fa-share px-2 py-2"></i>
            <i class="fa-solid fa-expand fa-bars px-2 py-2"></i>
        </div>
        <strong>
            <h1 class="hour" id="hourForMobileCurrently" style="margin: 0; text-align:center; font-size: 43px; color: #555;"></h1>
            <input type="hidden" name="timeSetting" id="timeSetting" value="">
        </strong>
        <h5 class="days" id="realDayPhone" style="text-align:center; font-size: 22px;"></h5>
    </div>

    <!-- =================================== -->

    <style>
        .radialProgressBar {
            border-radius: 50%;
            width: 22rem;
            height: 22rem;
            display: -webkit-box;
            display: -ms-flexbox;
            margin: auto;
            /* background: #ddd; */
            background: conic-gradient(#028cd5 var(--progress), #ddd 0deg) !important;
            animation: .4s ease-out turn_in reverse !important;
        }

        .radialProgressBar .overlay {
            border-radius: 50%;
            width: 20rem;
            height: 20rem;
            margin: auto;
            background: #fff;
            text-align: center;
            padding-top: 10%;
        }

        .progress-10 {
            background-image: -webkit-linear-gradient(36deg, #ddd 50%, transparent 50%), -webkit-linear-gradient(left, #028cd5 50%, #ddd 50%);
            background-image: linear-gradient(54deg, #ddd 50%, transparent 50%), linear-gradient(90deg, #028cd5 50%, #ddd 50%);
        }

        @media only screen and (min-width: 360px) and (max-width: 1100px) {

            #hourpc{
                display: none !important;
            }

        }
    </style>

    <div class="box text-center" id="alarmFuture" style="height: auto; background-color: white; padding-bottom: 1%;
    margin-top: 15px; padding-top: 15px; display: none;">
    <div class="radialProgressBar progress-10" id="progress-10" data-progress="32%" style="--progress: 32%;">
        <div class="overlay">
            <h4>Báo thức</h4>
            <strong>
                <h1 class="hour" style="margin: 0;text-align:center;font-size: 43px;color: #555!important;padding: 15px 0 15px 0;">
                    <i class="fa-solid fa-bell" style="font-size: 35px;"><span id="timeSeted" class="mx-3">1:16:55 PM</span></i> 
                </h1>
            </strong>
            <h5 class="days" style="text-align:center; font-size: 22px;">
                <i class="fa-solid fa-clock-rotate-left"></i> <span id="timeLeft"></span>
            </h5>
            <div class="progress" style="text-align:center;width: 75%; height: 20px; background-color: #3d3c3c; margin-bottom: 10px; position: relative; margin: 0 auto 15px auto;">
                <div class="realTime" style="width: 60%; height: 20px; background-color: #057aff; margin-bottom: 10px; position: absolute; top: 0px;"></div>
                <span id="percent" style="position: absolute;
                left: 46%;
                right: auto;
                color: white;">30%</span>
            </div>
            <button type="button" class="btn btn-danger mb-3" id="stopAlarm">Dừng báo thức</button>
        </div>
    </div>
</div>
<!-- =================================== -->
<div style="display: flex;" id="editFloat">
    <div class="box text-center px-3 addHeight" style="overflow-x: scroll;">
        <h4>Danh sách báo thức được sử dụng gần đây</h4>
        <table class="table tablePC">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Bắt đầu</th>
                    <th scope="col">Đã dừng</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody id="listUsed">

                <?php

                $ipdat = gethostbyname(trim(exec("hostname")));

                $sql = "SELECT * FROM onlinealarm WHERE addressIP = '".$ipdat."'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $i = 1;
  // output data of each row
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $i; ?>
                            </th>
                            <td id="titleAlarm_<?php echo $row['id']; ?>">
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['start']; ?>
                            </td>
                            <td id="HourAndMinute_<?php echo $row['id']; ?>">
                                <?php echo $row['stop']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success" id="restartAlarm_<?php echo $row['id']; ?>" onclick="return restartAlarm(<?php echo $row['id'];; ?>);">Đặt lại</button>
                                <button type="button" onclick="return removeAlarm(<?php echo $row['id']; ?>);" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i>XOÁ</button>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }  else {
                    ?>

                    <tr>
                        <th scope="row">Trống</th>
                    </tr>

                    <?php
                }

                ?>

            </tbody>
        </table>
    </div>

    <div class="box text-center px-3 getHeight" style="margin-left: 2%; background-color: white; padding-bottom: 1%; margin-top: 15px; padding-top: 15px;  width: 49%; display: block; height: 100%;">
        <h4>Cài đặt báo thức cho thời gian cụ thể</h4>
        <?php

        $ipdat = gethostbyname(trim(exec("hostname")));

        $sql = "SELECT * FROM onlinealarm_default";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?>
            <div class="forPC">
                <?php
  // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <button class="btn btn-success m-2" id="restartAlarm_<?php echo $row['id']; ?>" onclick="return restartAlarm_default(<?php echo $row['id'];; ?>);"><?php echo $row['spaceTime']; ?></button>
                    <?php
                }
            }
            ?>
        </div>
    <?php
echo "------------------------------------------------------------------------";
    $sql = "SELECT * FROM onlinealarm WHERE addressIP = '".$ipdat."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <div class="forPC">
            <?php
  // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <button class="btn btn-primary m-2" id="restartAlarm_<?php echo $row['id']; ?>" onclick="return restartAlarm(<?php echo $row['id'];; ?>);"><?php echo $row['stop']; ?></button>
                <?php
            }
            ?>
        </div>
        <?php
    } else {
      ?>
      <div class="forPC">
        <button class="btn btn-primary m-2">6:30</button>
        <button class="btn btn-primary m-2">7:00</button>
        <button class="btn btn-primary m-2">7:30</button>
    </div>
    <?php
}

?>
</div>
</div>

<div class="box text-center px-3 boxForMobile" style="overflow-x: scroll;">
    <h4>Danh sách báo thức được sử dụng gần đây</h4>
    <i class="fa-solid fa-ellipsis-vertical action" style="transform: rotate(0deg);"></i>
    <table class="table" id="tableForMobile">
        <thead>
            <tr>
                <th scope="col" class="checkbox-1">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Bắt đầu</th>
                <th scope="col">Đã dừng</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $ipdat = gethostbyname(trim(exec("hostname")));

            $sql = "SELECT * FROM onlinealarm WHERE addressIP = '".$ipdat."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i = 1;
  // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row" class="checkBox" id="checkbox_<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </th>
                        <td>
                            <?php echo $row['name']; ?><input type="hidden" name="" class="checkboxName" id="checkboxName_<?php echo $i; ?>" value="<?php echo $row['id'];; ?>"></td>
                            <td>
                                <?php echo $row['start']; ?>
                            </td>
                            <td>
                                <?php echo $row['stop']; ?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                } else {
                  ?>

                  <tr>
                    <th scope="row">Trống</th>
                </tr>
                <?php
            }

            ?>
        </tbody>
    </table>
</div>
<div class="box text-center px-3 boxForMobile" style="background-color: white; padding-bottom: 1%; margin-top: 15px; padding-top: 15px;">
    <h4>Cài đặt báo thức cho thời gian cụ thể</h4>
    <?php

        $ipdat = gethostbyname(trim(exec("hostname")));

        $sql = "SELECT * FROM onlinealarm_default";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?>
            <div class="forPC">
                <?php
  // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <button class="btn btn-success m-2" id="restartAlarm_<?php echo $row['id']; ?>" onclick="return restartAlarm(<?php echo $row['id'];; ?>);"><?php echo $row['spaceTime']; ?></button>
                    <?php
                }
            }
            ?>
        </div>
    <?php
echo "------------------------------------------------------------------------";

    $sql = "SELECT * FROM onlinealarm WHERE addressIP = '".$ipdat."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <div class="forMB">
            <?php
  // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <button class="btn btn-primary m-2" id="restartAlarm_<?php echo $row['id']; ?>" onclick="return restartAlarm(<?php echo $row['id'];; ?>);"><?php echo $row['stop']; ?></button>
                <?php
            }
            ?>
        </div>
        <?php
    } else {
        ?>
        <div class="forMB">
            <button class="btn btn-primary m-2">6:30</button>
            <button class="btn btn-primary m-2">7:00</button>
            <button class="btn btn-primary m-2">7:30</button>
        </div>
        <?php
    }
    ?>

</div>

<div class="box text-center p-3" id="tutor" style="background-color: white; padding-bottom: 1%; margin-top: 15px; padding-top: 15px; width: 100%;">
    <h4>Cách sử dụng đồng hồ báo thức online</h4>
    <p>Bước 1: Bấm vào nút màu xanh đặt giờ báo thức ở dưới phần ngày tháng. </p>
    <p>Bước 2: Chọn giờ, phút bạn muốn thông báo và âm thanh. Nếu bạn không chọn âm thanh, máy sẽ tự động cài đặt âm thanh chế độ mặc định. Tiếp theo bạn nhập tên báo thức để lần sau bạn không phải điển vào form mà chỉ cần chọn giờ trong
    cái bảnh bên dưới sau lần chọn đầu tiên (nhưng để làm được chức năng này bạn nên đăng nhập hoặc đăng ký trước).</p>
    <p>Bước 3: Bạn có thể thử bằng cách ấn nút thử hoặc ấn nút bắt đầu để bắt đầu ngay.</p>
</div>

<!-- <div class="box text-center" id="share" style="background-color: white; padding-bottom: 1%; margin-top: 15px; padding-top: 15px;">
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
</div> -->

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
<div class="tableEdit">
    <div class="headertable" style="width: 100%; height: 78.39px; background-color: #0090dd; padding: 20px 15px; position: absolute; border-radius: 5px 5px 0 0;">
        <h4 style="color: white;">Đặt thời gian thông báo</h4>
        <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
    </div>
    <div class="bodyTable" style="width: 100%; height: auto; padding: 42px 15px 0px 15px; position: absolute; top: 14%; border-radius: 5px 5px 0 0;">
        <form action="" method="post" class="align-center">
            <div class="row">
                <div class="boxHour col-md-6 col-6">
                    <select class="form-select" name="hour" id="hour" aria-label="Default select example">
                        <option value="notvalue">Giờ</option>
                        <?php
                        for ($i = 0; $i <= 23; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="boxHour col-md-6 col-6">
                    <select class="form-select" name="minute" id="minute" aria-label="Default select example">
                        <option value="notvalue">Phút</option>
                        <?php
                        for ($i = 0; $i <= 59; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <label for="" style="padding-top: 10px;">Âm thanh báo thức: </label>
            <select class="form-select" id="soundAlarm" aria-label="Âm thanh báo thức">
                <option value="clock" checked>Đồng hồ báo thức</option>
                <option value="buzzer">Tiếng bíp</option>
                <option value="roosters">Gà trống</option>
                <option value="police-siren">Còi cảnh sát</option>
                <option value="nuclear">Hạt nhân</option>
                <option value="alien">Người ngoài hành tinh</option>
                <option value="rain">Mưa</option>
                <option value="bomb-explosion">Bom</option>
                <option value="mystic">Huyền bí</option>
                <option value="bell">Chuông</option>
                <option value="white-noise">Tiếng ồn trắng</option>
            </select>
            <label for="" style="padding-top: 10px;">Tên báo thức: </label>
            <div class="input-group mb-3">
                <input type="text" id="titleAlarm" class="form-control" placeholder="Alarm" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="footertable">
            <div class="row" id="controll">
                <div class="text-right">
                    <button type="button" class="btn btn-outline-secondary" onclick="exist();">Huỷ</button>
                    <button type="button" class="btn btn-success" id="start">Bắt đầu</button>
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
<script type='text/javascript' src="../js/bootstrap.bundle.min.js"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js' ></script>
<script type='text/javascript' src='../js/toggleswitch.js'></script>
<script>

    var loadDeferredStyles = function () {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
    };
    var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
    window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    if (raf)
        raf(function () {
            window.setTimeout(loadDeferredStyles, 0);
        });
    else
        window.addEventListener('load', loadDeferredStyles);
    const script = document.createElement('script');
    document.getElementsByTagName('head')[0].appendChild(script);

    height = $(".getHeight").height() + 25;

    $(".addHeight").css("height", height);

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

    function restartAlarm_default(id) {

        soundName = "clock";

        HourAndMinute = $("#restartAlarm_" + id).text();

        splitString = HourAndMinute.split(":");

        hour = splitString[0];

        minute = splitString[1];

        $.ajax({
            url: 'calculateTimeDefault.php',
            type: 'get',
            data: {
                'hour': hour,
                'minute': minute,
                'soundName': soundName,
            },
            success: function(data) {

                $("div.start").css("display", "none");
                $("div.editAlarm").css("display", "none");
                $("div.tableEdit").css("display", "none");
                $("div.howToUse").css("display", "none");
                $("div#unset").css("display", "none");

                        // ĐẶT LẠI GIỜ BẰNG JQUERY ĐỒNG THỜI SESSION ĐẶT THẲNG BIẾN

                $("div#currently").css("display", "block");

                handleData = data.split("+")

                hour = handleData[0]

                minute = handleData[1]

                $("span#timeSeted").text(hour + ":" + minute + ":00");

                        // cái này là khoảng thời gian còn lại 

                $("div#alarmFuture").css("display", "block");

                        // Tính giờ còn lại
                setInterval(runtime, 1000);

                window.location.href = window.location.href;

            }
        });
    }

    function restartAlarm(id) {

        soundName = "clock";

        titleAlarm = $("#titleAlarm_" + id).text();

        if (titleAlarm == "") {

            titleAlarm = "haha";

        }

        HourAndMinute = $("#HourAndMinute_" + id).text();

        splitString = HourAndMinute.split(":");

        hour = splitString[0];

        minute = splitString[1];

        if (hour == "notvalue" || minute == "notvalue") {
            alert("You have not selected the hour or minute to notify")
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

                    $("div.start").css("display", "none");
                    $("div.editAlarm").css("display", "none");
                    $("div.tableEdit").css("display", "none");
                    $("div.howToUse").css("display", "none");
                    $("div#unset").css("display", "none");

                            // ĐẶT LẠI GIỜ BẰNG JQUERY ĐỒNG THỜI SESSION ĐẶT THẲNG BIẾN

                    $("div#currently").css("display", "block");

                    handleData = data.split("+")

                    hour = handleData[0]

                    minute = handleData[1]

                    $("span#timeSeted").text(hour + ":" + minute + ":00");

                            // cái này là khoảng thời gian còn lại 

                    $("div#alarmFuture").css("display", "block");

                            // Tính giờ còn lại
                    setInterval(runtime, 1000);

                    window.location.href = window.location.href;

                }
            });
        }

    }

    function removeAlarm(id) {

        $.ajax({
            url: 'removeAlarm.php',
            type: 'get',
            data: {
                'removeAlarm': 0,
                'id': id
            },
            success: function(data) {

                window.location.href = window.location.href;

            }
        });

    }

    $("#stopAlarm").click(function(event) {
        $.ajax({
            url: 'stopAlarm.php',
            type: 'get',
            data: {
                "stopAlarm": 0
            },
            success: function(data) {
                $("div#unset").css("display", "block");
                $("div#currently").css("display", "none");
                $("div#alarmFuture").css("display", "none");
                clearInterval(interval);
                eraseCookie("totalSeconds");
            }
        });
        clearInterval(interval);
        eraseCookie("totalSeconds");
    });

    $.ajax({
        url: '../handleAndShowDataWhenSetted.php',
        type: 'get',
        data: {
            'checkdata': 0
        },
        success: function(data) {

            if (data === "Khong tim thay session") {
                console.log("th nay");
            } else {

                $("div#unset").css("display", "none");
                $("div#currently").css("display", "block");
                $("div#alarmFuture").css("display", "block");

                handleData = data.split("+")

                hour = handleData[0]

                minute = handleData[1]

                if ((hour.length == 1) && (minute.length == 1)) {

                    hour = "0" + hour;
                    minute = "0" + minute;

                    $("span#timeSeted").text(hour + ":" + minute + ":00")

                } else if (hour.length == 1) {

                    hour = "0" + hour;

                    $("span#timeSeted").text(hour + ":" + minute + ":00")


                } else if (minute.length == 1) {

                    minute = "0" + minute;

                    $("span#timeSeted").text(hour + ":" + minute + ":00")

                } else {

                    $("span#timeSeted").text(hour + ":" + minute + ":00")


                }

            }

        }
    });

    if (getCookie("timeSetting") != null) {

        setInterval(runtime, 1000);

    }

    interval = null;

    $("#start").click(() => {

        soundName = $("select#soundAlarm").val();

        titleAlarm = $("input#titleAlarm").val();

        if (titleAlarm == "") {

            titleAlarme = "haha";

        } else {

            titleAlarme = $("input#titleAlarm").val();

        }

        hour = $("#hour").val();
        minute = $("#minute").val();

        if (hour == "notvalue" || minute == "notvalue") {
            alert("You have not selected the hour or minute to notify")
        } else {
            $.ajax({
                url: 'calculateTime.php',
                type: 'get',
                data: {
                    'hour': hour,
                    'minute': minute,
                    'soundName': soundName,
                    'titleAlarm': titleAlarme
                },
                success: function(data) {

                    $("div.start").css("display", "none");
                    $("div.editAlarm").css("display", "none");
                    $("div.tableEdit").css("display", "none");
                    $("div.howToUse").css("display", "none");
                    $("div#unset").css("display", "none");

                            // ĐẶT LẠI GIỜ BẰNG JQUERY ĐỒNG THỜI SESSION ĐẶT THẲNG BIẾN

                    $("div#currently").css("display", "block");

                    handleData = data.split("+");

                    hour = handleData[0];

                    minute = handleData[1];

                            // cái này là khoảng thời gian còn lại 

                    $("div#alarmFuture").css("display", "block");

                    $("span#timeSeted").css("display", "block");

                    $("span#timeSeted").text(hour + ":" + minute + ":00");

                            // Tính giờ còn lại

                    interval = setInterval(runtime, 1000);

                }
            });
        }
    })

    $(document).ready(function() {

        setInterval(runningTime, 1000);

    });

    function runtime() {

        timeleft = $("span#timeLeft").text();

        if ($("#alarmFuture").css("display") == "none") {
            clearInterval(interval);
            eraseCookie("totalSeconds");
        } else {

            timeout = $("span#timeSeted").text();

            timeCurrently = getCookie("timeSetting");

            ajax = $.ajax({
                url: 'TimeOut.php',
                type: 'get',
                data: {
                    'timeout': timeout,
                    'timeCurrently': timeCurrently,
                },
                success: function(data) {

                    if (data == "00:00:01") {

                        if (getCookie("timeSetting") != null) {

                            $("span#timeSeted").css("display", "none");

                            $("div#currently").css("display", "none");

                            $("div#alarmFuture").css("display", "none");

                            return turnOffAlarm();

                        }

                    } else {

                                // console.log(data);
                        $('span#timeLeft').text(data);

                        if ($("#alarmFuture").css("display") == "block") {

                            nextStep();

                        }

                    }

                }
            });
        }
    }

    function nextStep() {

        timeLeft = $('span#timeLeft').text();

                // TÍnh totalsecond

        if (getCookie("totalSeconds") == "") {

            arrCookie = timeLeft.split(":");

            hour = Number(arrCookie[0]);
            minute = Number(arrCookie[1]);
            seconds = Number(arrCookie[2]);

                    // Tính tổng ở dây

            convertHour = hour * 60 * 60;
            convertMinute = minute * 60;

            TotalSeconds = convertHour + convertMinute + seconds;

                    // console.log("Totalsecond: " + TotalSeconds);

            setCookie("totalSeconds", TotalSeconds, 30);

        }

                // ===========================================

        arrCookie = timeleft.split(":");

        hour = Number(arrCookie[0]);
        minute = Number(arrCookie[1]);
        seconds = Number(arrCookie[2]);

                // Tính tổng ở dây

        convertHour = hour * 60 * 60;
        convertMinute = minute * 60;

        TotalSecondsCurrently = convertHour + convertMinute + seconds;

        $.ajax({
            url: 'calculatePercent.php',
            type: 'get',
            data: {
                'TotalSecondsCurrently': TotalSecondsCurrently,
                'totalSeconds': getCookie("totalSeconds")
            },
            success: function(data) {

                $(".realTime").css("width", data + "%");

                $("div.radialProgressBar.progress-10").get(0).style.setProperty('--progress', data + "%");

                $("#percent").text(data + "%");

            }
        });
    }

    function turnOffAlarm() {

        eraseCookie("totalSeconds");

        $.ajax({
            url: 'getSession.php',
            type: 'get',
            success: function(data) {

                $("div#unset").css("display", "block");

                $("div.editAlarm").css("display", "block");

                $("div.tableEditAlarm").css("display", "block");

                $("#codeSounds").after('<audio controll loop autoplay id="audio_playo24">' +
                    '<source src="sounds/' + data + '.mp3" type="audio/mpeg">' +
                    '</audio>');
            }
        });
    }

    function toggleMute() {

        timeout = $("span#timeSeted").text();

        timeCurrently = getCookie("timeSetting");

        $.ajax({
            url: 'removeSessionSettedTime.php',
            type: 'get',
            data: {
                'removeSession': 0,
                'timeout': timeout,
                'timeCurrently': timeCurrently
            },
            success: function(data) {

                var myAudio = document.getElementById('audio_playo24');

                if (myAudio) {
                  myAudio.muted = !myAudio.muted;
              }

              $("div.editAlarm").css('display', 'none');
              $("div.tableEditAlarm").css('display', 'none');

              $("table.tablePC").load("index.php table.tablePC");

              $("table#tableForMobile").load("index.php table#tableForMobile");

              $("div.forPC").load("index.php div.forPC");

              $("div.forMB").load("index.php div.forMB");

              eraseCookie("totalSeconds");
          }
      });

    }

    function runningTime() {
        $.ajax({
            url: '../timeScript.php',
            success: function(data) {
                splitArray = data.split("+");
                $('#hourpc').html(splitArray[1]);
                $('#nation').html(splitArray[0]);
                $('#realDay').html(splitArray[2]);
                $('#hourForMobile').html(splitArray[1]);
                $('#hourForMobileCurrently').html(splitArray[1]);
                $('#realDayPhone').html(splitArray[2]);

                $("input#timeSetting").val(splitArray[1]);

                eraseCookie("timeSetting")

                setCookie("timeSetting", splitArray[1], 60)
            },
        });
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

        alert("Xoá thành công");

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
        $("div.menuForMobile").css('display', 'block');
        $("div.editAlarm").css("display", "block");
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


    $("#test").click(() => {

        $("div.editAlarm").css("display", "block");
        $("div.tableEdit").css("display", "block");

        $("div#unset").css("display", "block");

        $("div.editAlarm").css("display", "block");

        $("div.tableEditAlarm").css("display", "block");

        $("#codeSounds").after('<audio controll loop autoplay id="audio_playo24">' +
            '<source src="sounds/clock.mp3" type="audio/mpeg">' +
            '</audio>');

        timeout = $("h1#hourpc").text();

        timeout = timeout.split(" ");

        timeCurrently = getCookie("timeSetting");

        $.ajax({
            url: 'removeSessionSettedTime.php',
            type: 'get',
            data: {
                'removeSession': 0,
                'timeout': timeout,
                'timeCurrently': timeCurrently
            },
            success: function(data) {

                var myAudio = document.getElementById('audio_playo24');

                myAudio.muted = !myAudio.muted;

                $("div.editAlarm").css('display', 'none');
                $("div.tableEditAlarm").css('display', 'none');

                eraseCookie("totalSeconds");
            }
        });
    })

    $("#setAlarm").click(() => {
        $("div.editAlarm").css("display", "block");
        $("div.tableEdit").css("display", "block");
    })

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
</body>

</html>