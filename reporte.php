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
    if (/* TODO */) {
        echo "No hay elfos registrados.";
        echo '<br><br><a href="index.html">Volver al inicio</a>';
        exit;
    }
    
    $lista = json_decode(file_get_contents($archivo), true);

    // Total alumnos
    // TODO

    // Media de edades
    // TODO

    // Listado de cursos
    // TODO

    // Rellenar el contenido del reporte
    $contenido = "REPORTE DE ELFOS\n------------------\n";
    $contenido .= "Total: $total elfos\n";
    $contenido .= "Edad media: $media años\n";
    $contenido .= "Cursos: " . /* TODO */ . "\n";
    $contenido .= "Generado el: " . date("Y-m-d H:i:s") . "\n";

    // Guardar archivo
    // TODO
    ?>
    <br><br>
    <a href="index.html">Volver al inicio</a>
</body>
</html>