<!-- Hecho por Manuel José Difó Lima 2023-0601 -->
<?php 
    ob_start();
session_start();

$usuario = $_SESSION['username'];
if (!isset($usuario)) {

    header("location: session/");
}
else { ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Facturación - Inicio</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="css/estilos.css" rel="stylesheet">
    </head>
    <body class="bg-dark text-white">
        <div class="text-end mb-3 LogOut">
            <a href="/utils/logOut.php" class="btn btn-danger">
                <i class="fa fa-plus"></i> Cerrar sesión
            </a>
        </div>
        <div class="container mt-5">
            <h1 class="text-center">Sistema de Facturación</h1>
            <div class="text-center mt-4">
                <a href="views/cliente.php" class="btn btn-primary">Registrar Cliente</a>
                <a href="views/factura.php" class="btn btn-primary">Registrar Factura</a>
                <a href="views/reporte.php" class="btn btn-primary">Ver Reporte Diario</a>
            </div>
        </div>
        <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php 
}
ob_flush();
?>