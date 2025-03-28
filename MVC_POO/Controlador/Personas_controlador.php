<?php

    require_once("Modelo/Personas_modelo.php");

    $persona=new Personas_modelo();

    $matriz_persona=$persona->get_personas();//llamamos al constructor y ejecutamos su funcion get_personas

    require_once("Vista/Personas_view.php");


?>