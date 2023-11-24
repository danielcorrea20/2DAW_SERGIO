<?php
require_once 'Controller.php';
require_once 'Modelo/Producto.php';

class productoController implements Controller
{   # Funcion abstracta index que muestra todos los elementos (tabla)
    public static function indexAdmin()
    {
       $producto = new Producto();
       $productos = $producto->findAll()->fetchAll();
     
       require 'view/private/admin.php';
       
    }

    public static function indexUser()
    {
       $producto = new Producto();
       $productos = $producto->findAll()->fetchAll();
     
       require 'view/private/user.php';
    }
 
    # Funcion abstracta create que muestra un formulario para agregar un elemento
    public static function create()
    {
       require 'view/producto/create.php';
    }
 
    # Funcion abstracta save que inserta en la BD los elementos recogidos del formulario
    public static function save()
    {
 
       //comprobar y recoger datos
       //insertarlos en un array
       //enviar el array a modelo para que lo inserte en bd
       $datos = [];
       if (isset($_POST['Nombre'])) {
          $datos['nombre'] = $_POST['Nombre'];
 
       }
       if (isset($_POST['descripcion'])) {
          $datos['descripcion'] = $_POST['descripcion'];
 
       }
       if (isset($_POST['precio'])) {
          $datos['precio'] = $_POST['precio'];
 
       }
       if (isset($_POST['stock'])) {
        $datos['stock'] = $_POST['stock'];

     }
     // var_dump($datos);
      //exit();
      
       $producto = new Producto();
       $productos = $producto->findAll()->fetchAll();
       $producto->store($datos);
 
       header('Location: ?controller=producto&function=indexAdmin');
 
    }
 
    # Funcion abstracta edit que recibe un $id de un elemento y muestra un formulario con su datos
    public static function edit($id)
    {
       
       $producto = new Producto();
       $result = $producto->findById($id)->fetch();
 
       require 'view/producto/edit.php';
 
    }
 
    # Funcion abstracta update que recibe un $id de un elemento y actualiza su contenido
    public static function update($id)
    {
       $producto = new Producto();
       $producto -> updateById($id);
       $productos = $producto->findAll()->fetchAll();
     
       header('Location: ?controller=producto&function=indexAdmin');
    }
 
    # Function abstracta destroy que recibe un $id de un elemento y lo elimina de la BD
    public static function destroy($id)
    {
       /**
        * 1. Recoger el $id.
        * 2. Crear objeto User.
        * 3. Invocar la funcion destroyById llevandole el $id.
        * 4. Cambiar cabecera para ir al index
        */
       $producto = new Producto();
       $producto->destroyById($id);
       header('Location: ?controller=producto&function=indexAdmin');
    }

}

?>