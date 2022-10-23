<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Win page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

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

    <main>
        <div id="idTextWin">
            <h1> <?php echo strtoupper($_SESSION['user']); ?> HAS ENCERTAT LA PARAULA OCULTA!</h1>
        </div>
        <div id="finalMessage">
            <span style="--i:1">V</span>
            <span style="--i:2">I</span>
            <span style="--i:3">C</span>
            <span style="--i:4">T</span>
            <span style="--i:5">O</span>
            <span style="--i:6">R</span>
            <span style="--i:7">I</span>
            <span style="--i:8">A</span>
            <span style="--i:9">!</span>
            <span style="--i:10">!</span>
        </div>
        <div id="statistics">
            <div id="statisticsLose">
                <p>Partides fallides: <?php echo $_SESSION['loseGames'];?></p>
            </div>
            <div id="statisticsWin">
                <p>Partides exitoses: <?php echo $_SESSION['winGames'];?></p>
                <p><?php getStatisticsWin();?></p>
            </div>
        </div>
    </main>
    <script>
        var sound = document.createElement("iframe");
        sound.setAttribute("src", "../resources/win.mp3");
        sound.setAttribute("hidden","hidden")
        document.body.appendChild(sound);
    </script>
</body>
</html>