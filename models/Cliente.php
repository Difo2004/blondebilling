<!-- Hecho por Manuel José Difó Lima 2023-0601 -->

<?php
class Cliente {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrarCliente($matricula, $nombre) {
        try {
            $stmt = $this->db->prepare("INSERT INTO clientes (matricula, nombre) VALUES (:matricula, :nombre)");
            $stmt->bindParam(':matricula', $matricula);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Código de error para violación de restricción de unicidad
                echo "<script>alert('Error: La matrícula ya está registrada.')</script>";
            } else {
                echo "<script>alert('Error al registrar cliente: ". $e->getMessage()."')</script>";
            }
        }
    }
    
    

    public function buscarCliente($matricula) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE matricula = :matricula");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
