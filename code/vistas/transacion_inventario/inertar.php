<?php
// pregunta si el boton se presiono................
 if(isset($_POST ['boton']))   {
	
	//capturar los datos enviados
	$nombre = $_POST ['plato'];
	$ingredientes = $_POST ['ingredientes'];
	$precio = $_POST ['precio'];
	$imagen =$_FILES ['imagen'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRASACION_INVENTARIO</title>   
    
    <link rel="stylesheet" href="../css/estilo.css" />

</head>
<body> 
    <form action="code/pagina9.html" method="POST">

    <h1>Transa_inventario<h1>
        <table alihg="center" cellpadding="10">
            <tr>
            <label for="cod_pro" class="form_reg">Codigo proveedor</label>
            <input type="text" id="cod_pro" name="cod_pro" maxlength="100" placeholder="Codigo proveedor">
            </tr>
                    
            <tr>
            <label for="fecha" class="form_reg">Fecha</label>
            <input type="text" id="fecha" name="fecha" maxlength="100" placeholder="dia, mes, año">
            </tr>
          
            <tr>
            <label form="nom_prod" class="form_reg">Nombre Producto</label>
            <input type="text" id="nom_prod" name="nom_prod"maxlength="100" placeholder="Nombre Producto">
            </tr>  

            <tr>
            <label form="producto" class="form_reg">Producto</label>
            <input type="text"  id="Producto" name="producto" maxlength="100" placeholder="nombre producto">
            </tr>
    
            <tr>
            <label form="devolucion" class="form_reg">Devolucion</label>
            <input type="text"  id="devolucion" name="devolucion" maxlength="100" placeholder="producto a devolver">
            </tr>

     
            <input type="submit" value="enviar">
    
        </form>
                  
    </body>
          
          
                              
          
    </header>               