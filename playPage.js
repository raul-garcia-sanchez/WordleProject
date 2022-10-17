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
