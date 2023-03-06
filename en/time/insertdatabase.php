<?php
    
    require_once("../databaseAndModel/connectdatabase.php");

    $arrCities = ['Hà Nội','New York','Chicago, Illinois','Denver, Colorado','Los Angeles, California','Phoenix, Arizona','Anchorage, Alaska','Honolulu, Hawaii','Toronto, Canada','London United Kingdom','Sydney, Australia','Manila, Philippines','Singapore, Singapore','Tokyo, Japan','Shanghai, China','Berlin, Germany'];

    foreach ($arrCities as $value) {

        $sql = "INSERT INTO `time`(name) 
            VALUES ('".$value."' )";  

        if(mysqli_query($conn, $sql)){  

            echo "Record inserted successfully";  

        }else{  

            echo "Could not insert record: ". mysqli_error($conn);  

        } 
        echo $value;
    }

?>