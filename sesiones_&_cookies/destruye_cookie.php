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
        setcookie("prueba", "Esta es la información de nuestra primera cookie", time()-1, 
            "/pildorasInfo/sesiones_&_cookies/zona_contenidos/leer_cookie2.php"); 

    ?>
</body>
</html>