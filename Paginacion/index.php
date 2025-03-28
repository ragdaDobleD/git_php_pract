<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    try{

        $base=new PDO("mysql:host=localhost; dbname=pruebas", "root", "");

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $base->exec("SET CHARACTER SET utf8");

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
        $sql_total="SELECT `SECCIÓN`, `NOMBRE ARTÍCULO`, FECHA, `PAÍS DE ORIGEN`, PRECIO FROM ARTICULOS WHERE `SECCIÓN` = 'DEPORTES'";

        $resultado=$base->prepare($sql_total);

        $resultado->execute(array());

        $num_filas=$resultado->rowCount(); //Cuantas fila nos devuelve la consulta SQL

        $total_paginas=ceil($num_filas/$tamanio_paginas);//ceil nos redondea el resultado

        echo "Número de registros de la consulta: " . $num_filas . "<br>";

        echo "Mostramos: " . $tamanio_paginas . " registros por página <br>";

        echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<br>";

        
        $resultado->closeCursor();
        
        //Con LIMIT podemos realizar la instrucción de los datos que queremos mostrar (donde inicias, hasta donde quieres ver) funciona como index de arreglo
        $sql_limite="SELECT `SECCIÓN`, `NOMBRE ARTÍCULO`, FECHA, `PAÍS DE ORIGEN`, PRECIO FROM ARTICULOS WHERE `SECCIÓN` = 'DEPORTES' LIMIT $empezar_desde,$tamanio_paginas";
        
        $resultado=$base->prepare($sql_limite);
        
        $resultado->execute(array());
        
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
            
            echo "Nombre Artículo: " . $registro["NOMBRE ARTÍCULO"] . " Sección: " . $registro["SECCIÓN"] . " Precio: " . $registro["PRECIO"] . " País: " . $registro["PAÍS DE ORIGEN"] . "<br>";
        }
        

    }catch(Exception $e){

        echo "Línea de error: " . $e->getLine();
    }

    //------------------------------------- PAGINACIÓN ----------------------------------------------------

    for($i=1; $i<=$total_paginas; $i++){

        echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
        //echo "<a href=\"?pagina=$i\"> $i</a>  ";
    }

    ?>
</body>
</html>