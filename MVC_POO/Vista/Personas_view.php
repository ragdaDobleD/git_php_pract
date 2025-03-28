<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="hoja.css">
</head>
<body>

<?php
    require("modelo/paginacion.php");

?>
    
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<table width="50%" border="0" align="center">
  <tr >
    <td class="primera_fila">Id</td>
    <td class="primera_fila">Nombre</td>
    <td class="primera_fila">Apellido</td>
    <td class="primera_fila">Dirección</td>
    <td class="sin">&nbsp;</td>
    <td class="sin">&nbsp;</td>
    <td class="sin">&nbsp;</td>
  </tr> 
 
      <?php

  //Inicio de foreach para repetir los inputs de la tabla, tantos como registros tenga la BD tenga 
  foreach($matriz_persona as $persona):?> 


     <tr>
    <td><?php echo $persona["ID"] ?> </td>        <!-- ID-->
    <td><?php echo $persona["Nombre"] ?></td>     <!--Nombre-->
    <td><?php echo $persona["Apellido"] ?></td>   <!--Apellido-->
    <td><?php echo $persona["Direccion"] ?></td>  <!--Direccion-->

    <td class="bot"><a href="borrar.php?Id=<?php echo $persona["ID"]?>"><input type='button' name='del' id='del' value='Borrar'></a></td> <!--Pasamos el ID a eliminar con el boton Borrar-->
    <td class='bot'><a href="editar.php?Id=<?php echo $persona["ID"]?> & nom=<?php echo $persona["Nombre"]?> & Ape=<?php echo $persona["Apellido"]?> & dir=<?php echo $persona["Direccion"]?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
  </tr>       
  <tr>

<?php

  //Fin del foreach 
  endforeach;

?>

  <td></td>
    <td><input type='text' name='Nom' size='10' class='centrado'></td>
    <td><input type='text' name='Ape' size='10' class='centrado'></td>
    <td><input type='text' name=' Dir' size='10' class='centrado'></td>
    <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>    
    <tr><td><?php echo "Páginas: ";
//-------------------------------------CONSTRUIMOS PAGINACIÓN ----------------------------------------------------


  for($i=1; $i<=$total_paginas; $i++){

      echo "<a href='?pagina=" . $i . "'>" . $i . "</a>  ";
      //echo "<a href=\"?pagina=$i\"> $i</a>  ";
  }
?></td></tr>
</table>
</form>

    </table>


</body>
</html>