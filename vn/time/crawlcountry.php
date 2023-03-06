<?php
// example of how to modify HTML contents
include('crawler/simple_html_dom.php');
include('../databaseAndModel/connectdatabase.php');

// get DOM from URL or file
// $html = file_get_html('https://www.php.net/manual/en/timezones.america.php');

// foreach($html->find('ul.child-menu-list li a') as $e){
//     echo $link = $e->href;
//     echo $name = $e->plaintext;; 
//     $sql = "INSERT INTO `linkcountry`(link,name) 
//             VALUES ('".$link."', '".$name."' )";  

//     if(mysqli_query($conn, $sql)){  

//         echo "Record inserted successfully";  

//     }else{  

//         echo "Could not insert record: ". mysqli_error($conn);  

//     } 
//     echo $value;
// }

$html = str_get_html(file_get_contents_fun('https://www.php.net/manual/en/timezones.pacific.php'));

function file_get_contents_fun($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT,30);
    $content = curl_exec ($ch);
    curl_close ($ch); 
    return $content;
}

foreach($html->find('tbody.tbody tr td') as $e){
    $area = $e->plaintext;
    $americaName = explode("Pacific/", $area);
    $nameexactly = $americaName[1];
    $sql = "INSERT INTO `pacific`(name) 
    VALUES ('".$nameexactly."' )";  

       if(mysqli_query($conn, $sql)){  

           echo "Record inserted successfully";  

       }else{  

           echo "Could not insert record: ". mysqli_error($conn);  

       } 
}
?>