<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    function randomWordCatala(){
        $fileWords= file("./wordsCatala.txt");
        $fileOpen= fopen("./wordsCatala.txt", "r");
        $arrayWords= [];
        foreach ($fileWords as $lineWord => $word){
            array_push($arrayWords, $word);
        }
        $arrayLen= count($arrayWords);
        $randomNumber= rand(0,$arrayLen-1);
        $randomWord= $arrayWords[$randomNumber];
        $randomWord= filterAccents($randomWord);
        fclose($fileOpen);
        return strtoupper(substr($randomWord,0,-2));
    }
    $randomWord = randomWordCatala();
    echo "<p id='secretWord'>".$randomWord."</p>";

    function filterAccents($word){
        if(str_contains($word,"à")){
            return str_replace("à","a",$word);
        }
        elseif(str_contains($word,"è")){
            return str_replace("è","e",$word);
        }
        elseif(str_contains($word,"é")){
            return str_replace("é","e",$word);
        }
        elseif(str_contains($word,"í")){
            return str_replace("í","i",$word);
        }
        elseif(str_contains($word,"ò")){
            return str_replace("ò","o",$word);
        }
        elseif(str_contains($word,"ó")){
            return str_replace("ó","o",$word);
        }
        elseif(str_contains($word,"ú")){
            return str_replace("ú","u",$word);
        }
        else{
            return $word;
        }
    }
?>
</body>
</html>