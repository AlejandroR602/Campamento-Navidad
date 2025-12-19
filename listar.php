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

if (!file_exists($archivo) || filesize($archivo) == 0) {
    echo "No hay elfos registrados.";
    echo '<br><br><a href="index.html">Volver al inicio</a>';
    exit;
}

$contenido = file_get_contents($archivo);
$lista = json_decode($contenido, true);

if (empty($lista)) {
    echo "No hay elfos registrados.";
    echo '<br><br><a href="index.html">Volver al inicio</a>';
    exit;
}

echo "<h2>Listado de elfos</h2>";

// Mostrar cada elfo en una línea
foreach ($lista as $elfo) {
    echo $elfo["nombre"];
    echo " - " . $elfo["edad"] . " años, curso " . $elfo["curso"];
    echo "<br>";
}
?>
    <br><br>
    <a href="index.html">Volver al inicio</a>
</body>
</html>