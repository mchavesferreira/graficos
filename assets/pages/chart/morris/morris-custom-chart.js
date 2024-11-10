"use strict";
$(document).ready(function() {

    lineChart();
    areaChart();
    donutChart();

    $(window).on('resize',function() {
        window.lineChart.redraw();
        window.areaChart.redraw();
        window.donutChart.redraw();
    });
});

/*Line chart*/
function lineChart() {
    window.lineChart = Morris.Line({
        element: 'line-example',
        data: [
            { y: '2023-01-01 02:00:00', a: 100, b: 90 },
            { y: '2023-01-01 03:00:00', a: 75, b: 65 },
            { y: '2023-01-01 05:00:00', a: 50, b: 40 },
            { y: '2023-01-01 08:00:00', a: 75, b: 65 },
            { y: '2023-01-01 09:00:00x', a: 50, b: 40 },
            { y: '2023-01-01 10:00:00b', a: 75, b: 65 },
            { y: '2023-01-01 12:00:00', a: 100, b: 90 }
        ],
        xkey: 'y',
        redraw: true,
        ykeys: ['a', 'b'],
        hideHover: 'auto',
        labels: ['Series A', 'Series B'],
        lineColors: ['#B4C1D7', '#FF9F55']
    });
}

/*Area chart*/
function areaChart() {
    window.areaChart = Morris.Area({
        element: 'area-example',
        data: [
            { y: '2023-01-01 02:00:00', a: 100, b: 90 },
            { y: '2023-01-01 03:00:00', a: 75, b: 65 },
            { y: '2023-01-01 04:00:00', a: 50, b: 40 },
            { y: '2023-01-01 06:00:00', a: 75, b: 65 },
            { y: '2023-01-01 08:00:00', a: 50, b: 40 },
            { y: '2023-01-01 09:00:00', a: 75, b: 65 },
            { y: '2023-01-01 11:00:00', a: 100, b: 90 }
        ],
        xkey: 'y',
        resize: true,
        redraw: true,
        ykeys: ['a', 'b'],
        labels: ['Medidor A', 'Medidor B'],
        lineColors: ['#93EBDD', '#64DDBB']
    });
}

/*Donut chart*/
function donutChart() {
    window.areaChart = Morris.Donut({
        element: 'donut-example',
        redraw: true,
        data: [
            { label: "Manutenção", value: 2 },
            { label: "Em Operação", value: 90 },
            { label: "Ocioso", value: 20 }
        ],
        colors: ['#5FBEAA', '#34495E', '#FF9F55']
    });
}

// Morris bar chart
Morris.Bar({
    element: 'morris-bar-chart',
    data: [{
        y: 'seg',
        a: 100,
        b: 90,
        c: 60
    }, {
        y: 'Ter',
        a: 75,
        b: 65,
        c: 40
    }, {
        y: 'Qua',
        a: 50,
        b: 40,
        c: 30
    }, {
        y: 'Qui',
        a: 75,
        b: 65,
        c: 40
    }, {
        y: 'Sex',
        a: 50,
        b: 40,
        c: 30
    }, {
        y: 'Sab',
        a: 75,
        b: 65,
        c: 40
    }, {
        y: 'Dom',
        a: 100,
        b: 90,
        c: 40
    }],
    xkey: 'y',
    ykeys: ['a', 'b', 'c'],
    labels: ['A', 'B', 'C'],
    barColors: ['#5FBEAA', '#5D9CEC', '#cCcCcC'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
});
// Extra chart
Morris.Area({
    element: 'morris-extra-area',
    data: [{
            period: '2023-01-01',
            bombaA: 0,
            bombaB: 0,
            bombaC: 0
        }, {
            period: '2023-01-02',
            bombaA: 50,
            bombaB: 15,
            bombaC: 5
        }, {
            period: '2023-01-03',
            bombaA: 20,
            bombaB: 50,
            bombaC: 65
        }, {
            period: '2023-01-04',
            bombaA: 60,
            bombaB: 12,
            bombaC: 7
        }, {
            period: '2023-01-05',
            bombaA: 30,
            bombaB: 20,
            bombaC: 120
        }, {period: '2023-01-06',
            bombaA: 25,
            bombaB: 80,
            bombaC: 40
        }, {
            period: '2023-01-07',
            bombaA: 10,
            bombaB: 10,
            bombaC: 10
        }


    ],
    lineColors: ['#fb9678', '#7E81CB', '#01C0C8'],
    xkey: 'period',
    ykeys: ['bombaA', 'bombaB', 'bombaC'],
    labels: ['Bomba A', 'Bomba B', 'Bomba C'],
    pointSize: 0,
    lineWidth: 0,
    resize: true,
    fillOpacity: 0.8,
    behaveLikeLine: true,
    gridLineColor: '#5FBEAA',
    hideHover: 'auto'

});

/*Site visit Chart*/

Morris.Area({
    element: 'morris-site-visit',
    data: [{
        period: '2023-01-01 02:00:00',
        SiteA: 0,
        SiteB: 0,

    }, {
        period: '2023-01-01 04:00:00',
        SiteA: 130,
        SiteB: 100,

    }, {
        period: '2023-01-01 06:00:00',
        SiteA: 80,
        SiteB: 60,

    }, {
        period: '2023-01-01 08:00:00',
        SiteA: 70,
        SiteB: 200,

    }, {
        period: '2023-01-01 10:00:00',
        SiteA: 180,
        SiteB: 150,

    }, {
        period: '2023-01-01 11:00:00',
        SiteA: 105,
        SiteB: 90,

    }, {
        period: '2023-01-01 12:00:00',
        SiteA: 250,
        SiteB: 150,

    }],
    xkey: 'period',
    ykeys: ['SiteA', 'SiteB'],
    labels: ['Local A', 'Local B'],
    pointSize: 0,
    fillOpacity: 0.4,
    pointStrokeColors: ['#b4becb', '#01c0c8'],
    behaveLikeLine: true,
    gridLineColor: '#e0e0e0',
    lineWidth: 0,
    smooth: false,
    hideHover: 'auto',
    lineColors: ['#b4becb', '#01c0c8'],
    resize: true

});
