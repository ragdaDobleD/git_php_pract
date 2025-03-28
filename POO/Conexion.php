<?php
    require("config.php");

    class Conexion{

        protected $conexion_db;

        public function __construct(){ //contructor

            //---------------------- PDO ------------------------------------------------------------------------------------

            try{
                $this->conexion_db=new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');

                $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->conexion_db->exec("SET CHARACTER SET utf8");

                return; //$this->conexion_db;

            }catch(Exception $e){
                echo "la línea de error es: " . $e->getLine();
            }

            //---------------------- MYSQLI ---------------------------------------------------------------------------------
            /*
            $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);

            if($this->conexion_db->connect_errno){
                echo "Fallo al conectar a MySQL: " . $this->conexion_db->connect_error;
                return;
            }

            $this->conexion_db->set_charset(DB_CAHRSET);//utf8*/
        }
    }

?>