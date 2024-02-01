const clickAll = document.querySelector('#clickAll');
const cancelAll = document.querySelector('#cancelAll');
const clickBox = document.querySelectorAll(".clickSp");

clickAll.addEventListener("click", () => {
    Array.from(clickBox).forEach((elm) => {
        if (!elm.checked && elm.parentNode.parentNode.style.display != "none") {
            elm.click();
        }
    });
});
cancelAll.addEventListener("click", () => {
    Array.from(clickBox).forEach((elm) => {
        if (elm.checked && elm.parentNode.parentNode.style.display !== "none") {
            elm.click();
        }
    });
});

const getIdSp = () => {

    const resultArr = [];

    document.querySelectorAll(".clickSp").forEach((elm) => {
        if (elm.checked) {
            resultArr.push(elm.parentNode.parentNode.getAttribute("idSp"));
        }
    });
    return resultArr;
}

const btnEdit = document.querySelector('#edit');
const btnDlt = document.querySelector('#delete');

// Khởi tạo một yêu cầu POST đến tệp PHP của bạn

const sendPHP = (KeyName, value, fetchfrom) => {
    // Tạo một đối tượng JSON có tên thuộc tính là giá trị của KeyName
    const data = {};
    data[KeyName] = value;

    fetch(fetchfrom, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // Đảm bảo gửi dữ liệu dưới dạng JSON
        },
        body: JSON.stringify(data), // Gửi đối tượng JSON chứa giá trị
    })
        .then(response => {

            if (response.ok) {
                // return response.json(); // Xử lý phản hồi JSON từ PHP (nếu có)
                // Tải lại trang
                window.location.reload();
            } else {
                throw new Error('Network response was not ok.');
            }
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}


btnDlt.addEventListener("click", () => {
    document.querySelector('#modal-background').style.display = "flex";
});

document.querySelector('#modal-cancel').addEventListener('click',()=> {
    document.querySelector('#modal-background').style.display = "none";
});



document.querySelector('#modal-confirm').addEventListener('click',()=> {
    sendPHP('idSpArr', getIdSp(), './model/deletesp.php');
});
btnEdit.addEventListener("click", () => {
    window.location.href = "index.php?action=editsppage&ids=" + getIdSp().join(',');
});

