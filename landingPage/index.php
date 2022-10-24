<?php session_start();
    if(isset($_POST["selectLenguage"])){
        $lenguage=$_POST["selectLenguage"];
        $arrayTranslate = changeLenguage($lenguage);
        $_SESSION["translate"]= $arrayTranslate;
        $_SESSION["translateWords"]= $_POST["selectLenguage"];

    }
    else{
        $arrayTranslate = changeLenguage("ES");
        $_SESSION["translate"]= $arrayTranslate;
        $_SESSION["translateWords"]= "ES";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $arrayTranslate["headIndex"]?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1 class="titleWordle"><?php echo $arrayTranslate["header"]?></h1>
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
        <input class="inputName" type="text" name="inputName" id="inputName" placeholder="<?php echo $arrayTranslate['placeholder'];?>">
        <br>
        <input class="btnSubmit" id="btnSubmit" onclick="sendPlayPage(event)" value="<?php echo $arrayTranslate["botonStart"] ?>"  type="submit">
    </form>
    <br>
    <div class="alert" id="alert">
        <span class="closebtn" onclick="this.parentElement.style.visibility='hidden';">&times;</span> 
         <strong><?php echo $arrayTranslate["alert"]?></strong>
    </div>
    <footer>
    <form method="POST">
        <select id="selectLenguage" name="selectLenguage" onchange="this.form.submit()">
            <option value="ES" <?php if (isset($_POST["selectLenguage"])){
                if ($_POST["selectLenguage"]== "ES"){
                    echo "selected";
                }}
                ?>>ES</option>
            <option value="CA" <?php if (isset($_POST["selectLenguage"])){
                if ($_POST["selectLenguage"]== "CA"){
                    echo "selected";
                }}
                ?>>CA</option>
            <option value="EN" <?php if (isset($_POST["selectLenguage"])){
                if ($_POST["selectLenguage"]== "EN"){
                    echo "selected";
                }}
                ?>>EN</option>
        </select>
    </form>
    <?php
        function changeLenguage($lenguage){
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
        let lenguageLang= document.getElementById('selectLenguage').value;
        document.querySelector("html").setAttribute("lang", lenguageLang);
        });
    </script>
</body>
</html>
