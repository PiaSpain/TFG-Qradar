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
            #el método ComprueboUsu sale del require_once("./Modelo/modelo.php");
            #el método ComprueboUsu tiene tres parámetros $tabla, $campo y $dato
            $usuExit= $conec ->ComprueboUsu($_SESSION['tabla'],'usu', $_SESSION['usu'],'pass', $_SESSION['pass']);
            //$passTru= $conec ->ComprueboUsu($_SESSION['tabla'],'pass', $_SESSION['pass']);
            //&& $passTru
            if($usuExit ){
            //Datos correctos accedemos a la app
            //mostramos la vista con los datos obtenidos
            header ("Location:../Vista/LogSources.php");    

            } else{
                // Algún dato no es correcto, nos mantenemos en la página del login
                
                echo '<script type="text/javascript">';
                echo ' alert("AlGÚN DATO NO ES CORRECTO")';  //not showing an alert box.
                echo '</script>';
                //echo "<h3>AlGÚN DATO NO ES CORRECTO</h3>";
                header ("Location:../index.html");
            }
        }
        // CREO NUEO USUARIO
        static function nuevoUsu(){
            $conec = new Log(); // esta es la conexión
            $queryregistrar= $conec ->NewUsu($_SESSION['tabla'],'usu', $_SESSION['usu'],'pass', $_SESSION['pass']); 
            
            if($queryregistrar){
                echo '<script type="text/javascript">';
                echo ' alert("Usuario Registrado Correctamente")';  //not showing an alert box.
                echo '</script>';
                //header ("Location:../index.html");    
            }else{
                echo '<script type="text/javascript">';
                echo ' alert("Fallo al insertar nuevo usuario")';  //not showing an alert box.
                echo '</script>';
                //header ("Location:../index.html");
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

        //AÑADIMOS LOG
        static function add(){
            $conec = new Log(); // esta es la conexión
            //Comprobamos que el id sea nuérico y que el nombre y el tipo sea unos determinados. 

            $add= $conec ->saveLog($_SESSION['id'], $_SESSION['name'], $_SESSION['type'],$_SESSION['extension'],$_SESSION['creationDate'],$_SESSION['last'], $_SESSION['enabled']);
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
        //AÑADIMOS LOG
        static function edit($name,$logSourceType,$extension,$creationDate,$lastEvent,$enabled,$logAeditar){
            $conec = new Log(); // esta es la conexión
            $edit= $conec ->editLog($name,$logSourceType,$extension,$creationDate,$lastEvent,$enabled,$logAeditar);
            //Chequeamos que se ha editado correctamente
            if($edit){
                //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'Log-Modificado';
                $_SESSION['message_type'] = 'success';
                header ("Location:./Vista/app.php");  
            }else{
                //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'LOG NO Modificado -- La consulta a la BBDD ha fallado';
                $_SESSION['message_type'] = 'danger';
                header ("Location:./Vista/app.php");  
            }
        }

        //BORRAMOS LOG
        static function delete(){
            $conec = new Log(); // esta es la conexión
    
            $delete= $conec ->deleteLog($_SESSION['id']);
            //Chequeamos que se ha eliminado correctamente
            if($delete){
                //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'Log ->'.$_SESSION['id'].'   Eliminado';
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