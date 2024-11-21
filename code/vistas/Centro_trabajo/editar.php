<?php
require_once ('../../../conexion.php');
require_once ('../../../sentencia.php');

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

if (isset($_GET['lla'])) {
    $id_centro_trabajo = intval($_GET['lla']);
    
    // Consulta para obtener los datos del centro de trabajo
    $consulta = "SELECT * FROM centro_trabajo WHERE cod_ctra = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param('i', $id_centro_trabajo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $centro_trabajo = $resultado->fetch_assoc();
    } else {
        die("No se encontró el centro de trabajo.");
    }
} else {
    die("ID no especificado.");
}

// Procesar la actualización del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nom_ctra'];
    $gest_usuario = $_POST['gest_usuario'];
    $asig_perm = $_POST['asig_perm'];
    $super_gen = $_POST['super_gen'];
    $cod_emp = $_POST['cod_emp'];
    
    $update = "UPDATE centro_trabajo SET nom_ctra = ?, gest_usuario = ?, asig_perm = ?, super_gen = ?, cod_emp = ? WHERE cod_ctra = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param('sssssi', $nombre, $gest_usuario, $asig_perm, $super_gen, $cod_emp, $id_centro_trabajo);
    
    if ($stmt->execute()) {
        header("Location: crear.php"); // Redirige después de la actualización
        exit();
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Centro de Trabajo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Editar Centro de Trabajo</h2>
    <form method="POST">
        <div class="form-group">
            <label for="nom_ctra">Nombre Centro Trabajo:</label>
            <input type="text" class="form-control" name="nom_ctra" value="<?php echo htmlspecialchars($centro_trabajo['nom_ctra']); ?>" required>
        </div>
        <div class="form-group">
            <label for="gest_usuario">Gestión Usuario:</label>
            <input type="text" class="form-control" name="gest_usuario" value="<?php echo htmlspecialchars($centro_trabajo['gest_usuario']); ?>" required>
        </div>
        <div class="form-group">
            <label for="asig_perm">Asignación Permiso:</label>
            <input type="text" class="form-control" name="asig_perm" value="<?php echo htmlspecialchars($centro_trabajo['asig_perm']); ?>" required>
        </div>
        <div class="form-group">
            <label for="super_gen">Supervisión General:</label>
            <input type="text" class="form-control" name="super_gen" value="<?php echo htmlspecialchars($centro_trabajo['super_gen']); ?>" required>
        </div>
        <div class="form-group">
            <label for="cod_emp">Código Empleado:</label>
            <input type="text" class="form-control" name="cod_emp" value="<?php echo htmlspecialchars($centro_trabajo['cod_emp']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Cancelar</a>
</div>

</body>
</html>
