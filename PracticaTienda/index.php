<?php
//INDEX PADRE DEL PROYECTO ESQUIEN LO MANEJA TODO
//PARA PODER HACERLO NECESITO TRAER TODOS LOS CONTROLADORES DEL PROYECTOS Y EN ESTE CASO LOS DATOS
require_once 'controller/ClienteController.php';
require_once 'controller/JuegoController.php';
require_once 'controller/CompraController.php';
require_once 'db/datos.php';

// CREO TRES VARIABLES GLOBALES PARA RECOJER LOS DATOS DE LA CLASE DATOS Y PODER USARLO EN CUALQUIER PARTE DEL PROYECTO
$GLOBALS['clientes']= $datos['Clientes'];
$GLOBALS['juegos']= $datos['Juegos'];
$GLOBALS['compras']= $datos['Compras'];

//COMPRUEBO QUE EN LA URL PARECE UN CONTROLADOR Y UNA FUNCION
if(isset($_GET['controller'])&& isset($_GET['function'])){
    //RECOJO EL VALOR DE CONTROLADOR DE LA URL
    $controller = $_GET['controller'];
    //CONCATENO LA PALABRA CONTROLLER
    $controller = $controller.'Controller';
    var_dump($controller);
    //RECOJO EL VALOR DE LA FUNCION
    $function = $_GET['function'];
    var_dump($function);
    
    //ALGUNAS FUNCIONES COMO LA EDITAR O LA DE BORRAR NECESITAN UN ID
    //COMPRUEBO QUE LA CLASE EXISTE
    if (class_exists($controller)){
        //COMPRUEBO QUE LA FUNCION EXISTE DENTRO DEL CONTROLADOR
        if(method_exists($controller,$function)){
            //SI EXISTE UN ID EN LA URL LO RECOJO Y LO GUARDO EN LA VARIABLE $ID
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                //LLAMO A LA FUNCION CON EL ID
                call_user_func($controller.'::'.$function,$id);
            }else{
                //LLAMO A LA FUNCION SIN EL ID
                call_user_func($controller.'::'.$function);
            }
            
        }else{
            echo 'ERROR: no existe la función que buscas.';
        }
    }else{
        include('view/error/404.php');
        echo 'ERROR: no existe la función que buscas.';
    }
}else{
    //RETORNO AL INDEX PRINCIPAL
    include('view/index.php');
}

?>