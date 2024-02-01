

// const resetSelect = (sl) => {
//     const allElm = document.querySelectorAll(sl);
//     allElm.forEach((elm) => {
//         elm.parentNode.style.display = "table-row";
//     });
// }

// const handleSelectDm = (sl, value) => {
//     const allElm = document.querySelectorAll(sl);
//     allElm.forEach((elm) => {

//         if (elm.innerText !== value) {
//             elm.parentNode.style.display = "none";
//         }
//     });
// }

// const selectDM = document.querySelector('#dmsp');
// selectDM.addEventListener('change', (e) => {

//     if (e.target.value === "All") {
//         resetSelect(".nameDmtd");
//     } else {
//         resetSelect(".nameDmtd");
//         handleSelectDm(".nameDmtd", e.target.value);
//     }
// });



const resetSelect = (sl, check) => {
    let setDisplay = "none";
    const allElm = document.querySelectorAll(sl);
    if(check) {
        setDisplay = "table-row";
    }
    allElm.forEach((elm) => {
        elm.parentNode.style.display = setDisplay;
    });
}

const handleSelectDm = (sl, rs) => {
    resetSelect(rs, 0);
    const allElm = document.querySelectorAll(sl);
    allElm.forEach((elm) => {
        elm.parentNode.style.display = "table-row";
    });
}

const selectDM = document.querySelector('#dmsp');
selectDM.addEventListener('change', (e) => {

    if (e.target.value === "All") {
        resetSelect(".nameDmtd", "table-row");
    } else {
        handleSelectDm(`.sl${e.target.value}`,".nameDmtd");
    }
});



function sortTable(value, ch) {
    let table = document.getElementById("table");
    let rows = Array.from(table.querySelectorAll(".tr"));

    rows.sort(function (a, b) {
        
        let priceA = parseFloat(a.querySelector(`[textContent="${ch}"]`).textContent);
        let priceB = parseFloat(b.querySelector(`[textContent="${ch}"]`).textContent);

        if(value === "tang") {
            return priceA - priceB;
        } else {
            return priceB - priceA;
        }
        
    });
    
    while (table.querySelector('tr')[1]) {
        table.removeChild(table.querySelector('tr')[1]);
      }

    rows.forEach((elm)=> {
        table.appendChild(elm);
    });
}


const selectSortView = document.querySelector('#sortview');
selectSortView.addEventListener('change', (e) => {
    const tag = e.target;
    if (tag.value === "tang") {
        sortTable("tang", "view");
    } else {
        sortTable('giam','view');
    }
});

const selectSortPrice = document.querySelector('#sortprice');
selectSortPrice.addEventListener('change', (e) => {
    const tag = e.target;
    if (tag.value === "tang") {
        sortTable("tang", "price");
    } else {
        sortTable('giam','price');
    }
});

const btnSearch = document.querySelector("#search-tensp");
const searchInput = document.querySelector("#search-input");
const listNameSp = document.querySelectorAll(".nameSp");



const hiddenDF = (arr, listArr) => {
    listArr = Array.from(listArr);
   
    for(let i = 0; i < arr.length; i++) {
        for(let j = 0; j < listArr.length; j++) {

            if(listArr[j] === arr[i]) {
                listArr[j].parentNode.style.display = "table-row";
               listArr.splice(j,1);
                
            } else {
                listArr[j].parentNode.style.display = "none";
            }
        }
    }
    if(arr.length == 0) {
        listArr.forEach((elm)=> {
            elm.parentNode.style.display = "none";
        });
    }
}

const includesPL = (vl, list) => {

    let lengthChar = vl.length;

    for(let i = 0; i< list.length - vl.length + 1; i++) {
        let temp = list.slice(i,lengthChar);
        if(vl.toLowerCase().trim() === temp.toLowerCase().trim()) {
            return true;
        }
        lengthChar++;
    }
    return false;
}


const checkValueInput = (valueN, listValue)=> {
    
    let arrNew = [];
    for(let i = 0; i < listValue.length; i++) {
      
        let valueOfTag = listValue[i].innerText;
       
        if(includesPL(valueN, valueOfTag)) {
            arrNew.push(listValue[i]);
        }
    }
    hiddenDF(arrNew,listValue);

}

btnSearch.addEventListener('click',()=> {
    checkValueInput(searchInput.value,listNameSp);
});
