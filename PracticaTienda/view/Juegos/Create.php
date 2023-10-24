<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Juego</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <a id= atrasCrear1  href="?controller=Juego&function=index">Atrás</a><br>
    <form method="post" action="?controller=Juego&function=save">
        <!--USO UN SELECT PARA MOSTRAR LOS TRES TIPOS DE JUEGOS QUE HAY -->
        <select name="tipo">
            <option value="Accion">Acción</option>
            <option value="Aventura">Aventuras</option>
            <option value="Deportes">Deportes</option>
        </select><br>
        <label for="Id">Id</label>
        <input type="text" id="Id" name="Id" /><br />
        <label for="Nombre">Nombre</label>
        <input type="text" id="Nombre" name="Nombre" /><br />
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" /><br />
        <label for="stock">Stock</label>
        <input type="text" id="stock" name="stock" /><br />
        <label for="precio">Precio</label>
        <input type="text" id="precio" name="precio" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>

</body>

</html>