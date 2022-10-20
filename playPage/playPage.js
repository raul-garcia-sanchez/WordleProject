const keys = document.querySelectorAll('.class-keyboard');//Array con todos los elementos que contienen la clase class-keyboard

let userWordArr = [[]];//Array que vamos añadiendo las letras que vamos pulsando en el teclado
let positionStartWord = 11;//Posicion en la que empezamos a escribir

let countSends = 0;//Iniciamos contador de veces que le damos a enviar
for (let i = 0; i < keys.length; i++){//Bucle para que cada vez que le demos a la tecla del teclado nos escriba la letra en su espacio correspondiente
    keys[i].onclick = ({ target }) => {//Cada vez que hacemos click a un boton, cogemos valor id del boton y lo escribimos
        const letter = target.getAttribute("id");
        if (letter === "ENVIAR"){
            sendWord();//Llamamos funcion enviar
            return;
        }
        if (letter === "ESBORRAR"){
            deleteLetter();//Llamamos funcion borrar
            return;
        }
        
        updateUserWord(letter);//Escribimos letra en posicion 
    };
}

function generateDictionary(){ //Creamos diccionario con letras y cantidad de veces que se repiten
    let dictOcultWord = new Map();
    var sameLetters = 0;
    for(let i = 0; i < ocultWord.length; i++){
        if(dictOcultWord.has(ocultWord[i])){
            let sameLettersLetter = dictOcultWord.get(ocultWord[i]);
            dictOcultWord.delete(ocultWord[i]);
            dictOcultWord.set(ocultWord[i],sameLettersLetter+1);
        }
        else{
            dictOcultWord.set(ocultWord[i],sameLetters+1);
        }
    }
    return dictOcultWord;
}

function getArrayWord(){//Funcion para obtener el array de letras que vamos escribiendo
    const wordArr = userWordArr.length
    return userWordArr[wordArr-1];
}

function updateUserWord(letter){//Funcion para escribir la letra en su espacio
    const wordArr = getArrayWord();
    if (wordArr && wordArr.length < 5){//Si longitud array es mas pequeño que 5 vamos añadiendo letras al array
        wordArr.push(letter);
        const spaceLetter = document.getElementById(String(positionStartWord));
        positionStartWord = positionStartWord +1;
        spaceLetter.textContent = letter;
    }
}


function sendWord(){//Funcion de boton enviar, comprobamos longitud, si gana, si pierde, letras acertadas...
    const wordArr = getArrayWord();
    let dictOcultWord = generateDictionary();
    const ocultWordArr = ocultWord.split("");

    if(wordArr.length !== 5){//Si la longitud del array es diferente de 5 no hacemos nada
        return;
    }

    const userWord = wordArr.join("");//Pasamos el array a un string

    for (let i = 0; i < wordArr.length ; i++){//Bucle para marcar las palabras que están en su posición correcta
        let color = "#98ff96"; //Color verde
        if (ocultWord.charAt(i) == userWord.charAt(i)){
            var lettersRepeats = dictOcultWord.get(userWord.charAt(i));
            if (lettersRepeats > 0){
                dictOcultWord.delete(userWord.charAt(i));
                dictOcultWord.set(userWord.charAt(i),lettersRepeats-1);
            }  
        }
        else{
            color = "#8C661F";//Color gris
        }
        let letterToCompare = positionStartWord - 5 + i;
        const spaceLetter = document.getElementById(String(letterToCompare));
        spaceLetter.style.backgroundColor = color;
    }

    
    for (let i = 0; i < wordArr.length ; i++){//Bucle para marcar las letras que estan en la palabra pero no en la posicion correcta
        let color = "#8C661F"; //Color gris
        let letterToCompare = positionStartWord - 5 + i;
        const spaceLetter = document.getElementById(String(letterToCompare));

        if(ocultWordArr.includes(wordArr[i])){
            var lettersRepeats = dictOcultWord.get(userWord.charAt(i));
            if(lettersRepeats > 0 && spaceLetter.style.backgroundColor != "rgb(152, 255, 150)"){
                
                dictOcultWord.delete(userWord.charAt(i));
                dictOcultWord.set(userWord.charAt(i),lettersRepeats-1);

                color = "#F2E205"; //Color amarillo
            }
            else{
                continue;
            }        
        }
        
        spaceLetter.style.backgroundColor = color;

    }
    
    if (userWord === ocultWord){//Comprobamos si la palabra oculta es igual a la que el usuario inserta
        setTimeout(() => {
            window.location.replace("../winPage/winPage.php");
        }, 2000);
    }

    if(wordArr.length === 5){//Cuando el array es de 5 posiciones, reseteamos array y añadimos 1 al contador de enviado
        positionStartWord = positionStartWord + 5;
        userWordArr = [[]];
        countSends = countSends + 1;
    }

    if (countSends == 6 && userWord !== ocultWord){//Comprobamos que ha enviado la palabra 6 veces y la palabra no es correcta
        setTimeout(() => {
            window.location.replace("../losePage/losePage.php");
        }, 2000);
    }

}



function deleteLetter(){//Funcion para borrar letras de una misma fila
    const wordArr = getArrayWord();
    wordArr.pop()
    if(positionStartWord>61){
        positionStartWord = positionStartWord-1;
        const spaceLetter= document.getElementById(String(positionStartWord));
        spaceLetter.textContent = null;
    }


    else if(positionStartWord>51 && positionStartWord<=56){
        positionStartWord = positionStartWord-1;
        const spaceLetter= document.getElementById(String(positionStartWord));
        spaceLetter.textContent = null;
    }

    else if(positionStartWord>41 && positionStartWord<=46){
        positionStartWord = positionStartWord-1;
        const spaceLetter= document.getElementById(String(positionStartWord));
        spaceLetter.textContent = null;
    }

    else if(positionStartWord>31 && positionStartWord<=36){
        positionStartWord = positionStartWord-1;
        const spaceLetter= document.getElementById(String(positionStartWord));
        spaceLetter.textContent = null;
    }

    else if(positionStartWord>21 && positionStartWord<=26){
        positionStartWord = positionStartWord-1;
        const spaceLetter= document.getElementById(String(positionStartWord));
        spaceLetter.textContent = null;

    }
    else if(positionStartWord>11 && positionStartWord<=16){
        positionStartWord = positionStartWord-1;
        const spaceLetter= document.getElementById(String(positionStartWord));
        spaceLetter.textContent = null;
    }

    else{
        return;
    }
}