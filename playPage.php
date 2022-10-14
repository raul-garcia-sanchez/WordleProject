<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Page</title>
    <link rel="stylesheet" href="./playPage.css">
</head>
<body>
    <header>
        <h1>LA PARAULA OCULTA</h1>
        <h3>Serà capaç {nomUsuari} d'endivinar la paraula?</h3>
    </header>

    <?php
    $firstRowKeyboard = array("Q","W","E","R","T","Y","U","I","O","P");
    $secondRowKeyboard = array("A","S","D","F","G","H","J","K","L","Ç");
    $thirdRowKeyboard = array("ENVIAR","Z","X","C","V","B","N","M","ESBORRAR");
    ?>
    <div id="divKeyboard">
        <?php
        echo "<div class='rowKeyboard'>";
        for ($i = 0; $i <count( $firstRowKeyboard); $i++){
            echo "<button class='class-keyboard'>$firstRowKeyboard[$i]</button>\n";
        }
        echo "</div>";
        echo "<div class='rowKeyboard'>";
        for ($j = 0; $j <count( $secondRowKeyboard); $j++){
            echo "<button class='class-keyboard'>$secondRowKeyboard[$j]</button>\n";
        }
        echo "</div>";
        for ($k = 0; $k <count( $thirdRowKeyboard); $k++){
            if($k == 0 || $k == count($thirdRowKeyboard)-1){
                echo "<button class='class-specialKeyboard'>$thirdRowKeyboard[$k]</button>\n";
            }
            else{
                echo "<button class='class-keyboard'>$thirdRowKeyboard[$k]</button>\n";
            }
            
        }
        ?>
    </div>
    

    
    
</body>
</html>