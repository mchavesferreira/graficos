
Highcharts.chart('containermultiplo', {
    chart: {

    },
    title: {
        text: 'Medias de temperatura',
        align: 'left'
    },
    subtitle: {
        text: '',
        align: 'left'
    },
    xAxis: {
        type: 'datetime',
        tickPixelInterval: 100,
        labels: {
            formatter: function () {
                return Highcharts.dateFormat('%H:%M', this.value);
            }
        }
    },

    yAxis: [{ // Primary yAxis
        visible: false,
        opposite: true

    }, { // Secondary yAxis
        gridLineWidth: 0,
        title: {
            text: 'temperatura',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        },
        labels: {
            format: '{value} C',
            style: {
                color: Highcharts.getOptions().colors[0]
            }
        }

    }, { // Tertiary yAxis
        gridLineWidth: 0,
        title: {
            text: 'nivel',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        labels: {
            format: '{value} m',
            style: {
                color: Highcharts.getOptions().colors[1]
            }
        },
        opposite: true
    }],
    tooltip: {

    },
    legend: {
        layout: 'vertical',
        align: 'left',
        x: 80,
        verticalAlign: 'top',
        y: 15,
        floating: true,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
    },
    series: [{
        name: 'temperatura',
        type: 'line',
        yAxis: 0,
        data: <? php echo $temperaturaarray; ?>,
        tooltip: {
        valueSuffix: ' C'
    }

    }, {
    name: 'nivel',
    type: 'spline',
    yAxis: 1,
    data: <? php echo $humidadearray; ?>,
    marker: {
    enabled: true
},
    dashStyle: 'shortdot',
    tooltip: {
    valueSuffix: ' m'
}

    }],
    responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                floating: false,
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
                x: 0,
                y: 0
            },
            yAxis: [{
                labels: {
                    align: 'right',
                    x: 0,
                    y: -6
                },
                showLastLabel: false
            }, {
                labels: {
                    align: 'left',
                    x: 0,
                    y: -6
                },
                showLastLabel: false
            }]
        }
    }]
}
});


