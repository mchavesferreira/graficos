
<?php

include '/var/www/html/app/php/conector.php';



// Query para recuperar as últimas 24 horas de dados
$query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE time >= NOW() - INTERVAL 24 HOUR";



$result = mysqli_query($conn, $query);

// Array para armazenar os dados de temperatura e umidade
//$temperatura = array();
$umidade = array();
$temperaturaarray = array();
$humidadearray = array();
// Loop para preencher os arrays com os dados do banco de dados
while ($row = mysqli_fetch_assoc($result)) {
    $timestamp = ($row['time']) * 1000;
  //  $temperatura[] = [$row["time"] * 1000, $row["RSSI_DL"]];
  //$temperatura[] =($row["RSSI_DL"]) *(-1);
  $temperature =(int)$row["value"];
  $humidity = (float)$row['SNR_DL'] *(-1);
  $temperature_data[] = [$timestamp, $temperature];
  $humidity_data[] = [$timestamp, $humidity];
 //   $temperature_data[] = [$timestamp, $temperature];
//    $humidity_data[] = [$timestamp, $humidity];
   // echo "$humidity_data[]";
}
//$temperaturaarray =  json_encode($temperature_data);
$humidadearray =  json_encode($humidity_data);
$temperaturaarray =  json_encode($temperature_data);
// Fecha a conexão com o banco de dados
mysqli_close($conn);


?>


<script>
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
    xAxis : {
               type: 'datetime',
               tickPixelInterval: 100,
                labels: {
              formatter: function() {
                return Highcharts.dateFormat('%H:%M', this.value);
              }
            }
            },
            time: {
                    useUTC: false
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
        data: <?php echo $temperaturaarray; ?>, 
        tooltip: {
            valueSuffix: ' C'
        }

    }, {
        name: 'nivel',
        type: 'line',
        yAxis: 1,
        data: <?php echo $humidadearray; ?>, 
        marker: {
            enabled: false
        },
        dashStyle: 'line',
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
                    floating: true,
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
                    showLastLabel: true
                }, {
                    labels: {
                        align: 'left',
                        x: 0,
                        y: -6
                    },
                    showLastLabel: true
                }]
            }
        }]
    }
});


    </script>