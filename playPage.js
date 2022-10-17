const keys = document.querySelectorAll('.class-keyboard');

let userWordArr = [[]];
let positionStartWord = 11;
let ocultWord = "FEINA";
const dictOcultWord = new Map();
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
console.log(dictOcultWord);
let countSends = 0;
let wordCorrect = false;

for (let i = 0; i < keys.length; i++){
    keys[i].onclick = ({ target }) => {
        const letter = target.getAttribute("id");
        if (letter === "ENVIAR"){
            sendWord();
            return;
        }
        //meter if letter es igual a ESBORRAR y llamas a una funcion q haras de deleteLetter o lo q sea
        
        updateUserWord(letter);
    };
}

function getArrayWord(){
    const wordArr = userWordArr.length
    return userWordArr[wordArr-1];
}

function updateUserWord(letter){
    const wordArr = getArrayWord();
    if (wordArr && wordArr.length < 5){
        wordArr.push(letter);
        const spaceLetter = document.getElementById(String(positionStartWord));
        positionStartWord = positionStartWord +1;
        spaceLetter.textContent = letter;
    }
}



function sendWord(){
    const wordArr = getArrayWord();
    const ocultWordArr = ocultWord.split("");
    const spaceLetter = document.getElementById(String(positionStartWord));
    if(wordArr.length !== 5){
        window.alert("The word must be 5 letters");
    }

    const userWord = wordArr.join("");

    
    for (let i = 0; i < wordArr.length; i++){
        let color = "#8C661F";
        if (ocultWord.charAt(i) == userWord.charAt(i)){
            if(dictOcultWord.has(userWord.charAt(i))){
                var lettersRepeats = dictOcultWord.get(userWord.charAt(i));
                console.log(lettersRepeats);
                if (lettersRepeats > 0){
                    dictOcultWord.delete(userWord.charAt(i));
                    dictOcultWord.set(userWord.charAt(i),lettersRepeats-=1);
                }
                console.log(lettersRepeats);
            }
            color = "#98ff96";
            console.log(dictOcultWord);
        }
        else if(ocultWordArr.includes(wordArr[i])){
            if(dictOcultWord.has(userWord.charAt(i))){
                var lettersRepeats = dictOcultWord.get(userWord.charAt(i));
                console.log(userWord.charAt(i));
                console.log(dictOcultWord);
                console.log(lettersRepeats);
                if (lettersRepeats > 0){
                    dictOcultWord.delete(userWord.charAt(i));
                    dictOcultWord.set(userWord.charAt(i),lettersRepeats-=1);
                    color = "#F2E205";
                }
            }
            
        }
        
        let letterToCompare = positionStartWord - 5 + i;
        const spaceLetter = document.getElementById(String(letterToCompare));
        spaceLetter.style.backgroundColor = color;

    }
    console.log(dictOcultWord);
    
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



