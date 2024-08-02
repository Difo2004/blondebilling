<!-- Hecho por Manuel José Difó Lima 2023-0601 -->

<?php
class Factura {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrarFactura($codigo_cliente, $total, $comentario) {
        date_default_timezone_set("Etc/GMT+4");
        $fecha = date('Y-m-d H:i:s');
        $stmt = $this->db->prepare("INSERT INTO facturas (fecha, codigo_cliente, total, comentario) VALUES (:fecha, :codigo_cliente, :total, :comentario)");
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':codigo_cliente', $codigo_cliente);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function agregarDetalleFactura($factura_id, $articulo_id, $cantidad, $precio, $total) {
        $stmt = $this->db->prepare("INSERT INTO detalle_factura (factura_id, articulo_id, cantidad, precio, total) VALUES (:factura_id, :articulo_id, :cantidad, :precio, :total)");
        $stmt->bindParam(':factura_id', $factura_id);
        $stmt->bindParam(':articulo_id', $articulo_id);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':total', $total);
        $stmt->execute();
    }
}
?>
