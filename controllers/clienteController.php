<?php
require_once '../utils/dbConnection.php';
require_once '../models/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];

    $cliente = new Cliente($db);
    $cliente->registrarCliente($matricula, $nombre);

    header('Location: /index.php');
}
?>
