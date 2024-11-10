




<?php
// Conexão com o banco de dados
$conn = mysqli_connect('127.0.0.1', 'root', 'Kisa3215@', 'sensor');

// Verificação da conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Query para recuperar as últimas 24 horas de dados
$query = "SELECT DATE(time) - INTERVAL (WEEKDAY(time)) DAY AS inicio, WEEK(time, 1) AS numerosemana, YEAR(time) AS ano
FROM sensorlora
GROUP BY inicio, numerosemana, ano
ORDER BY ano, numerosemana desc;
";
//$query = "SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE (DATE(time) = date_sub(date('2023-02-01 00:00:00'), 1 week))";

//SELECT UNIX_TIMESTAMP(time) as time, value as value, RSSI_DL, SNR_DL FROM sensorlora WHERE (DATE(time) = date_sub(date('2023-02-01 00:00:00'), 1 week))

$result = mysqli_query($conn, $query);

//$buscadatainicio = "$datainicial 00:00:00";
//$buscadatafinal = "$datafinal 23:59:00";
?>


  <form action="/dae/index.php?pg=graficos2" id="myForm"  method="POST">
 

  
    <INPUT TYPE="hidden" NAME="semanaweek" VALUE="busca"> 

<?php


echo "Escolha período: ";
echo "<select name=\"datainicial\" id=\"color\">";

// Loop para preencher os arrays com os dados do banco de dados
while ($row = mysqli_fetch_assoc($result)) {

  $rowinicioydm =$row["inicio"];
  $array_inicioydm[]= $rowinicioydm;
   // echo "$inicio";
 
  $rowDatedmy = date("d-m-Y", strtotime($rowinicioydm));  
  //  echo " - ".$newDate;  
  
  $date = new DateTime($rowinicioydm);
   $interval = new DateInterval('P6D'); 
   $date->add($interval);

  echo "<option value=\"$rowinicioydm\">".$rowDatedmy." até ";
  echo  $date->format("d-m-Y");
  echo "</option>";
  
}
echo "</select>";

// Fecha a conexão com o banco de dados
mysqli_close($conn);



if(isset($datainicial))
{
 
  $datastart=$datainicial;
  $dmyinicial = date("Y-m-d", strtotime($datainicial));  
  $date2 = new DateTime($datainicial);
  $interval2 = new DateInterval('P6D'); 
  $date2->add($interval2);
  $dataend= $date2;
  $datafinal= $date2->format("Y-m-d");
}
else
{

  $datainicial= $array_inicioydm[0];
  $datastart=$datainicial;
  $date2 = new DateTime($datainicial);
  $interval2 = new DateInterval('P6D'); 
  $date2->add($interval2);
  $dataend= $date2;
  $datafinal= $date2->format("Y-m-d");
}


?>
<button type="submit" value="click" id="enviar">Enviar</button>
</form>

