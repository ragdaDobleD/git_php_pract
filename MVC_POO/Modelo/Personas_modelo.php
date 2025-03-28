<?php

    class Personas_modelo{

        private $db;

        private $personas;

        public function __construct(){

            require_once("Modelo/Conectar.php");

            $this->db=Conectar::conexion();//llamamos la funcion static conexion

            $this->personas=array();

        }

        public function get_personas(){

            require("paginacion.php");//se trae paginacion.php para que pueda reconocer las variables $empezar_desde y $tamanio_paginas
            
            $consulta=$this->db->query("SELECT * FROM DATOS_USUARIOS LIMIT $empezar_desde, $tamanio_paginas");

            while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){

                $this->personas[]=$filas;
            }
            
            return $this->personas;
        }
    }


?>