<?php session_start();
$arrayTranslate= $_SESSION["translate"]?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $arrayTranslate["headWin"]?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <div id="idTextWin">
            <h1><?php echo $arrayTranslate["textWin"]?></h1>
        </div>
        <div id="idVictoryGif">
            <img src="../resources/gifVictory.gif" alt="GIF VICTORIA" width="600">
        </div>
    </main>
</body>
</html>