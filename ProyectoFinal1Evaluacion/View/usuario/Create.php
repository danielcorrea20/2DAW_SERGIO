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
    <a id=atrasCrear1 href="?controller=user&function=index">Atrás</a><br>
    <!--VISTA DEL CREATE DE CLIENTE CON ESTE FORMULARIO RECOJO LOS DATOS DEL FORMULARIO
    USO EL METODO POST Y FUNCION SAVE -->
    <h1>Añade un nuevo usuario a la web</h1>
    <form method="post" action="?controller=user&function=save">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" /><br />

        <label for="password">Password</label>
        <input type="text" id="password" name="password" /><br />
        
        <label for="rol_id">Rol</label>
        <input type="text" id="rol_id" name="rol_id" /><br />
        <p>Rol 1 = Admninistrador</p>
        <p>Rol 2 = Usuario</p>
        <button id="enviar">Enviar</button>

    </form>

</body>

</html>