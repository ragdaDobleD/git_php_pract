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

                header("Location:usuarios_registrados1.php");
            }
            else{

                header("location:login.php"); //redirigimos a la página de inicio en caso de que el usuario no exista
            }

        }
        catch(Exception $error){

            die("Error " . $error->getMessage());
        }

    ?>
</body>
</html>