<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lose Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <?php
    include '../resources/auxFunctions.php';
    calculateTotalPoints();
    ?>

    <nav class="navigationBarIndex">
        <ul>
            <li class="dropdown">
                <a id="aPlay" href="../playGame/game.php"><span id="iconNavigationBar">&#9776;</span></a>
                <div class="dropdown-content">
                    <a class="linksToPagesGame" href="../playGame/game.php"><strong>Jugar de nou</strong></a>
                    <a class="linksToPagesGame" href="../landingPage/index.php"><strong>Menu Principal</strong></a>
                </div>
            </li>
        </ul>
    </nav>

    <main>
        <div id="idTextLose">
            <h1><?php echo strtoupper($_SESSION['user']); ?> NO HAS ENCERTAT LA PARAULA OCULTA!</h1>
            <h1>TENS <?php echo $_SESSION[$_SESSION['user']."totalPointsUser"] ?> PUNTS!!</h1>
            <p id="pSeeOcultWord">La paraula a endevinar era <b id="bWordResult"> <?php echo $_SESSION["ocultWord"]; ?></b></h2>
        </div>
        <div id="finalMessage">
            <span style="--i:1">D</span>
            <span style="--i:2">E</span>
            <span style="--i:3">R</span>
            <span style="--i:4">R</span>
            <span style="--i:5">O</span>
            <span style="--i:6">T</span>
            <span style="--i:7">A</span>
            <span style="--i:8">!</span>
            <span style="--i:9">!</span>
        </div>
        <div id="statistics">
            <p id="pLose">Partides fallides: <?php echo $_SESSION['loseGames'];?></p>
            <p id="pWin">Partides exitoses: <?php echo $_SESSION['winGames'];?></p>
            <p><?php getStatisticsWin();?></p>
        </div>
    </main>
    <script>
        var sound = document.createElement("iframe");
        sound.setAttribute("src", "../resources/lose.mp3");
        sound.setAttribute("hidden","hidden")
        document.body.appendChild(sound);
    </script>

</body>
</html>