<?php

require 'conexion.php';

 session_start();
 
 if($_POST)
{
 
 $usuario =$_POST['usuario'];
 $password =$_POST['password'];

//consulta base datos
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";

//echo $sql;
 $resultado = $conn->query($sql);
 $num = $resultado->num_rows;

if($num>0)
 {
 $row = $resultado->fetch_assoc();
 $base_datos = $row['password'];

$password_contrasena = sha1($password);

if($base_datos == $password_contrasena)
 {
 // Establecer variables de sesión
 $_SESSION['id_usuario'] = $row['id_usuario'];
 $_SESSION['usuario'] = $row['usuario'];
 $_SESSION['apellido'] = $row['apellido'];
 $_SESSION['email'] = $row['email'];
 $_SESSION['tipo_usuario'] = $row['tipo_usuario'];


 if($row['tipo_usuario']==9)
 {
 
header("Location: principal.php");
 }
 elseif($row['tipo_usuario']==2)
 {
 header("Location: principal.php");
 }
 elseif($row['tipo_usuario']==3)
 {
header("Location: principal.php");
 }
 elseif($row['tipo_usuario']==4)
 {
header("Location: principal.php");
 }
 elseif($row['tipo_usuario']==5)
 {
header("Location: principal.php");
 }
 elseif($row['tipo_usuario']==6)
 {
 header("Location: principal.php");
 }
 else
 {
 
header("Location: index.php");
 }
 }else
 {
 echo "La contraseña no coincide";
 }
 }else
 {
 echo "NO existe usuario";
 }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

  <div class="container">
    

    <div class="logo-container">
          <img src="imagenes/imagenproyecto.jpg" width="1000"  alt="imagen de una seccion del minimercado" class="img-fluid">
    </div>
         

                
                <form method="POST" class="form-color" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <center><h1> EL PREFERIDO</h1></center>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                   
                    <a href=""><i class="fa fa-question-circle"></i>¿Olvidaste tu contraseña?</a>
                    <p>¿No tienes una cuenta? <a href="registro.php" id="showRegister"><i class="fa fa-user-plus"></i>Regístrate aquí</a></p>
                </form>
               
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYjC02Pec/IbX0pTDZ7xsx5M5b2LZOm1j0aRAKbc7AL0stRixzJ12/H3z" crossorigin="anonymous"></script>
</body>

</html>
