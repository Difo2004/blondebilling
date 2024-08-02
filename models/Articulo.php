<!-- Hecho por Manuel José Difó Lima 2023-0601 -->

<?php
class Articulo {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrarArticulo($nombre, $precio) {
        $stmt = $this->db->prepare("INSERT INTO articulos (nombre, precio) VALUES (:nombre, :precio)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->execute();
        return $this->db->lastInsertId();
    }
}
?>
