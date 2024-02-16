const express = require('express');
const app = express();
/**
 * Identifico que en la carpeta public tendré los documentos estáticos
 */
app.use(express.static('Public'));
/**
 * Uso del módulo body-parse. Necesario para que funcione el edit
 */
const bodyParser = require('body-parser');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
/**
 * Importo el archivo vouelos, donde se encuentran todas las rutas
 */
const vuelos = require('./routes/vuelos');
/**
 * uso las rutas de vuelos desde la raiz /vuelos
 */

app.use('/vuelos', vuelos);

const port = 3000;
app.listen(port, () => {
    console.log(`Enlace para ejecutar la aplicacion: http://localhost:${port}`);
});
