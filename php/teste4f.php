<?php
// Conexão com o banco de dados
$conn = mysqli_connect('127.0.0.1', 'root', 'Kisa3215@', 'sensor');

// Verificação da conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Query para recuperar as últimas 24 horas de dados
$query = "SELECT UNIX_TIMESTAMP(time) as time, RSSI_DL, SNR_DL FROM sensorlora WHERE time >= NOW() - INTERVAL 24 HOUR limit 30";
$result = mysqli_query($conn, $query);

// Array para armazenar os dados de temperatura e umidade
$temperature_data = array();
$humidity_data = array();
$temperaturaarray = array();
// Loop para preencher os arrays com os dados do banco de dados
while ($row = mysqli_fetch_assoc($result)) {
    $timestamp = ($row['time']) * 1000;
    $temperature = (float)$row['RSSI_DL'];
    $humidity = (float)$row['SNR_DL'];
    $temperature_data[] = [$timestamp, $temperature];
    $humidity_data[] = [$timestamp, $humidity];
   // echo "$humidity_data[]";
}

$temperaturaarray =  json_encode($temperature_data);
// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>

<html>
   <head>
      <title>Highcharts Tutorial</title>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <script src = "https://code.highcharts.com/highcharts.js"></script> 

<!-- optional -->

   </head>
   
   <body>
      <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto"></div>
     
   </body>
   
</html>


<script language = "JavaScript">
         $(document).ready(function() {
            var chart = {
               type: 'line',  // column, line, spline, area, areaspline, 
               animation: Highcharts.svg, // don't animate in IE < IE 10.
               marginRight: 10,
               
               events: {
            
               }
            };
            var title = {
               text: 'temperatura'   
            };   
            var xAxis = {
               type: 'datetime',
               tickPixelInterval: 100,
                labels: {
              formatter: function() {
                return Highcharts.dateFormat('%H:%M:%S', this.value);
              }
            }
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
               name: 'temperatura',
               data: <?php echo $temperaturaarray; ?>,    
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
      </script>






