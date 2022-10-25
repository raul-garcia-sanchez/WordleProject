<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body_game">
    <?php
        $_SESSION['user'] = (isset($_POST['inputName']))
            ? $_POST['inputName']
            : $_SESSION['user'];

        $_SESSION[$_SESSION['user']] = (isset($_SESSION[$_SESSION['user']]))
            ? $_SESSION[$_SESSION['user']]
            : array();
        
    ?>

    <nav class="navigationBarIndex">
        <ul>
            <li class="dropdown">
                <a id="aPlay" href="../playGame/game.php"><span id="iconNavigationBar">&#9776;</span></a>
                <div class="dropdown-content">
                    <a class="linksToPagesGame" href="../landingPage/index.php"><strong>Menu Principal</strong></a>
                </div>
            </li>
        </ul>
    </nav>

    <header>
        <h1 class="class-header">LA PARAULA OCULTA</h1>
        <h2 class="class-header">Serà capaç <?php echo $_SESSION['user']?> d'endivinar la paraula?</h2>
        <h3 id="puntuation" class="class-header">Puntuació: 100</h3>
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
        
        $randomWord = randomWordCatala();
        $firstRowKeyboard = array("Q","W","E","R","T","Y","U","I","O","P");
        $secondRowKeyboard = array("A","S","D","F","G","H","J","K","L","Ç");
        $thirdRowKeyboard = array("ENVIAR","Z","X","C","V","B","N","M","ESBORRAR");

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
        function randomWordCatala(){
            $fileWords= file("../resources/wordsCatala.txt");
            $fileOpen= fopen("../resources/wordsCatala.txt", "r");
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
            
            return strtoupper(substr($randomWord,0,-2));
        }

        ?>
    </div>
    
        <form id="formDataGames" method="POST">
            <input hidden type="number" id="numYellows" name="numYellows">
            <input hidden type="number" id="numBrowns" name="numBrowns">
            <input hidden type="number" id="numAttempts" name="numAttempts">
            <input hidden type="text" id="winGame" name="winGame">
            <input hidden type="number" id="gamePoints" name="gamePoints">
        </form>
        
    

    <script src="./playPage.js"></script>
    
    <?php
        $loseGames = 0;
        $winGames = 0;
        if(isset($_POST['numYellows']) && isset($_POST['numBrowns']) && isset($_POST['numAttempts']) && isset($_POST['winGame']) && isset($_POST['gamePoints'])){
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
            $_SESSION['pointsUser'] =  $_POST['gamePoints'];
            $_SESSION['loseGames'] = $loseGames;
            $_SESSION['winGames'] = $winGames;
        }

        
        if(isset($_POST['winGame'])){//COMENTAR QUITAR TIMEOUT YA QUE AL ENVIAR FORMULARIO SE RECARGA LA PAGINA
            if($_POST['winGame'] == "false"){
                echo "
                <script> 
                    window.location.replace('../losePage/lose.php');
                </script>";
            }
            else{
                echo "
                <script>
                    window.location.replace('../winPage/win.php');
                </script>";
            }
        }
        
        
    ?>
    <script>
        <?php
            echo "var ocultWord = '$randomWord';";
        ?>
    </script>

    
    

    
</body>
</html>