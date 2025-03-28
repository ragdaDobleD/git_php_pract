<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            //$_GET["idioma"] rescata de pag1.php el valor del idioma en la cookie es->español o en->ingles
        setcookie("idioma_seleccionado", $_GET["idioma"], time()+86400);

        header("location:ver_cookie.php");
    ?>
</body>
</html>