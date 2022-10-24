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
            <h1>NO HAS ENCERTAT LA PARAULA OCULTA!</h1>
            <h1>DERROTA!!</h1>
            <p id="pSeeOcultWord">La paraula a endevinar era <b id="bWordResult"> <?php echo $_SESSION["ocultWord"]; ?></b></h2>
        </div>
        <div id="idLoseGif">
            <img class="imgLose" src="../resources/gifLose.gif" alt="GIF DERROTA" height="225" width="300">
        </div>
    </main>
</body>
</html>