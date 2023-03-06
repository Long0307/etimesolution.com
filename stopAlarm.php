<?php
    
    ob_start();

    session_start();

    if(isset($_GET['stopAlarm']) && isset($_SESSION['settedTime'])){
        unset($_SESSION['settedTime']);
        echo "Xoá session stop thành công";
    }

?>