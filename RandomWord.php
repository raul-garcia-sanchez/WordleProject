<?php
    function randomWordCatala(){
        $fileWords= file("./wordsCatala.txt");
        $fileOpen= fopen("./wordsCatala.txt", "r");
        $arrayWords= [];
        foreach ($fileWords as $lineWord => $word){
            array_push($arrayWords, $word);
        };
        $arrayLen= count($arrayWords);
        $randomNumber= rand(0,$arrayLen);
        $randomWord= $arrayWords[$randomNumber];
        fclose($fileOpen);
        return $randomWord;
    }
?>