<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Compra</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <a href="?controller=Compra&function=index">Atrás</a><br>
    <form method="post" action="?controller=Compra&function=update&id=<?php echo $id ?>">
        <!--VISTA DEL EDIT DE COMPRA CON ESTA CLASE RECOJO LOS DATOS DEL FORMULARIO
        USO EL METODO POST Y FUNCION UPDATE A LA QUE LE AÑADO EL ID
        USO LA VARIABLE COMPRA PARA PINTAR LOS DATOS EN EL FORMULARIO MANTENGO LOS IDENTIFICADORES-->
        <label for="cliente_dni">Cliente</label>
        <input value="<?php echo $compra['cliente_dni'] ?>" type="text" id="cliente_dni" name="cliente_dni" /><br />

        <label for="juego_id">Juego</label>
        <input value="<?php echo $compra['juego_id'] ?>" type="text" id="juego_id" name="juego_id" /><br />

        <label for="precio">Precio</label>
        <input value="<?php echo $compra['precio'] ?>" type="text" id="precio" name="precio" /><br />

        <label for="cantidad">Cantidad</label>
        <input value="<?php echo $compra['cantidad'] ?>" type="text" id="cantidad" name="cantidad" /><br />

        <label for="fecha">Fecha</label>
        <input value="<?php echo $compra['fecha'] ?>" type="text" id="fecha" name="fecha" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>

</body>

</html>