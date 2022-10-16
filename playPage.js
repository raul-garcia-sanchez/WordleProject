const keys = document.querySelectorAll('.class-keyboard');
let userWordArr = [[]];
let positionStartWord = 11;
let ocultWord = "FEINA";
let countSends = 0;
let wordCorrect = false;
for (let i = 0; i < keys.length; i++){
    keys[i].onclick = ({ target }) => {
        const letter = target.getAttribute("id");
        if (letter === "ENVIAR"){
            sendWord();
            return;
        }

        else if(letter=== "ESBORRAR"){
            deleteLetter();
            return
        }
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
    if(wordArr.length !== 5){
        window.alert("The word must be 5 letters");
    }

    const userWord = wordArr.join("");

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
        window.alert("Sorry, you lose!!")
    }

}

function deleteLetter(){
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