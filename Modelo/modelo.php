<?php
    class Log{
    //private $Logs; //array que almacena los datos de la consulta
    private $conec; // variable que almacena la conexión a la bbdd
    private $datos; // almacena un objeto con los datos de la consulta

        public function __construct(){
            $servername="localhost";
            $username="root";
            $password="1234";
            $dbname="pro_TFG";
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
    
    }

?>
