<?php

require_once('../router/header.php');

    // check cái bảng của người dùng đã tồn tại trong database chưa

$addressIP = gethostbyname(trim(exec("hostname")));

$val = mysqli_query($conn,'select 1 from `time_default_'.$addressIP.'` LIMIT 1');

if($val !== FALSE)
{
       //DO SOMETHING! IT EXISTS!

    // echo "bảng tồn tại";
}
else
{
    $table = '`'.'time_default_'.$addressIP.'`';

    $sql = "CREATE TABLE $table(
      `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `addressIP` varchar(255) COLLATE utf8_unicode_ci NOT NULL
  )";

    $sql2 = "INSERT INTO $table(area, city, title, addressIP) VALUES
    ('Australia', 'Adelaide', 'Australia, Adelaide', '".$addressIP."'),
        ('Asia', 'Colombo', 'Asia, Colombo',  '".$addressIP."'),
        ('Pacific', 'Apia', 'Pacific, Apia',  '".$addressIP."'),
        ('Antarctica', 'Casey', 'Antarctica, Casey',  '".$addressIP."'),
        ('Europe', 'Amsterdam', 'Europe, Amsterdam',  '".$addressIP."'),
        ('Europe', 'Berlin', 'Europe, Berlin',  '".$addressIP."'),
        ('Europe', 'Isle_of_Man', 'Europe, Isle_of_Man', '".$addressIP."'),
        ('Indian', 'Mahe', 'Indian, Mahe',  '".$addressIP."'),
        ('Asia', 'Tokyo', 'Asia, Tokyo',  '".$addressIP."'),
        ('Atlantic', 'Azores', 'Atlantic, Azores','".$addressIP."')";

        

        if (mysqli_query($conn, $sql)) {

           if(mysqli_query($conn, $sql2)){  

        // echo "Record inserted successfully";  

           }else{  

            echo "Could not insert record: insert long". mysqli_error($conn);  

        } 

    } else {
      echo "Error creating table: <br> create table" . mysqli_error($conn)."<br>";
  }

}

?>
<div class="content" id="content">
    <div class="box text-center" id="unset" style="background-color: white; padding-bottom: 1%;">
        <div class="function p-2 text-right" style="height:41px;width: 100%;text-align: right !important; font-size: 25px;">
            <i class="fa-regular fa-share px-2 py-2" id="scrollShare" style="display: inline;" onclick="return scrollShare();"></i>
            <i class="fa-solid fa-expand fa-bars px-2 py-2" id="showScreenMode" style="display: inline;" onclick="return FullScreenMode();"></i>
            <i class="fa-solid fa-compress fa-bars px-2 py-2" style="display:none" id="offScreenMode" onclick="return offFullscreen();"></i>
        </div>
        <div id="digitalClock">
            <div class="h4 text-center" id="titleArea">
                Time Now
            </div>
            <strong>
                <h1 class="hour" id="hourpc" style="margin: 0; text-align:center; font-size: 100px; color: #555;">
                </h1>
            </strong>
            <h5 class="days" id="realDay" style="text-align:center; font-size: 30px;"></h5>
        </div>
        <style>
            #clock_vn_outer{
                overflow: hidden;
                width: 320px;
                height: 320px;
                margin: auto;
            }
            #clock_vn_outer div{
                position: absolute;
                width: 320px;
                height: 320px;
                margin: 0;
                padding: 0;
            }
            #clock_vn{
                background: url('imageforanalogclock/clock.png') no-repeat center;
                background-size: cover;
            }
            #hour_vn{
                background: url('imageforanalogclock/hour.png') no-repeat center;
                background-size: cover;
            }
            #minute_vn{
                background: url('imageforanalogclock/minute.png') no-repeat center;
                background-size: cover;
            }
            #second_vn{
                background: url('imageforanalogclock/second.png') no-repeat center;
                background-size: cover;
            }
        </style>
        <div id="analogClock" style="display: none; z-index: 1;">
            <div class="h4 text-center" id="titleAreaAnalogClock">
                Time Now
            </div>
            <div id="clock_vn_outer">
                <div id="clock_vn">
                    <div id="hour_vn"></div>
                    <div id="minute_vn"></div>
                    <div id="second_vn"></div>
                </div>
            </div>
        </div>  
        <button class="btn btn-primary my-3" type="button" id="onDigitalClock">Đồng hồ số</button>
        <button class="btn btn-outline-dark" type="button" id="onAnalogClock">Đồng hồ kim</button>
    </div>

    <!-- ============================ -->

    <div class="box text-center p-3" id="tutor" style="background-color: white; padding-bottom: 1%; margin-top: 15px; padding-top: 15px; width: 100%;">
        <span style="font-size: 22px;"><strong><i class="fa-solid fa-earth-americas"></i> Danh sách các giờ của thành phố</span></strong>
    </div>

    <div class="row" id="boxhours">
        <?php

        $table = '`'.'time_default_'.$addressIP.'`';

        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
            $i = 1;
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12 mt-3">
                    <div class="panel" style="background-color: white;">
                        <div class="headerPanel" style="padding: 15px 15px 37px 15px; border-bottom: 2px solid #f0f0f0;">
                            <a href="#" onclick="showTimeOfAddress(<?php echo $row['id']; ?>);" title="<?php echo $row['title']; ?>" class="showTimeOfAddress_<?php echo $row['id']; ?> checkId hourChangeContinuously_<?php echo $i; ?>" style="float: left; text-decoration: none; color: black;">
                                <?php echo $row['title']; ?>
                            </a>
                            <div class="toolsOfCities" style="float: right;color: black; display: flex;">
                                <i class="fa-solid fa-pen me-3" onclick="editTime(<?php echo $row['id']; ?>,<?php echo "'".$row['addressIP']."'"; ?>);"></i>
                                <i class="fa-solid fa-trash" onclick="deleteTime(<?php echo $row['id']; ?>,<?php echo "'".$row['addressIP']."'"; ?>);"></i>
                            </div>
                        </div>
                        <div class="bodyPanel" style="padding: 15px 15px 15px 15px;">
                            <h5 class="text-center hourautomaticallyChange_<?php echo $i; ?>" style="font-family: digitalFont; font-weight: normal; font-size: 32px;">

                                <?php

                                $city = $row['city'];
                                $area = $row['area'];

                                date_default_timezone_set($area."/".$city);

                                $time = time();
                                $datetimeinfo = getdate($time);

                                if($datetimeinfo['hours'] < 12){

                                    if($datetimeinfo['hours'] < 10){
                                        $hours = "0".$datetimeinfo['hours'];
                                    }else{
                                        $hours = $datetimeinfo['hours'];
                                    }

                                    if($datetimeinfo['minutes'] < 10){
                                        $minutes = "0".$datetimeinfo['minutes'];
                                    }else{
                                        $minutes = $datetimeinfo['minutes'];
                                    }

                                    echo $runningTime = $hours.":".$minutes." AM";
                                }else{

                                    echo $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes']." PM";

                                }

                                // $tz=timezone_open($area."/".$city);
                                // print_r(timezone_location_get($tz));
                                date("l, F d, Y", time());
                                ?>

                            </h5>
                            <h6 class="text-center" style="font-size: 18px;">
                                <?php 
                                echo date("l, F d, Y", time());; 
                                ?>

                            </h6>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
        }

        ?>
        <div class="col-md-4 col-sm-6 col-xs-12 mt-3">
            <div class="panel text-center" style="background-color: white; height: 150px;line-height: 150px;">
                <button type="button" class="btn btn-success px-3" onclick="return addTime();">THÊM</button>
            </div>
        </div>
    </div>

    <div class="box text-center p-3" id="tutor" style="background-color: white; padding-bottom: 1%; margin-top: 15px; padding-top: 15px; width: 100%;">
        <h4>Hướng dẫn sử dụng một đồng hồ online</h4>
        <p>- Đồng hồ online là trang web có thể tự động cập nhật và chạy theo khung giờ ở vị trí của bạn thêm vào đó nó có thể cập nhật hoặc thêm giờ cở các khung giở khác theo vị trí địa lý vì vậy rất dễ sử dụng. Dưới đây là hướng dẫn sử dụng trang này.</p>
        <p>Bước 1: Phần đầu tiên bạn nhìn thấy chính là phần time now ở đây hệ thông sẽ tự động cập nhật giờ theo múi giờ ở khu vực của bạn. Bạn có thể chọn giao diện đồng hồ xem giờ như đồng hồ số và đồng hồ kim bằng cách ẫn vào nút như ở tên màn hình. <p>
            <p>Bước 2: Ở bên dưới là phần danh sách giờ của các thành phố bạn có thể cập nhật giờ của thành phố lên phần đồng hồ (bằng cách ấn vào tên của khu vực) để xem giờ. Bên cạnh đó, ở phần này bạn có thểm thêm giờ vào hệ thống của chúng tôi (bằng cách ấn vào nút thêm) để mỗi khi bạn truy cập vào trang này sẽ có giờ của khu vực đó bạn có thể xem ở phần danh sách này.</p>
            <p>Bước 3 nếu bạn muốn sửa tên của khu vực hãy ấn vào cái bút ở cạnh tên của múi giờ. Bạn có thể xoá tên của múi giờ bằng cách ấn vào cái thùng rác.</p>
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
<div class="tableEdit">
    <div class="headertable" style="width: 100%; height: 78.39px; background-color: #0090dd; padding: 20px 15px; position: absolute; border-radius: 5px 5px 0 0;">
        <h4 style="color: white;">Thêm thời gian theo khu vực</h4>
        <i class="fa-solid fa-xmark" style="float: right; font-size: 28px; color: white; position: absolute; top: 25px; right: 15px;" onclick="exist();"></i>
    </div>
    <div class="bodyTable" style="width: 100%; height: auto; padding: 42px 15px 0px 15px; position: absolute; top: 14%; border-radius: 5px 5px 0 0;">
        <form action="" method="post" class="align-center">
            <label for="" style="padding-top: 10px;">Chọn khu vực: </label>
            <select class="form-select" id="area" aria-label="Âm thanh báo thức">
                <?php

                $sql = "SELECT linkcountry.name FROM linkcountry";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                              // output data of each row
                  while($row = $result->fetch_assoc()) {
                    ?>

                    <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                    <?php

                }
            }

            ?>

        </select>
        <label for="" style="padding-top: 10px;">Thành phố: </label>
        <select class="form-select" id="cities" aria-label="Âm thanh báo thức">
            <?php

            $sql = "SELECT africa.name FROM africa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                              // output data of each row
              while($row = $result->fetch_assoc()) {
                ?>

                <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                <?php

            }
        }

        ?>

    </select>
    <label for="" style="padding-top: 10px;">Tiêu đề: </label>
    <div class="input-group mb-3">
        <input type="text" id="titleAlarm" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
    </div>
</div>
<div class="footertable">
    <div class="row" id="controll">
        <div class="text-right">
            <button type="button" class="btn btn-outline-secondary" onclick="exist();">Cancel</button>
            <button type="button" class="btn btn-success" id="insertTime">OK</button>
            <button type="button" class="btn btn-success" id="updateTime" style="display: none;">UPDATE</button>
        </div>
    </div>
</div>
</form>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js'></script>
<script type='text/javascript' src='../js/toggleswitch.js'></script>
</body>
<style>
    .margin{
        padding-top: 30%;
    }
</style>
<script type ="text/javascript">
    let interval_id = [];

    function showTimeOfAddress(id) {

        interval_id.map(function(a) {
            clearInterval(a);
            interval_id = [];
            window.stop();
        })

        currentTime = $.trim($(".showTimeOfAddress_"+id).text());

        $("#titleAreaAnalogClock").text(currentTime);

        $.ajax({
            url: 'updateTimeThroughArea.php',
            type: 'get',
            data: { 'currentTime': currentTime },
            success: function (data) {

                splitData = data.split("+");

                $("#titleArea").text(splitData[0]);

                $("#hourpc").text(splitData[1]);

                $("#realDay").text(splitData[2]);

                interval_id.push(setInterval(showTimeOfAddress(id), 1000));

            }
        });
    }

    function deleteTime(id, addressIP){

        $.ajax({
            url: 'deleteTime.php',
            type: 'post',
            data: { 'id': id, 'addressIP': addressIP },
            success: function (data) {

                $("#boxhours").load("index.php #boxhours > *");

                $("div.editAlarm").css("display", "none");
                $("div.tableEdit").css("display", "none");
            }
        });

    }

    $("#updateTime").click(function(event) {
        id = $("#idToUpdate").val();
        area = $("#area").val();
        cities = $("#cities").val();
        title = $("#titleAlarm").val();

        $.ajax({
            url: 'updateTime.php',
            type: 'post',
            data: { 'id': id, 'area': area, 'cities': cities, 'title': title },
            success: function (data) {
                // console.log(1);
                // console.log(data);
                $("#boxhours").load("index.php #boxhours")

                $("div.editAlarm").css("display", "none");
                $("div.tableEdit").css("display", "none");
            }
        });
    });

    function editTime(id,addressIP){

        $("div.editAlarm").css("display", "block");
        $("div.tableEdit").css("display", "block");

        $.ajax({
            url: 'selectThroughId.php',
            type: 'post',
            data: { 'id': id, 'addressIP': addressIP },
            success: function (data) {
                splitData = data.split("+");
                console.log(splitData);
                area = splitData[0];
                cities = splitData[1];
                title = splitData[2];
                    // ======================================
                $("#area").val(area);

                area = $("#area").val();

                $("#titleAlarm").val(title);

                $.ajax({
                    url: 'loadCities.php',
                    type: 'get',
                    data: { 'area': area },
                    success: function (data) {
                        $("#cities").children().remove();
                        $("#cities").append(data);
                                // ===================================
                        $("#area").after('<input type="hidden" id="idToUpdate" value="'+id+'">')

                    }
                });
            }
        });

        $("#insertTime").css('display', 'none');
        $("#updateTime").css('display', 'inline-block');
    };

    $("#insertTime").click(function(event) {
        area = $("#area").val();
        cities = $("#cities").val();
        title = $("#titleAlarm").val();

        $.ajax({
            url: 'insertTime.php',
            type: 'get',
            data: { 'area': area, 'cities': cities, 'title': title },
            success: function (data) {

                $("#boxhours").load("index.php #boxhours")

                $("div.editAlarm").css("display", "none");
                $("div.tableEdit").css("display", "none");
            }
        });
    });

    $("#area").on("change paste keyup", function() {
     area = $(this).val();

     $.ajax({
        url: 'loadCities.php',
        type: 'get',
        data: { 'area': area },
        success: function (data) {
            $("#cities").children().remove();
            $("#cities").append(data);
                        // ===================================
            area = $("#area").val();
            cities = $("#cities").val();
                        // ======================================
            $("#titleAlarm").val(area+", "+cities);
        }
    }); 
 });

    $("#cities").on("change paste keyup", function() {
     area = $("#area").val();
     cities = $("#cities").val();
        // ======================================
     $("#titleAlarm").val(area+", "+cities);
 });

    function addTime(){
        $("div.editAlarm").css("display", "block");
        $("div.tableEdit").css("display", "block");

        $("#insertTime").css('display', 'inline-block');
        $("#updateTime").css('display', 'none');
    } 

    $("#onAnalogClock").click(function(event) {

        if(getCookie("onAnalogClock") == "off"){

            eraseCookie("onAnalogClock");

            interval_id.map(function(a) {
                window.clearInterval(a);
                interval_id = [];
            })

        }else{

            $("#digitalClock").css('display', 'none');
            $("#analogClock").css('display', 'block');

            interval_id.push(setInterval(function(){
                var time=new Date();   
                var svn=time.getSeconds();
                var mvn=time.getMinutes();
                var hvn=time.getHours();
                var spvn=svn*6;
                var mpvn=(mvn+svn/60)*6;
                var hpvn=(hvn+mvn/60)*30;
                $('#second_vn').css('transform','rotate('+spvn+'deg)');
                $('#minute_vn').css('transform','rotate('+mpvn+'deg)');
                $('#hour_vn').css('transform','rotate('+hpvn+'deg)');
                setCookie("onAnalogClock", 1, 30);
            },1000));

        }
        /* Act on the event */
    });

    $("#onDigitalClock").click(function(event) {
        /* Act on the event */
        $("#digitalClock").css('display', 'block');
        $("#analogClock").css('display', 'none');
    });

    $(document).ready(function() {

        interval_id.push(setInterval(runningTime, 1000));

    });

    
    function runningTime() {

        $.ajax({
            url: 'timeScript.php',
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

        var elem = document.getElementById("unset");
        // elem.classList.add("margin");
        $(".controll").css('display', 'none');
        $("#hourpc").css('marginTop', '85px');
        $("#offScreenMode").css('display', 'block');
        $("#scrollShare").css('display', 'none');
        $("#showScreenMode").css('display', 'none');
        // $("#").css('marginTop', '30%');
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
          } else if (elem.webkitRequestFullscreen) { /* Safari */
            elem.webkitRequestFullscreen();
          } else if (elem.msRequestFullscreen) { /* IE11 */
            elem.msRequestFullscreen();
        }

    }

    function offFullscreen() {

        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) { /* Safari */
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { /* IE11 */
            document.msExitFullscreen();
        }

        $("#scrollShare").css('display', 'block');
        $(".controll").css('display', 'block');
        $("#offScreenMode").css('display', 'none');
        $("#showScreenMode").css('display', 'block');

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
            $("#hourpc").css('marginTop','0px');
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