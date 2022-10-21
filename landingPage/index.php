<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Wordle</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">

    <?php
        if (isset($_SESSION["userName"])){
            echo "<script> document.getElementsByClassName('linksToPages').style.pointer-Events = 'auto' </script>";
            echo "aaaaaaaaaa";
        }
        else{
            echo "bbbbbb";
        }
    ?>

</head>
<body>
    <header>
        <h1 class="titleWordle">WORDLE</h1>
    </header>

    <nav class="navigationBarIndex">
        <ul>
            <li class="dropdown">
                <a id="aPlay" href="../playGame/game.php"><span id="iconNavigationBar">&#9776;</span></a>
                <div class="dropdown-content">
                    <a class="linksToPages" href="../playGame/game.php">Jugar</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class ="containerMainContent">
        <img class="imgLanding" src="../resources/imgLandingPage.png" alt="Quadrícula joc">
        <p class="instructions">Endevina la <strong>WORDLE</strong> en 6 intents. <br>
        Cada fila ha de ser una paraula vàlida de 5 lletres. <br>
        Premi el botó intro per enviar. <br>
        Després de cada suposició, el color de les fitxes canviarà <br>
        per mostrar què tan a prop ets de la paraula. <br>
        <br>
        <strong>Exemples:</strong> <br>
        La lletra C està en la paraula i en el lloc correcte -> VERD <br>
        La lletra P està en la paraula i en el lloc equivocar -> GROC <br>
        La lletra E no està en la paraula i enlloc -> MARRÓ
        </p>
    </div>
    <br>

    <form id="formName" action="../playGame/game.php" class="formName" method="POST">
        <input class="inputName" type="text" name="inputName" id="inputName" placeholder="Escrigui el seu nom">
        <br>
        <input class="btnSubmit" id="btnSubmit" onclick="sendPlayPage(event)" value="JUGAR"  type="submit">
    </form>
    <br>
    <div class="alert" id="alert">
        <span class="closebtn" onclick="this.parentElement.style.visibility='hidden';">&times;</span> 
         <strong> Si us plau, introduiu un nom d'usuari per poder començar a jugar</strong>
    </div>

    <script>
        function sendPlayPage(event) {
            const playerName = document.getElementById("inputName").value;
            if (playerName.length == 0) {

                if (document.getElementById("alert").style.visibility === 'hidden' || document.getElementById("alert").style.visibility.length==0){
                    event.preventDefault();
                    document.getElementById("alert").style.visibility = 'visible';
                }
                else{
                    event.preventDefault();
                    document.getElementById("alert").style.visibility = 'visible';
                }
            }
            else{
                window.location.href = "../playGame/game.php";
            }
        }

    </script>

</body>
</html>