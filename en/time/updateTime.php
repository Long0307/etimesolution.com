<?php

  require_once("../databaseAndModel/connectdatabase.php");

  if(isset($_POST['id']) && isset($_POST['area']) && isset($_POST['cities']) && isset($_POST['title'])){

      $id =  $_POST['id'];
      $area =  $_POST['area'];
      $cities =  $_POST['cities'];
      $title =  $_POST['title'];
      $addressIP = gethostbyname(trim(exec("hostname")));
      $table = '`'.'time_default_'.$addressIP.'`';

      echo $sql = "UPDATE $table SET area='".$area."', city='".$cities."', title='".$title."', addressIP='".$addressIP."' WHERE id=".$id;

        if(mysqli_query($conn, $sql)){  

          echo "Record inserted successfully";  

        }else{  

          echo "Could not insert record: ". mysqli_error($conn);  

        } 

    }

?>