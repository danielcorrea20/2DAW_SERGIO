<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>

    <header>
        <h1>Compras</h1>
    </header>
    <main>
        <div id=btJuegos>
            <a id=atrasCrear href="index.php">Atrás</a><br>
            <!--ENLACE QUE ME DIRIJE A LA VISTA CREATE-->
            <a id=btcrear href="?controller=Compra&function=Create">Crear Compra</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Juego</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Beneficio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                
                    foreach ($auxList as $key => $tipo) {
                        //RECORRO LA LISTA AUXILIAR DONDE TENGO LOS VALORES DEL NOMBRE DEL CLIENTE Y EL DEL JUEGO
                        echo '<tr>';
                        echo '<td>' . $tipo['nombre'] . '</td>';
                        echo '<td>' . $tipo['juego'] . '</td>';
                        echo '<td>' . $tipo['precio'] . '</td>';
                        echo '<td>' . $tipo['cantidad'] . '</td>';
                        echo '<td>' . $tipo['fecha'] . '</td>';
                        echo '<td>' . $tipo['precio']*$tipo['cantidad'] . '</td>';
                        echo '<td>
                                <a id=bt1 href="?controller=Compra&function=destroy&id=' . $key . '">BORRAR</a>
                                <a id=bt1  href="?controller=Compra&function=edit&id=' . $key . '">Editar</a>
                                 </td>';
                        echo '</tr>';
                    }
                    //ENLACE BORRAR ME ACTIVA LA FUNCION DESTROY. AÑADO EL ID COMO UNA VARIABLE
                    //ENLACE EDITAR ME CONDUCE A LA VISTA EDIT CON LOS DATOS PINTADOS EN EL FORM

                ?>
            </tbody>

        </table>
    </main>
</body>

</html>