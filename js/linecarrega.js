function getData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/apisensorloraparametro.php?parametro=RSSI", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var parametro1 = JSON.parse(xhr.responseText);
            var chart = Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Gráfico RSSI'
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150,

                },
                yAxis: {
                    title: {
                        text: 'RSSI (dB)'
                    }
                },
                series: [{
                    name: 'RSSI',
                    data: parametro1
                }]
            });
        }
    };
    xhr.send();
}

window.setInterval(function () {
    getData();
}, 60000);


$('document').ready(function () {
    getData();
});