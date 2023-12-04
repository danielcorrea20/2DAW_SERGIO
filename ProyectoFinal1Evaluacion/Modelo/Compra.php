
<?php
class Compra
{

    private $id;
    private $producto_id;
    private $precio;
    private $cantidad;

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

    public function getProducto_id(): int
    {
        return $this->producto_id;
    }
    public function setProducto_id($producto_id): void
    {
        $this->producto_id = $producto_id;
    }
    public function getPrecio(): int
    {
        return $this->precio;
    }
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }
    public function getCantidad(): int
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
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
        $query = "SELECT * FROM compras";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
    public function findbyUserId(): PDOStatement
    {
        $user_id = $_SESSION['user']['id'];
        $db = Database::conectar();
        $query = "SELECT * FROM compras WHERE user_id = $user_id";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
    public function store($datos)
    {
        $db = Database::conectar();
        $query = "INSERT INTO compras (" . implode(",", array_keys($datos)) . ") VALUES ('" . implode("','", array_values($datos)) . "')";
        $db->query($query);
        $db = Database::desconectar();

    }
    public function destroyById($id): void
    {
        //conectar BD
        $db = Database::conectar();
        //RELAIZA LA QUERY
        $query = "DELETE FROM compras WHERE id = $id";
        $db->exec($query);
        //DESCONECTAR DB
        $db = Database::desconectar();

    }
    public function destroyAll(): void
    {
        //conectar BD
        $db = Database::conectar();
        //RELAIZA LA QUERY
        $query = "DELETE FROM compras";
        $db->exec($query);
        //DESCONECTAR DB
     
        $db = Database::desconectar();

    }

    public function destroyByUser($id): void
    {
        //conectar BD
        $db = Database::conectar();
        //RELAIZA LA QUERY
        $query = "DELETE FROM compras WHERE user_id = $id";
        $db->exec($query);
        //DESCONECTAR DB
     
        $db = Database::desconectar();

    }

}
?>