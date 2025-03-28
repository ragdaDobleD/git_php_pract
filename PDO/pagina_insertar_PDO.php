<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //Metodo POST
    $busqueda_seccion =     $_POST["seccion"];
    $busqueda_nart =        $_POST["n_art"];
    $busqueda_precio =      $_POST["precio"];
    $busqueda_fecha =       $_POST["fecha"];
    $busqueda_porig =       $_POST["p_orig"];


    try{
        
        $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $base->exec("SET CHARACTER SET utf8");

        //colocar los campos en el orden de la tabla para evitar errores de inserción
        $sql="INSERT INTO ARTICULOS (`SECCIÓN`, `NOMBRE ARTÍCULO`, FECHA, `PAÍS DE ORIGEN`, PRECIO) VALUES (:seccion, :n_art, :fecha, :p_orig, :precio)";//marcadores

        $resultado = $base->prepare($sql);

        //Inserta valores con marcadores
        $resultado->execute(array(":seccion"=>$busqueda_seccion, ":n_art"=>$busqueda_nart, ":fecha"=>$busqueda_fecha, ":p_orig"=>$busqueda_porig, ":precio"=>$busqueda_precio));

        echo "Registro insertado";

        $resultado->closeCursor();

    }catch(Exception $err){

        die("Error de Conexión: " . $err->getMessage());

    }finally{

        $base=null;
    }



    ?>
</body>
</html>