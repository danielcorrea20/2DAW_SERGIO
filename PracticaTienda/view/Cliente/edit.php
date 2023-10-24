<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Coche</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <a href="?controller=Cliente&function=index">Atrás</a><br>
    <!--VISTA DEL EDIT DE CLIENTE CON ESTA CLASE RECOJO LOS DATOS DEL FORMULARIO
    USO EL METODO POST Y FUNCION UPDATE A LA QUE LE AÑADO EL ID
    USO LA VARIABLE CLIENTE PARA PINTAR LOS DATOS EN EL FORMULARIO -->
    <form method="post" action="?controller=Cliente&function=update&id=<?php echo $id ?>">
        <label for="Nombre">Nombre</label>
        <input value="<?php echo $cliente['nombre'] ?>" type="text" id="Nombre" name="Nombre" /><br />
        <label for="DNI">DNI</label>
        <input value="<?php echo $cliente['dni'] ?>" type="text" id="DNI" name="DNI" /><br />
        <label for="Telefono">Teléfono</label>
        <input value="<?php echo $cliente['telefono'] ?>" type="text" id="Telefono" name="Telefono" /><br />
        <label for="Correo">Correo</label>
        <input value="<?php echo $cliente['correo'] ?>" type="text" id="Correo" name="Correo" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>

</body>

</html>