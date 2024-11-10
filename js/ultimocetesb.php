<?php

//$datastart=$_GET['datastart'];
//$dataend=$_GET['dataend'];

?>
<script>

$('document').ready(function () {
  getDataCETESB();
});

setInterval(function () {
  // chama funcao em intervalos
  getDataCETESB();
}, 10000); //2000mSeconds update rate

function getDataCETESB() {



  $.getJSON("http://rpiot.com.br/app/php/valoressimulados.php", function (data2) {
    var items = [];
    //  console.log(data2.temperatura);
    $(".temperaturacetesb").html(data2.temperatura);
    $(".umidadecetesb").html(data2.umidade);
    $(".horacetesb").html(data2.timestamp);
  });


  // $(".datacetesb").html( data2.Estacao[0].data_coleta );
  $.getJSON("http://rpiot.com.br/dae/php/ultimolora.php", function (data3) {



    let numero = data3[0].value;
    let urlimagem = "<img src=/images/tank/" + numero + ".png>";
    let urlimagem2 = "<img src=/images/tank2/reservatoriocentral" + numero + ".png>";

    //console.log(urlimagem);
    //console.log(data3[0].device);


    $(".txtfiguratank2").html(urlimagem2);
    $(".txtfiguranivelcentral").html(urlimagem);
    $(".txtnivelcentral").html(numero);
    //$(".txtnivelcentral").html(data3[0].value);


   
    
    
    $temptxthoralora=data3[0].time;
     $date = new DateTime($temptxthoralora);
   // $textohoralora= $date->format("d-m-Y");
    $temptxthoralora=$textohoralora;
   echo  $temptxthoralora;
    $(".txthoralora").html($textohoralor);
    $(".txtRSSI_DL").html(data3[0].RSSI_DL);
    $(".txtSNR_DL").html(data3[0].SNR_DL);


  });

}

</script>


