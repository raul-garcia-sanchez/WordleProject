<!DOCTYPE html>
<html lang="es">
<head>
    <title>Wordle</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        if(isset($_POST["selectLenguage"])){
            $lenguage=$_POST["selectLenguage"];
            $arrayTranslate = changeLenguage($lenguage);

        }
        else{
            $arrayTranslate = changeLenguage("ES");
        }

        function changeLenguage($lenguage){
            echo $lenguage;
            $fileWords= file("../resources/wordleText".$lenguage.".txt");
            $fileOpen= fopen("../resources/wordleText".$lenguage.".txt", "r");
            $signDictionary= ":";
            $keysValues= [];
            foreach ($fileWords as $numberLine => $wordsLine){
                $signDictionaryPosition= strpos($wordsLine, $signDictionary);
                $key= substr($wordsLine,0,$signDictionaryPosition);
                $value= substr($wordsLine, $signDictionaryPosition+1, strlen($wordsLine));
                $keysValues[$key] = $value;
            };
            return $keysValues;
        };
    ?>
    <header>
        <h1 class="titleWordle">WORDLE</h1>
    </header>

    <div class ="containerMainContent">
        <img class="imgLanding" src="../resources/imgLandingPage.png" alt="Quadrícula joc">
        <p class="instructions">
            <?php
                echo $arrayTranslate["instructions"];
            ?>
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
    <footer>
        <form method="POST" selected>
            <select id="selectLenguage" name="selectLenguage" onchange="this.form.submit()">
                <option <?php if ($_POST["selectLenguage"]== "ES"){
                    echo "selected";
                    }
                    ?>
                value="ES">ES</option>
                <option <?php if ($_POST["selectLenguage"]== "CA"){
                    echo "selected";
                    }
                    ?>
                value="CA">CA</option>
                <option <?php if ($_POST["selectLenguage"]== "EN"){
                    echo "selected";
                    }
                    ?>
                value="EN">EN</option>
            </select>
        </form>
    </footer>
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
            };
        };

        document.getElementById('selectLenguage').addEventListener('change', (event) => {
        let lenguage= document.getElementById('selectLenguage').value;
        document.querySelector('html').setAttribute('lang', lenguage);
        });
    </script>
</body>
</html>
