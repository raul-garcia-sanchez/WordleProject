<?php session_start();
$arrayTranslate= $_SESSION["translate"]?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $arrayTranslate["headLose"]?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <div id="idTextLose">
            <h1>
                <?php
                    echo $_SESSION["translate"]["textLoseH1"];
                ?>
            </h1>
            <p id="pSeeOcultWord"><?php echo $arrayTranslate["textLoseP"]?> <b id="bWordResult"> <?php echo $_SESSION["ocultWord"]; ?></b></h2>
        </div>
        <div id="idLoseGif">
            <img class="imgLose" src="../resources/gifLose.gif" alt="GIF DERROTA" height="225" width="300">
        </div>
    </main>
</body>
</html>