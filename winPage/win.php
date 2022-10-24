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
<body class="body_win">

    <?php
        include '../resources/auxFunctions.php';
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