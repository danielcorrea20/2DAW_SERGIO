<?php
class Producto{

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;


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

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio(): int
    {
        return $this->precio;
    }

    public function setEdad($precio): void
    {
        $this->precio = $precio;
    }
    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock($stock): void
    {
        $this->stock = $stock;
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
        $query = "SELECT * FROM producto";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
   
    public function findById($id)
    {
        $db = Database::conectar();
        $query = "SELECT * FROM producto WHERE id = $id";
        $producto = $db->query($query);
        $db = Database::desconectar();
        return $producto;
    }

    public function store($datos)
    {
        $db = Database::conectar();
        $query = "INSERT INTO producto (".implode(",",array_keys($datos)).") VALUES ('".implode("','",array_values($datos))."')";
        $db->query($query);
        $db = Database::desconectar();

    }

    public function updateById($id)
    {
        if (isset($_POST['Nombre'])) {
            $nombre= $_POST['Nombre'];
   
         }
         if (isset($_POST['descripcion'])) {
            $descripcion = $_POST['descripcion'];
   
         }
         if (isset($_POST['precio'])) {
            $precio = $_POST['precio'];

         }
         if (isset($_POST['stock'])) {
            $stock = $_POST['stock'];

         }
        $db = Database::conectar();
        $query = "UPDATE producto SET nombre= '$nombre', descripcion= '$descripcion', precio= $precio, stock= $stock WHERE id= $id";
        $db->query($query);
        $db = Database::desconectar();

    }

    public function destroyById($id): void
    {
        //conectar BD
        $db = Database::conectar();
        //RELAIZA LA QUERY
        $query = "DELETE FROM producto WHERE id = $id";
        $db->exec($query);
        //DESCONECTAR DB
        $db = Database::desconectar();

    }
}
?>