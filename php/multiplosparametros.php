<?php
// Conexão com o banco de dados


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

 