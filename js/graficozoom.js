Highcharts.stockChart('container4', {
    chart: {
        events: {

        }
    },

    accessibility: {
        enabled: false
    },

    time: {
        useUTC: false
    },

    rangeSelector: {
        buttons: [{
            count: 1,
            type: 'minute',
            text: '1 dia'
        }, {
            count: '5',
            type: 'minute',
            text: '1 mes'
        }, {
            type: 'all',
            text: 'Total'
        }],
        inputEnabled: false,
        selected: 0
    },

    title: {
        text: 'Temperatura'
    },

    exporting: {
        enabled: false
    },

    series: [{
        name: 'Temperatura',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;

            for (i = -1999; i <= 0; i += 1) {
                data.push([
                    time + i * 1000,
                    Math.round(Math.random() * 100)
                ]);
            }
            return data;
        }())
    }]
});