<?php
require_once "Controller/authController.php";
require_once "Controller/productoController.php";
require_once "Controller/compraController.php";
require_once "Controller/userController.php";
require_once "Controller/perfilController.php";
//HE INTENTADO USAR AUTOLOAD PERO ME DA UN ERROR, ME REQUIERE CONTROLLER/DATABASE
require_once "autoload.php";
session_start();



$db = Database::conectar();
//Database::iniciarTablas($db);

if (isset($_GET['controller']) && $_GET['function']) {
    $controlador = $_GET['controller'];
    $controlador = $controlador . 'Controller';
    $funcion = $_GET['function'];
    //var_dump($controlador);
    //var_dump($funcion);

    if (class_exists($controlador)) {
        if (method_exists($controlador, $funcion)) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                call_user_func($controlador . '::' . $funcion, $id);
            }
            call_user_func($controlador . '::' . $funcion);
        } else {
            echo 'No existe la función';
        }

    } else {
        echo 'No existe el controlador';
    }
} else {
    include('view/index.php');
}

?>