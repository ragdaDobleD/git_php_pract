<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1,h2{text-align:center;}

        table{
            width: 25%;
            background-color: #FFC;
            border: 2px dotted #F00;
            margin:auto;
        }

        .izq{text-align: right;}

        .der{text-align: left;}

        td{
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>

<?php

        $autenticado=false;

        if (isset($_POST["enviar"])){ //sucede despues de presionar el botón enviar

            try{

                $base= new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');

                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :login AND PASSWORD= :password";//uso de marcadores que rescatamos posteriormente

                $resultado=$base->prepare($sql);

                //marcador login
                $login=htmlentities(addslashes($_POST["login"]));//convierte cualquier simbolo en html

                //marcador password
                $password=htmlentities(addslashes($_POST["password"]));

                //rescatamos valores de marcadores
                $resultado->bindValue(":login", $login);

                $resultado->bindValue(":password", $password);

                $resultado->execute();

                $numero_registro=$resultado->rowCount();//válida si el registro existe devolviendo un 0 o 1

                if($numero_registro!=0){

                    $autenticado=true;

                    if(isset($_POST["recordar"])){ //el usuario ha indicado en el checkbox si quiere ser recordado
                        
                        setcookie("nombre_usuario", $_POST["login"], time()+86400);
                    }
                }
                else{

                    echo "Error. Usuario o contraseña incorrectos";
                }

            }
            catch(Exception $error){

                die("Error " . $error->getMessage());
            }
        }

    ?>

    <?php

        if($autenticado==false){

            if(!isset($_COOKIE["nombre_usuario"])){

                include("formulario.html");
            }
        }

        if(isset($_COOKIE["nombre_usuario"])){

            echo "¡Hola: " . $_COOKIE["nombre_usuario"] . "!";
        }
        else if($autenticado==true){

            echo "¡Hola: " . $_POST["login"] . "!";
        }
    ?>

    <h2>CONTENIDO DE LA WEB</h2>
    <table width="800" border="0">
        <tr>
            <td><img src="imagenes/image.jpeg" width="300" height="166"></td>
            <td><img src="imagenes/image4.jpg" width="300" height="171"></td>
        </tr>
        <tr>
        <td><img src="imagenes/informatica.jpg" width="300" height="166"></td>
        <td><img src="imagenes/programacion-M360.jpg" width="300" height="197"></td>
        </tr>
    </table>

    <?php

        if($autenticado==true || isset($_COOKIE["nombre_usuario"])){

            include("zona_registrados.html");
        }

    ?>
</body>
</html>