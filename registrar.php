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
    $subcarpeta = "./data/logs";
    $archivo = 'data/elfos.json';
    $log = 'data/logs/registro.log';
    
    if(!is_dir($carpeta) && !is_dir($subcarpeta)){
        mkdir($carpeta, 0755);
        mkdir($subcarpeta, 0755);
        echo "Carpetas creadas correctamente.<br>";
    } 

    if (isset($_POST['accion']) && $_POST['accion'] == 'registrar') {
        $nombre = trim($_POST['nombre']);
        $curso = trim($_POST['curso']);
        $edad = intval(trim($_POST['edad']));
        $menu = trim($_POST['menu'] ?? '');


        if($nombre == "" || $curso == "" || $edad == "" || $menu == ""){
            echo "Por favor, completa todos los campos.<br>";
        }else{
            $elfo = [
                "nombre" => $nombre,
                "edad" => $edad,
                "curso" => $curso,
                "menu" => $menu
            ];

            $array_elfos = [];
            if(is_dir){
                $lista = json_decode
                array_push($array_elfos, $lista);
            }
            array_push($array_elfos, $elfo);

            $json_string = json_encode($elfo,JSON_PRETTY_PRINT);
            file_put_contents($archivo, $json_string);
            echo "Datos guardados correctamentes en $archivo";

            $datos = date("Y-m-d H:i:s") . "- Registrado: " . $nombre . "\n";
            $texto = "registro.log";
            file_put_contents($texto,$datos);
        }
    } ?>
    <form action="registrar.php" method="POST">
        Nombre y apellidos: <input type="text" name="nombre"  id="nombre" required><br>
        Curso: <input type="text" name="curso" id="curso" required><br>
        Edad: <input type="number" name="edad"  id="edad" required><br>
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