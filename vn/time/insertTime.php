<?php

  require_once("../databaseAndModel/connectdatabase.php");

  if(isset($_GET['area']) && isset($_GET['cities']) && isset($_GET['title'])){

    $area =  $_GET['area'];
    $cities =  $_GET['cities'];
    $title =  $_GET['title'];
    $addressIP = gethostbyname(trim(exec("hostname")));
    $table = '`'.'time_default_'.$addressIP.'`';

      $sql = "INSERT INTO $table(area,city,title,addressIP) 
      VALUES ('".$area."', '".$cities."', '".$title."', '".$addressIP."' )";  

      if(mysqli_query($conn, $sql)){  

        echo "Record inserted successfully";  

      }else{  

        echo "Could not insert record: ". mysqli_error($conn);  

      } 

  }

?>