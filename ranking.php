<!DOCTYPE html>
<html lang="en">
<!-- Andres cambia el lenguaje -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RANKING</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="body_ranking">

    <h1 id="titleRanking">Hall Of Fames</h1>

    <table>
        <tr>
            <td><i class="fa fa-user" aria-hidden="true"></i> Nombre</td>
            <td><i class="fa fa-shopping-basket" aria-hidden="true"></i> Puntos</td>
            <td colspan="6"><i class="fa fa-trophy" aria-hidden="true"></i> Numero de victorias por intentos</td>
            <td><i class="fa fa-times" aria-hidden="true"></i> Derrotas</td>
        </tr>
        <tr>
            <td style="visibility:hidden"></td>
            <td style="visibility:hidden"></td>
            <td>1 <i class="fa fa-check" aria-hidden="true"></i></td>
            <td>2 <i class="fa fa-check" aria-hidden="true"></i></td>
            <td>3 <i class="fa fa-check" aria-hidden="true"></i></td>
            <td>4 <i class="fa fa-check" aria-hidden="true"></i></td>
            <td>5 <i class="fa fa-check" aria-hidden="true"></i></td>
            <td>6 <i class="fa fa-check" aria-hidden="true"></i></td>
            <td style="visibility:hidden"></td>
        </tr>
    </table>
    <br>
    <table>
        <?php
        include './resources/auxFunctions.php';
        $arrayRanking = getHallOfFames();
        foreach($arrayRanking as $array){
            echo "<tr>";
            foreach($array as $arrayPublish){
                echo "<td class='td-hall'>$arrayPublish</td>";
            }
            echo "</tr>";
        }

        ?>
    </table>
    
</body>
</html>