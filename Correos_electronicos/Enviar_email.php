<?php

if($_POST["nombre"]=="" || $_POST["apellido"]="" || $_POST["email"]=="" || $_POST["comentarios"]==""){ //Comprobación de Campos obligatorios

    echo "ha habido un error. Revisa los campos";

    die();

}

    $texto_mail=$_POST["comentarios"];

    $destinatario=$_POST["email"];

    $asunto=$_POST["asunto"];

    $headers="MIME-Version: 1.0\r\n";//MIME = Multipurpose Internet Mail Extensions

    $headers.="Content-type: text/html; charset=iso-8859-1\r\n"; // .= sirve para concatenar y en este caso con $headers de arriba

    $headers.="From: Prueba Dario <0511dario@gmail.com>\r\n";

    $exito=mail($destinatario, $asunto, $texto_mail, $headers);

    if($exito){

        echo "Mensaje enviado con éxito";

    }else{

        echo "Ha ocurrido un error en el mail";
    }


?>