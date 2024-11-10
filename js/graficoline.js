$(document).ready(function () {
    var chart = {
        type: 'line',  // column, line, spline, area, areaspline, 
        animation: Highcharts.svg, // don't animate in IE < IE 10.
        marginRight: 10,

        events: {
            load: function () {
                // set up the updating of the chart each second
                var series = this.series[0];

                setInterval(function () {

                    //
                    // inicio 

                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', '/graficos/novosdados10b.php', true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                var data = JSON.parse(xhr.responseText);

                                var temperature = data.temperature;
                                var timestamp = data.timestamp;
                                // var temperature=data[1];
                                //  var timestamp==data[0];
                                console.log([timestamp, temperature]);
                                //    series.addPoint([timestamp, temperature]);
                                series.addPoint([timestamp, temperature], true, true);
                            }
                        }
                    };
                    xhr.send();



                    //fim



                }, 3000);
            }
        }
    };
    var title = {
        text: 'Live random data'
    };
    var xAxis = {
        type: 'datetime',
        tickPixelInterval: 150
    };
    var yAxis = {
        title: {
            text: 'Temperatura'
        },
        plotLines: [{
            value: 2,
            width: 1,
            color: '#80808f'
        }]
    };

    var tooltip = {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                Highcharts.dateFormat('%H:%M %Y/%m/%d', this.x) + '<br/>' +
                Highcharts.numberFormat(this.y, 2);
        }
    };
    var plotOptions = {
        area: {
            pointStart: 2023,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,

                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    };
    var legend = {
        enabled: false
    };
    var exporting = {
        enabled: false
        ///
    };
    var series = [{
        name: 'Random data',
        data: (function () {
            // generate an array of random data
            var data = [], time = (new Date()).getTime(), i;

            for (i = -19; i <= 0; i += 1) {
                data.push({
                    x: time + i * 1000,
                    y: Math.random() * 40,
                });
            }
            return data;
        }())
    }];

    var json = {};
    json.chart = chart;
    json.title = title;
    json.tooltip = tooltip;
    json.xAxis = xAxis;
    json.yAxis = yAxis;
    json.legend = legend;
    json.exporting = exporting;
    json.series = series;
    json.plotOptions = plotOptions;

    Highcharts.setOptions({
        global: {
            useUTC: false
        }
    });
    $('#container').highcharts(json);
});