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
        <h1 class="class-header">LA PARAULA OCULTA</h1>
        <h3 class="class-header">Serà capaç {nomUsuari} d'endivinar la paraula?</h3>
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
    </div>

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
        echo "<div class='rowKeyboard'>";
        for ($k = 0; $k <count( $thirdRowKeyboard); $k++){
            echo "<button class='class-keyboard'>$thirdRowKeyboard[$k]</button>\n";
        }
        echo "</div>";
        ?>
    </div>
    

    
    
</body>
</html>