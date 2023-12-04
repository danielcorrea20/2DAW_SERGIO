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

    <h1>Edta el usuario.</h1>
    <form method="post" action="?controller=user&function=update&id=<?php echo $result['id'] ?>">
        <label for="Email">Email</label>
        <input value="<?php echo $result['email'] ?>" type="text" id="email" name="email" /><br />

        <label for="rol_id">Role</label>
        <input value="<?php echo $result['rol_id'] ?>" type="text" id="rol_id" name="rol_id" /><br />

        <p>Rol 1 = Admninistrador</p>
        <p>Rol 2 = Usuario</p>
        <button id="enviar">Enviar</button>

    </form>

</body>

</html>