<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <a id=atrasCrear1 href="?controller=Cliente&function=index">Atrás</a><br>
    <!--VISTA DEL CREATE DE CLIENTE CON ESTE FORMULARIO RECOJO LOS DATOS DEL FORMULARIO
    USO EL METODO POST Y FUNCION SAVE -->
    <form method="post" action="?controller=Cliente&function=save">
        <label for="Nombre">Nombre</label>
        <input type="text" id="Nombre" name="Nombre" /><br />
        <label for="DNI">DNI</label>
        <input type="text" id="DNI" name="DNI" /><br />
        <label for="Telefono">Teléfono</label>
        <input type="text" id="Telefono" name="Telefono" /><br />
        <label for="Correo">Correo</label>
        <input type="text" id="Correo" name="Correo" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>

</body>

</html>