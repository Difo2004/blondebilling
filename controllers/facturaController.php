<?php
require_once '../utils/dbConnection.php';

require_once '../models/Factura.php';
require_once '../models/Articulo.php';
require_once '../models/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = $_POST['matricula'];
    $articulo = $_POST['articulo'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $comentario = $_POST['comentario'];

    $clienteModel = new Cliente($db);
    $cliente = $clienteModel->buscarCliente($matricula);

    if (!$cliente) {
        die("Cliente no registrado");
    }

    $total = $cantidad * $precio;

    $facturaModel = new Factura($db);
    $facturaId = $facturaModel->registrarFactura($cliente['id'], $total, $comentario);

    $articuloModel = new Articulo($db);
    $articuloId = $articuloModel->registrarArticulo($articulo, $precio);

    $facturaModel->agregarDetalleFactura($facturaId, $articuloId, $cantidad, $precio, $total);

    header('Location: /index.php');
}
?>
