
<?php



if(isset($paginaurl))
{
 if($paginaurl=="principal")
{
 include '/var/www/html/app/a_corpo_home.php';
 }

 if($paginaurl=="graficos1") 
{
 echo "<!--  app/c_corpo_grafico1.php  **********************************    -->";
 include '/var/www/html/dae/c_corpo_grafico1.php';
 }

 if($paginaurl=="graficos2") 
 {
 echo "<!--  app/c_corpo_grafico1.php  **********************************    -->";
include '/var/www/html/dae/c_corpo_grafico2.php';
 }

if($paginaurl=="dashboard") 
{
  include '/var/www/html/dae/c_conteudo_capa.php';
 }
              
 if($paginaurl=="redeiot") 
{
  include '/var/www/html/dae/a_corpo_home.php';
 }
    

                                            if($paginaurl=="horariospicos") 
                                                 {
                                                
                                                   include '/var/www/html/dae/graficozoom.php';
                                                 }
} 
else
{
                                           // include '/var/www/html/app/a_corpo_home.php';
                                            include '/var/www/html/dae/c_conteudo_capa.php';
}


  ?>                                       