<?php

require_once("../../../sentencia.php");
require_once("../../../conexion.php");


// pregunta si el botón se presionó
if (isset($_POST['boton'])) {

    // Capturar los datos enviados
    $nom_pro = $_POST['nom_pro'];
    $descrip = $_POST['descrip'];
    $cod_barra = $_POST['cod_barra'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $fec_ven = $_POST['fec_ven'];
    $imagen = $_FILES['imagen'];

    // Cuando se captura un archivo
    $nombre = $imagen['name'];
    $destino = '../../../imagenes/productos/';
    list($nombre_img, $ext_img) = explode('.', $nombre);
    $tamano = $imagen['size'];
    $nombrefinal = $nom_pro . "_" . $precio . "_" . $nombre_img . "." . $ext_img;

    // Muevo el archivo a la carpeta si el tamaño es adecuado
    if ($tamano < 10000000000) {
        if (move_uploaded_file($imagen['tmp_name'], $destino . '/' . $nombrefinal)) {
            // Insertar en la base de datos solo si la imagen se movió correctamente
            $insertar = "INSERT INTO productos (nom_pro, descrip, cod_barra, precio, stock, fec_ven, imagen) 
                         VALUES ('$nom_pro', '$descrip', '$cod_barra', '$precio', '$stock', '$fec_ven', '$nombrefinal')";

            $ins = new Sentencia($insertar, $conn, 'productos');
            $ins->insertarbdo();

            // Verifica si la inserción fue exitosa
            if (mysqli_affected_rows($conn) > 0) {
                // Redirecciona al usuario a la página principal con un mensaje de éxito
                header("Location: crear.php?da=2");
                exit();
            } else {
                echo "Error al insertar en el almacen.";
            }

        } else {
            echo "Hubo un problema al subir la imagen.";
        }
    } else {
        echo "La imagen supera el tamaño permitido.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conn);
}
        
?>



 



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
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
        .form-group input {
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
     
        <form action="insertar.php?da=2" method="POST" enctype="multipart/form-data">
             
              <h1>Formulario de  producto</h1>
           
            <div class="form-group">
                <label for="nom_prod">Nombre Producto</label>
                <input type="text" id="nom_prod" name="nom_pro" maxlength="100" placeholder="Nombre del producto" required>
            </div>
          
            <div class="form-group">
                <label for="descrip">Descripcion</label>
                <input type="text" id="descrip" name="descrip" maxlength="100" placeholder="Descripcion" required>
            </div>
        

            <div class="form-group">
                <label for=" cod_barra">Codigo de barras</label>
                <input type="number" id="cod_barra" name="cod_barra" maxlength="100" placeholder="Codigo de barras" required>
            </div>

        

            <div class="form-group">
                <label for="ingreso">Precio</label>
                <input type="number" id="precio" name="precio" maxlength="100" placeholder="Cantidad de ingreso" required>
            </div>


            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" maxlength="100" placeholder="Cantidad  de stock" required>
            </div>


            <div class="form-group">
                <label for="fec_ven">Fecha de vencimiento</label>
                <input type="date" id="fec_ven" name="fec_ven" maxlength="100" placeholder="fecha de vencimiento" required>
            </div>


            
            <div class="form-group">
    <label for="archivos">Imagen</label>
    <input type="file" id="imagen" name="imagen" class="form-control-file" required>
    <div class="invalid-feedback">Por favor seleccione al menos un archivo.</div>
</div>


            <div class="form-group">
                <input type="submit" name="boton" value="Enviar">
            </div>
        </form>
    </div>
    
    
    
</body>

</html>

	