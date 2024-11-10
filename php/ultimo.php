

<?php

$datastart=$_GET['datastart'];
$dataend=$_GET['dataend'];
///$datastart = date("Y-m-d", strtotime($datastart));  
///$dataend = date("Y-m-d", strtotime($dataend));  




if(isset($datastart))
{
 // $datastart = date("Y-m-d", strtotime($datastart));    
  //$dataend = date("Y-m-Y", strtotime($dataend));  
  
  $buscadatainicio = "$datastart 00:00:00";
  $buscadatafinal = "$dataend 23:59:00";
  $query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE time > '$buscadatainicio' AND time < '$buscadatafinal ' Limit 5000;";

} else
{

  $query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE time >= NOW() - INTERVAL 168 HOUR";

}

//echo $datastart;
// Conexão com o banco de dados
$conn = mysqli_connect('127.0.0.1', 'root', 'Kisa3215@', 'sensor');

// Verificação da conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Query para recuperar as últimas 24 horas de dados
//$query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE time >= NOW() - INTERVAL 168 HOUR";
//$query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE (DATE(time) = date_sub(date('2023-02-01 00:00:00'), 1 week))";
//$query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE time > $buscadatainicio AND time < $buscadatafinal Limit 5000";

//SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE (DATE(time) = date_sub(date('2023-02-01 00:00:00'), 1 week))

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

// Fecha a conexão com o banco de dados
mysqli_close($conn);



header('Content-Type: application/json');

 // $temperature = array(
 //   'time' => array( 1675638932000 , 1675641491000,  1675681500000, 1675702619000, 1675713188000, 1675720743000, 1675723482000, 1675723866000),
 //   'data' => array(20, 21, 22, 19, 18, 20, 19, 17)
 // );
  echo json_encode($temperature_data);
?>
