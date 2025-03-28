<?php

    //Recibimos los datos de la imagen

    $nombre_imagen=$_FILES["imagen"]["name"];//especificamos el nombre del campo del input de la imagen que viene del index

    $tipo_imagen=$_FILES["imagen"]["type"];

    $tamanio_imagen=$_FILES["imagen"]["size"];


    echo $_FILES["imagen"]["size"] . " " . $tipo_imagen . " ";//imprimira en pantalla el tamaño y el tipo de imagen

    //Guardar imagen en servidor
    if($tamanio_imagen<=3000000){// limitamos el tamaño del archivo

        if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif"){ //limitamos el tipo de imagen

            //Ruta de la imagen destino en servidor
            $carpeta_destino=$_SERVER["DOCUMENT_ROOT"] . "/pildorasInfo/Recursos/";
        
            //Movemos la imagen del directorio temporal al directorio escogido
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino . $nombre_imagen);
        }
        else{

            echo "<p>Solo se pueden subir imágenes en formato jpg/jpeg/png/gif";
        }

    }else{

        echo "<p>El tamaño es demasiado grande";
    }

//---------------------- SQL --------------------------------------
    require("Datos_conexion.php");

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


    //Actualiza la tabla para agregar el nombre de la imagen den el campo
    $sql="UPDATE ARTICULOS SET FOTO = '$nombre_imagen' WHERE `NOMBRE ARTÍCULO` = 'DESTORNILLADOR'";

    $resultados=mysqli_query($conexion, $sql);




?>