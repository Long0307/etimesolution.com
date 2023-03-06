<?php

  require_once("../databaseAndModel/connectdatabase.php");

  if(isset($_POST['id']) && isset($_POST['addressIP'])){

      $id =  $_POST['id'];
      $addressIP = $_POST['addressIP'];

      $table = '`'.'time_default_'.$addressIP.'`';

      echo $sql = "DELETE FROM $table WHERE $table.id = ".$id." AND $table.addressIP = '".$addressIP."'";

        if(mysqli_query($conn, $sql)){  

          echo "Record inserted successfully";  

        }else{  

          echo "Could not insert record: ". mysqli_error($conn);  

        } 

    }

?>