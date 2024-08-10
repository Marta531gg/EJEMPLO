<?php

require_once("../../../sentencia.php");
require_once("../../../conexion.php");




session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}



// Fetch products from the database
$sqlProducts = "SELECT cod_ctra, nom_ctra FROM centro_trabajo";
$resultProducts = $conn->query($sqlProducts);

$products = [];
if ($resultProducts->num_rows > 0) {
    while ($row = $resultProducts->fetch_assoc()) {
        $products[] = $row;
    }
}


    if (isset($_POST['boton'])) {
        // Captura los datos enviados
        $nom_ctra = $_POST['nom_ctra'];
        $gest_usuario = $_POST['gest_usuario'];
        $asig_perm = $_POST['asig_perm'];
        $super_gen= $_POST['super_gen'];
        $cod_emp = $_POST['cod_emp'];

        
        
        // Preparar la consulta SQL
        $insertar = "INSERT INTO centro_trabajo (nom_ctra, gest_usuario, asig_perm, super_gen, cod_emp) VALUES ('$nom_ctra', '$gest_usuario', '$asig_perm', '$super_gen', '$cod_emp')";

        if (mysqli_query($conn, $insertar)) {
            header("Location: crear.php?da=2");
            exit();
        } else {
            echo "Error al insertar el centro trabajo: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }



?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro trabajo</title>
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
            <h1>Formulario de centro trabajo</h1>
            <div class="form-group">
                <label for="nom_prod">Nombre centro trabajo</label>
                <input type="text" id="nom_ctra" name="nom_ctra" maxlength="100" placeholder="Nombre del centro trabajo" required>
            </div>
            <div class="form-group">
                <label for="fec_ing">gestion de usuario</label>
                <input type="text" id="gest_usuario" name="gest_usuario" required>
            </div>
            <div class="form-group">
                <label for="ingreso">asignacion permiso</label>
                <input type="number" id="asig_perm" name="asig_perm" maxlength="100" placeholder="Asignacion permiso" required>
            </div>
            <div class="form-group">
                <label for="salida">supervision general</label>
                <input type="text" id="super_gen" name="super_gen" maxlength="100" placeholder="Supervicion general" required>
            </div>
            
            <div class="form-group">
                <label for="salida">supervision codigo empleado</label>
                <input type="text" id="cod_emp" name="cod_emp" maxlength="100" placeholder="codigo empleado" required>
            </div>
            

                <select class="form-control" id="cod_pro" name="cod_pro" required>
                    <option value="">Selecciona un Producto</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product['cod_ctra']; ?>"><?php echo $centro_trabajo['nom_ctra']; ?></option>
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