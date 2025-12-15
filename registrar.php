<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   <?php
    // Crear carpetas si no existen
    $carpeta = "data";
    $subcarpeta = "data/logs";
    $archivo = 'data/elfos.json';
    $log = 'data/logs/registro.log';

    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0755);
    }
    if (!is_dir($subcarpeta)) {
        mkdir($subcarpeta, 0755);
    }

    if (isset($_POST['accion']) && $_POST['accion'] == 'registrar') {
        $nombre = trim($_POST['nombre']);
        $curso = trim($_POST['curso']);
        $edad = intval(trim($_POST['edad']));
        $menu = trim($_POST['menu'] ?? '');

        if ($nombre == "" || $curso == "" || $edad == 0 || $menu == "") {
            echo "Por favor, completa todos los campos.<br>";
        } else {
            $elfo = [
                "nombre" => $nombre,
                "edad" => $edad,
                "curso" => $curso,
                "menu" => $menu
            ];

            // Leer datos existentes si el archivo existe
            $array_elfos = [];
            if (file_exists($archivo)) {
                $json_existing = file_get_contents($archivo);
                $array_elfos = json_decode($json_existing, true);
                if (!is_array($array_elfos)) {
                    $array_elfos = [];
                }
            }

            // Agregar el nuevo registro
            $array_elfos[] = $elfo;

            // Guardar en JSON
            file_put_contents($archivo, json_encode($array_elfos, JSON_PRETTY_PRINT));
            echo "Datos guardados correctamente en $archivo.<br>";

            // Guardar en log
            $datos = date("Y-m-d H:i:s") . " - Registrado: " . $nombre . "\n";
            file_put_contents($log, $datos, FILE_APPEND);
            echo "Registro guardado en log.<br>";
        }
    }
    ?>
    <form action="registrar.php" method="POST">
        Nombre y apellidos: <input type="text" name="nombre" id="nombre" required><br>
        Curso: <input type="text" name="curso" id="curso" required><br>
        Edad: <input type="number" name="edad" id="edad" required><br>
        <select name="menu" id="alergia">
            <option value="" disabled selected>--Seleccione un menú--</option>
            <option value="Estandar">Estándar</option>
            <option value="Lactosa">Sin lactosa</option>
            <option value="Gluten">Sin gluten</option>
        </select>
        <button type="submit" name="accion" value="registrar">Registrar elfo</button>
    </form>
    <br>
    <a href="index.html">Volver al inicio</a>
</body>

</html>