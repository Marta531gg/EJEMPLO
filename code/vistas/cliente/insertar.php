<?php
// pregunta si el boton se presiono................
 if(isset($_POST ['boton']))   {
	
	//capturar los datos enviados
	$nombre = $_POST ['plato'];
	$ingredientes = $_POST ['ingredientes'];
	$precio = $_POST ['precio'];
	$imagen =$_FILES ['imagen'];


?>


!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTES</title>   
    
    <link rel="stylesheet" href="../css/estilo.css" />

</head>
<body> 
    <form action="code/pagina11.html" method="POST">

    <h1>Clientes<h1>
        <table alihg="center" cellpadding="10">
            <tr>
            <label for="cod_clie" class="form_reg">Codigo Clientes</label>
            <input type="text" id="cod_clie" name="cod_clie" maxlength="100" placeholder="Codigo Cliente">
            </tr>
                    
            <tr>
            <label for="nom_clie" class="form_reg">Nombre cliente</label>
            <input type="text" id="nom_clie" name="nom_clie" maxlength="100" placeholder="nombre cliente">
            </tr>
          
            <tr>
            <label form="direc" class="form_reg">Direccion</label>
            <input type="text" id="direc" name="direc"maxlength="100" placeholder="Direccion">
            </tr>  

            <tr>
            <label form="telf" class="form_reg">Telefono</label>
            <input type="text"  id="telf" name="telf" maxlength="100" placeholder="telefono">
            </tr>
    
            <tr>
            <label form="correo" class="form_reg">Correo</label>
            <input type="text"  id="correo" name="correo" maxlength="100" placeholder="correo">
            </tr>

            <tr>
                <label form="cod_prod" class="form_reg">Codigo Producto</label>
                <input type="text"  id="cod_prod" name="cod_prod" maxlength="100" placeholder="correo">
                </tr>
            <input type="submit" value="enviar">
    
        </form>
                  
    </body>
          
          
                              
          
    </header>               