<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index de usuario</title>
    <link rel="stylesheet" href="asset/css/usuario.css">
    
</head>
<header>
    <h1>Usuarios</h1>
</header>
<main>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Role</th>
                <th>Opciones</th>

            </tr>
        </thead>
        <tbody>

            <a href="?controller=producto&function=indexAdmin" class="bt1">Atrás</a><br>
            <a href="?controller=user&function=create" class="bt1">Crear</a><br>


            <?php
            foreach ($usuarios as $key => $value) {
                //RECORRO LOS DOS ARRAYS DE JUEGOS Y PINTO LOS DATOS FINALES EN UNA TABLA
                echo '<tr>';
                echo '<td>' . $value['id'] . '</td>';
                echo '<td>' . $value['email'] . '</td>';
                echo '<td>' . $value['rol_id'] . '</td>';
                echo '<td>
                <a class="bt1" href="?controller=user&function=destroy&id=' . $value['id'] . '">BORRAR</a>
                <a class="bt1" href="?controller=user&function=edit&id=' . $value['id'] . '">Editar</a>
                </td>';
                echo '</tr>';
            }
            ?>
        </tbody>

    </table>
</main>
</body>

</html>