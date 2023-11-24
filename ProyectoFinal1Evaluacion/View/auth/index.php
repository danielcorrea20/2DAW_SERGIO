<header>
        <h1>Usuarios</h1>
    </header>
    <main>
        <table>
        <a href="?controller=users&function=create">crear</a>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Role</th>
                    <th>Opciones</th>

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($usuarios as $key => $value) {

                    //RECORRO LOS DOS ARRAYS DE JUEGOS Y PINTO LOS DATOS FINALES EN UNA TABLA
                    echo '<tr>';
                    echo '<td>' . $value['id'] . '</td>';
                    echo '<td>' . $value['email'] . '</td>';
                    echo '<td>' . $value['contrasena'] . '</td>';
                    echo '<td>' . $value['role'] . '</td>';
                    echo '<td>
                    <a id=bt1 href="?controller=login&function=destroy&id=' . $value['id'] . '">BORRAR</a>
                    <a id=bt1 href="?controller=login&function=edit&id=' . $value['id'] . '">Editar</a>
                    </td>';
       
                    echo '</tr>';
                }
                ?>
            </tbody>

        </table>
    </main>
</body>

</html>