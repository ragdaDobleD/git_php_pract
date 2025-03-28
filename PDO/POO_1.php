<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        Class Persona{  //Clase

            public function __construct( //Encapsulacion con metodo Constructor
                private string $nombre,
                private int $edad,
                private string $genero,
                private string $nacionalidad,
            ) {}


            //Metodos para obtener las propiedades
            public function getNombre(){
                return $this->nombre;
            }

            public function getEdad(){
                return $this->edad;
            }

            public function getGenero(){
                return $this->genero;
            }

            public function getNacionalidad(){
                return $this->nacionalidad;
            }

            //Meotodos para establecer las propiedades
            public function setNombre($nombre){
                $this->nombre = $nombre;
            }

            public function setEdad($edad){
                $this->edad = $edad;
            }

            public function setGenero($genero){
                $this->genero = $genero;
            }

            public function setNacionalidad($nacionalidad){
                $this->nacionalidad = $nacionalidad;
            }
        }

            //Crear una instancia de Persona
            $persona = new Persona("Dario", 36, "Masculino", "Mexicano");

            //Accedes a las propiedades
            echo "Nombre: " . $persona->getNombre() . "<br>";
            echo "Edad: " . $persona->getEdad() . "<br>";
            echo "Género: " . $persona->getGenero() . "<br>";
            echo "Nacionalidad: " . $persona->getNacionalidad() . "<br>"; 

        

        

    ?>
</body>
</html>