<?php

    require_once("Modelo/Productos_modelo.php");

    $producto=new Productos_modelo();

    $matriz_producto=$producto->get_productos();//llamamos al constructor y ejecutamos su funcion get_productos

    require_once("Vista/Productos_view.php");


?>