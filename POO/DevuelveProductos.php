<?php
    require("Conexion.php");

    class DevuelveProductos extends Conexion{

        public function __construct(){ //constructor

            parent::__construct();//este es el constructor del archivo conexión.php
        }

        public function getProductos($dato){

            //--------------------- PDO -----------------------------------------------------------------------------

            $sql="SELECT * FROM ARTICULOS WHERE `PAÍS DE ORIGEN`='" . $dato . "'";

            $sentencia=$this->conexion_db->prepare($sql);

            $sentencia->execute(array());

            $resultado=$sentencia->fetchAll(PDO::FETCH_ASSOC);

            $sentencia->closeCursor();

            $this->conexion_db=null;
            
            return $resultado;


            //--------------------- MYSQLI ---------------------------------------------------------------------------
            /*
            $resultado = $this->conexion_db->query('SELECT * FROM ARTICULOS WHERE `PAÍS DE ORIGEN`="' . $dato . '"');

            $productos = $resultado->fetch_all(MYSQLI_ASSOC);
            return $productos;*/
        }
            
    }


?>