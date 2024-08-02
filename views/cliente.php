<!-- Hecho por Manuel José Difó Lima 2023-0601 -->
<?php
ob_start();
session_start();

$usuario = $_SESSION['username'];
if (!isset($usuario)) {

    header("location: /session/");
}
else { ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../css/estilos.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="text-end mb-3 LogOut">
        <a href="/utils/logOut.php" class="btn btn-danger">
            <i class="fa fa-plus"></i> Cerrar sesión
        </a>
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Registrar Cliente</h1>
        <form action="/controllers/clienteController.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="matricula" class="form-label">Matrícula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="../" class="btn btn-warning">
                <i class="fa fa-plus"></i> Volver al menu
            </a>
        </form>
    </div>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
}
ob_flush();
?>