


<script>
 function getData2() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/apisensorloraparametro.php?parametro=perda&<?php echo $dmyinicial; ?>", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var parametro1 = JSON.parse(xhr.responseText);
            var chart = Highcharts.chart('containersnr', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Perda de Pacotes'
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150,

                },
                time: {
                    useUTC: false
                },
                yAxis: {
                    title: {
                        text: 'perdas'
                    }
                },
                series: [{
                    name: 'perdas',
                    data: parametro1
                }]
            });
        }
    };
    xhr.send();
}

window.setInterval(function () {
    getData2();
}, 60000);


$('document').ready(function () {
    getData2();
});

    </script>