<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
                //nombre de la cookie, mensaje o valor, tiempo de vida de la cookie (segundos), directorio de actuación
        setcookie("prueba", "Esta es la información de nuestra primera cookie", time()+30, "/pildorasInfo/sesiones_&_cookies/zona_contenidos/leer_cookie2.php"); //time, indica que ha tomado la hora del sistema en cuanto abre el navegador

        echo("se ha creado una cookie por 30 seg");
    ?>
</body>
</html>