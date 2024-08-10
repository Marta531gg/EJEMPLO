<?php

date_default_timezone_set("America/Bogota");
require_once('home.php');





$dato = isset($_GET['da']) ? $_GET['da'] : null;

     switch($dato){
     	
     	
     	//caso de almacen
        case 1:
            require_once('code/vistas/Almacen/create.php');
            break;

        case 2:
            require_once('code/vistas/Almacen/insertar.php');
            break;
            
            
        case 3:
            require_once('code/vistas/Almacen/editar.php');
            break;
            
          
        case 4:
            require_once('code/vistas/Almacen/borrar.php');
            break;
            

            
            
          //caso de productos
        case 1:
            require_once('code/vistas/productos/create.php');
            break;

        case 2:
            require_once('code/vistas/productos/insertar.php');
            break;
            
            
        case 3:
            require_once('code/vistas/productos/editar.php');
            break;
            
          
        case 4:
            require_once('code/vistas/productos/borrar.php');
            break;

            

            
            
            //caso de departamentos
        case 1:
            require_once('code/vistas/departamentos/create.php');
            break;

        case 2:
            require_once('code/vistas/departamentos/insertar.php');
            break;
            
            
        case 3:
            require_once('code/vistas/departamentos/editar.php');
            break;
            
          
        case 4:
            require_once('code/vistas/departamentos/borrar.php');
            break;

            
            }  
        
            
?>