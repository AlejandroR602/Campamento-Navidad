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

    // Comprobar si no existe o está vacío
    if (!file_exists($archivo) || filesize($archivo) == 0) {
        echo "No hay elfos registrados.";
        echo '<br><br><a href="index.html">Volver al inicio</a>';
        exit;
    }

    $lista = json_decode(file_get_contents($archivo), true);

    // Total de elfos
    $total = count($lista);

    // Media de edades
    $sumaEdades = 0;
    foreach ($lista as $elfo) {
        $sumaEdades += $elfo['edad'];
    }
    $media = round($sumaEdades / $total, 2);

    // Listado de cursos
    $cursos = [];
    foreach ($lista as $elfo) {
        $curso = $elfo['curso'];
        if (!isset($cursos[$curso])) {
            $cursos[$curso] = 0;
        }
        $cursos[$curso]++;
    }

    // Convertir cursos a texto
    $cursosTexto = [];
    foreach ($cursos as $nombreCurso => $cantidad) {
        $cursosTexto[] = "$cantidad $nombreCurso";
    }
    $cursosTextoFinal = implode(", ", $cursosTexto);

    // Rellenar el contenido del reporte
    $contenido = "REPORTE DE ELFOS\n";
    $contenido .= "------------------\n";
    $contenido .= "Total: $total elfos\n";
    $contenido .= "Edad media: $media años\n";
    $contenido .= "Cursos: $cursosTextoFinal\n";
    $contenido .= "Generado el: " . date("Y-m-d H:i:s") . "\n";

    // Guardar archivo en la carpeta data
    file_put_contents("data/reporte.txt", $contenido);

    echo "Reporte generado correctamente.";
    ?>
    <br><br>
    <a href="index.html">Volver al inicio</a>
</body>

</html>