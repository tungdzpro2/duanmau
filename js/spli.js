const mota = document.querySelector('.mota');

listBR = [
    {
        nameObj: '#',
        br: 2,
        indent: 0,
    }
]

const addChar = (str, char, lengchar) => {
    let valueNeed = '';
    for (let i = 0; i < lengchar; i++) {
        valueNeed += char;
    }
    return str + valueNeed;
}

const checkCharObj = (char, listObj) => {
    for (let i = 0; i < listObj.length; i++) {
        if (listObj[i].nameObj === char) {
            return listObj[i];
        }
    }
    return false;
}
const handleText = (txt, listBR) => {
    let newStr = '', start = 0;
    for (let i = 0; i < txt.length; i++) {
        let resultCheck = checkCharObj(txt[i], listBR);

        if (resultCheck) {
            newStr += txt.slice(start, i);
            let indent = resultCheck.indent;
            let br = resultCheck.br;
            newStr = addChar(newStr, "<br>", br);
            newStr = addChar(newStr, " ", indent);
            start = i + 1;
        }
    }
    newStr += txt.slice(start); //Thêm phần còn lại của chuỗi
    return newStr;
}

if(mota) {
    const getText = mota.innerText;
    mota.innerHTML = handleText(getText, listBR);
}





let textMain = document.querySelectorAll(".text-main-body");


// Lấy nội dung văn bản
let maxWords = 5;

textMain.forEach((elm)=> {
    text = elm.textContent;
    if (text.split(" ").length > maxWords) {
        
        var words = text.split(" ");
        var truncatedText = words.slice(0, maxWords).join(" ");
        elm.textContent = truncatedText + " ...";
      } 
});

