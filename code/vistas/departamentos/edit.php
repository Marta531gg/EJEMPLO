<?php
require_once ('../../../conexion.php');
require_once ('../../../sentencia.php');

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "preferido";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8');

if (isset($_GET['lla'])) {
    $cod_dpto = $_GET['lla'];
    $consulta = "SELECT * FROM departamento WHERE cod_dpto = ?";
    $stmt = $conn->prepare($consulta);
    $stmt->bind_param("s", $cod_dpto);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $departamento = $resultado->fetch_assoc();
} else {
    header("Location: crear.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_dpto = $_POST['nom_dpto'];
    $asig_labor = $_POST['asig_labor'];

    $actualizar = "UPDATE departamento SET nom_dpto = ?, asig_labor = ? WHERE cod_dpto = ?";
    $stmt = $conn->prepare($actualizar);
    $stmt->bind_param("ssi", $nom_dpto, $asig_labor, $cod_dpto);
    $stmt->execute();

    header("Location: crear.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Departamento</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Editar Departamento</h2>
    <form method="POST">
        <div class="form-group">
            <label for="nom_dpto">Nombre Departamento:</label>
            <input type="text" class="form-control" id="nom_dpto" name="nom_dpto" value="<?php echo htmlspecialchars($departamento['nom_dpto']); ?>" required>
        </div>
        <div class="form-group">
            <label for="asig_labor">Asignación Labor:</label>
            <input type="text" class="form-control" id="asig_labor" name="asig_labor" value="<?php echo htmlspecialchars($departamento['asig_labor']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
