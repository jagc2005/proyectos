<?php
// Verificar la autenticación o cualquier otro método de validación

$file = 'messages.txt';

if (file_exists($file)) {
    $handle = fopen($file, 'r+');
    if ($handle !== false) {
        if (ftruncate($handle, 0)) {
            echo "El contenido del archivo se ha borrado exitosamente.";
        } else {
            echo "Error al borrar el contenido del archivo.";
        }
        fclose($handle);
    } else {
        echo "No se pudo abrir el archivo.";
    }
} else {
    echo "El archivo no existe.";
}
?>
