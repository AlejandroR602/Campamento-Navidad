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
    // TODO

    if ($_POST) {
        // TODO
    } ?>
    <form method="POST">
        Nombre y apellidos: <input type="text" name="nombre" required><br>
        Curso: <input type="text" name="curso" required><br>
        Edad: <input type="number" name="edad" required><br>
        <select name="menu" id="alergia">
            <option value="" disabled selected>--Seleccione un menú--</option>
            <option value="Estandar">Estándar</option>
            <option value="Lactosa">Sin lactosa</option>
            <option value="Gluten">Sin gluten</option>
        </select>
        <button type="submit">Registrar elfo</button>
    </form>
    <br>
    <a href="index.html">Volver al inicio</a>
</body>

</html>