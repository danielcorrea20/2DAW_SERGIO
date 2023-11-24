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
        $delete = "
                DROP TABLE IF EXISTS usuario;
            ";

        $db->exec($delete);

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
                CREATE TABLE IF NOT EXISTS rol(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nombre TEXT
                )
        ";
        $db->exec($query);

        $query = "
                INSERT INTO rol (nombre) VALUES ('admin'),('usuario');
                ";
        $db->exec($query);

        $query = "
                INSERT INTO usuario (email,password,rol_id) VALUES ('daniel@gmail.com','$password',1);
                INSERT INTO usuario (email,password,rol_id) VALUES ('jaime@gmail.com','$password',2);
                
                ";
        $db->exec($query);
    }
}
?>