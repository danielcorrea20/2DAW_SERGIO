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
        /**
         * 1. Me conecto a la base de datos.
         * 2. Realizo la query
         * 3. Me desconecto de la base de datos.
         * 4. Devuelvo la query
         */
        $db = Database::conectar();
        $query = "SELECT * FROM usuario";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function findEmail($email)
    {
        /**
         * 1. Me conecto a la base de datos.
         * 2. Realizo la query
         * 3. Me desconecto de la base de datos.
         * 4. Devuelvo la query
         */
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
        //var_dump($query);
        //exit();
        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();
    }
    public function storeAdmin($datos)
    {

        $query = "INSERT INTO usuario (".implode(",",array_keys($datos)).") VALUES
         ('".implode("','",array_values($datos))."')";
        //var_dump($query);
        //exit();
        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();
    }
    public function updateById($id)
    {
        /**
         * 1. Conectar a la base de datos.
         * 2. Construir la query para actualizar datos
         * 3. Ejecutar la query
         * 4. Desconectar de la base de datos
         */
        $query ="UPDATE usuario SET";
        /**
         * Comprobamos valores getXX de id, email, password, rol_id
         * Si hay contenido, concateno.
         * Si no hay contenido, no hago nada
         */
       
        # $datos contiene un array con todos los datos existentes para actualizar
        $datos = array(); 
        // $datos['email'] = 'hola';
        // $datos['rol_id'] = 2;
        if($this->getEmail() != null){
            $datos['email'] = $this->getEmail();
        }
        if($this->getPassword() != null){
            $datos['password'] = $this->getPassword();
        }
        if($this->getRol() != null){
            $datos['rol_id'] = $this->getRol();
        }
        
        # Recorrer los elementos de $datos
        $keys = array_keys($datos);
        // var_dump($datos);
        // var_dump($keys);
        
        foreach ($datos as $key => $value) {
            # estoy en el ultimo caso. NO PONGO COMA AL FINAL
            if($key === end($keys)){
                $query = $query . " $key = '$value'";
                var_dump('ULTIMO CASO: '. $query);
            }else{
                # Estoy en un caso normal. PONGO COMA AL FINAL
                $query = $query . " $key = '$value', ";
                var_dump('CASO NORMAL: '. $query);
            }
        }
        // var_dump('CASO FINAL: '. $query);
        // exit();
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
        //RELAIZA LA QUERY
        $query = "DELETE FROM usuario WHERE id = $id";
        $db->exec($query);
        //DESCONECTAR DB
        $db = Database::desconectar();

    }
}
?>