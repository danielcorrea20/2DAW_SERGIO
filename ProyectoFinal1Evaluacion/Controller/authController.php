<?php
require_once 'Controller.php';
require_once 'Modelo/User.php';

class authController
{
    public static function error()
    {
        include 'view/auth/errorContraseña.php';
    }
    public static function log()
    {
        include 'view/auth/log.php';
    }
    public static function register()
    {
        include 'view/auth/register.php';
    }
    public static function home()
    {
        if(isset($_SESSION['user'])&& $_SESSION['user']['rol_id']=2){
            header('Location:?controller=producto&function=indexUser');
        }else if(!isset($_SESSION['user'])){
            header('Location:?controller=auth&function=log');
        }
        
    }
    public static function admin()
    {
        if(isset($_SESSION['user'])&& $_SESSION['user']['rol_id']=1){
            header('Location:?controller=producto&function=indexAdmin');
        }else if(!isset($_SESSION['user'])){
            header('Location:?controller=auth&function=log');
        }
    }
    
    public static function doLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();
        $user_log = $user->findEmail($email)->fetch();
        if (password_verify($password, $user_log['password'])) {
            $_SESSION['user'] = $user_log;
            switch ($user_log['rol_id']) {
                case 1:
                    header('Location: ?controller=auth&function=admin');
                    break;
                case 2:
                    header('Location: ?controller=auth&function=home');
                    break;
                default:
                    header('Location: ?controller=auth&function=log');
                    break;
            }

        } else {
            header('Location: ?controller=auth&function=log');

        }


    }
    public static function doRegister()
    {
        if ($_POST['password'] === $_POST['contrasena-verify']) {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cont' => 4]);
            //var_dump($email);
            //var_dump($password);
            //exit();
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $datos = array(
                'email' => $email,
                'password' => $password
            );
            //var_dump($datos);
            //exit();
            $user->store($datos);
            header('Location: ?controller=auth&function=log');
        } else {

            header('Location: ?controller=auth&function=error');
            echo 'Las contraseñas no oinciden';
        }

    }
    public static function logout(){
        if(session_id()){
            session_destroy();
        }
        header('Location:?controller=auth&function=log');
    }

}


?>