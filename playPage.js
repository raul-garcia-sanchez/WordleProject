const keys = document.querySelectorAll('.class-keyboard');

let userWordArr = [[]];//Array que vamos añadiendo las letras que vamos pulsando en el teclado
let positionStartWord = 11;//Posicion en la que empezamos a escribir
let ocultWord = "CASAS"; //Palabra a adivinar

let countSends = 0;//Iniciamos contador de veces que le damos a enviar
let wordCorrect = false;//Booleano para comprobar si la palabra es correcta

for (let i = 0; i < keys.length; i++){//Bucle para que cada vez que le demos a la tecla del teclado nos escriba la letra en su espacio correspondiente
    keys[i].onclick = ({ target }) => {
        const letter = target.getAttribute("id");
        if (letter === "ENVIAR"){
            sendWord();
            return;
        }
        //Meter if letter es igual a ESBORRAR y llamas a una funcion q haras de deleteLetter o lo q sea
        
        updateUserWord(letter);
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
    if (wordArr && wordArr.length < 5){
        wordArr.push(letter);
        const spaceLetter = document.getElementById(String(positionStartWord));
        positionStartWord = positionStartWord +1;
        spaceLetter.textContent = letter;
    }
}


function sendWord(){//Funcion de boton enviar, comprobamos todo
    const wordArr = getArrayWord();
    let dictOcultWord = generateDictionary();
    const ocultWordArr = ocultWord.split("");
    if(wordArr.length !== 5){
        window.alert("The word must be 5 letters");
    }

    const userWord = wordArr.join("");

    for (let i = 0; i < wordArr.length ; i++){
        let color = "#98ff96"; //Color Verde
        if (ocultWord.charAt(i) == userWord.charAt(i)){ //Está en la posición correcta

            var lettersRepeats = dictOcultWord.get(userWord.charAt(i));
            if (lettersRepeats > 0){
                dictOcultWord.delete(userWord.charAt(i));
                dictOcultWord.set(userWord.charAt(i),lettersRepeats-1);
            }  
        }
        else{
            color = "#8C661F";
        }
        let letterToCompare = positionStartWord - 5 + i;
        const spaceLetter = document.getElementById(String(letterToCompare));
        spaceLetter.style.backgroundColor = color;
    }

    
    for (let i = 0; i < wordArr.length ; i++){
        let color = "#8C661F"; //Color gris
        let letterToCompare = positionStartWord - 5 + i;
        const spaceLetter = document.getElementById(String(letterToCompare));

        if(ocultWordArr.includes(wordArr[i])){
            if(dictOcultWord.get(userWord.charAt(i)) > 0 && spaceLetter.style.backgroundColor != "rgb(152, 255, 150)"){
                dictOcultWord.delete(userWord.charAt(i));
                dictOcultWord.set(userWord.charAt(i), dictOcultWord.get(userWord.charAt(i))-1);
                color = "#F2E205"; //Color Amarillo
            }
            else{
                continue;
            }        
        }
        
        spaceLetter.style.backgroundColor = color;

    }
    
    if (userWord === ocultWord){
        wordCorrect == true
        window.alert("Congratulations, you win!!")
    }

    if(wordArr.length === 5){
        positionStartWord = positionStartWord + 5;
        userWordArr = [[]];
        countSends = countSends + 1;
    }

    if (countSends === 6 && wordCorrect == false){
        window.alert("Sorry, you lose!!");
    }

}



