<?php
require_once ('../../../conexion.php');
require_once ('../../../sentencia.php');

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit(); // Asegúrate de terminar el script después de redirigir
}

// Crear conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermercadomercaplaza";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establecer juego de caracteres UTF-8
$conn->set_charset('utf8');

// Consulta utilizando MySQLi
$consulta = "SELECT * FROM  productos ORDER BY  cod_pro";
$resultado = $conn->query($consulta);

// Comprobación de errores en la ejecución de la consulta
if (!$resultado) {
    die("Error al ejecutar la consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons (optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .btn-custom-green {
            background-color: #28a745;
            color: #fff;
        }
        .btn-custom-green:hover {
            background-color: #218838;
        }
        .btn-borrar {
            color: #fff;
        }
        .btn-borrar:hover {
            color: #fff;
            background-color: #c82333;
        }
        .icon {
            margin-right: 5px;
        }
    </style>
</head>

<body>

<!--boton donde sale formulario insertar-->

    <div class="container mt-4">
        <button name="botonc" type="button" onclick="document.location='insertar.php?da=2'" class="btn btn-primary mb-3">
            Ingresar productos
        </button>
        
    

        <table class="table table-bordered">
            <thead>
                <tr>
                     <th>Nombre producto</th>
                    <th>Descripcion</th>
                    <th>Codigo barras</th>
                    <th>Precio</th>
                   <th>Cantidad stock</th>
                    <th>Fecha vencimiento</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($producto = $resultado->fetch_assoc()) { ?>
                    <tr>
                    <td><?php echo htmlspecialchars($producto['cod_pro']); ?></td>
                        <td><?php echo htmlspecialchars($producto['nom_pro']); ?></td>
                        <td><?php echo htmlspecialchars($producto['descrip']); ?></td>
                        <td><?php echo htmlspecialchars($producto['cod_barra']); ?></td>
                        <td>$ <?php echo number_format($producto['precio'], 2, ',', '.'); ?></td>
                        <td>$ <?php echo number_format($producto['stock'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($producto['fec_ven']); ?></td>
                        <td><img src="../../../imagenes/productos/<?php echo $producto['imagen']; ?>" width="100" alt=""></td>



                        <td>
                            <a href="edit.php?da=3&lla=<?php echo htmlspecialchars($producto['cod_pro']); ?>" class="btn btn-custom-green btn-editar">
                                <i class="fas fa-edit icon"></i> Editar
                            </a>
                            <a href="#" class="btn btn-danger btn-borrar" onclick="pregunta(<?php echo htmlspecialchars($producto['cod_pro']); ?>)">
                                <i class="fas fa-trash-alt icon"></i> Borrar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
    function pregunta(id) {
        if (confirm('¿Está seguro de borrar el dato del almacén?')) {
            document.location = "borrar.php?da=4&lla=" + id;
        }
    }
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
