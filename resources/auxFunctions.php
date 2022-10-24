<?php

function getStatisticsWin(){
        $wins1Attempt = 0;
        $wins2Attempt = 0;
        $wins3Attempt = 0;
        $wins4Attempt = 0;
        $wins5Attempt = 0;
        $wins6Attempt = 0;
        foreach($_SESSION[$_SESSION['user']] as $array){
            if($array[2] == 1 && $array[3] == "true"){
                $wins1Attempt = $wins1Attempt + 1;
            }
            else if($array[2] == 2 && $array[3] == "true"){
                $wins2Attempt = $wins2Attempt + 1;
            }
            else if($array[2] == 3 && $array[3] == "true"){
                $wins3Attempt = $wins3Attempt + 1;
            }
            else if($array[2] == 4 && $array[3] == "true"){
                $wins4Attempt = $wins4Attempt + 1;
            }
            else if($array[2] == 5 && $array[3] == "true"){
                $wins5Attempt = $wins5Attempt + 1;
            }
            else if($array[2] == 6 && $array[3] == "true"){
                $wins6Attempt = $wins6Attempt + 1;
            }
        }
        echo "1 -> ".$wins1Attempt."<br>";
        echo "2 -> ".$wins2Attempt."<br>";
        echo "3 -> ".$wins3Attempt."<br>";
        echo "4 -> ".$wins4Attempt."<br>";
        echo "5 -> ".$wins5Attempt."<br>";
        echo "6 -> ".$wins6Attempt;
    }

?>