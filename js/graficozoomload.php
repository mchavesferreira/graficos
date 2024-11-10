<?php

//$datastart=$_GET['datastart'];
//$dataend=$_GET['dataend'];

if(isset($dataincial))
{
 // $datastart = date("Y-m-d", strtotime($datastart));    
  //$dataend = date("Y-m-Y", strtotime($dataend));  
  
  //$buscadatainicio = "$datastart 00:00:00";
  $buscadatainicio = "$dataincial 00:00:00";
  $buscadatafinal = "$datafinal 23:59:00";

  $datafinal = new DateTime($datastart); 

  echo  $dateinicial->format("d-m-Y"); 

  /*
  $query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE time > '$buscadatainicio' AND time < '$buscadatafinal' Limit 5000;";
  $dmyinicial = date("d-m-Y", strtotime($datastart));  
  $dmyfinal = date("d-m-Y", strtotime($dataend));  
*/
} else
{

  $query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE time >= NOW() - INTERVAL 168 HOUR";

}

echo "...........................................................................................................";
echo $buscadatainicio;

?>


<script>
function buscadados() {

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "php/ultimo.php?datastart=<?php echo $dmyinicial;  ?>&dataend=<?php echo $datafinal; ?>&analise=<?php echo $dmyinicial;  ?>", true);
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
                    text: 'Período <?php echo  $datastart; ?> até <? echo $datafinal; ?>. Escolha barra local para selecionar',
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


</script>