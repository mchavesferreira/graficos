


<script>
 function getData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/apisensorloraparametro.php?parametro=value", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var parametro1 = JSON.parse(xhr.responseText);
            var chart = Highcharts.chart('containernivel', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Gráfico últimas 6 horas'
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150,

                },
                yAxis: {
                    title: {
                        text: 'nível (m)'
                    }
                },
                time: {
                    useUTC: false
                },
                series: [{
                    name: 'nível',
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

    </script>