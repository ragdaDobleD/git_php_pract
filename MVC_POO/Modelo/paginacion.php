<?php

require_once("Conectar.php");

$base=Conectar::conexion();

//------------------------ PAGINACIÓN ----------------------------------------
$tamanio_paginas=3; //tamaño total de paginas

//Si el usuario ha entrado por primera vez entonces no entra en este if caso contrario se dirige a la pagina presionada
if(isset($_GET["pagina"])){

    if($_GET["pagina"]==1){

        header("Location:index.php");

    }else{

        $pagina=$_GET["pagina"];
    }
}else{
    $pagina=1; //numero de pagina
}

$empezar_desde=($pagina-1) * $tamanio_paginas; //recorrido dinamico de inicio de pagina

//Esta primer consulta es para saber cuantos registros tenemos y calcular cuantos registros mostraremos por pagina
$sql_total="SELECT * FROM DATOS_USUARIOS";

$resultado=$base->prepare($sql_total);

$resultado->execute(array());

$num_filas=$resultado->rowCount(); //Cuantas fila nos devuelve la consulta SQL

$total_paginas=ceil($num_filas/$tamanio_paginas);//ceil nos redondea el resultado

//-------------------- FIN PAGINACIÓN -------------------------------------------

?>