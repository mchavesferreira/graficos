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

   $sqlquery = "select * from sensorlora  order by time asc ;";

/*   //Limit 40
while($results = $statement->fetch(PDO::FETCH_ASSOC)) {

    $result[] = $results;
}
*/

echo ' <table id="customers">
      <tr> 
      <th>conta</th> 
      <th>time</th> 
      <th>counter</th> 
  
      <th>perda</th> 
      
      </tr>';

      $conta=0;

if($result = mysqli_query($conn , $sqlquery)){


       
        while ($row = $result->fetch_assoc()) {
            $conta++;
            $calculoperda=0;
            $row_value1[$conta] = $row["time"];
            $row_value2[$conta]  = $row["counter"]; 
       /*
            echo '<tr> 
            <th>' . $conta . '</th> 
            <th>' .  $row_value1[$conta] . '</th> 
            <th>' .  $row_value2[$conta]. '</th> ';
            */
        if($conta==1) {   $calculoperda=0;          }
        else{

            $calculoperda= $row_value2[$conta] -  $row_value2[$conta-1] -1;
            if($calculoperda<0)$calculoperda=0;    
        }
        $sqlqueryalter =" update sensorlora set perdapacotes = '$calculoperda' where time ='$row_value1[$conta]';";
       $resultalter = mysqli_query($conn ,  $sqlqueryalter);

       //   echo '  <th>'.$calculoperda .'> ' .  $sqlqueryalter . '</th> 
            
       //     </tr>';


        }
echo '</table>';
      
            
     //       header('Content-Type: application/json');
      //      echo json_encode($data);

}

//$dados_identificador = array('Estacao' => $result); //dadosKisa3215@




?>