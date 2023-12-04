<?php
require_once 'Controller.php';
require_once 'Modelo/User.php';

class userController implements controller
{

    # Funcion abstracta index que muestra todos los elementos (tabla)
    public static function index()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
            $user = new User();
            $usuarios = $user->findAll()->fetchAll();
        } else if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
            //alarm no tienes permisos
            header('Location: ?controller=user&function=index');
        } else {
            //alarm no tienes permisos
            header('Location: ?controller=auth&function=doLogin');
        }
        require 'view/usuario/index.php';
    }

    public static function create()
    {
        require 'view/usuario/create.php';
    }

    # Funcion abstracta save que9 inserta en la BD los elementos recogidos del formulario
    public static function save()
    {

        if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
            $datos = [];
            if (isset($_POST['email'])) {
                $datos['email'] = $_POST['email'];

            }
            if (isset($_POST['password'])) {
                $datos['password'] = $_POST['password'];

            }
            if (isset($_POST['rol_id'])) {
                $datos['rol_id'] = $_POST['rol_id'];

            }
       
       
            $user = new User();
            $usuarios = $user->findAll()->fetchAll();
            $user->storeAdmin($datos);
            header('Location: ?controller=user&function=index');

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
        $user = new User();
        $result = $user->findById($id)->fetch();
  
        require 'view/usuario/edit.php';

    }
    # Funcion abstracta update que recibe un $id de un elemento y actualiza su contenido
    public static function update($id)
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
            $user = new User();
            $user->update($id);
            $users = $user->findAll()->fetchAll();
            header('Location: ?controller=user&function=index');

         }else if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
            //alarm no tienes permisos
            header('Location: ?controller=user&function=index');
        } else {
            //alarm no tienes permisos
            header('Location: ?controller=auth&function=doLogin');
        }

    }

    # Function abstracta destroy que recibe un $id de un elemento y lo elimina de la BD
    public static function destroy($id)
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
            $user = new User();
            $compra = new Compra();
            $user->destroyById($id);
            $compra->destroyById($id);

            header('Location: ?controller=user&function=index');
         }else if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] == 1) {
            //alarm no tienes permisos
            header('Location: ?controller=user&function=index');
        } else {
            //alarm no tienes permisos
            header('Location: ?controller=auth&function=doLogin');
        }


        
    }

}
?>