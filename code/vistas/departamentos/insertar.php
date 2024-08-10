<?php

require_once("../../../sentencia.php");
require_once("../../../conexion.php");


// pregunta si el botón se presionó
if (isset($_POST['boton'])) {

    // Capturar los datos enviados
    $nom_dpto = $_POST['nom_dpto'];
    $asig_labor = $_POST['asig_labor'];
   // $cod_ctra = $_POST['co_ctra'];


        
            // Insertar en la base de datos solo si la imagen se movió correctamente
            $insertar = "INSERT INTO departamento (nom_dpto, asig_labor) 
                         VALUES ('$nom_dpto', '$asig_labor')";

            $ins = new Sentencia($insertar, $conn, 'departamento');
            $ins->insertarbdo();

            if (mysqli_query($conn, $insertar)) {
                header("Location: crear.php?da=2");
                exit();
            } else {
                echo "Error al insertar el departamento: " . mysqli_error($conn);
            }
    
            mysqli_close($conn);
        }
    
    
    
    
    
        
?>



 



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>departamentos</title>
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
             
              <h1>Formulario de Departamentos</h1>
           
            <div class="form-group">
                <label for="nom_dpto">Nombre Departamentos</label>
                <input type="text" id="nom_dpto" name="nom_dpto" maxlength="100" placeholder="Nombre Departamentos" required>
            </div>
          
            <div class="form-group">
                <label for="asig_labor">Asignar labor</label>
                <input type="text" id="asig_labor" name="asig_labor" maxlength="100" placeholder="asignar labor" required>
            </div>
        

       
 

            <div class="form-group">
                <input type="submit" name="boton" value="Enviar">
            </div>
        </form>
    </div>
    
    
    
</body>

</html>

	