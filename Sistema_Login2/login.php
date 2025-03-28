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

                    //echo "<h2>Adelante!!</h2>";

                    session_start();//Inicia sesión o crea la sesión

                    $_SESSION["usuario"]=$_POST["login"];//se almacena en la variable super global $_SESIÓN el login del usuario

                    //header("Location:usuarios_registrados1.php");
                }
                else{

                    //header("location:login.php"); //redirigimos a la página de inicio en caso de que el usuario no exista

                    echo "Error. Usuario o contraseña incorrectos";
                }

            }
            catch(Exception $error){

                die("Error " . $error->getMessage());
            }
        }

    ?>

    <?php

        //cuando la pagina inicie la primera vez cargara solamente si se ha iniciado sesión
        if(!isset($_SESSION["usuario"])){

            include("formulario.html"); //nos ayuda a ver el formulario

        }
        else{

            echo "Usuario: " . $_SESSION["usuario"];

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
</body>
</html>