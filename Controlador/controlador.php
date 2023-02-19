<?php
    include("../Modelo/sesiones.php");
    require_once("../Modelo/modelo.php");

    class logController{
        private $gestion;
        function __construct(){
            #creamos cual va a ser nuestra conexión
            # new Log() sale de require_once("./Modelo/modelo.php");
            $this->gestion=new Log();
        }


    


    }

?>