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
$dbname = "preferido";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establecer juego de caracteres UTF-8
$conn->set_charset('utf8');

// Consulta para obtener departamentos
$consulta = "SELECT * FROM departamento ORDER BY cod_dpto";
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
    <title>departamento</title>
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

<div class="container mt-4">
    <button name="botonc" type="button" onclick="document.location='insertar.php'" class="btn btn-primary mb-3">
        Ingresar departamento
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Departamento</th>
                <th>Nombre departamento</th>
                <th>Asignación labor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($departamento = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($departamento['cod_dpto']); ?></td>
                    <td><?php echo htmlspecialchars($departamento['nom_dpto']); ?></td>
                    <td><?php echo htmlspecialchars($departamento['asig_labor']); ?></td>
                    <td>
                        <a href="edit.php?da=3&lla=<?php echo htmlspecialchars($departamento['cod_dpto']); ?>" class="btn btn-custom-green btn-editar">
                            <i class="fas fa-edit icon"></i> Editar
                        </a>
                        <a href="#" class="btn btn-danger btn-borrar" onclick="pregunta(<?php echo htmlspecialchars($departamento['cod_dpto']); ?>)">
                            <i class="fas fa-trash-alt icon"></i> Borrar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<button><a href="http://localhost/proyecto/principal.php">Inicio</a></button>

<script>
function pregunta(id) {
    if (confirm('¿Está seguro de borrar el dato del departamento?')) {
        document.location = "delete.php?da=4&lla=" + id;
    }
}
</script>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
