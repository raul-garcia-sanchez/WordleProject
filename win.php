<?php session_start();
$arrayTranslateText= $_SESSION["translateText"];
if($_SESSION['secPoints']<=0){
    $_SESSION['secPoints']= 0;
}
echo $_SESSION['secPoints'];
?>

<!DOCTYPE html>
<html lang="<?php echo $arrayTranslateText["lang"]?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $arrayTranslateText["headWin"]?></title>
    <link rel="stylesheet" href="./style.css">
</head>
<noscript>
    <h1 id="messageNoJavascript"><?php echo $arrayTranslateText["nojavascript"]?>!!!</h1>
</noscript>
<body class="body_win">

    <?php
        include './resources/auxFunctions.php';
        calculateTotalPoints();
    ?>

    <nav class="navigationBarIndex">
        <ul>
            <li class="dropdown">
                <a id="aPlay" href="./game.php"><span id="iconNavigationBar">&#9776;</span></a>
                <div class="dropdown-content">
                    <a class="linksToPagesGame" href="./game.php"><strong><?php echo $arrayTranslateText["menuWinToGame"]?></strong></a>
                    <a class="linksToPagesGame" href="./index.php"><strong><?php echo $arrayTranslateText["menuWinToIndex"]?></strong></a>
                </div>
            </li>
        </ul>
    </nav>


    <main>
        <div id="idTextWin">
            <h1> <?php echo strtoupper($_SESSION['user']); ?> <?php echo $arrayTranslateText["textWin"]?></h1>
            <h1> <?php echo $arrayTranslateText["pointsWinPt1"]?> <?php echo $_SESSION[$_SESSION['user']."totalPointsUser"] + $_SESSION['secPoints']; ?> <?php echo $arrayTranslateText["pointsWinPt2"]?>!!</h1>
        </div>
        <div id="finalMessage">
            <?php
            for($i=0;$i<strlen($arrayTranslateText["finalMessageWin"]);$i++){
                $style=strval($i+1);
                echo "<span style='--i:{$style}'>{$arrayTranslateText["finalMessageWin"][$i]}</span>";
            }
            ?>
        </div>
            <div id="statistics">
                <p><?php echo $arrayTranslateText["gameLoseText"]?>: <?php echo $_SESSION['loseGames'];?></p>
                <p><?php echo $arrayTranslateText["gameWinText"]?>: <?php echo $_SESSION['winGames'];?></p>
                <p><?php getStatisticsWin($arrayTranslateText['numberWinsText'],$arrayTranslateText['numberAttemptsText']);?></p>
            </div>
    </main>
    <script>
        var sound = document.createElement("iframe");
        sound.setAttribute("src", "./resources/win.mp3");
        sound.setAttribute("hidden","hidden")
        document.body.appendChild(sound);
    </script>

</body>
</html>