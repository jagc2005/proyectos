<?php
$messages = file_get_contents('messages.txt');
$messagesArray = explode(PHP_EOL, $messages);

// Mostrar los mensajes en un formato HTML con orientación alternada
$leftAlign = true; // Variable para alternar la orientación izquierda/derecha

foreach ($messagesArray as $message) {
    if (!empty($message)) {
        $messageClass = $leftAlign ? 'message-left' : 'message-right';
        echo '<div class="' . $messageClass . '">' . $message . '</div>';
        $leftAlign = !$leftAlign; // Cambiar el valor para la siguiente iteración
    }
}
?>
