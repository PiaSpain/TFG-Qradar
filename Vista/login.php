<?php
            
            require_once("../Modelo/sesiones.php");
            require_once("../controlador/controlador.php");
            if($_POST){ // Detecta su hay un envío

            $_SESSION['usu'] =$_POST['usu'];
            $_SESSION['pass'] =$_POST['pass'];
            //Creamos la variable que le dará nombre a la tabla para comprobar datos
            $_SESSION['tabla'] = 'usuarios';

            if(isset($_POST['btnlogin'])){
            $metodo = 'existe';
            //Accedemos al controlador
            if(method_exists("logController",$metodo)):
                //llamámos al método
                logController::{$metodo}();
            endif;
            
            }
            if(isset($_POST['btnNew'])){
            $metodo = 'nuevoUsu';
            //Accedemos al controlador
            if(method_exists("logController",$metodo)):
                //llamámos al método
                logController::{$metodo}();
                
            endif;
                header ("Location:../index.html");    
            }
            
            }
           // header ("Location:../index.html");
?>