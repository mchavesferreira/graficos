
<?php


header('Content-Type: application/json');


 $temperature = array(
   'time' => array( 1675638932000 , 1675641491000,  1675681500000, 1675702619000, 1675713188000, 1675720743000, 1675723482000, 1675723866000),
  'data' => array(20, 21, 22, 19, 18, 20, 19, 17)
 );
  echo json_encode($temperature);
?>
