<?php
require_once 'db/Database.php';
class User {
    private $id;
    private $email;
    private $password;
    private $rol;

    public function __construct()
    {
        //code
    }

    public function getId(): int  | null
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getEmail(): string  | null
    {
        return $this->email;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function getPassword(): string  | null
    {
        return $this->password;
    }
    public function setPassword($password): void
    {
        $this->password = $password;
    }
    public function getRol(): int  | null
    {
        return $this->rol;
    }
    public function setRol($rol): void
    {
        $this->rol = $rol;
    }

    public function findAll(): PDOStatement
    {

        $db = Database::conectar();
        $query = "SELECT * FROM usuario";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function findEmail($email)
    {

        $db = Database::conectar();
        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $user = $db->query($query);
        $db = Database::desconectar();
        return $user;
    }
    public function findById($id)
    {
        $db = Database::conectar();
        $query = "SELECT * FROM usuario WHERE id = $id";
        $producto = $db->query($query);
        $db = Database::desconectar();
        return $producto;
    }

    public function store($datos)
    {
        $query = "INSERT INTO usuario (".implode(",",array_keys($datos)).",rol_id) VALUES
         ('".implode("','",array_values($datos))."',2)";

        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();
    }
    public function storeAdmin($datos)
    {

        $query = "INSERT INTO usuario (".implode(",",array_keys($datos)).") VALUES
         ('".implode("','",array_values($datos))."')";

        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();
    }
    public function update($id)
    {
        if (isset($_POST['email'])) {
            $email= $_POST['email'];
   
         }
         if (isset($_POST['rol_id'])) {
            $rol = $_POST['rol_id'];
   
        $db = Database::conectar();
        $query = "UPDATE usuario SET email= '$email', rol_id = '$rol'WHERE id= $id";
        $db->query($query);
        $db = Database::desconectar();

    }
}


    public function updateById($id)
    {

        $query ="UPDATE usuario SET";

       
  
        $datos = array(); 

        if($this->getEmail() != null){
            $datos['email'] = $this->getEmail();
        }
        if($this->getPassword() != null){
            $datos['password'] = $this->getPassword();
        }
        if($this->getRol() != null){
            $datos['rol_id'] = $this->getRol();
        }
        

        $keys = array_keys($datos);

        
        foreach ($datos as $key => $value) {
           
            if($key === end($keys)){
                $query = $query . " $key = '$value'";
                var_dump('ULTIMO CASO: '. $query);
            }else{
               
                $query = $query . " $key = '$value', ";
                var_dump('CASO NORMAL: '. $query);
            }
        }

        $query = $query." WHERE id = $id ";
        
        $db = Database::conectar();
        $resultado = $db->exec($query);

        if($resultado == 1){
            $_SESSION['mensaje'] = 'Actualizado correctamente';
        }else{
            $_SESSION['mensaje'] = 'Error al actualizar. MIRAR MODELO';
        }
        $db = Database::desconectar();
    

    }

    public function destroyById($id): void
    {
        //conectar BD
        $db = Database::conectar();

        $query = "DELETE FROM usuario WHERE id = $id";
        $db->exec($query);
 
        $db = Database::desconectar();

    }
}
?>