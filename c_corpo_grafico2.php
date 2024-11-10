<?php
$datainicial=$_POST['datainicial'];
//$dmyinicial = date("d-m-Y", strtotime($datainicial));  
//$newdatefim = date("Y-m-d", strtotime($datainicial));  



//$newdatefim = new DateTime($datainicial);
$interval6D = new DateInterval('P6D'); 
//$newdatefim->add($interval7D);
//$dmyfinal = date("d-m-Y", strtotime($datefinal));  

?>
                           
                           <!-- Page-header start -->
                                   <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont icofont icofont-file-document bg-c-pink"></i>
                                                    <div class="d-inline">
                                                        <h4>Graficos</h4>
                                                        <span>Rede de monitoramento de dados...</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        
                                                        <li class="breadcrumb-item">
                                                        <?php
                                                    include '/var/www/html/dae/php/selecionarsemana.php';

                                                        ?>
                                                        
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                               
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Gráfico por período</h5>
                                                        <?php
                                                         $date = new DateTime($datainicial); 
                                                         ?>
                                                        <span>Utilize a barra inferior para aproximar os dados. Período: <?php  echo  $date->format("d-m-Y"); 
                                                                                                                                echo " até ";
                                                                                                                                $date = new DateTime($datafinal); 
                                                                                                                              echo $date->format("d-m-Y"); 
                                                                                                                                 ?></span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option" style="width: 35px;">
                                                                <li class=""><i class="icofont icofont-simple-left"></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <p>
                                                        <figure class="highcharts-figure">
                                                         <div id="container4" style = "width: 100%; height: 400px; margin: 0 auto">

                                                         </div>
                                                         </figure>
 
                                    
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                          
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Exemplo grafico </h5>
                                                        <span>Descubra as vantagens de se utilizar a rede de sensores via radio</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option" style="width: 35px;">
                                                                <li class=""><i class="icofont icofont-simple-left"></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <p>
                                                        <div id="container" style = "width: 100%; height: 400px; margin: 0 auto"></div>

                                                        

                                    
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                          
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Desempenho comunicação </h5>
                                                        <span>Análise da perda de pacotes</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option" style="width: 35px;">
                                                                <li class=""><i class="icofont icofont-simple-left"></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <p>
                                                        <div id = "containersnr" style = "width: 100%; height: 380px; margin: 0 auto">
                                                            </div>
                                                        

                                    
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
     
                  