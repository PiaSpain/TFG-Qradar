<?php
    include("../Modelo/sesiones.php");
    require_once("../controlador/controlador.php");

    //Iniciamos sesión para el mensaje de confirmación una vez añadido el vuelo. 
    // - Para almacenar la variable de nvuelo a editar

    //Comprobamos si hemos accedido a este documento php por saveFlight.php
    if(isset($_POST['Guardar'])){
        // Comprobamos que se han rellenado todos los campos del formulario
        if(empty($_POST['id'])|| empty($_POST['name'])||
            empty($_POST['type'])||empty($_POST['creationDate'])||
            empty($_POST['last'])||empty($_POST['enabled'])){
                $_SESSION['message'] = 'Log No añadido -- Tienen que estar todos los campos completados';
                $_SESSION['message_type'] = 'danger';
        }else {
            // esto son los name del formulario
            $_SESSION['id'] = $_POST['id'];
            $_SESSION['name']= $_POST['name'];
            $_SESSION['type']= $_POST['type'];
            $_SESSION['creationDate']= $_POST['creationDate'];
            $_SESSION['last']= $_POST['last'];
            $_SESSION['enabled']= $_POST['enabled'];


            //Creamos la variable que le dará nombre a la tabla para comprobar datos
            $_SESSION['tabla'] = 'logs';
            
            $metodo = 'buscoLog';
            //Compruebo si el id está repetido

            if(method_exists("logController",$metodo)){
                //llamámos al método
                $logExit=logController::{$metodo}();
               
                if($logExit){
                #Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'Log NO añadido -- El número de vuelo no puede estar repetido'.$_SESSION['id'] ;
                $_SESSION['message_type'] = 'danger';

                }else{
                    $metodo = 'add';
                    if(method_exists("logController",$metodo)):
                    $logExit=logController::{$metodo}();

                    //Comprobamos si la inserción en la tabla ha sido satisfactoria
                if($logExit){
                   //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                    $_SESSION['message'] = 'Vuelo NO añadido -- La consulta a la BBDD ha fallado';
                    $_SESSION['message_type'] = 'danger';
                 } else{
                    //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                    $_SESSION['message'] = 'Vuelo Añadido';
                    $_SESSION['message_type'] = 'success';
                 }
                endif;
                }

            }
        }
    }
    if(isset($_POST['editar'])){

        $logAeditar=$_SESSION['id'];
        // Comprobamos que si se han rellenado los campos del formulario, en caso contrario, mantenemos los valores
        // esto son los name del formulario menos el nVuelo que no puede ser modificado por ser clave primario
        
        #Pedimos todos los datos de la tabla
        //Accedemos al controlador
        require_once("../controlador/controlador.php");
        $metodo = 'muestro';
        $vacio = '';
        if(method_exists("logController",$metodo)):
            //llamámos al método
            $results=logController::{$metodo}('id',$logAeditar);


        // $results tiene todas los vuelos guardads, Con el foreach los recorremos para poder pintarlos
        // Con el primer bucle foreach obtenemos el valor de las key del array multidimensional $results
       foreach ($results as $key => $dato)
        // Con este segundo bucle foreach obtenemos el valor de las keys
        foreach($dato as $result) {

        if(empty($_POST['name'])){$name = $result['name'];} else{$name =  $_POST['name'];
        }
        if (empty($_POST['type'])) {$logSourceType =$result['logSourceType'];} else{$logSourceType =$_POST['type'];
        }
        if (empty($_POST['creationDate'])){$creationDate = $result['creationDate'];} else{$creationDate =  $_POST['creatonDate'];
        }
        if (empty($_POST['last'])){$LastEvent =$result['LastEvent'];}else{$LastEvent =$_POST['last'];
        } 
        if (empty($_POST['enabled'])){$Enabled=$result['Enabled'];} else{$Enabled=$_POST['enabled'];
        }


    }endif;

        $metodo = 'edit';
        if(method_exists("logController",$metodo)):
            
        logController::{$metodo}($name,$logSourceType,$creationDate,$LastEvent,$Enabled,$logAeditar);

        endif;
        
    }  
    
    
    //Redicionamos a la página principal 
    header ("Location: app.php");
?>