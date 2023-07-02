<!DOCTYPE html>
<html>
<head>
    <title>Chat en Vivo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@200&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #d1cbcbf2;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .messages {
            height: 300px;
            overflow-y: scroll;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 10px;
        }

        .message {
            margin-bottom: 10px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .message-left {
        	font-family: 'Martian Mono', monospace;
            background-color: #f2f2f2;
            text-align: left;
        }

        .message-right {
        	font-family: 'Martian Mono', monospace;
            background-color: #e2e2e2;
            text-align: right;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script>
        $(document).ready(function(){
            // Cargar mensajes anteriores al cargar la página
            loadMessages();

            // Enviar mensaje al hacer clic en el botón Enviar
            $('#send').click(function(){
                var username = $('#username').val();
                var message = $('#message').val();
                if(username != '' && message != ''){
                    $.post('send_message.php', {username: username, message: message}, function(data){
                        $('#message').val('');
                        loadMessages();
                    });
                }
            });

            // Cargar mensajes nuevos cada 2 segundos
            setInterval(function(){
                loadMessages();
            }, 2000);
        });

        // Cargar mensajes desde el archivo messages.txt
        function loadMessages(){
            $.get('get_messages.php', function(data){
                $('.messages').html(data);
            });
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Chat en Vivo</h1>
        <div class="messages"></div>
        <br>
        <input type="text" id="username" placeholder="Nombre de usuario">
        <br>
        <input type="text" id="message" placeholder="Escribe un mensaje...">
        <br>
        <button id="send">Enviar</button>
        <button><a href="admin.php">admin</a></button>
    </div>
</body>
</html>
