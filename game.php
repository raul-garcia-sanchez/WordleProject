<?php session_start();
$arrayTranslateText= $_SESSION["translateText"];
$translateWordsHidden= $_SESSION["translateWordsHidden"];
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
    <title><?php echo $arrayTranslateText["headGame"]?></title>
    <link rel="stylesheet" href="./style.css">
</head>
<noscript>
  <h1 id="messageNoJavascript"><?php echo $arrayTranslateText["nojavascript"]?>!!!</h1>
</noscript>

<body class="body_game">
    
    <?php

        $_SESSION['user'] = (isset($_POST['inputName']) && strlen($_POST['inputName']) > 0 )
            ? $_POST['inputName']
            : $_SESSION['user'];

        $_SESSION[$_SESSION['user']] = (isset($_SESSION[$_SESSION['user']]))
            ? $_SESSION[$_SESSION['user']]
            : array();

        $_SESSION[$_SESSION['user']."totalPointsUser"] = (isset($_SESSION[$_SESSION['user']."totalPointsUser"]))
            ? $_SESSION[$_SESSION['user']."totalPointsUser"]
            : 0;
    ?>

    <nav class="navigationBarIndex">
        <ul>
            <li class="dropdown">
                <a id="aPlay" href=".game.php"><span id="iconNavigationBar">&#9776;</span></a>
                <div class="dropdown-content">
                    <a class="linksToPagesGame" href="./index.php"><strong><?php echo $arrayTranslateText["menuGameToIndex"]?></strong></a>
                    <label class="switch">
                        <input id="checkBoxDarkMode" type="checkbox" onchange="changeTheme()">
                        <span class="slider">Dark Mode</span>
                    </label>
                </div>
            </li>
        </ul>
    </nav>

    <header>
        <h1 class="class-header"><?php echo $arrayTranslateText["headerh1"]?></h1>
        <h2 class="class-header"><?php echo $arrayTranslateText["headerh3Pt1"]?> <?php echo $_SESSION['user']?> <?php echo $arrayTranslateText["headerh3Pt2"]?></h2>
        <h3 id="puntuation" class="class-header"><?php echo $arrayTranslateText["points"]?>: <?php echo $_SESSION[$_SESSION['user']."totalPointsUser"]?></h3>
    </header>

    <div class ="containerMainContent">
        <table>
            <?php
                for ($i=1; $i <= 6 ; $i++) {            
                    echo "<tr>";
                    for ($j=1; $j <= 5 ; $j++) {        
                        echo "<td id='$i$j'></td>\n";
                    }
                    echo "</tr>\n";
                }
                echo "\n"
            ?>
        </table>
    </div>


    <?php
        $randomWord = randomWord($translateWordsHidden);
        $_SESSION['keysSendDelete']= $arrayTranslateText["keysSendDelete"];
        $firstRowKeyboard = explode(",",$arrayTranslateText["firstRowKeyboard"]);
        $secondRowKeyboard = explode(",",$arrayTranslateText["secondRowKeyboard"]);
        $thirdRowKeyboard = explode(",",$arrayTranslateText["thirdRowKeyboard"]);
        echo "<script> console.log('".$randomWord."')</script>";
        if (isset($_SESSION['ocultWord']) && gettype($_SESSION['ocultWord']) == "string" ) {
            $_SESSION['ocultWord'] = "";
        }

        if ($_SESSION['ocultWord']){
            array_push( $_SESSION['ocultWord'], $randomWord);
        }
        else {
            $arrayTemporalWords = [];
            array_push($arrayTemporalWords, $randomWord);
            $_SESSION['ocultWord'] = $arrayTemporalWords;

        }
    ?>
    <div id="divKeyboard">
        <?php
        echo "<div class='rowKeyboard'>\n";
        for ($i = 0; $i <count( $firstRowKeyboard); $i++){
            echo "<button id='$firstRowKeyboard[$i]' class='class-keyboard'>$firstRowKeyboard[$i]</button>\n";
        }
        echo "</div>\n";
        echo "<div class='rowKeyboard'>\n";
        for ($j = 0; $j <count( $secondRowKeyboard); $j++){
            echo "<button id='$secondRowKeyboard[$j]' class='class-keyboard'>$secondRowKeyboard[$j]</button>\n";
        }
        echo "</div>\n";
        echo "<div class='rowKeyboard'>\n";
        for ($k = 0; $k <count( $thirdRowKeyboard); $k++){
            echo "<button id='$thirdRowKeyboard[$k]' class='class-keyboard'>$thirdRowKeyboard[$k]</button>\n";
        }
        echo "</div>\n";
        function filterAccents($word){
            if(str_contains($word,"à")){
                return str_replace("à","a",$word);
            }
            elseif(str_contains($word,"á")){
                return str_replace("á","a",$word);
            }
            else if(str_contains($word,"è")){
                return str_replace("è","e",$word);
            }
            else if(str_contains($word,"é")){
                return str_replace("é","e",$word);
            }
            else if(str_contains($word,"í")){
                return str_replace("í","i",$word);
            }
            else if(str_contains($word,"ò")){
                return str_replace("ò","o",$word);
            }
            else if(str_contains($word,"ó")){
                return str_replace("ó","o",$word);
            }
            else if(str_contains($word,"ú")){
                return str_replace("ú","u",$word);
            }
            else{
                return $word;
            }
        }

        function exceptionLetter($word){
            if(str_contains($word, "ç")){
                return str_replace("ç","Ç",$word);
            }
            else{
                return $word;
            }
        }
        function randomWord($lenguage){
            $fileWords= file("./resources/words".$lenguage.".txt");
            $fileOpen= fopen("./resources/words".$lenguage.".txt", "r");
            $arrayWords= [];
            foreach ($fileWords as $lineWord => $word){
                array_push($arrayWords, $word);
            };
            $arrayLen= count($arrayWords);
            $randomNumber= rand(0,$arrayLen-1);
            $randomWord= $arrayWords[$randomNumber];
            $randomWord= filterAccents($randomWord);
            $randomWord= exceptionLetter($randomWord);
            fclose($fileOpen);
            
            return trim(strtoupper(substr($randomWord,0)));
        }

        ?>
    </div>
    
        <form id="formDataGames" method="POST">
            <input hidden type="number" id="numYellows" name="numYellows">
            <input hidden type="number" id="numBrowns" name="numBrowns">
            <input hidden type="number" id="numAttempts" name="numAttempts">
            <input hidden type="text" id="winGame" name="winGame">
        </form>

        <form action="./index.php">
            <input hidden type="text" id="inputDarkMode" name="inputDarkMode">
        </form>

        <form action="./win.php">
            <input hidden type="text" id="inputDarkMode" name="inputDarkMode">
        </form>

        <form action="./lose.php">
            <input hidden type="text" id="inputDarkMode" name="inputDarkMode">
        </form>
    
    
    <?php
        $loseGames = 0;
        $winGames = 0;
        $totalPoints = 0;
        if(isset($_POST['numYellows']) && isset($_POST['numBrowns']) && isset($_POST['numAttempts']) && isset($_POST['winGame'])){
            $dict = array();
            array_push($dict,$_POST['numYellows'],$_POST['numBrowns'],$_POST['numAttempts'],$_POST['winGame']);
            array_push($_SESSION[$_SESSION['user']],$dict);
            foreach($_SESSION[$_SESSION['user']] as $array){
                if($array[3] == "false"){
                    $loseGames = $loseGames + 1;
                }
                else{
                    $winGames = $winGames + 1;
                }
            }
            $_SESSION['loseGames'] = $loseGames;
            $_SESSION['winGames'] = $winGames;
        }

        
        if(isset($_POST['winGame'])){
            if($_POST['winGame'] == "false"){
                echo "
                <script> 
                    window.location.replace('./lose.php');
                </script>";
            }
            else{
                echo "
                <script>
                    window.location.replace('./win.php');
                </script>";
            }
        }
    ?>
    <script>
        var keysSendDelete = "<?php echo $_SESSION["keysSendDelete"]?>";
        <?php
            echo "var ocultWord = '$randomWord';";
        ?>
    </script>
    <script src="./playPage.js"></script>
    <script>

        function submitByAnchor(){
            document.getElementById("formName").submit();
        }

        function changeThemeCheckingCheckBox(){
            const query = window.matchMedia('(prefers-color-scheme: dark)');
            if (query.matches) {
                if (!document.getElementById('checkBoxDarkMode').checked){
                    changeTheme();
                }

            }
            else{

                if (document.getElementById('checkBoxDarkMode').checked){
                    changeTheme();
                }
            }

        }

        function updateFormAndChangeTheme(){
            if (!document.getElementById('checkBoxDarkMode').checked) {
                document.getElementById('inputDarkMode').value = "light";
            }
            else{
                document.getElementById('inputDarkMode').value = "dark";
            }
        }

        function changeThemeCheckingCheckBox(){
            const query = window.matchMedia('(prefers-color-scheme: dark)');
            if (query.matches) {
                if (!document.getElementById('checkBoxDarkMode').checked){
                    changeTheme();
                }

            }
            else{

                if (document.getElementById('checkBoxDarkMode').checked){
                    changeTheme();
                }
            }

        }


        function changeTheme(){
            document.body.classList.toggle("dark-mode");

        }

        function changeToDarkOrLightMode(query){
            if (query.matches) {

                    if (!document.getElementById('checkBoxDarkMode').checked){
                        document.getElementById('checkBoxDarkMode').checked = true;
                        changeTheme();
                    }

                }
                else{

                    if (document.getElementById('checkBoxDarkMode').checked){
                        document.getElementById('checkBoxDarkMode').checked = false;
                        changeTheme();
                    }
                }
        }

        
        const query = window.matchMedia('(prefers-color-scheme: dark)');
        changeToDarkOrLightMode(query);
        query.addListener(changeToDarkOrLightMode);

    </script>

    <?php 
        if (isset($_POST['inputDarkMode'])){
            if ($_POST["inputDarkMode"] == 'dark') {
                echo "<script> document.getElementById('checkBoxDarkMode').checked = true;
                changeThemeCheckingCheckBox()
                </script>";

            }
            else{
                echo "<script> document.getElementById('checkBoxDarkMode').checked = false;
                changeThemeCheckingCheckBox()
                </script>";
            }  
            
        }

        // if ($_SESSION["dark"]) {
        //     echo "dark";
        //     echo "<script> document.getElementById('checkBoxDarkMode').checked = true </script>";
        // }
        // else{
        //     echo "light";
        //     echo "<script> document.getElementById('checkBoxDarkMode').checked = false ;</script>";
        // }        
        // echo $_SESSION["dark"];
        

    ?>
    
</body>
</html>