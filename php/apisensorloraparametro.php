<?php

$datainicial=$_GET['datainicial'];
$datafinal=$_GET['datafinal'];
$intervalo=$_GET['intervalo'];
$parametro=$_GET['parametro'];


$buscadatainicio = "$datainicial 00:00:00";
$buscadatafinal = "$datafinal 23:59:00";

// Conexão com o banco de dados
include '/var/www/html/app/php/conector.php';

// Query para recuperar as últimas 24 horas de dados

if ($parametro=='RSSI') {
    $query = "select RSSI_DL as parametro1, UNIX_TIMESTAMP(time) as time from sensorlora WHERE time > date_sub(now(),interval 1 day) ;"; // 
    }

if ($parametro=='value') {
      $query = "select value as parametro1, UNIX_TIMESTAMP(time) as time from sensorlora WHERE time > date_sub(now(),interval 6 hour) ;"; // 
      }
  
if ($parametro=='snr') {
        $query = "select SNR_DL as parametro1, UNIX_TIMESTAMP(time) as time from sensorlora WHERE time > date_sub(now(),interval 1 day) ;"; // 
        }

 if ($parametro=='perda') {
          $query = "select perdapacotes as parametro1, UNIX_TIMESTAMP(time) as time from sensorlora WHERE time > date_sub(now(),interval 1 day) ;"; // 
 }
$result = mysqli_query($conn, $query);

// Array para armazenar os dados de temperatura e umidade

$parametro1_data = array();
$parametro1array = array();
// Loop para preencher os arrays com os dados do banco de dados
while ($row = mysqli_fetch_assoc($result)) {
    $timestamp = ($row['time']) * 1000;
  //  $temperatura[] = [$row["time"] * 1000, $row["RSSI_DL"]];
  $parametro1 =(int)$row["parametro1"];
  $parametro1_data[] = [$timestamp, $parametro1];

}

// Fecha a conexão com o banco de dados
mysqli_close($conn);

header('Content-Type: application/json');


 // $temperature = array(
 //   'time' => array( 1675638932000 , 1675641491000,  1675681500000, 1675702619000, 1675713188000, 1675720743000, 1675723482000, 1675723866000),
 //   'data' => array(20, 21, 22, 19, 18, 20, 19, 17)
 // );
  echo json_encode($parametro1_data);
?>
