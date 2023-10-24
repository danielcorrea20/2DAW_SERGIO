<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Juego</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <a href="?controller=Juego&function=index">Atrás</a><br>
    <form method="post" action="?controller=Juego&function=update&id=<?php echo $id ?>">
        <!-- puedo poner pointer en vez de un select o botones-->
        <select name="tipo">
            <option value="Accion">Acción</option>
            <option value="Aventura">Aventuras</option>
            <option value="Deportes">Deportes</option>
        </select><br>
        <!--CON VALUE MUESTRO LOS VALORES DEL JUEGO QUE QUIERO EDITAR -->
        <label for="Id">Id</label>
        <input value="<?php echo $juego['id'] ?>" type="text" id="Id" name="Id" /><br />

        <label for="Nombre">Nombre</label>
        <input value="<?php echo $juego['nombre'] ?>" type="text" id="Nombre" name="Nombre" /><br />

        <label for="descripcion">Descripción</label>
        <input value="<?php echo $juego['descripcion'] ?>" type="text" id="descripcion" name="descripcion" /><br />

        <label for="stock">Stock</label>
        <input value="<?php echo $juego['stock'] ?>" type="text" id="stock" name="stock" /><br />

        <label for="precio">Precio</label>
        <input value="<?php echo $juego['precio'] ?>" type="text" id="precio" name="precio" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>

</body>

</html>