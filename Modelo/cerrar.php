<?php
//Comprobamos que hemos accedido a este documento a través del enlace en el header.php incluido en los archivos de la app
 if(isset($_GET['cerramos'])){
    session_unset(); // Desmontamos la sesión desempaquetamos, liberamos 
    session_destroy(); // cerramos la sesión
    header ("Location: ../index.html");
 }
?>