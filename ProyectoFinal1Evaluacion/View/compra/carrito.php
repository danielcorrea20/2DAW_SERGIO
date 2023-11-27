<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="asset/css/carrito.css">
    <script src='asset/js/js.js'></script>
</head>

<body>
    <h1>Estás en tu carrito</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($compras as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value['producto_id'] . '</td>';
                echo '<td>' . $value['precio'] . ' €' . '</td>';
                echo '<td>
            <a class=bt1 href="?controller=compra&function=destroy&id=' . $value['id'] . '">BORRAR</a>
            </td>';
                echo '</tr>';
                $total = $total + $value['precio'];
            }
            echo '<tr>';
            echo '<td>' . '<strong>Total</strong> ' . '</td>';
            echo '<td>' . '<strong>' . $total . ' €' . '</td>';
            echo '<td>' . ' ' . '</td>';
            echo '</tr>';
            ?>
        </tbody>
    </table>
    <div class="botones">
        <a class="seguir" href="?controller=producto&function=indexUser">Seguir comprando</a><br>
        <a class="pagar" href="?controller=compra&function=destroyAll" onclick="pago()">Pagar</a>
    </div>

</body>

</html>