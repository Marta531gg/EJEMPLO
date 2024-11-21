<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Inventarios - Preferido</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons (optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .logo-container {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        .logo-container img {
            max-width: 250px;
            height: auto;
        }
        .sidebar {
            background-color: #343a40;
            height: 100vh; /* Asegura que el menú lateral ocupe toda la altura de la ventana */
            padding: 20px;
            position: fixed; /* Fija el menú lateral para que esté siempre visible */
            top: 0;
            left: 0;
            width: 250px; /* Ajusta el ancho del menú lateral */
            z-index: 1000; /* Asegura que el menú esté sobre otros elementos */
            overflow-y: auto; /* Permite el desplazamiento vertical si el contenido es más largo que la pantalla */
        }
        .sidebar a {
            color: #ffffff;
            display: block;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        
        .content {
            margin-left: 250px; /* Ajusta este valor según el ancho del menú lateral */
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Logo Section -->
        <div class="row">
            <div class="col-12 logo-container">
                <img src="imagenes/logo mer.jpg" alt="Preferido">
            </div>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <nav class="sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="code/vistas/departamentos/crear.php"><i class="fas fa-cube"></i> Departamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="code/vistas/centro_trabajo/crear.php"><i class="fas fa-cube"></i> Centro de </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="code/vistas/productos/crear.php"><i class="fas fa-cube"></i> Producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="code/vistas/proveedores/crear.php"><i class="fas fa-truck"></i> Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./empleados.html"><i class="fas fa-users"></i> Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="code/vistas/proveedores/producto_ordencompra.php"><i class="fas fa-shopping-cart"></i> Producto Orden Compra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./orden_compra.html"><i class="fas fa-file-alt"></i> Orden de Compra</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./trasacion_inventario.html"><i class="fas fa-exchange-alt"></i> Transacción Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./producto_sansacion_inventario.html"><i class="fas fa-warehouse"></i> Productos Tran. Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./cliente.html"><i class="fas fa-user"></i> Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="code/vistas/Almacen/crear.php"><i class="fas fa-boxes"></i> Almacén</a>
    </style>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="content">
                <h1 class="my-4">Panel de Inventarios</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Categoría 1</h5>
                            </div>
                            <div class="card-body">
                                <p>Aquí va la información sobre la categoría 1.</p>
                                <!-- Puedes agregar una tabla o lista aquí -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Categoría 2</h5>
                            </div>
                            <div class="card-body">
                                <p>Aquí va la información sobre la categoría 2.</p>
                                <!-- Puedes agregar una tabla o lista aquí -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Categoría 3</h5>
                            </div>
                            <div class="card-body">
                                <p>Aquí va la información sobre la categoría 3.</p>
                                <!-- Puedes agregar una tabla o lista aquí -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
