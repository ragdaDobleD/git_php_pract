<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php

  include("conexion.php");

  //------------------------ PAGINACIÓN ----------------------------------------
  $tamanio_paginas=3; //tamaño total de paginas

        //Si el usuario ha entrado por primera vez entonces no entra en este if caso contrario se dirige a la pagina presionada
        if(isset($_GET["pagina"])){

            if($_GET["pagina"]==1){

                header("Location:index.php");

            }else{

                $pagina=$_GET["pagina"];
            }
        }else{
            $pagina=1; //numero de pagina
        }

        $empezar_desde=($pagina-1) * $tamanio_paginas; //recorrido dinamico de inicio de pagina

        //Esta primer consulta es para saber cuantos registros tenemos y calcular cuantos registros mostraremos por pagina
        $sql_total="SELECT * FROM DATOS_USUARIOS";

        $resultado=$base->prepare($sql_total);

        $resultado->execute(array());

        $num_filas=$resultado->rowCount(); //Cuantas fila nos devuelve la consulta SQL

        $total_paginas=ceil($num_filas/$tamanio_paginas);//ceil nos redondea el resultado

  //-------------------- FIN PAGINACIÓN -------------------------------------------

  /*$conexion=$base->query("SELECT * FROM DATOS_USUARIOS");

  $registros = $conexion->fetchAll(PDO::FETCH_OBJ);*/

  //Simplificamos las lineas anteriores con...
  $registros=$base->query("SELECT * FROM DATOS_USUARIOS LIMIT $empezar_desde,$tamanio_paginas ")->fetchAll(PDO::FETCH_OBJ);

  if(isset($_POST["cr"])){//Si se ha pulsado el boton de Insert

    $nombre=$_POST["Nom"];

    $apellido=$_POST["Ape"];

    $direccion=$_POST["Dir"];

    $sql="INSERT INTO DATOS_USUARIOS (NOMBRE, APELLIDO, DIRECCION) VALUES (:nom, :ape, :dir)";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));

    header("Location:index.php");

  }

?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
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
    foreach($registros as $persona):?> 


   	<tr>
      <td><?php echo $persona->ID ?> </td>        <!-- ID-->
      <td><?php echo $persona->Nombre ?></td>     <!--Nombre-->
      <td><?php echo $persona->Apellido ?></td>   <!--Apellido-->
      <td><?php echo $persona->Direccion ?></td>  <!--Direccion-->
 
      <td class="bot"><a href="borrar.php?Id=<?php echo $persona->ID?>"><input type='button' name='del' id='del' value='Borrar'></a></td> <!--Pasamos el ID a eliminar con el boton Borrar-->
      <td class='bot'><a href="editar.php?Id=<?php echo $persona->ID?> & nom=<?php echo $persona->Nombre?> & Ape=<?php echo $persona->Apellido?> & dir=<?php echo $persona->Direccion?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
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


<p>&nbsp;</p>
</body>
</html>