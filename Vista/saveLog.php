<?php
    include("../Modelo/sesiones.php");
    require_once("../controlador/controlador.php");

    //Iniciamos sesión para el mensaje de confirmación una vez añadido el ID. 
    // - Para almacenar la variable de nID a editar

    //Comprobamos si hemos accedido a este documento php por saveFlight.php
    if(isset($_POST['Guardar'])){
        // Comprobamos que se han rellenado los campos sensibles del formulario
        if(empty($_POST['id'])){
                $_SESSION['message'] = 'Log No añadido -- Tienen que estar el ID completado';
                $_SESSION['message_type'] = 'danger';
        }else if( $_POST['name']=='name'){
                $_SESSION['message'] = 'Log No añadido -- Tienen que seleccionar un campo de la lista Name';
                $_SESSION['message_type'] = 'danger';
        }else if($_POST['type']=='Log Source Type'){
                $_SESSION['message'] = 'Log No añadido -- Tienen que seleccionar un campo de la lista Log Source Type';
                $_SESSION['message_type'] = 'danger';
        }else if($_POST['protocol']=='Protocol Type'){
                $_SESSION['message'] = 'Log No añadido -- Tienen que seleccionar un campo de la lista Protocol Type';
                $_SESSION['message_type'] = 'danger';
        }else if($_POST['targeteventcollector']=='targeteventcollector'){
                $_SESSION['message'] = 'Log No añadido -- Tienen que seleccionar un campo de la lista Target Event Collector';
                $_SESSION['message_type'] = 'danger';
              
         //No se chequea extension ni las fechas ni enabled
        }else {
            // esto son los name del formulario
            $_SESSION['id'] = $_POST['id'];
            $_SESSION['name']= $_POST['name'];
            $_SESSION['type']= $_POST['type'];
            $_SESSION['protocol']= $_POST['protocol'];
            $_SESSION['extension']= $_POST['extension'];
            $_SESSION['targeteventcollector']= $_POST['targeteventcollector'];
            $_SESSION['creationDate']= $_POST['creationDate'];
            $_SESSION['last']= $_POST['last'];
            if (empty($_POST['enabled1'])){
		        $_SESSION['enabled'] = '0';
	        }else{
                 $_SESSION['enabled'] = '1';
            }

           # $_SESSION['enabled']= $_POST['enabled'];

            require_once("../controlador/controlador.php");
            //Creamos la variable que le dará nombre a la tabla para comprobar datos
            $_SESSION['tabla'] = 'logs';
            
            $metodo = 'buscoLog';
            //Compruebo si el id está repetido

            if(method_exists("logController",$metodo)){
                //llamámos al método
                $logExit=logController::{$metodo}();
               
                if($logExit){
                #Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                $_SESSION['message'] = 'Log NO añadido -- El número de ID no puede estar repetido'.$_SESSION['id'] ;
                $_SESSION['message_type'] = 'danger';

                }else{
                    $metodo = 'add';
                    if(method_exists("logController",$metodo)):
                    $logExit=logController::{$metodo}();

                    //Comprobamos si la inserción en la tabla ha sido satisfactoria
                if($logExit){
                   //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                    $_SESSION['message'] = 'ID NO añadido -- La consulta a la BBDD ha fallado';
                    $_SESSION['message_type'] = 'danger';
                 } else{
                    //Guardamos un mensaje y el color del mensaje para utilizarlo con bootstrap
                    $_SESSION['message'] = 'ID -> '. $_SESSION['id']. ' Añadido';
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
        // esto son los name del formulario menos el ID que no puede ser modificado por ser clave primario
        
        #Pedimos todos los datos de la tabla
        //Accedemos al controlador
        require_once("../controlador/controlador.php");
        $metodo = 'muestro';
        $vacio = '';
        if(method_exists("logController",$metodo)):
            //llamámos al método
            $results=logController::{$metodo}('id',$logAeditar);


        // $results tiene todas los IDs guardads, Con el foreach los recorremos para poder pintarlos
        // Con el primer bucle foreach obtenemos el valor de las key del array multidimensional $results
       foreach ($results as $key => $dato)
        // Con este segundo bucle foreach obtenemos el valor de las keys
        foreach($dato as $result) {

        $creationDate = $result['creationDate'];

        }endif;

        $logAeditar=$_SESSION['id'];
        $name= $_POST['name'];
        $logSourceType= $_POST['type'];
        $protocolType= $_POST['protocol'];
        $extension= $_POST['extension'];
        $targeteventcollector= $_POST['targeteventcollector'];
        $lastEvent =$_POST['last'];
        $enabled =$_POST['enabled'];
        $metodo = 'edit';
        if(method_exists("logController",$metodo)):
            
        logController::{$metodo}($name,$logSourceType,$protocolType,$extension,$targeteventcollector,$creationDate,$lastEvent,$enabled,$logAeditar);

        endif;
        
    }  
    
    
    //Redicionamos a la página principal 
    header ("Location: app.php");
?>