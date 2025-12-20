<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $archivo = "data/elfos.json";
    if (!file_exists($archivo)) {
        echo "No hay elfos registrados.";
        echo '<br><br><a href="index.html">Volver al inicio</a>';
        exit;
    } else {
        $json_existing = file_get_contents($archivo);
        $array_elfos = json_decode($json_existing, true);

        $estandar = [];
        $lactosa = [];
        $gluten = [];
        $condicion = false;

        foreach ($array_elfos as $elfo) {
            $menu = strtolower(trim($elfo['menu']));
            $nombre = $elfo['nombre'];

            if (str_contains($menu, "estandar")) {
                $estandar[] = $nombre;
            } elseif (str_contains($menu, "lactosa")) {
                $lactosa[] = $nombre;
            } else {
                // Como es un select en registar se da por supuesto que no hay más valores que sin gluten
                $gluten[] = $nombre;
            }
        }

        echo "<h2>Menús de elfos:</h2>";
        echo "<h3>Menú estandar:</h3>";
        if (!empty($estandar)) {
            $lista = '';
            foreach ($estandar as $i => $nombre) {
                // .= es para seguir escribiendo en una cadena (Solo sirve para una cadena)
                if ($i > 0) $lista .= '<p> ';
                $lista .= "- $nombre";
            }
            echo $lista;
        } else {
            echo "Ningún elfo";
        };
        echo "<h3>Menú sin lactosa:</h3>";
        if (!empty($lactosa)) {
            $lista = '';
            foreach ($lactosa as $i => $nombre) {
                // .= es para seguir escribiendo en una cadena (Solo sirve para una cadena)
                if ($i > 0) $lista .= '<p> ';
                $lista .= "- $nombre";
            }
            echo $lista;
        } else {
            echo "Ningún elfo";
        };
        echo "<h3>Menú sin gluten:</h3>";
        if (!empty($gluten)) {
            $lista = '';
            foreach ($gluten as $i => $nombre) {
                // .= es para seguir escribiendo en una cadena (Solo sirve para una cadena)
                if ($i > 0) $lista .= '<p>';
                $lista .= "- $nombre";
            }
            echo $lista;
        } else {
            echo "- Ningún elfo";
        };
    }
    ?>
    <br><br>
    <a href="index.html">Volver al inicio</a>
</body>

</html>