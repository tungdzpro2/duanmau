const prices = document.querySelectorAll(".price");

prices.forEach((elm)=> {
    let price = elm.innerText;
    var formattedNumber = new Intl.NumberFormat('en-US').format(price);
    elm.innerText = formattedNumber;
});