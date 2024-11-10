<?php

   $conn = mysqli_connect('127.0.0.1', 'root', 'Kisa3215@', 'sensor');

   // Verificação da conexão
   if (!$conn) {
       die("Conexão falhou: " . mysqli_connect_error());
   }
   
       
    ?>