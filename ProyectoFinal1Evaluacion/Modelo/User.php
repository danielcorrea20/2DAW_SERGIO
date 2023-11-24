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

    public function getId(): int
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword($password): void
    {
        $this->password = $password;
    }
    public function getRol(): int
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
}
?>