<?php

require_once 'dbConnection.php';

session_start();

if (isset($_SESSION['username'])) {

    header("location: /");
}
else {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    
    $q = "SELECT COUNT(*) as contar FROM sesiones WHERE usuario = '$usuario' and clave = '$clave';";
    
    $consulta = $db->query($q);
    $array = $consulta->fetch(SQLITE3_BOTH);
    
    if ($array[0] > 0) {
        $_SESSION['username'] = $usuario;
        header("location: /");
    }
    else {
        header("location: /session/");
    }
}
?>