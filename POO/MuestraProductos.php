<?php
    require ("DevuelveProductos.php");

    $pais=$_GET["buscar"];

    $productos = new DevuelveProductos();

    $arrayProductos = $productos->getProductos($pais);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*foreach($arrayProductos as $elemento){

            var_dump($elemento); //var_dump muestra los datos de manera interesante
        }*/

        foreach($arrayProductos as $elemento){

            echo "<table><tr><td>";
            echo $elemento['SECCIÓN'] . "</td><td>";
            echo $elemento['NOMBRE ARTÍCULO'] . "</td><td>";
            echo $elemento['FECHA'] . "</td><td>";
            echo $elemento['PAÍS DE ORIGEN'] . "</td><td>";
            echo $elemento['PRECIO'] . "</td><td></tr></table>";
            echo "<br>";
        }

    ?>
</body>
</html>