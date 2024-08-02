<!-- Hecho por Manuel José Difó Lima 2023-0601 -->

<?php

$host = 'sql312.infinityfree.com';
$dbname = 'if0_37029792_facturacion';
$username = 'if0_37029792';
$password = 'KZ6mSOtNHOgqF';

try {
    $db = new PDO('sqlite:../db/database.sqlite');
    // $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    // $pdo = new PDO($dsn, $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
