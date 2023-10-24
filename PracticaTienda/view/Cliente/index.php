<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <header>
        <h1>Clientes</h1>
    </header>
    <main>
        <div id=btJuegos>
            <a id=atrasCrear href="index.php">Atrás</a><br>
            <!--ENLACE QUE ME DIRIJE A LA VISTA CREATE-->
            <a id=btcrear href="?controller=Cliente&function=Create">Crear Cliente</a>
        </div>
        <table>
            <caption>
                Clientes
                <!--BOTONES PARA ORDENAR LA LISTA EN ASCENDENTE O DESCENDENTE A LA URL AÑADO LA ORDEN ASC O DES -->
                <a id=bt1 class="btn" href="?controller=cliente&function=index&orden=asc">Asc</a>
                <a id=bt1 class="btn" href="?controller=cliente&function=index&orden=des">Desc</a>
            </caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //RECORRO CLIENTES Y PINTO LOS DATOS EN UNA TABLA
                foreach ($clientes as $id => $value) {
                    echo '<tr>';
                    echo '<td>' . $id . '</td>';
                    echo '<td>' . $value['nombre'] . '</td>';
                    echo '<td>' . $value['dni'] . '</td>';
                    echo '<td>' . $value['telefono'] . '</td>';
                    echo '<td>' . $value['correo'] . '</td>';
                    echo '<td>
                                    <a id=bt1 href="?controller=cliente&function=destroy&id=' . $id . '">BORRAR</a>
                                    <a id=bt1 href="?controller=cliente&function=edit&id=' . $id . '">Editar</a>
                                    </td>';
                    echo '</tr>';
                    //ENLACE BORRAR ME ACTIVA LA FUNCION DESTROY. AÑADO EL ID COMO UNA VARIABLE
                    //ENLACE EDITAR ME CONDUCE A LA VISTA EDIT CON LOS DATOS PINTADOS EN EL FORM
                }

                ?>
            </tbody>
        </table>
        <?php
        if (isset($error)) {
            echo '<h3>' . $error . '</h3>';
        }
        ?>
    </main>


</body>

</html>