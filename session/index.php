<!-- Hecho por Manuel José Difó Lima 2023-0601 -->
<?php 
    ob_start();
session_start();

if ($_SESSION) {

    header("location: /");
}
else { ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto,wght@1,300&display=swap" rel="stylesheet">
</head>
<body class="iniciar">
    <form action='../utils/session.php' method="POST" id="sesion">
        <h2>Inicio de sesion</h2>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="usuario" id="nombre" required>
        </div>
        <div>
            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" id="clave" required>
        </div>
        <button type="submit" id="enviar_sesion">Ingresar</button>
    </form>
</body>
</html>
<?php 
}
ob_flush();
?>