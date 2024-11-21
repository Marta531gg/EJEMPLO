<?php
require_once ('../../../conexion.php');
require_once ('../../../sentencia.php');

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}

// Crear conexión
$conn = new mysqli("localhost", "root", "", "preferido");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8');

// Obtener datos del producto
if (isset($_GET['lla'])) {
    $cod_pro = intval($_GET['lla']);
    $stmt = $conn->prepare("SELECT * FROM productos WHERE cod_pro = ?");
    $stmt->bind_param('i', $cod_pro);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $producto = $resultado->fetch_assoc();
    if (!$producto) {
        die("No se encontró el producto.");
    }
} else {
    die("ID no especificado.");
}

// Procesar actualización del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nom_pro'];
    $descripcion = $_POST['descrip'];
    $cod_barra = $_POST['cod_barra'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $fec_ven = $_POST['fec_ven'];
    $imagen = $_FILES['imagen']['name'];

    // Manejar la imagen (subida)
    if (!empty($imagen)) {
        move_uploaded_file($_FILES['imagen']['tmp_name'], "../../../imagenes/productos/$imagen");
        $stmt = $conn->prepare("UPDATE productos SET nom_pro = ?, descrip = ?, cod_barra = ?, precio = ?, stock = ?, fec_ven = ?, imagen = ? WHERE cod_pro = ?");
        $stmt->bind_param('sssdissi', $nombre, $descripcion, $cod_barra, $precio, $stock, $fec_ven, $imagen, $cod_pro);
    } else {
        $stmt = $conn->prepare("UPDATE productos SET nom_pro = ?, descrip = ?, cod_barra = ?, precio = ?, stock = ?, fec_ven = ? WHERE cod_pro = ?");
        $stmt->bind_param('sssdii', $nombre, $descripcion, $cod_barra, $precio, $stock, $fec_ven, $cod_pro);
    }

    if ($stmt->execute()) {
        header("Location: index.php");
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
    <title>Editar Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Editar Producto</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom_pro">Nombre Producto:</label>
            <input type="text" class="form-control" name="nom_pro" value="<?php echo htmlspecialchars($producto['nom_pro']); ?>" required>
        </div>
        <div class="form-group">
            <label for="descrip">Descripción:</label>
            <textarea class="form-control" name="descrip" required><?php echo htmlspecialchars($producto['descrip']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="cod_barra">Código de Barras:</label>
            <input type="text" class="form-control" name="cod_barra" value="<?php echo htmlspecialchars($producto['cod_barra']); ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" class="form-control" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Cantidad Stock:</label>
            <input type="number" class="form-control" name="stock" value="<?php echo htmlspecialchars($producto['stock']); ?>" required>
        </div>
        <div class="form-group">
            <label for="fec_ven">Fecha Vencimiento:</label>
            <input type="datetime" class="form-control" name="fec_ven" value="<?php echo htmlspecialchars($producto['fec_ven']); ?>" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen (dejar en blanco si no se desea cambiar):</label>
            <input type="file" class="form-control" name="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <a href="index.php" class="btn btn-secondary mt-3">Cancelar</a>
</div>

</body>
</html>
