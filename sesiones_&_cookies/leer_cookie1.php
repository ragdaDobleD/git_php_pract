<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if(isset($_COOKIE["prueba"])){

            echo $_COOKIE["prueba"];


        }

        else{

            echo "la cookie no se ha creado";
        }

    ?>
</body>
</html>