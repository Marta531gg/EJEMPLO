<?php
require_once ('../../../conexion.php');
require_once ('../../../sentencia.php');

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: crear.php");
    exit();
}

if (isset($_GET['lla'])) {
    $cod_pro = intval($_GET['lla']);
    
    // Crear conexión
    $conn = new mysqli("localhost", "root", "", "preferido");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Eliminar el producto
    $stmt = $conn->prepare("DELETE FROM productos WHERE cod_pro = ?");
    $stmt->bind_param('i', $cod_pro);
    
    if ($stmt->execute()) {
        header("Location: crear.php?mensaje=Producto eliminado exitosamente.");
        exit();
    } else {
        echo "Error al eliminar: " . $stmt->error;
    }
} else {
    header("Location: crear.php");
}
?>
