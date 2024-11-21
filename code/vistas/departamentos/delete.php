<?php
require_once ('../../../conexion.php');
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['lla'])) {
    $id = $_GET['lla'];

    // Preparar la consulta para eliminar
    $stmt = $conn->prepare("DELETE FROM departamento WHERE cod_dpto = ?");
    $stmt->bind_param("s", $id); // Cambia "s" si el tipo de dato es diferente

    if ($stmt->execute()) {
        // Redirigir después de la eliminación
        header("Location: crear.php"); // Cambia a la ruta adecuada
        exit();
    } else {
        die("Error al eliminar: " . $stmt->error);
    }
}
?>
