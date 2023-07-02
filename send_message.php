<?php
if (isset($_POST['message']) && isset($_POST['username'])) {
    $message = $_POST['message'];
    $username = $_POST['username'];

    // Guardar el mensaje con el nombre de usuario en el archivo messages.txt
    file_put_contents('messages.txt', $username . ': ' . $message . PHP_EOL, FILE_APPEND);
}
?>
