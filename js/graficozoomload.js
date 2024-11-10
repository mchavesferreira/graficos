
function buscadados() {

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/ultimo.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var nivel = JSON.parse(xhr.responseText);
            Highcharts.stockChart('container4', {
                chart: {
                    events: {

                    }
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150,
                },
                yAxis: {
                    title: {
                        text: 'Nível'
                    },
                    max: 7,
                    min: 0
                },
                accessibility: {
                    enabled: false
                },

                time: {
                    useUTC: false
                },

                rangeSelector: {
                    buttons: [{
                        count: 600,
                        type: 'minute',
                        text: 'zoom'
                    }, {
                        type: 'all',
                        text: '7D'
                    }],
                    inputEnabled: false,
                    selected: 0
                },

                title: {
                    text: 'Nível Caixa Central'
                },
                subtitle: {
                    text: 'Período 7 dias. Escolha barra local para selecionar',
                    align: 'left'
                },
                plotOptions: {
                    area: {
                        pointStart: 2023,
                        marker: {
                            enabled: true,
                            symbol: 'circle',
                            radius: 2,

                            states: {
                                hover: {
                                    enabled: true
                                }
                            }
                        }
                    }
                },

                exporting: {
                    enabled: false
                },

                series: [{
                    name: 'Nível',
                    data: nivel
                }]
            });
        }
    };
    xhr.send();
}

window.setInterval(function () {
    buscadados();
}, 60000);


$('document').ready(function () {
    buscadados();
});
