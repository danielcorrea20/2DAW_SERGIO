<?php
require_once 'modelo/User.php';
class PerfilController
{

    public static function edit()
    {

        include 'view/perfil/edit.php';
        if (isset($_SESSION['mensaje'])) {
            unset($_SESSION['mensaje']);
        }
    }
    public static function editAdmin()
    {

        include 'view/perfil/editAdmin.php';
        if (isset($_SESSION['mensaje'])) {
            unset($_SESSION['mensaje']);
        }
    }

    public static function update()
    {

        if (password_verify($_POST['old-password'], $_SESSION['user']['password'])) {

            if ($_POST['new-password'] === $_POST['password-verify']) {


                $user = new User();
                $user->setPassword(password_hash($_POST['new-password'], PASSWORD_BCRYPT, ['cont' => 4]));
                $user->updateById($_SESSION['user']['id']);

            } else {
                $_SESSION['mensaje'] = 'Contraseña nueva NO coincide';
            }
        } else {
            $_SESSION['mensaje'] = 'Contraseña antigua NO coincide. NO PROBAMOS MAS';
        }

        header('Location: ?controller=perfil&function=edit');
    }

    public static function updateAdmin()
    {

        if (password_verify($_POST['old-password'], $_SESSION['user']['password'])) {

            if ($_POST['new-password'] === $_POST['password-verify']) {


                $user = new User();
                $user->setPassword(password_hash($_POST['new-password'], PASSWORD_BCRYPT, ['cont' => 4]));
                $user->updateById($_SESSION['user']['id']);

            } else {
                $_SESSION['mensaje'] = 'Contraseña nueva NO coincide';
            }
        } else {
            $_SESSION['mensaje'] = 'Contraseña antigua NO coincide. NO PROBAMOS MAS';
        }

        header('Location: ?controller=perfil&function=editAdmin');
    }

    public static function destroy()
    {

        if (isset($_SESSION['user'])) {
            $compra = new Compra();
            $user = new User();
            $compras = $compra->findbyUserId()->fetchAll();
            foreach ($compras as $key => $value) {
                //var_dump($compras[$key]['user_id']);
                //exit();
                $idUserCompra = $compras[$key]['user_id'];
            }

            $id = $_SESSION['user']['id'];
            $idCompra = $compras['user_id'];
            unset($_SESSION['user']);

            $user->setId($id);
            $user->destroyById($id);
            $compra->destroyByUser($idUserCompra);
            session_destroy();

        }
        header('Location: ?controller=auth&function=log');
    }
}

?>