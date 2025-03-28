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
    
    $busqueda_nart =        $_POST["n_art"];

    try{
        
        $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $base->exec("SET CHARACTER SET utf8");

        $sql="DELETE FROM ARTICULOS WHERE `NOMBRE ARTÍCULO` = :n_art";

        $resultado = $base->prepare($sql);

        //Eliminar valores con marcadores
        
        $resultado->execute(array(":n_art"=>$busqueda_nart));

        echo "Registro eliminado";

        $resultado->closeCursor();

    }catch(Exception $err){

        die("Error de Conexión: " . $err->getMessage());

    }finally{

        $base=null;
    }



    ?>
</body>
</html>