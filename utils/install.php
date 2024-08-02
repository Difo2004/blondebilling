<!-- Hecho por Manuel José Difó Lima 2023-0601 --> 

<?php
// Ruta al archivo de base de datos SQLite
$dbFile = '../db/database.sqlite';

if (file_exists($dbFile)) {
    die('La base de datos ya existe. Eliminar el archivo "db/database.sqlite" si desea reinstalar.');
}

try {
    $db = new PDO('sqlite:' . $dbFile);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear tablas
    $db->exec("
        CREATE TABLE IF NOT EXISTS clientes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            matricula TEXT UNIQUE,
            nombre TEXT
        );
        
        CREATE TABLE IF NOT EXISTS articulos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT,
            precio REAL
        );
        
        CREATE TABLE IF NOT EXISTS facturas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            fecha TEXT,
            codigo_cliente INTEGER,
            total REAL,
            comentario TEXT,
            FOREIGN KEY (codigo_cliente) REFERENCES clientes(id)
        );
        
        CREATE TABLE IF NOT EXISTS detalle_factura (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            factura_id INTEGER,
            articulo_id INTEGER,
            cantidad INTEGER,
            precio REAL,
            total REAL,
            FOREIGN KEY (factura_id) REFERENCES facturas(id),
            FOREIGN KEY (articulo_id) REFERENCES articulos(id)
        );

        CREATE TABLE IF NOT EXISTS sesiones (
            usuario varchar(100) NOT NULL,
            clave varchar(100) NOT NULL
        );

        INSERT INTO sesiones (usuario, clave) VALUES
        ('admin30', 'At7n_L@34'),
        ('adamix', 'pasemesolosilomeresco70');
    ");
    
    echo 'La instalación se completó con éxito.';
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
