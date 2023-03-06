<?php
    session_start();
    if(isset($_SESSION['timeandbegin'])){
        echo $_SESSION['timeandbegin'][4];
    }

?>