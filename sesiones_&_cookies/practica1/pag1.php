<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    //Si no es la primera vez que entras a la pag, redirige a la opcion del idioma seleccionado por medio de la cookie 
        if(isset($_COOKIE["idioma_seleccionado"])){

            if($_COOKIE["idioma_seleccionado"]=="es"){

                header("Location:spanish.php");
    
            }
            else if($_COOKIE["idioma_seleccionado"]=="en"){
    
                header("Location:english.php");
            }
        }

    ?>

    <table width="25%" border="0" align="center">
        <tr>
            <td colspan="center" align="center"><h1>Elige idioma</h1></td>
        </tr>
        <tr>
            <td align="center"><a href="creaCookie.php?idioma=en"><img src="img/bandera-de-los-estados-unidos.webp" width="90" height="60"></a></td>
            <td align="center"><a href="creaCookie.php?idioma=es"><img src="img/bandera-mexician.webp" width="90" height="60"></a></td>
        </tr>
    </table>
</body>
</html>