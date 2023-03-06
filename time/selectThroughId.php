<?php

  require_once("../databaseAndModel/connectdatabase.php");

  if(isset($_POST['id']) && isset($_POST['addressIP'])){

    $id =  $_POST['id'];
    $addressIP =  $_POST['addressIP'];

    $table = '`'.'time_default_'.$addressIP.'`';

      $sql = "SELECT * FROM $table WHERE $table.id = $id AND $table.addressIP = '".$addressIP."'";  
      $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo $row['area']."+".$row['city']."+".$row['title'];

          }
        }

  }

?>