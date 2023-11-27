<?php
require_once 'Controller.php';
require_once 'Modelo/Compra.php';

class compraController implements Controller
{
    public static function save()
    {
        //code
    }
    public static function index()
    {
       
        $compra = new Compra();
        $compras = $compra->findbyUserId()->fetchAll();
        require 'view/compra/carrito.php';
      
    }
    public static function indexByUserId()
    {
        $compra = new Compra();
        $compras = $compra->findbyUserId()->fetch();
        require 'view/compra/carrito.php';
    }
    public static function create()
    {
        require 'view/compra/create.php';
    }
    public static function saveCompra($id)
    {
        $producto = new Producto();
        $result = $producto->findById($id)->fetch();

        //COMO RECOJO LOS DATOS DEL PRODUCTO. TENDRE QUE HACERLO CON EL ID IGUAL Q CON UN EDIT
        $datos = [];

        $datos['producto_id'] = $result['nombre'];
        $datos['precio'] = $result['precio'];
        $datos['user_id'] = $_SESSION['user']['id'];
        // var_dump($datos);
        //exit();

        $compra = new Compra();
        $compras = $compra->findAll()->fetchAll();
        $compra->store($datos);

        header('Location: ?controller=producto&function=indexUser');
    }

    public static function edit($id)
    {
        //cod.
    }
    public static function update($id)
    {
        //cod.
    }
    public static function destroy($id)
    {
        $compra = new Compra();
        $compra->destroyById($id);
        header('Location: ?controller=compra&function=index');
    }

    public static function destroyAll()
    {
        $compra = new Compra();
        $compra->destroyAll();
        header('Location: ?controller=compra&function=index');
    }

}

?>