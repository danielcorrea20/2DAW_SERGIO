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
        <h1>Juegos</h1>
    </header>
    <main>
        <div id=btJuegos>
            <a id=btjuegos class="btn" href="?controller=Juego&function=filter&tipo=Accion">Acción</a>
            <a id=btjuegos class="btn" href="?controller=Juego&function=filter&tipo=Aventura">Aventuras</a>
            <a id=btjuegos class="btn" href="?controller=Juego&function=filter&tipo=Deportes">Deportes</a>
            <a id=btjuegos class="btn" href="?controller=Juego&function=index">Todos</a>
            <a id=btjuegos class="btn" href="?controller=Juego&function=filterPrecio&precio=caro">Más de 50€</a>
            <a id=btjuegos class="btn" href="?controller=Juego&function=filterPrecio&precio=barato">Menos de 50€</a>
            <a id=atrasCrear class="btn" href="index.php">Atrás</a><br>
            <a id=btcrear class="btn" id=crear href="?controller=Juego&function=Create">Crear Juego</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Estilo</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($juegos as $key => $tipo) {
                     
                    foreach ($tipo as $id => $value) {
                        
                        //RECORRO LOS DOS ARRAYS DE JUEGOS Y PINTO LOS DATOS FINALES EN UNA TABLA
                        echo '<tr>';
                        echo '<td>' . $key . '</td>';
                        echo '<td>' . $value['id'] . '</td>';
                        echo '<td>' . $value['nombre'] . '</td>';
                        echo '<td>' . $value['descripcion'] . '</td>';
                        echo '<td>' . $value['stock'] . '</td>';
                        echo '<td>' . $value['precio'] . '</td>';
                        echo '<td>
                                <a id=bt1 href="?controller=Juego&function=destroy&id=' . $value['id'] . '">BORRAR</a>
                                <a id=bt1 href="?controller=Juego&function=edit&id=' . $value['id'] . '&tipo=' . $key . '">Editar</a>
                                 </td>';
                        echo '</tr>';
                    }
                    //ENLACE BORRAR ME ACTIVA LA FUNCION DESTROY. AÑADO EL ID COMO UNA VARIABLE
                    //ENLACE EDITAR ME CONDUCE A LA VISTA EDIT CON LOS DATOS PINTADOS EN EL FORM
                   
                 
                }
                ?>
            </tbody>

        </table>
    </main>
</body>

</html>