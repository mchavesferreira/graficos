<!DOCTYPE html>
<html lang="pt">
<?php
$paginaurl=$_GET['pg'];
?>
<head>
<meta charset="utf-8" />
  
    <?php
               include '/var/www/html/dae/a_css_estilos.php';
      ?>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>

        <div class="pcoded-container navbar-wrapper">
            <!-- barra superior............................... -->           
      <?php
       include '/var/www/html/dae/a_barra_superior.php';
      ?>
                 <!-- fim barra superior............................... -->
                 <!-- ............................................ -->

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   <!-- menu esquerda............................... -->
                   <!-- ............................................ -->
                   <?php
                     include '/var/www/html/dae/a_menu_esquerda.php';
                   ?>      
                   <!-- fim menu esquerda............................... -->
                   <!-- ............................................ -->

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">

                                             <!-- inicio corpo principal..........page-wrapper..................... -->
                                             <!-- ............................................ -->
                                             <?php
                                          include '/var/www/html/dae/a_corpo_principal.php';
             

                                             ?>  
 
                                               <!-- fim corpo principal.......page-wrapper........................ -->
                                             <!-- ............................................ -->
                                </div>

                            </div>
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include '/var/www/html/dae/a_includes_final.php';
 ?>  
</body>

</html>
