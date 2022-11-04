<?php session_start();
$arrayTranslateText= $_SESSION["translateText"];
if (!isset($_POST['inputName']) && !isset($_SESSION['user'])) {
    header("Location: error403.php");
}
?>
<!DOCTYPE html>
<html lang="<?php echo $arrayTranslateText["lang"]?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $arrayTranslateText["headLose"]?></title>
    <link rel="stylesheet" href="./style.css">
</head>
<noscript>
    <h1 id="messageNoJavascript"><?php echo $arrayTranslateText["nojavascript"]?>!!!</h1>
</noscript>
<body class="body_lose">

    <?php
    include './resources/auxFunctions.php';
    calculateTotalPoints();
    ?>

    <nav class="navigationBarIndex">
        <ul>
            <li class="dropdown">
                <a id="aPlay" href="./game.php"><span id="iconNavigationBar">&#9776;</span></a>
                <div class="dropdown-content">
                    <a class="linksToPagesGame" href="./game.php"><strong><?php echo $arrayTranslateText["menuLoseToGame"]?></strong></a>
                    <a class="linksToPagesGame" href="./index.php"><strong><?php echo $arrayTranslateText["menuLoseToIndex"]?></strong></a>
                </div>
            </li>
        </ul>
    </nav>

    <main>
        <div id="idTextLose">
            <h1><?php echo strtoupper($_SESSION['user']); ?> <?php echo $arrayTranslateText["textLoseH1"]?></h1>
            <h1><?php echo $arrayTranslateText["pointsLosePt1"]?> <?php echo $_SESSION[$_SESSION['user']."totalPointsUser"] ?> <?php echo $arrayTranslateText["pointsLosePt2"]?>!!</h1>
            <p id="pSeeOcultWord"><?php echo $arrayTranslateText["textLoseP"]?> <b id="bWordResult"> <?php echo $_SESSION["ocultWord"][count($_SESSION["ocultWord"]) - 2]; ?></b></h2>
        </div>
        <div id="finalMessage">  
        <?php
            for($i=0;$i<strlen($arrayTranslateText["finalMessageLose"]);$i++){
                $style=strval($i+1);
                echo "<span style='--i:{$style}'>{$arrayTranslateText["finalMessageLose"][$i]}</span>";
            }
            ?>
        </div>
        <div id="statistics">
            <p><?php echo $arrayTranslateText["gameLoseText"]?>: <?php echo $_SESSION['loseGames'];?></p>
            <p><?php echo $arrayTranslateText["gameWinText"]?>: <?php echo $_SESSION['winGames'];?></p>
            <p><?php getStatisticsWin($arrayTranslateText['numberWinsText'],$arrayTranslateText['numberAttemptsText'])?></p>
        </div>
    </main>
    <script>
        var sound = document.createElement("iframe");
        sound.setAttribute("src", "./resources/lose.mp3");
        sound.setAttribute("hidden","hidden")
        document.body.appendChild(sound);
    </script>

</body>
</html>