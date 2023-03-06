<?php

    if(isset($_GET['seconds']) && isset($_GET['hours']) && isset($_GET['date']) 
    && isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year'])){

        $seconds = $_GET['seconds'];

        $resultForhour = []; 

        if($seconds == "SecondsShow"){

            $time = time();
            $datetimeinfo = getdate($time);

            $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes'].":".$datetimeinfo['seconds'];
        
            $resultForhour[0] = $runningTime;

        } else if($seconds == "SecondsHide"){

            $time = time();
            $datetimeinfo = getdate($time);

            $runningTime = $datetimeinfo['hours'].":".$datetimeinfo['minutes'];
        
            $resultForhour[0] = $runningTime;

        }

        $hours = $_GET['hours'];

        if($hours == "change24Hours"){

            $time = $resultForhour[0];

            $explodeTime = explode(":", $time);

            if(count($explodeTime) == 3){

                $resultForhour[0] = date("H:i:s", strtotime($time));
                
            }else if(count($explodeTime) == 2){

                $resultForhour[0] = date("H:i", strtotime($time));

            }

        } else if($hours == "change12Hours"){

            $time = $resultForhour[0];

            $explodeTime = explode(":", $time);

            if(count($explodeTime) == 3){

                $resultForhour[0] = date("h:i:s", strtotime($time));
                
            }else if(count($explodeTime) == 2){

                $resultForhour[0] = date("h:i", strtotime($time));

            }

        } else if($hours == "change12AndAMPM"){

            $time = $resultForhour[0];

            $explodeTime = explode(":", $time);

            if(count($explodeTime) == 3){

                $resultForhour[0] = date("h:i:s A", strtotime($time));
                
            }else if(count($explodeTime) == 2){

                $resultForhour[0] = date("h:i A", strtotime($time));

            }
        }
        
        // day

        $arrayDong2 = [];

        $day = $_GET['day'];

        if($day == "FullDay"){

            $time = time();
            $datetimeinfo = getdate($time);

            $arrayDong2[0] = $datetimeinfo['weekday'];

        }else if($day == "HideDay"){

            $arrayDong2[0] = "";
            
        }

        $month = $_GET['month'];

        if($month == "ShortMonth"){

            $time = time();
            $datetimeinfo = getdate($time);

            $arrayDong2[1] = substr($datetimeinfo['month'], 0, 3);

        }else if($month == "FullMonth"){

            $time = time();
            $datetimeinfo = getdate($time);

            $arrayDong2[1] = $datetimeinfo['month'];
            
        }else if($month == "HideMonth"){

            $arrayDong2[1] = "";
            
        }

        $year = $_GET['year'];

        if($year == "ShortYears"){

            $time = time();
            $datetimeinfo = getdate($time);

            $arrayDong2[2] = substr($datetimeinfo['year'], 2, 3);

        }else if($year == "FullYears"){

            $time = time();
            $datetimeinfo = getdate($time);

            $arrayDong2[2] = $datetimeinfo['year'];
            
        }else if($year == "HideYears"){

            $arrayDong2[2] = "";
            
        }

        $date = $_GET['date'];

        if($date == "hideDate"){

            $arrayDong2[3] = "";


        } else if($date == "kindofD"){

            $time = time();
            $datetimeinfo = getdate($time);

            $arrayDong2[3] = $datetimeinfo['mday'];

        } else if($date == "kindofDDMM"){

            $time = time();
            $datetimeinfo = getdate($time);

            $arrayDong2[3] = $datetimeinfo['mday']."/".$datetimeinfo['mon'];
            
        } else if($date == "kindofMMĐD"){

            $time = time();
            $datetimeinfo = getdate($time);

            $arrayDong2[3] = $datetimeinfo['mon']."/".$datetimeinfo['mday'];
            
        }

        if($arrayDong2[2] == ""){
            echo $result = $resultForhour[0]."+".$arrayDong2[0]." ".$arrayDong2[1]." ".$arrayDong2[3];
        }else{
            echo $result = $resultForhour[0]."+".$arrayDong2[0]." ".$arrayDong2[1]." ".$arrayDong2[3]."/".$arrayDong2[2];
        }
 
    }else {
        echo "Lỗi";
    }

?>