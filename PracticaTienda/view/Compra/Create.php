<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Compra</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <a id=atrasCrear1 href="?controller=Compra&function=index">Atrás</a><br>
    <form method="post" action="?controller=Compra&function=save">
        <!--VISTA DEL CREATE DE CLIENTE CON ESTE FORMULARIO RECOJO LOS DATOS DEL FORMULARIO
        USO EL METODO POST Y FUNCION SAVE -->
        <label for="cliente_dni">Cliente</label>
        <input type="text" id="cliente_dni" name="cliente_dni" /><br />

        <label for="juego_id">Juego</label>
        <input type="text" id="juego_id" name="juego_id" /><br />

        <label for="precio">Precio</label>
        <input type="text" id="precio" name="precio" /><br />

        <label for="cantidad">Cantidad</label>
        <input type="text" id="cantidad" name="cantidad" /><br />

        <label for="fecha">Fecha</label>
        <input type=" text" id="fecha" name="fecha" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>

</body>

</html>