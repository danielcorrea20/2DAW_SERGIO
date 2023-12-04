<?php

/**
 * Fichero datos.php sera utilizado unicamente con datos de prueba para el tratamiento de los datos.
 * No hay acceso a base de datos.
 */
class Database
{

    /**
     * Realiza la conexion a la base de datos
     */
    public static function conectar(): PDO
    {
        $db = new \PDO(
            'sqlite:db/db.sqlite',
            '',
            '',
            array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            )
        );
        self::iniciarTablas($db);
        return $db;

    }

    /**
     * Realiza la desconexion a la base de datos
     */
    public static function desconectar()
    {
        return null;
    }

    /**
     * Funcion de prueba para iniciar una tabla con contenido.
     */
    public static function iniciarTablas($db): void
    {
        $password = password_hash('1234', PASSWORD_BCRYPT, ['cont' => 4]);
        //$delete = "
        //      DROP TABLE IF EXISTS usuario;
        // ";

        //$db->exec($delete);

        $query = "
                CREATE TABLE IF NOT EXISTS usuario(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    email TEXT,
                    password TEXT,
                    rol_id INTEGER
                )
        ";
        $db->exec($query);

        $query = "
                CREATE TABLE IF NOT EXISTS producto(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nombre TEXT,
                    descripcion TEXT,
                    precio INTEGER,
                    stock INTEGER
                )
        ";
        $db->exec($query);

        $query = "
                    CREATE TABLE IF NOT EXISTS compras(
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        producto_id TEXT,
                        precio int,
                        user_id INTEGER
                        )
        ";
        $db->exec($query);

        $query = "
        CREATE TABLE IF NOT EXISTS rol(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT

        )
";
        $db->exec($query);



        //$query = "
        //INSERT INTO rol (nombre) VALUES ('admin'),('usuario');
        //";
        //$db->exec($query);

        //$query = "
        //INSERT INTO usuario (email,password,rol_id) VALUES ('daniel@gmail.com','$password',1);
        //INSERT INTO usuario (email,password,rol_id) VALUES ('jaime@gmail.com','$password',2);
        // INSERT INTO usuario (email,password,rol_id) VALUES ('luis@gmail.com','$password',2);
        //      INSERT INTO usuario (email,password,rol_id) VALUES ('antonio@gmail.com','$password',2);
        //    ";
        //$db->exec($query);


        //$query = "
        //INSERT INTO producto (nombre,descripcion,precio,stock) VALUES ('Pegaso','Figura del caballero Sheya',140,100);

        //INSERT INTO producto (nombre,descripcion,precio,stock) VALUES ('Cisne','Figura del caballero Yoga',120,50);

        //INSERT INTO producto (nombre,descripcion,precio,stock) VALUES ('Andromeda','Figura del caballero Shum',110,75);

        //INSERT INTO producto (nombre,descripcion,precio,stock) VALUES ('Dragón','Figura del caballero Shiryu',135,130);

        //";
        //$db->exec($query);



    }
}
?>