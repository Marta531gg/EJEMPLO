<?php

require_once("../../../sentencia.php");
require_once("../../../conexion.php");




session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}



// Fetch products from the database
$sqlProducts = "SELECT cod_pro, nom_pro FROM productos";
$resultProducts = $conn->query($sqlProducts);

$products = [];
if ($resultProducts->num_rows > 0) {
    while ($row = $resultProducts->fetch_assoc()) {
        $products[] = $row;
    }
}


    if (isset($_POST['boton'])) {
        // Captura los datos enviados
        $nom_prod = $_POST['nom_prod'];
        $fec_ing = $_POST['fec_ing'];
        $ingreso = $_POST['ingreso'];
        $salida = $_POST['salida'];
        $cod_pro = $_POST['cod_pro'];

        
        
        // Preparar la consulta SQL
        $insertar = "INSERT INTO almacen (nom_prod, fec_ing, ingreso, salida, cod_pro) VALUES ('$nom_prod', '$fec_ing', '$ingreso', '$salida', '$cod_pro')";

        if (mysqli_query($conn, $insertar)) {
            header("Location: crear.php?da=2");
            exit();
        } else {
            echo "Error al insertar el producto: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }



?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén</title>
    <!-- Link a tu archivo de estilo -->
    <link href="../../../css/estilo.css" type="text/css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="insertar.php" method="POST" enctype="multipart/form-data">
            <h1>Formulario de Almacén</h1>
            <div class="form-group">
                <label for="nom_prod">Nombre Producto</label>
                <input type="text" id="nom_prod" name="nom_prod" maxlength="100" placeholder="Nombre del producto" required>
            </div>
            <div class="form-group">
                <label for="fec_ing">Fecha de Ingreso</label>
                <input type="date" id="fec_ing" name="fec_ing" required>
            </div>
            <div class="form-group">
                <label for="ingreso">Cantidad Producto</label>
                <input type="number" id="ingreso" name="ingreso" maxlength="100" placeholder="Cantidad de ingreso" required>
            </div>
            <div class="form-group">
                <label for="salida">Salida del Producto</label>
                <input type="number" id="salida" name="salida" maxlength="100" placeholder="Cantidad de salida" required>
            </div>
            <div class="form-group">
                <label for="cod_pro">Producto:</label>
                <select class="form-control" id="cod_pro" name="cod_pro" required>
                    <option value="">Selecciona un Producto</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product['cod_pro']; ?>"><?php echo $product['nom_pro']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="boton" value="Enviar">
            </div>
        </form>
    </div>
</body>

</html>