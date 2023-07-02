<!DOCTYPE html>
<html>
<head>
    <title>Administrador</title>
</head>
<body>
    <h1>Administrador</h1>

    <?php
    // Leer el contenido del archivo de texto
    $file = 'messages.txt';
    if (file_exists($file)) {
        $content = file_get_contents($file);
        echo "<h2>Contenido del archivo:</h2>";
        echo "<pre>" . htmlentities($content) . "</pre>";
    } else {
        echo "El archivo no existe.";
    }
    ?>

    <form action="clear_messages.php" method="post">
        <button type="submit">Borrar contenido del archivo</button>
    </form>
</body>
</html>
