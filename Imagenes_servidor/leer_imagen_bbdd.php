<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

    require("datos_conexion.php");

    try{

        $conexion=mysqli_connect($db_host, $db_usuario, $db_pass);
    }       
    catch(Exception $err){

        echo "**** ERROR EN LA CONEXIÓN CON BBDD ***** " . $err;

        exit(); //Sale de la ejecucion
    }                                                                          

    try{

        mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BBDD");
    }
    catch(Exception $err){
        echo "***NO SE ENCUENTRA LA BASE DE DATOS *** " . $err;
    }

    $consulta="SELECT FOTO FROM ARTICULOS WHERE `NOMBRE ARTÍCULO` = 'DESTORNILLADOR' AND `PAÍS DE ORIGEN` = 'ESPAÑA'";

    $resultado = mysqli_query($conexion, $consulta);

    while($fila=mysqli_fetch_array($resultado)){
        
        $ruta_img=$fila["FOTO"];
        //echo "ruta img: " . $ruta_img;
    }

?>

<div>
    <img src="/Recursos/<?php echo $ruta_img; ?>" alt="Imagen del primer artículo" width="25%"/>

</div>
</body>
</html>