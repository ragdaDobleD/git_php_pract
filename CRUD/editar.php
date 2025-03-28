<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>


<?php

  include("conexion.php");

  if(!isset($_POST["bot_actualizar"])){//Si no se ha pulsado el boton de actualizar, se muestra lo siguiente

      //Rescatamos las info que se muestra por primera vez con los $_GET para posteriormente poder actualizar la info
      $Id         =$_GET["Id"];
      $Nombre     =$_GET["nom"];
      $Apellido   =$_GET["Ape"];
      $Direccion  =$_GET["dir"];
    
  }
  else{

    $Id           =$_POST["id"];
    $Nombre       =$_POST["nom"];
    $Apellido     =$_POST["Ape"];
    $Direccion    =$_POST["dir"];

    $sql="UPDATE DATOS_USUARIOS SET Nombre=:miNom, Apellido=:miApe, Direccion=:miDir WHERE ID=:miId";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":miId"=>$Id, ":miNom"=>$Nombre, ":miApe"=>$Apellido, ":miDir"=>$Direccion));

    header("Location:index.php");

  }
?>
<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!--Se llama a si mismo para reconectar con la info-->
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label> 
      <input type="hidden" name="id" id="id" value="<?php echo $Id ?>"></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $Nombre ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="apellido"></label>
      <input type="text" name="Ape" id="Ape" value="<?php echo $Apellido ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $Direccion ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>