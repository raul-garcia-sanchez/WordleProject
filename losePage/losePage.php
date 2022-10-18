<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lose Page</title>
    <link rel="stylesheet" href="losePage.css">
</head>
<body>
    <main>
        <div id="idTextLose">
            <h1>NO HAS ENCERTAT LA PARAULA OCULTA!</h1>
            <h1>DERROTA!!</h1>
            <p>La paraula a endevinar era <b id="bWordResult"> <?php echo $_SESSION["ocultWord"]; ?></b></h2>
        </div>
        <div id="idLoseGif">
            <img src="../resources/gifLose.gif" alt="GIF DERROTA" height="225" width="300">
        </div>
    </main>
</body>
</html>