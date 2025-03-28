<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();//crea o reanuda la sesión del usuario rescatando de la variable super global

        if(!isset($_SESSION["usuario"])){

            header("Location:login.php");//se redirige en caso de que sea erroneo. Que no se haya iniciado sesión
        }

    ?>
    <h1>Bienvenidos Usuarios</h1>

    <?php

        echo "Hola: " . $_SESSION["usuario"] . "<br><br>";

    ?>

    <p><a href="cierre.php">Cierra Sesión</a>
    <p>

    <p>Esto es información solo para usuarios registrados</p>

    <table width="489" height="187" border="1">
        <tr>
            <td colspan="3" align="center">Zona de usuarios Registrados</td>
        </tr>
        <tr>
            <td><a href="usuarios_registrados2.php">Página 1</a></td>
            <td><a href="usuarios_registrados3.php">Página 2</a></td>
            <td><a href="usuarios_registrados4.php">Página 3</a></td>
        </tr>

    </table>
</body>
</html>