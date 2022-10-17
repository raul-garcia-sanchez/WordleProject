<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wordle</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./landingPage.css">

</head>
<body>
    <header>
        <h1 class="titleWordle">WORDLE</h1>
    </header>

    <div class ="containerMainContent">
        <table>
            <?php
                for ($i=1; $i <= 6 ; $i++) {            //Filas (6)
                    echo "<tr>";
                    for ($j=1; $j <= 5 ; $j++) {        //Columnas (5)
                        echo "<td id=\"row".$i.$j."\"></td>";
                    }
                    echo "</tr>\n";
                }

                echo "\n"
            ?>
        </table>

        <p class="instructions">Endevina la <strong>WORDLE</strong> en 6 intents. <br>
        Cada fila ha de ser una paraula vàlida de 5 lletres. <br>
        Premi el botó intro per enviar. <br>
        Després de cada suposició, el color de les fitxes canviarà <br>
        per mostrar què tan a prop ets de la paraula. <br>
        <br>
        <strong>Exemples:</strong> <br>
        La lletra T està en la paraula i en el lloc correcte -> VERD <br>
        La lletra R està en la paraula i en el lloc equivocar -> GROC <br>
        La lletra S no està en la paraula i enlloc -> GRIS
        </p>
    </div>

    <br>

    <form id="formName" action="playPage.php" class="formName" method="POST">
        <input class="inputName" type="text" name="inputName" id="inputName" placeholder="Escrigui el seu nom">
        <br>
        <input class="btnSubmit" id="btnSubmit" onclick="enviarPlayPage(event)" value="Jugar"  type="submit">
    </form>
    <br>
    <div class="alert" id="alert">
        <span class="closebtn" onclick="this.parentElement.style.visibility='hidden';">&times;</span> 
        Siusplau, introduiu un nom d'usuari per poder començar a jugar
    </div>

    <script>
        function enviarPlayPage(event) {
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
                window.location.href = "./playPage.php";
            }
        }
        
        //Script per introduir paraules als recuadres de exemple
        document.getElementById("row11").innerHTML = "F";
        document.getElementById("row12").innerHTML = "E";
        document.getElementById("row13").innerHTML = "I";
        document.getElementById("row14").innerHTML = "N";
        document.getElementById("row15").innerHTML = "A";

        document.getElementById("row21").innerHTML = "A";
        document.getElementById("row22").innerHTML = "C";
        document.getElementById("row23").innerHTML = "T";
        document.getElementById("row24").innerHTML = "E";
        document.getElementById("row25").innerHTML = "S";

        document.getElementById("row31").innerHTML = "A";
        document.getElementById("row32").innerHTML = "B";
        document.getElementById("row33").innerHTML = "R";
        document.getElementById("row34").innerHTML = "I";
        document.getElementById("row35").innerHTML = "C";

        document.getElementById("row41").innerHTML = "A";
        document.getElementById("row42").innerHTML = "N";
        document.getElementById("row43").innerHTML = "T";
        document.getElementById("row44").innerHTML = "I";
        document.getElementById("row45").innerHTML = "C";

        document.getElementById("row51").innerHTML = "A";
        document.getElementById("row52").innerHTML = "L";
        document.getElementById("row53").innerHTML = "T";
        document.getElementById("row54").innerHTML = "R";
        document.getElementById("row55").innerHTML = "E";

        document.getElementById("row61").innerHTML = "A";
        document.getElementById("row62").innerHTML = "N";
        document.getElementById("row63").innerHTML = "U";
        document.getElementById("row64").innerHTML = "A";
        document.getElementById("row65").innerHTML = "L";

    </script>
</body>
</html>