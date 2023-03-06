<?php

	require_once("../databaseAndModel/connectdatabase.php");

	if(isset($_GET['area'])){

		$area =  $_GET['area'];

		$sql = "SELECT $area.name FROM $area";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>

                <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
            <?php

          }
        }

	}

?>