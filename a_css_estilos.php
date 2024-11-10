<title>RpIoT - Plataforma IoT de tecnologias para internet das coisas e suas aplicações</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content="flat ui, admin  Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->    
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">


    <style type="text/css">
.highcharts-figure,
.highcharts-data-table table {
min-width: 360px;
max-width: 800px;
margin: 1em auto;
}

#container2 {
height: 400px;
}

#container4 {
height: 400px;
min-width: 310px;
}



#containermultiplo {
height: 400px;
min-width: 310px;
}

#containernivel{
height: 400px;
min-width: 310px;
}

.highcharts-data-table table {
font-family: Verdana, sans-serif;
border-collapse: collapse;
border: 1px solid #ebebeb;
margin: 10px auto;
text-align: center;
width: 100%;
max-width: 500px;
}

.highcharts-data-table caption {
padding: 1em 0;
font-size: 1.2em;
color: #555;
}

.highcharts-data-table th {
font-weight: 600;
padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
background: #f8f8f8;
}

.highcharts-data-table tr:hover {
background: #f1f7ff;
}
</style> 

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>




 

      <?php
if(isset($paginaurl))
{
   if($paginaurl=="principal")
   {
 //   include '/var/www/html/app/a_corpo_home.php';
    }
     if($paginaurl=="graficos1") 
     {
      echo "<!--  graficos/graficolineestilo  **********************************    -->";
  //   include '/var/www/html/app/graficos/graficolineestilo.php';
     }
                                        
       if($paginaurl=="horariospicos") 
        {
                                                
   //      include '/var/www/html/app/graficozoom.php';
         }

         if($paginaurl=="graficos2") 
     {
      echo "<!--  graficos/graficolineestilo  **********************************    -->";
     }


} 
else
{
//include '/var/www/html/app/a_corpo_home.php';
}
