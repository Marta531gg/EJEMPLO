<?php
date_default_timezone_set("America/Bogota");
require_once("conexion.php");

// If form submitted, insert values into the database
if (isset($_POST['usuario'])) {
    // Verificar que las variables POST estén definidas y no estén vacías
    $usuario = isset($_POST['usuario']) ? stripslashes($_POST['usuario']) : '';
    $apellido = isset($_POST['apellido']) ? stripslashes($_POST['apellido']) : '';
    $email = isset($_POST['email']) ? stripslashes($_POST['email']) : '';
    $password = isset($_POST['password']) ? stripslashes($_POST['password']) : '';
    $tipo_usuario = 9;

    // Verificar que todos los campos requeridos no estén vacíos
    if (!empty($usuario) && !empty($apellido) && !empty($email) && !empty($password)) {
        // Escapar caracteres especiales para evitar SQL Injection
        $usuario = mysqli_real_escape_string($conn, $usuario);
        $apellido = mysqli_real_escape_string($conn, $apellido);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Verificar si el usuario ya existe en la base de datos
        $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $consulta_resultado = mysqli_query($conn, $consulta);

        if (mysqli_num_rows($consulta_resultado) > 0) {
            // Si el usuario ya existe, mostrar un mensaje
            echo "<center><p style='border-radius: 20px;box-shadow: 10px 10px 5px #c68615; font-size: 23px; font-weight: bold;'>El usuario ya está registrado. Por favor, elija otro nombre de usuario.</p></center>";
        } else {
            // Si el usuario no existe, proceder con el registro
            $query = "INSERT INTO usuarios (usuario, apellido, email, password, tipo_usuario) 
                      VALUES ('$usuario', '$apellido', '$email', '" . sha1($password) . "', '$tipo_usuario')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<center><p style='border-radius: 20px;box-shadow: 10px 10px 5px #c68615; font-size: 23px; font-weight: bold;'>Registro exitoso.</p></center>";
            } else {
                echo "<center><p style='border-radius: 20px;box-shadow: 10px 10px 5px #c68615; font-size: 23px; font-weight: bold;'>Error al registrar: " . mysqli_error($mysqli) . "</p></center>";
            }
        }
    } else {
        echo "<center><p style='border-radius: 20px;box-shadow: 10px 10px 5px #c68615; font-size: 23px; font-weight: bold;'>Por favor, complete todos los campos.</p></center>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function ordenarSelect(id_componente) {
            var selectToSort = jQuery('#' + id_componente);
            var optionActual = selectToSort.val();
            selectToSort.html(selectToSort.children('option').sort(function (a, b) {
                return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
            })).val(optionActual);
        }
        $(document).ready(function () {
            ordenarSelect('selectIE');
        });
    </script>
</head>

<body>
   
    <div class="container">
    

    <div class="logo-container">
          <img src="imagenes/imagensuper.jpg" width="1000"  alt="un señor en el supermercado" class="img-fluid">
    </div>
         

            <div class="col-md-6">
                <form method="POST" class="form-color">
                   <center> <h1><i class="fas fa-users"></i> NUEVO USUARIO</h1></center>
                    <p><b><font size="3" color="#c68615">*Datos obligatorios</font></b></p>

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="tipo_usuario">* Tipo de Usuario:</label>
                        <select name="tipo_usuario" id="tipo_usuario" class="form-control" required>
                            <option value="9">Gerente</option>
                            <option value="2">Departamento</option>
                            <option value="3">Usuario</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">
                        REGISTRAR USUARIO
                    </button>
                    
                    <button type="reset" class="btn btn-dark" onclick="history.back();">
                        <img src="imagenes/atras.jpg" width="27" height="27"> REGRESAR
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYjC02Pec/IbX0pTDZ7xsx5M5b2LZOm1j0aRAKbc7AL0stRixzJ12/H3z" crossorigin="anonymous"></script>
</body>

</html>
