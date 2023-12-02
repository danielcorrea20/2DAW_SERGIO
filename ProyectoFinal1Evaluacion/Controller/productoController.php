<?php
require_once 'Controller.php';
require_once 'Modelo/Producto.php';

class productoController 
{   # Funcion abstracta index que muestra todos los elementos (tabla)

   public static function index()
   {
      //code
   }
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
      if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
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
         $producto = new Producto();
         $productos = $producto->findAll()->fetchAll();
         $producto->store($datos);
         header('Location: ?controller=producto&function=indexAdmin');
      } else if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
         //alarm no tienes permisos
         header('Location: ?controller=user&function=index');
      } else {
         //alarm no tienes permisos
         header('Location: ?controller=auth&function=doLogin');
      }

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
      if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
         $producto = new Producto();
         $producto->updateById($id);
         $productos = $producto->findAll()->fetchAll();

         header('Location: ?controller=producto&function=indexAdmin');
      } else if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
         //alarm no tienes permisos
         header('Location: ?controller=user&function=index');
      } else {
         //alarm no tienes permisos
         header('Location: ?controller=auth&function=doLogin');
      }

   }

   # Function abstracta destroy que recibe un $id de un elemento y lo elimina de la BD
  
   public static function destroyById($id)
   {
     
      if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
         $producto = new Producto();
         $producto->destroyById($id);
         header('Location: ?controller=producto&function=indexAdmin');
      } else if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
         //alarm no tienes permisos
         header('Location: ?controller=user&function=index');
      } else {
         //alarm no tienes permisos
         header('Location: ?controller=auth&function=doLogin');
      }

   }

}

?>