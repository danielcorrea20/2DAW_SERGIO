/**
 * En vuelos.js empaqueto todas las rutas referentes a vuelos.
 */

const express = require('express');
const router = express.Router();

/**
 * Conexión con la BD de mysql
 */

const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'localhost',
    port: 3306,
    user: 'root',
    password: '',
    database: 't2p2'
});
connection.connect();

/**
 * uso path para poder saltar en las rutas por medio de join.(linea29...)
 */


const path = require('path');

////////////RUTAS DE VISTAS/////////////
 
/**
 * URL que me llevará a la vista INDEX.
 */
router.get('/index', function (req, res) {

    let dir = path.join(__dirname, '..', 'public', 'views', 'vuelos', 'index.html');

    res.sendFile(dir, (error) => {
        if (error) {
            console.log('ERROR EN LA UBICACION');
            res.status(error.status);
        } else {
            console.log('Encontrado correctamente');
        }
    });

});
/**
 * URL que me llevará a la vista SHOW.
 */
router.get('/show/:id', function (req, res) {
    let dir = path.join(__dirname, '..', 'public', 'views', 'vuelos', 'show.html');
  

    res.sendFile(dir, (error) => {
        if (error) {
            console.log('ERROR EN LA UBICACION');
            res.status(error.status);
        } else {
            console.log('Encontrado correctamente');
        }
    });
});

/**
 * URL que me llevará a la vista para crear un nuevo vuelo.
 */
router.get('/create', function (req, res) {
    let dir = path.join(__dirname, '..', 'public', 'views', 'vuelos', 'create.html');

    res.sendFile(dir, (error) => {
        if (error) {
            res.status(404);
        } else {
            console.log("Encontrado correctamente");
        }
    })
});
/**
 * URL que me llevará a la vista para editar el vuelo correspondiente a su id.
 */
router.get('/edit/:id', function (req, res) {

    let dir = path.join(__dirname, '..', 'public', 'views', 'vuelos', 'editar.html');
    

    res.sendFile(dir, (error) => {
        if (error) {
            console.log('ERROR EN LA UBICACION');
            res.status(error.status);
        } else {
            console.log('Encontrado correctamente');
        }
    });
});


////////////RUTAS DE DATOS/////////////

/**
 * ruta que me devuelve los datos de TODOS los vuelos
 */
router.get('/GetAll', function (req, res) {

    let query = "SELECT * FROM vuelos";

    /**
     * HAGO LA CONEXIÓN CON LA BD Y EJECUTO LA QUERY
     */
 
    connection.query(query, (error, results, fields) => {
        if (error) {
            res.status(500).send("Error en la query");
        }
        /**
         * expecifico que la respuesta será un json
         */
        res.json(results);
    })


});

/**
 * ruta que me devuelve los datos de UN ÚNIDO vuelo. El que corresponde por su ID.
 * REQ son los datos que la función requiere para poder realizarse, en este caso el ID
 */
router.get('/get/:id', function (req, res) {
    /**
     * Recogemos el id como parametro recibido en la peticion. Es algo asi como el GET_ID
     */
    let id = req.params.id;
    /**
    * Siempre que sea un valor dinámico uso la ?
    */
    let query = "SELECT * FROM vuelos WHERE id = ?";

  

    connection.query(query, [id], function (error, results, fiels) {

        if (error) {

            res.status(500).send('Error: ' + error.message);
        }
        /**
         *  Si el valor de respuesta es indefinido, la consulta no tiene resultado pero es correcta
            Si el resulta no esta definido(esta vacio), la respuesta será de OK
         */
        if (results == 'undefined') {
            res.status(200).send('No hay datos');
        }
        else {
            res.json(results);
        }
    });
    
});

/**
 * ruta que me elimina los datos de UN ÚNIDO vuelo. El que corresponde por su ID
 * Requiere el id para ser eliminado
 */
router.delete(`/delete/:id`, (req, res) => {

    let id = req.params.id;

    let query = "DELETE FROM vuelos WHERE id = ?";
 
    connection.query(query, [id], function (error, results, fiels) {
        if (error) {
            res.status(500).send('Error: ' + error.message);
        }
        res.status(200).send("Eliminado correctamente");
    });
   
});

/**
 * ruta que me añade un nuevo vuelo a al BD
 */
router.post('/save', (req, res) => {

    /**
     * La query tendrá tantas ? como datos deba introducir
     */
    let query = "INSERT INTO vuelos (numero_vuelo, aerolinea, origen, destino, fecha_salida, fecha_llegada) VALUES (?, ?, ?, ?, ?, ?);";
    /**
     * req.body es el objeto que recivo desde la vista create. En él están rodos los requisitos que necesita la función.
     * Datos para crear un nuevo vuelo.
     */

    connection.query(query, [req.body.numero_vuelo, req.body.aerolinea, req.body.origen, req.body.destino, req.body.fecha_salida, req.body.fecha_llegada], function (error) {
        if (error) {
            res.status(500).send("Error al crear el vuelo");
        }
    });

    res.redirect('/vuelos/index');
  
});

/**
 * Uso la función put para realizar un editado.
 * esta url me envia los datos a la bd para realizar el update
*/
router.put('/update/:id', (req, res) => {
    /**
     *  Recojo el id de la url
     */
    let id = req.params.id;

    let query = "UPDATE vuelos SET numero_vuelo = ?, aerolinea = ?, origen = ?, destino = ?, fecha_salida = ?, fecha_llegada = ? WHERE id = ?";

    /**
     * Uso un .query como en todas las demás acciones
     */
   
    connection.query(query, [req.body.numero_vuelo, req.body.aerolinea, req.body.origen, req.body.destino, req.body.fecha_salida, req.body.fecha_llegada, id], function (error, results, fields) {
        if (error) {
            res.status(500).send('Error: ' + error.message);
        } else {
            /**
             *  Proviene de la vista editar(línea 90) para poder redireccionar a index 
             */
            res.json({ estado: true });
        }

    });
    
})
//Debo exportar el modulo para seguidamente importarlo en app.js (el servidor)
module.exports = router;