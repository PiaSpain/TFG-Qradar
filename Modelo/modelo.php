<?php
    class Log{
    //private $Logs; //array que almacena los datos de la consulta
    private $conec; // variable que almacena la conexión a la bbdd
    private $datos; // almacena un objeto con los datos de la consulta

        public function __construct(){
            $servername="localhost";
            $username="root";
            $password="1234";
            $dbname="pro_tfg";
            $this->Logs = array();
            try{
                $this->conec=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
                //Ccomprobamos que la conexión con la creacion de las excepciones, si se producen
                // PDO::setAttribute — Establece un atributo
                // PDO::ATTR_ERRMODE: - Reporte de errores.
                // ERRMODE_EXCEPTION - Además de establecer el código de error, PDO lanzará una PDOException y 
                // establecerá sus propiedades para reflejar el error y la información del mismo.
                $this->conec-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            }catch(PDOException $e){
                echo "<h3>Error fallo en la conexión </h3>".$e->getMessage();
                    die();
            }
        }

        private function set_names() { 
            return $this->conec->query("SET NAMES 'utf8'"); 
        }
        public function ComprueboUsu($tabla,$campo1, $dato1,$campo2,$dato2){
            try {
                //prepara la consulta SQL
                $buscoUsu ="select * from ".$tabla." where ".$campo1."='$dato1'";
                //$hash="";
                
                //ejecutamos una query para comprobar si el dato se encuentra en la bbdd
                
                $sql = $this->conec->query($buscoUsu);
                // captamos los posibles errores
                $this->conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //ejecutamos la consulta sql
                $sql->execute();
                //Contamos el número de flas devueltas en la consulta sql
                $total =$sql->rowCount();
                if($total ==1){
                    /*
                    $hashed_password = crypt($dato2,$salt);
                    if (hash_equals($hashed_password, crypt($dato2, $hashed_password))) {
                        return true;
                    }else{
                        return false;
                    }
                    */
                    /*
                    $datos = $this->conec->query($buscoUsu);
                    while($filas = $datos->FETCHALL(PDO::FETCH_ASSOC)) {
                        #retorna un objeto que lo pasamos a un array
                        $this->datos[]=$filas;
                    }
                    //Recorremos todos los datos obtenido de la consulta y lo almacenamos en un array a través de un bucle while
                    // PDO::FETCH_ASSOC: devuelve un array indexado por los nombres de las columnas del conjunto de resultados.
                    foreach ($datos as $key => $dato)
                    foreach($dato as $result) {
                        $hash=$result['pass'];
                    }
                    if(password_verify($dato2, $hash)){
                        return true;
                    }else{
                        return false;
                    }
                    */
                    return true;
                }else{
                    return false;
                }
              } catch (PDOException  $e) {
                echo "<h3>Failed: </h3>" ."<h3>". $e->getMessage()."</h3>";
              }
        }
        public function NewUsu($tabla,$campo1, $dato1,$campo2,$dato2){
            try{
                //Generamos una contraseña encriptada
                $pass_fuerte = password_hash($dato2,PASSWORD_DEFAULT);
                //prepara la consulta SQL
                $insertNew ="insert into ".$tabla."(".$campo1.",".$campo2.") values ('$dato1','$pass_fuerte')";
                $sql = $this->conec->prepare($insertNew);
                // captamos los posibles errores
                $this->conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //ejecutamos la consulta sql
                $sql->execute();
                //Contamos el número de flas devueltas en la consulta sql
                $total =$sql->rowCount();
                if($total ==1){
                    //Si devuelve una fila el usu se ha add a la bbddd 
                    return true;    
                }else{
                    return false;
                }
            }catch (PDOException  $e) {
                echo "<h3>Failed: </h3>" ."<h3>". $e->getMessage()."</h3>";
            }
        }
        public function ComprueboDato($tabla,$campo, $dato){
            try { 
                //ejecutamos una query para comprobar si el dato se encuentra en la bbdd
                $sentencia ="select * from ".$tabla." where ".$campo."='$dato'";
                $sql = $this->conec->query($sentencia);
                // captamos los posibles errores
                $this->conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //ejecutamos la consulta sql
                $sql->execute();
                //Contamos el número de flas devueltas en la consulta sql
                $total =$sql->rowCount();
                if($total ==1){
                    //Si devuelve una fila el dato se encuentra en la bbddd
                    return true;
                }else{
                    return false;
                }
              } catch (PDOException  $e) {
                echo "<h3>Failed: </h3>" ."<h3>". $e->getMessage()."</h3>";
              }
        }


        public function muestroDatos($condicion,$datoMuestra){
            #$condicion = id
            try {
                // Determina si una variable está vacía
                if(empty($datoMuestra)){
                    //prepara la consulta SQL
                    $sql = "select * from logs"; 
                }elseif($condicion=="x"){
                    $sql = "select * from logs where name like'%".$datoMuestra."%'
                                      or logSourceType like'%".$datoMuestra."%' or extension like'%".$datoMuestra."%' ";
                }else{
                    //prepara la consulta SQL
                    $sql = "select * from logs where ".$condicion."='$datoMuestra'";
                }
                // captamos los posibles errores
                $this->conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Ejecuta una sentencia preparada 
                $datos = $this->conec->query($sql);
                //Recorremos todos los datos obtenido de la consulta y lo almacenamos en un array a través de un bucle while
                // PDO::FETCH_ASSOC: devuelve un array indexado por los nombres de las columnas del conjunto de resultados.

                while($filas = $datos->FETCHALL(PDO::FETCH_ASSOC)) {
                    #retorna un objeto que lo pasamos a un array
                    $this->datos[]=$filas;
                }
                #retornamos ese array    
                if($datos -> rowCount() > 0){
                    //return $results;
                    return $this->datos;
                }else{
                    echo "<h3>No hay registros que mostrar </h3>";
                }

            } catch (PDOException  $e) {
                echo "<h3>Failed: </h3>" ."<h3>". $e->getMessage()."</h3>";
            }
        }

        public function saveLog($id,$name,$logSourceType,$extension,$creationDate,$lastEvent,$enabled){
            try {
                //prepara la consulta SQL
                $sentencia  = $this->conec -> prepare("insert into logs (id,name,logSourceType,extension,creationDate,lastEvent,enabled) 
                values (:id,:name,:logSourceType,,:extension,:creationDate,:lastEvent,:enabled)");
                // captamos los posibles errores
                $this->conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sentencia ->bindParam(':id', $id);
                $sentencia ->bindParam(':name', $name);
                $sentencia ->bindParam(':logSourceType', $logSourceType);
                $sentencia ->bindParam(':extension', $extension);
                $sentencia ->bindParam(':creationDate', $creationDate);
                $sentencia ->bindParam(':lastEvent', $lastEvent);
                $sentencia ->bindParam(':enabled', $enabled);

                //Ejecuta una sentencia preparada 
                $sentencia -> execute();
                // Comprobamos si la sentencia se ha complLastEventdo
                if($sentencia -> rowCount() > 0){
                    return true;
                    //return false;
                }else{
                    //return true;
                    return false;
                }
                
            } catch (PDOException  $e) {
                //$conn->rollBack();
                echo "<h3>Failed: </h3>" ."<h3>". $e->getMessage()."</h3>";
            }
        }

        public function deleteLog($id){
            try{
                // (1) Definir SQL
                $sentencia =  $this->conec ->prepare("delete from logs where id = :id");
                // captamos los posibles errores
                $this->conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // (2) Asignar valores a los parametros
                $sentencia->bindParam(':id', $id);
                // (3) Ejecutar SQL
                $sentencia->execute();
                // Comprobamos si la sentencia se ha complLastEventdo
                if($sentencia -> rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
            } catch (PDOException  $e) {
                //$conn->rollBack();
                echo "<h3>Failed: </h3>" ."<h3>". $e->getMessage()."</h3>";
            }
    
        } 

        public function editLog($name,$logSourceType,$extension,$creationDate,$lastEvent,$enabled,$logAeditar){
            try{
                //prepara la consulta SQL
                $sentencia  =  $this->conec -> prepare("update logs set name=:name,
                logSourceType=:logSourceType,extension=:extension,creationDate=:creationDate,lastEvent=:lastEvent,enabled=:enabled where id = '$logAeditar'");
                 // captamos los posibles errores
                $this->conec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sentencia ->bindParam(':name', $name);
                $sentencia ->bindParam(':logSourceType', $logSourceType);
                $sentencia ->bindParam(':extension', $extension);
                $sentencia ->bindParam(':creationDate', $creationDate);
                $sentencia ->bindParam(':lastEvent', $lastEvent);
                $sentencia ->bindParam(':enabled', $enabled);

                //$sentencia ->bindParam(':nVuelo', $numVue);
                //Ejecuta una sentencia preparada 
                $sentencia -> execute();

                 // Comprobamos si la sentencia se ha complLastEventdo
                 if($sentencia -> rowCount() > 0){
                    return true;
                }else{
                    return false;
                }
                
            }catch (PDOException  $e) {
                //$conn->rollBack();
                echo "<h3>Failed: </h3>" ."<h3>". $e->getMessage()."</h3>";
            }
        } 
    }

?>
