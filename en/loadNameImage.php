<?php
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {

        $oneTime = move_uploaded_file($_FILES['file']['tmp_name'], 'image/background-default.jpg');

        echo $_FILES['file']['name'];

    }
?>

