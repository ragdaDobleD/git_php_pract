<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include("conexion.php");

    $Id=$_GET["Id"];

    $base->query("DELETE FROM DATOS_USUARIOS WHERE ID='$Id'");

    header("Location:index.php");

    ?>
</body>
</html>