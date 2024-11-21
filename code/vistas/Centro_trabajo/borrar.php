<?php
require_once('../../../conexion.php');
require_once('../../../sentencia.php');

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

// Crear conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preferido";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establecer juego de caracteres UTF-8
$conn->set_charset('utf8');

// Verificar si se ha pasado el parámetro 'lla' por la URL
if (isset($_GET['lla'])) {
    // Obtener el valor del ID del centro de trabajo a eliminar
    $id_centro_trabajo = intval($_GET['lla']);

    // Preparar la consulta de eliminación
    $consulta = "DELETE FROM centro_trabajo WHERE cod_ctra = ?";

    // Usar prepared statements para evitar inyecciones SQL
    if ($stmt = $conn->prepare($consulta)) {
        $stmt->bind_param('i', $id_centro_trabajo);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir después de la eliminación con un mensaje de éxito
            header("Location: crear.php?mensaje=Eliminado con éxito");
            exit();
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
} else {
    echo "No se ha proporcionado un ID válido para eliminar.";
}

// Cerrar la conexión
$conn->close();
?>
