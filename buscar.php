<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="buscar.php" method="post">
        Buscar elfo por nombre: <input type="text" name="nombre">
        <button type="submit" name="accion" value="busca">Buscar</button>
    </form>
    <br><a href="index.html">Volver al inicio</a><br><br>
    <?php
    // Selecciono la carpeta en la que voy a buscar
    $carpeta = "data";
    $archivo = 'data/elfos.json';

    if (isset($_POST['accion']) && $_POST['accion'] == 'busca') {
        $nombre = strtolower(trim($_POST['nombre']));

        if ($nombre == "") {
            echo "Por favor, completa todos los campos.<br>";
        } else {
            // Leer datos existentes si el archivo existe
            $array_elfos = [];
            if (file_exists($archivo)) {
                $json_existing = file_get_contents($archivo);
                $array_elfos = json_decode($json_existing, true);
            }

            $infoElfo;
            $condicion = false;
            foreach ($array_elfos as $elfo) {
                if (str_contains(strtolower(trim($elfo['nombre'])), $nombre)) {
                    $condicion = true;
                    $infoElfo = $elfo;
                }
            }

            if ($condicion == true) {
                echo "Información del elfo: <br>";
                echo "Nombre: " . $infoElfo['nombre'] . "<br>";
                echo "Edad: " . $infoElfo['edad'] . "<br>";
                echo "Curso: " . $infoElfo['curso'] . "<br>";
                echo "Menu: " . $infoElfo['menu'] . "<br>";
                /* $numero = 0;
                foreach ($infoElfo as $info) {
                    echo $infoElfo[$numero] . " : ";
                    echo $info . "<br>";

                    $numero++;
                }*/
            } else {
                echo "No existe ese elfo";
            }
        }
    }
    ?>
</body>

</html>