<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index de usuario</title>
    <link rel="stylesheet" href="asset/css/admin.css">
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
                <th>Contraseña</th>
                <th>Role</th>

            </tr>
        </thead>
        <tbody>
            <a id=bt1 href="?controller=producto&function=indexAdmin">Atrás</a><br>
            <?php
            foreach ($usuarios as $key => $value) {
                //RECORRO LOS DOS ARRAYS DE JUEGOS Y PINTO LOS DATOS FINALES EN UNA TABLA
                echo '<tr>';
                echo '<td>' . $value['id'] . '</td>';
                echo '<td>' . $value['email'] . '</td>';
                echo '<td>' . $value['password'] . '</td>';
                echo '<td>' . $value['rol_id'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>

    </table>
</main>
</body>

</html>