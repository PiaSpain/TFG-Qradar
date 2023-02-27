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
        // COMPRUEBO DATOS
        static function existe(){
            $conec = new Log(); // esta es la conexión
            #Extraemos datos
            #el método ComprueboDato sale del require_once("./Modelo/modelo.php");
            #el método ComprueboDato tiene tres parámetros $tabla, $campo y $dato
            $usuExit= $conec ->ComprueboUsu($_SESSION['tabla'],'dni', $_SESSION['dni'],'pass', $_SESSION['pass']);
            //$passTru= $conec ->ComprueboDato($_SESSION['tabla'],'pass', $_SESSION['pass']);
            //&& $passTru
            if($usuExit ){
            //Datos correctos accedemos a la app
            //mostramos la vista con los datos obtenidos
            header ("Location:../Vista/app.php");    

            } else{
                // Algún dato no es correcto, nos mantenemos en la página del login
                
                echo '<script type="text/javascript">';
                echo ' alert("AlGÚN DATO NO ES CORRECTO")';  //not showing an alert box.
                echo '</script>';
                //echo "<h3>AlGÚN DATO NO ES CORRECTO</h3>";
                header ("Location:../index.html");
            }
        }


    


    }

?>