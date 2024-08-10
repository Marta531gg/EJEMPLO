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
    <title>ORDDEN COMPRA</title>   
    
    <link rel="stylesheet" href="../css/estilo.css" />

</head>
<body> 
    <form action="code/pagina8.html" method="POST">

    <h1>Orden compra<h1>
        <table alihg="center" cellpadding="10">
            <tr>
            <label for="cod_ord" class="form_reg">Codigo Orden</label>
            <input type="text" id="cod_ord" name="cod_ord" maxlength="100" placeholder="Codigo Orden">
            </tr>
                    
            <tr>
            <label for="nom_prod" class="form_reg">Nombre Producto</label>
            <input type="text" id="nom_prod" name="nom_prod" maxlength="100" placeholder="nombre producto">
            </tr>
          
            <tr>
            <label form="fec_emis" class="form_reg">Fecha Emision</label>
            <input type="text" id="fec_emis" name="fec_emis"maxlength="100" placeholder="dia, mes, año">
            </tr>        
                  
            <tr>
            <label form="cant" class="form_reg">Cantidad</label>
            <input type="text"  id="cant" name="cant" maxlength="100" placeholder="cantidad">
            </tr>

            <tr>
            <label for="pre_unit" class="form_reg">Precio Unitario</label>
            <input type="text" id="pre_unit" name="pre_unit" maxlength="100" placeholder="Precio Unitario">       
            </tr>
            
            <tr>
            <label form="tot_ord" class="form_reg">Total Orden</label>
            <input type="text"  id="tot_ord" name="tot_ord" maxlength="100" placeholder="valor total"> 
            </tr>

            <tr>
                <label form="cod_prov" class="form_reg">Codigo proveedor</label>
                <input type="text"  id="cod_prov" name="cod_prov" maxlength="100" placeholder="codigo proveedor"> 
                </tr>
     
            <input type="submit" value="enviar">
    
        </form>
                  
    </body>
          
          
                              
          
    </header>               