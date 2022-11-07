<?php session_start();
if(isset($_POST["lenguageSelected"])){
    $_SESSION["lenguage"]= $_POST["lenguageSelected"];
    $lenguageSelected=$_POST["lenguageSelected"];
    $arrayTranslateText = changeLenguage($lenguageSelected);
    $_SESSION["translateWordsHidden"]= $_POST["lenguageSelected"];
}
elseif(isset($_SESSION["lenguage"])){
    $arrayTranslateText = changeLenguage($_SESSION["lenguage"]);
    $_SESSION["translateWordsHidden"]= $_SESSION["lenguage"];
}
else{
    $arrayTranslateText = changeLenguage("ES");
    $_SESSION["translateWordsHidden"]= "ES";
}
$_SESSION["translateText"]= $arrayTranslateText;
?>
<!DOCTYPE html>
<html lang="<?php echo $arrayTranslateText["lang"]?>">
<head>
    <title><?php echo $arrayTranslateText["headIndex"]?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
</head>
<noscript>
    <h1 id="messageNoJavascript"><?php echo $arrayTranslateText["nojavascript"]?>!!!</h1>
</noscript>
<body class="body_index">
    
    <header class="header-index">
        <nav class="navigationBarIndex">
                <ul>
                    <li class="dropdown">
                        <a id="aPlay" href="./game.php"><span id="iconNavigationBar">&#9776;</span></a>
                        <div class="dropdown-content">
                            <a class="linksToPages" id= "linksToPages" href="./game.php"><strong><?php echo $arrayTranslateText["buttonStart"]?></strong></strong></a>
                        </div>
                    </li>
                </ul>
        </nav>
        <form id="formLanguage" method="POST">
                <select id="lenguageSelected" name="lenguageSelected" onchange="this.form.submit()">
                    <option value="ES" <?php 
                        if(isset($_SESSION["lenguage"])){
                            if ($_SESSION["lenguage"]== "ES"){
                                echo "selected";
                            }
                        }
                        elseif(isset($_POST["lenguageSelected"])){
                            if ($_POST["lenguageSelected"]== "ES"){
                                echo "selected";
                            }
                        }
                        ?>>ES</option>
                    <option value="CA" <?php
                        if(isset($_SESSION["lenguage"])){
                            if ($_SESSION["lenguage"]== "CA"){
                                echo "selected";
                            }
                        }
                        elseif(isset($_POST["lenguageSelected"])){
                            if ($_POST["lenguageSelected"]== "CA"){
                                echo "selected";
                            }
                        }
                        ?>>CA</option>
                    <option value="EN" <?php 
                        if(isset($_SESSION["lenguage"])){
                            if ($_SESSION["lenguage"]== "EN"){
                                echo "selected";
                            }
                        }
                        elseif (isset($_POST["lenguageSelected"])){
                            if ($_POST["lenguageSelected"]== "EN"){
                                echo "selected";
                            }
                        }
                        ?>>EN</option>
                </select>
            </form>
            <div class="headerLanding">
                <button onclick="seeHallOfFame()" id="hallOfFame"class="hallOfFame">Hall of fame </button>
            </div>
    </header>
    <h1 class="titleWordle"><?php echo $arrayTranslateText["header"]?></h1>
    <p id = "nameUser"></p>

    <div class ="containerMainContent">
        <img class="imgLanding" src="<?php echo $arrayTranslateText['imgWordle']?>" alt="Quadrícula joc">
        <p class="instructions">
            <?php echo $arrayTranslateText["instructions"]?>
        </p>
    </div>
    <br>

    <form id="formName" action="./game.php" class="formName" method="POST">
        <input class="inputName" type="text" name="inputName" id="inputName" placeholder="<?php echo $arrayTranslateText["placeholder"]?>">
        <br>
        <input class="btnSubmit" id="btnSubmit" onclick="sendPlayPage(event)" value="<?php echo $arrayTranslateText["buttonStart"]?>"  type="submit">
    </form>
    <br>
    <div class="alert" id="alert">
        <span class="closebtn" onclick="this.parentElement.style.visibility='hidden';">&times;</span> 
         <strong><?php echo $arrayTranslateText["alert"]?></strong>
    </div>

    <script>

        function seeHallOfFame(){
            window.location.href = "./ranking.php"
        }
        function sendPlayPage(event) {
            const playerName = document.getElementById("inputName").value;
            
            var userExist =      <?php
                            if (isset($_SESSION['user'])){
                                echo " true;";
                            }
                            else{
                                echo " false;";
                            }
                        ?>

            if (playerName.length == 0  && !userExist) {

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
                
                <?php
                    $_SESSION['ocultWord'] = "";
                ?>
                window.location.href = "./game.php";
            }
        }
    </script>
    <?php
        if (isset($_SESSION["user"])){
            echo "<script> document.getElementById('nameUser').innerHTML = '".$_SESSION["user"]."'; </script>";
            echo "<script> document.getElementById('linksToPages').style.cursor = 'pointer'; </script>";
            echo "<script> document.getElementById('linksToPages').style.pointerEvents = 'auto' </script>";
        }
        function changeLenguage($lenguage){
            $fileWords= file("./resources/wordleText".$lenguage.".txt");
            $fileOpen= fopen("./resources/wordleText".$lenguage.".txt", "r");
            $signDictionary= ":";
            $keysValues= [];
            foreach ($fileWords as $numberLine => $wordsLine){
                $signDictionaryPosition= strpos($wordsLine, $signDictionary);
                $key= substr($wordsLine,0,$signDictionaryPosition);
                $value= trim(substr($wordsLine, $signDictionaryPosition+1));
                $keysValues[$key] = $value;
            };
            return $keysValues;
        };
    ?>

</body>
</html>