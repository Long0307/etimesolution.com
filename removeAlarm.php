<?php

    require_once("databaseAndModel/connectdatabase.php");

    if(isset($_GET['removeAlarm']) && isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "DELETE FROM onlinealarm WHERE id = '".$id."'";

        if ($conn->query($sql) === TRUE) {
          echo "Xoá thành công";
        } else {
          echo "Error deleting record: " . $conn->error;
        }

    }

?>