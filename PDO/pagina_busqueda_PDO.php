<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //$busqueda = $_GET["buscar"];
    //Metodo GET
    /*
    $busqueda_sec = $_GET["seccion"];
    $busqueda_porig=$_GET["p_orig"];*/

    //Metodo POST
    $busqueda_sec = $_POST["seccion"];
    $busqueda_porig=$_POST["p_orig"];


    try{
        
        $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $base->exec("SET CHARACTER SET utf8");

        //$sql="SELECT `SECCIÓN`, `NOMBRE ARTÍCULO`, FECHA, `PAÍS DE ORIGEN`, PRECIO FROM ARTICULOS WHERE `NOMBRE ARTÍCULO` = ?";
        $sql="SELECT `SECCIÓN`, `NOMBRE ARTÍCULO`, FECHA, `PAÍS DE ORIGEN`, PRECIO FROM ARTICULOS WHERE `SECCIÓN` = :SECC AND `PAÍS DE ORIGEN` = :PORIG "; //marcador

        $resultado = $base->prepare($sql);

        //$resultado->execute(array("Taladro")); //busqueda directa
        //$resultado->execute(array("$busqueda")); //busqueda de acuerdo al contenido de la variable
        $resultado->execute(array(":SECC"=>$busqueda_sec, ":PORIG"=>$busqueda_porig));//realiza la busqueda de acuerdo al marcador

        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

            echo "Nombre Artículo: " . $registro['NOMBRE ARTÍCULO'] . " Sección: " . $registro['SECCIÓN'] . " Precio: " . $registro['PRECIO'] . 
                " País de Origen: " . $registro['PAÍS DE ORIGEN'] . "<br>";    

        }

        $resultado->closeCursor();

    }catch(Exception $err){

        die("Error de Conexión: " . $err->getMessage());

    }finally{

        $base=null;
    }



    ?>
</body>
</html>