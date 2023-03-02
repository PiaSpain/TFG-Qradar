<?php
    include("../Modelo/sesiones.php");
    require_once("../controlador/controlador.php");
?>
<?php

    //Validamos si recibimos el nVuelo
    if(isset($_GET['id'])){
        $_SESSION['id'] = $_GET['id'];
        $metodo = 'delete';
            if(method_exists("logController",$metodo)){
                logController::{$metodo}();
            }
        }
?>