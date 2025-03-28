<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //se indica la sesión que se tiene que cerrar para posteriormente cerrar la
        session_start(); //reanuda la sesión iniciada

        session_destroy();//destruye la sesión

        header("location:login.php");
    ?>
</body>
</html>