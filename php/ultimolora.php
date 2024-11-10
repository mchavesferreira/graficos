<?php  ////////////////////////// dados das ultimas 24 horas ////////////////////////

$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "Kisa3215@";
$db = "sensor";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

date_default_timezone_set('America/Sao_Paulo');




  //  $tabela="loradbmapper"; 
     
 //   $sqlquery = "select * "; //
  //  $sqlquery=$sqlquery." , date (time) as data_coleta, TIME_FORMAT(time, '%H:%i') as hora_coleta ";
 //   $sqlquery=$sqlquery." from $tabela  ";  //where UR> 0
 //   $sqlquery=$sqlquery." order by time desc LIMIT 1; ";

   $sqlquery = "select * from sensorlora  order by time desc Limit 1;";

/*
while($results = $statement->fetch(PDO::FETCH_ASSOC)) {

    $result[] = $results;
}
*/

if($result = mysqli_query($conn , $sqlquery)){


            while($row = mysqli_fetch_array($result)){
                $data[] = $row;

            }
            
            header('Content-Type: application/json');
            echo json_encode($data);

}

//$dados_identificador = array('Estacao' => $result); //dadosKisa3215@




?>