<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
                //time()-1, proboca la eliminación de la cookie creada
        setcookie("nombre_usuario", "dario", time()-1); 
           
        echo ("La cookie ha sido destruida");

    ?>
</body>
</html>