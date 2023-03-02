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

        // BUSCO Log
        static function buscoLog(){
            $conec = new Log(); // esta es la conexión
            #Extraemos datos
            #el método ComprueboDato sale del require_once("./Modelo/modelo.php");
            #el método ComprueboDato tiene tres parámetros $tabla, $campo y $dato
            $logBusca= $conec ->ComprueboDato($_SESSION['tabla'],'id', $_SESSION['id']);
            if($logBusca){
                //Datos correctos accedemos a la app
            //mostramos la vista con los datos obtenidos
            // header ("Location:./Vista/saveLog.php");    
            
            return true;
            } else{

            return false;
            }

        }

        // MUESTRO DATOS
        static function muestro($condicion,$datoMuestra){
            $conec = new Log(); // esta es la conexión
            //Extraemos datos
            #el método muestroDatos sale del require_once("./Modelo/modelo.php");
            #el método muestroDatos tiene dos parámetros $condicion y $datoMuestra
            $mostramos=$conec ->muestroDatos($condicion,$datoMuestra);
            return $mostramos;
        }

        //AÑADIMOS VUELO
        static function add(){
            $conec = new Log(); // esta es la conexión

            $add= $conec ->saveLog($_SESSION['id'], $_SESSION['name'], $_SESSION['type'], $_SESSION['creationDate'],$_SESSION['last'], $_SESSION['enabled']);
            //Chequeamos que se ha añadido correctamente
            if($add){
                 //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                 $_SESSION['message'] = 'Log-añadido';
                 $_SESSION['message_type'] = 'success';
                header ("Location:./Vista/app.php");   
            }else{
                //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'Log NO añadido -- La consulta a la BBDD ha fallado';
                $_SESSION['message_type'] = 'danger';
                header ("Location:./Vista/app.php");  
            }
        }
        //AÑADIMOS VUELO
        static function edit($name,$logSourceType,$creationDate,$LastEvent,$Enabled,$logAeditar){
            $conec = new Log(); // esta es la conexión
            $edit= $conec ->editLog($name,$logSourceType,$creationDate,$LastEvent,$Enabled,$logAeditar);
            //Chequeamos que se ha editado correctamente
            if($edit){
                //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'Log-Modificado';
                $_SESSION['message_type'] = 'success';
                header ("Location:./Vista/app.php");  
            }else{
                //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'Vuelo NO Modificado -- La consulta a la BBDD ha fallado';
                $_SESSION['message_type'] = 'danger';
                header ("Location:./Vista/app.php");  
            }
        }

        //BORRAMO LOG
        static function delete(){
            $conec = new Log(); // esta es la conexión
    
            $delete= $conec ->deleteLog($_SESSION['id']);
            //Chequeamos que se ha eliminado correctamente
            if($delete){
                //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'Log-Eliminado';
                $_SESSION['message_type'] = 'danger';
                #header ("Location:app.php");  
                header ("Location:app.php"); 
            }else{
                //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
               $_SESSION['message'] = 'Log NO Eliminado -- La consulta a la BBDD ha fallado';
               $_SESSION['message_type'] = 'danger';
               header ("Location:app.php"); 
            }
        }
        
    


    }

?>