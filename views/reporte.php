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
    <title>Reporte Diario</title>
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
        <h1 class="text-center">Reporte Diario</h1>
        <form action="reporte.php" method="get" class="mt-4">
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
            <a href="../" class="btn btn-warning">
                <i class="fa fa-plus"></i> Volver al menu
            </a>
        </form>
        <?php if (isset($_GET['fecha'])): ?>
            <div class="mt-4">
                <h2>Facturas del día: <?= htmlspecialchars($_GET['fecha']) ?></h2>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Comentario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../utils/dbConnection.php';
                        $fecha = $_GET['fecha'];
                        $stmt = $db->prepare("SELECT f.id, c.nombre, f.total, f.comentario FROM facturas f JOIN clientes c ON f.codigo_cliente = c.id WHERE DATE(f.fecha) = :fecha");
                        $stmt->bindParam(':fecha', $fecha);
                        $stmt->execute();
                        $facturas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $totalCobrado = 0;

                        foreach ($facturas as $factura) {
                            $totalCobrado += $factura['total'];
                            echo "<tr>
                                <td>{$factura['id']}</td>
                                <td>{$factura['nombre']}</td>
                                <td>{$factura['total']}</td>
                                <td>{$factura['comentario']}</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <h3>Total Cobrado: <?= $totalCobrado ?></h3>
            </div>
        <?php endif; ?>
    </div>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
}
ob_flush();
?>