

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
<!-- classie js -->
<script type="text/javascript" src="assets/js/classie/classie.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

<!--                      ====================== -->




<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>


<!--      grafico multiplo                ====================== -->
<script src="https://code.highcharts.com/highcharts.js"></script>



<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>


<!--                      ====================== -->

<?php



if(!isset($paginaurl))
{
    echo "<!-- grafico line 2 -->
    <script src=\"js/ultimocetesb.js\"></script>";

    echo "   <script src=\"assets/js/raphael/raphael.min.js\"></script>";
    echo "<script src=\"assets/js/morris.js/morris.js\"></script>";
    echo "<!-- Custom js -->";
    echo "<script src=\"assets/pages/chart/morris/morris-custom-chart.js\"></script>";
}
    

if($paginaurl=="dashboard") 
{
    echo "<!-- grafico line 2 -->
    <script src=\"js/ultimocetesb.js\"></script>";
    include '/var/www/html/dae/js/graficocapa.php';
    include '/var/www/html/dae/js/graficocapa2.php';

}

if($paginaurl=="") 
{
    echo "<!-- grafico line 2 -->
    <script src=\"js/ultimocetesb.js\"></script>";
    include '/var/www/html/dae/js/graficocapa.php';
    include '/var/www/html/dae/js/graficocapa2.php';

}

if($paginaurl=="graficos2") 
{
 echo "<!-- grafico line 2 -->        <script src=\"js/linecarrega.js\"></script>";

 //echo "<!-- grafico line zoom -->     <script src=\"js/graficozoomload.js\"></script>";

 //echo "  <script src=\"/app/js/graficomultiplo.js\"></script>";
 include '/var/www/html/dae/js/graficomultiplo.php';
 include '/var/www/html/dae/js/graficocapa2.php';
include '/var/www/html/dae/js/graficozoomload.php';



}
?>  






