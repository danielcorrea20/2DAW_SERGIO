<?php 
require_once 'Controller.php';

class userController implements controller {

    # Funcion abstracta index que muestra todos los elementos (tabla)
    public static function index(){
        $user = new User();
        $usuarios = $user->findAll()->fetchAll();
  
        require 'view/usuario/index.php';
    }

    public static function create(){}

    # Funcion abstracta save que9 inserta en la BD los elementos recogidos del formulario
    public static function save(){}
    # Funcion abstracta edit que recibe un $id de un elemento y muestra un formulario con su datos
    public static function edit($id){}

    # Funcion abstracta update que recibe un $id de un elemento y actualiza su contenido
    public static function update($id){}

    # Function abstracta destroy que recibe un $id de un elemento y lo elimina de la BD
    public static function destroy($id){}

}
?>