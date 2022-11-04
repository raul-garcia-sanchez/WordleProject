<?php

function getStatisticsWin($textWin, $textAttempts){
        $wins1Attempt = 0;
        $wins2Attempt = 0;
        $wins3Attempt = 0;
        $wins4Attempt = 0;
        $wins5Attempt = 0;
        $wins6Attempt = 0;
        foreach($_SESSION['statisticsUser'] as $array){
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
        echo "<table>";
        echo "<tr>";
        echo "<td>$textAttempts</td>";
        echo "<td>$textWin</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>1 -> </td>";
        echo "<td>$wins1Attempt</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>2 -> </td>";
        echo "<td>$wins2Attempt</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>3 -> </td>";
        echo "<td>$wins3Attempt</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>4 -> </td>";
        echo "<td>$wins4Attempt</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>5 -> </td>";
        echo "<td>$wins5Attempt</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>6 -> </td>";
        echo "<td>$wins6Attempt</td>";
        echo "</tr>";
    }

function calculateTotalPoints(){
        $points = 0;
        $pointsYellow = 0;
        $pointsBrown = 0;
    foreach($_SESSION['statisticsUser'] as $array){
    $pointsYellow = $array[0] * -2;
    $pointsBrown = $array[1] * -4;

    if ($pointsYellow + $pointsBrown >= -120){
        $points += ($pointsYellow + $pointsBrown);
    }
    else {
        $points -= 120;
    }
    
    }
    $points += (120 * count($_SESSION['statisticsUser']));

    $_SESSION["totalPointsUser"] = $points;

}

function writeStatistics(){
        $wins1Attempt = 0;
        $wins2Attempt = 0;
        $wins3Attempt = 0;
        $wins4Attempt = 0;
        $wins5Attempt = 0;
        $wins6Attempt = 0;
        foreach($_SESSION["statisticsUser"] as $array){
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
    $file = fopen("./resources/records.txt","a");
    fwrite($file,$_SESSION['user'].",".$_SESSION["totalPointsUser"].",".$wins1Attempt.",".$wins2Attempt.",".$wins3Attempt.",".$wins4Attempt.",".$wins5Attempt.",".$wins6Attempt.",".$_SESSION['loseGames']."\n");
    fclose($file);
}

function getHallOfFames(){
    $fileArray = array();
    $file = file("./resources/records.txt");
    foreach($file as $array){
        $arrayFile = explode(",",$array);
        array_push($fileArray,$arrayFile);
    }
    usort($fileArray, function(array $elem1,$elem2){
        return (int)$elem2[1] <=> (int)$elem1[1];
    });
    return $fileArray;//Me devuelve array ordenado de mayor a menor
}

