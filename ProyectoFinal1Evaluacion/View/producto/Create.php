<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear User</title>
    <link rel="stylesheet" href="asset/css/admin.css">
    <link rel="stylesheet" href="asset/css/formulariosadmin.css">
</head>

<body>
    <a id=atrasCrear1 href="?controller=producto&function=indexAdmin">Atrás</a><br>
    <!--VISTA DEL CREATE DE CLIENTE CON ESTE FORMULARIO RECOJO LOS DATOS DEL FORMULARIO
    USO EL METODO POST Y FUNCION SAVE -->
    <h1>Añade un nuevo producto a la tienda</h1>
    <form method="post" action="?controller=producto&function=save">
        <label for="Nombre">Nombre</label>
        <input type="text" id="Nombre" name="Nombre" /><br />

        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" /><br />
        
        <label for="precio">Precio</label>
        <input type="text" id="precio" name="precio" /><br />

        <label for="stock">Stock</label>
        <input type="text" id="stock" name="stock" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>

</body>

</html>