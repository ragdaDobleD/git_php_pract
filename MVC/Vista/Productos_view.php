<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        td{
            border:1px dotted #FF0000;
        }
    </style>
</head>
<body>
    <table>

        <tr><td>NOMBRE DEL ARTÍCULO</td></tr>
    <?php

        foreach($matriz_producto as $registro){

            echo "<tr><td>" . $registro["NOMBRE ARTÍCULO"] . "</td></tr>";
        }
    ?>

    </table>


</body>
</html>