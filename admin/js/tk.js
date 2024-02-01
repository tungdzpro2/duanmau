var ctx = document.getElementById('chartDm').getContext('2d');
var ctx2 = document.getElementById('chartDm2').getContext('2d');

// Function to generate random colors
function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        if (i % 2 === 0) {
            color += letters[Math.floor(Math.random() * 4) + 8]; // Use shades of red, orange, and yellow
        } else {
            color += letters[Math.floor(Math.random() * 6)]; // Use shades of blue and green
        }
    }
    return color;
}

var labels = Array.from(document.querySelectorAll('.labelDm')).map((elm) => {
    return `${elm.innerText}`;
});

var dataDm = Array.from(document.querySelectorAll('.dataDm')).map((elm) => {
    return `${elm.innerText}`;
});

var backgroundColor = labels.map(() => getRandomColor());

var data = {
    labels: labels,
    datasets: [{
        label: 'Số lượng sản phẩm theo danh mục',
        data: dataDm,
        backgroundColor: backgroundColor,
        borderColor: backgroundColor.map(color => color.replace('0.7', '1')),
        borderWidth: 1
    }]
};

var data2 = {
    labels: labels,
    datasets: [{
        label: 'Số lượng sản phẩm theo danh mục (Biểu đồ cột)',
        data: dataDm,
        backgroundColor: backgroundColor,
        borderColor: backgroundColor.map(color => color.replace('0.7', '1')),
        borderWidth: 1
    }]
};

let myChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

let myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: data2,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
