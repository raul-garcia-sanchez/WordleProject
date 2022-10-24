<?php session_start();
$arrayTranslate= $_SESSION["translate"];
$translateWords= $_SESSION["translateWords"];
echo $translateWords;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $arrayTranslate["headGame"]?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        $nameUser = (isset($_POST["inputName"]))
            ? $_POST["inputName"]
            : "Unwknown Player";
    ?>

    <header>
        <h1 class="class-header"><?php echo $arrayTranslate["headerh1"]?></h1>
        <h3 class="class-header"><?php echo $arrayTranslate["headerh3"]?></h3>
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
        $randomWord = randomWordCatala($translateWords);
        $_SESSION['ocultWord'] = $randomWord;
        $firstRowKeyboard = array("Q","W","E","R","T","Y","U","I","O","P");
        $secondRowKeyboard = array("A","S","D","F","G","H","J","K","L","Ç");
        $thirdRowKeyboard = array("ENVIAR","Z","X","C","V","B","N","M","ESBORRAR");
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
            if(str_contains($word,"á")){
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
        function randomWordCatala($lenguage){
            $fileWords= file("../resources/words".$lenguage.".txt");
            $fileOpen= fopen("../resources/words".$lenguage.".txt", "r");
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
    
    <script>
        <?php
            echo "var ocultWord = '$randomWord';";
        ?>
    </script>
    <script src="./playPage.js"></script>
</body>
</html>