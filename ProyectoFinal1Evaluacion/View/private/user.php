<!DOCTYPE html>
<html>

<head>
  <title>Página web</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://kit.fontawesome.com/e1ac92fa66.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="aseet/css/style.css">
  <link rel="stylesheet" type="text/css" href="aseet/css/auth.css">
  <link rel="stylesheet" href="asset/CSS/private.css">
  <link rel="stylesheet" href="asset/css/admin.css">
  <link rel="stylesheet" href="asset/css/formulariosadmin.css">
  <link rel="stylesheet" href="asset/css/user.css">

</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar-brand">
      </div>
      <div class="user-profile">
        <img src="asset/img/fotoPerfil" alt="Foto de perfil" class="logoPerfil" id="dropdownMenuLink">
        <a href="#" class="nombre" id="bt1">
          <?php echo $_SESSION['user']['email'] ?> <i class="fas fa-caret-down"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a id=bt1 class="perfil" href="#"><i class="fas fa-user"></i> Ver perfil</a>
          <a id=bt1 class="ajustes" href="#"><i class="fas fa-cog"></i> Ajustes</a>
          <a id="bt1" class="dropdown-item" href="?controller=compra&function=index"><i class="fa-brands fa-shopify"></i> Carrito</a>
          <a id="bt1" class="dropdown-item" href="?controller=auth&function=logout"><i class="fas fa-sign-out-alt"></i>
            Cerrar sesión</a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <h1>Bienvenido usuario, ¿Listo para hacer tu compra?</h1>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Opciones</th>

        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($productos as $key => $value) {

          //RECORRO LOS DOS ARRAYS DE JUEGOS Y PINTO LOS DATOS FINALES EN UNA TABLA
          echo '<tr>';
          echo '<td>' . $value['nombre'] . '</td>';
          echo '<td>' . $value['descripcion'] . '</td>';
          echo '<td>' . $value['precio'] . '</td>';
          echo '<td>' . $value['stock'] . '</td>';
          echo '<td>
                    <a id=bt1 href="?controller=compra&function=saveCompra&id=' . $value['id'] . '">Comprar</a>
                    </td>';

          echo '</tr>';
        }
        ?>
      </tbody>

    </table>

  </main>
</body>

</html>