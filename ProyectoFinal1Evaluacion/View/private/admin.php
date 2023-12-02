<!DOCTYPE html>
<html>

<head>
  <title>Página web</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link rel="stylesheet" href="asset/css/admin.css">
  <link rel="stylesheet" href="asset/css/formulariosadmin.css">
  <link rel="stylesheet" href="asset/css/botones.css">
</head>

<body>
  <header>
    <nav class="navbar">

      <div class="user-profile">
        <img src="asset/img/fotoPerfil" alt="Foto de perfil" class="logoPerfil" id="dropdownMenuLink">
        <a href="#" class="nombre" id=bt1><?php echo $_SESSION['user']['email'] ?> <i class="fas fa-caret-down"></i></a>
        <div class="menu" aria-labelledby="dropdownMenuLink">
          <a class="boton" href="?controller=perfil&function=editAdmin"><i class="fas fa-user"></i> Ver perfil</a>
          <a class="boton" href="#"><i class="fas fa-cog"></i> Ajustes</a>
          <a class="boton" href="?controller=auth&function=logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <!-- Contenido de la página -->
    <h1>Hola Administrador. Bienvenido</h1>
    <table>
      <a class="boton" href="?controller=producto&function=create">crear</a>
      <a class="boton" href="?controller=user&function=index">Usuarios</a>
      <thead>
        <tr>
          <th>Id</th>
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
          echo '<td>' . $value['id'] . '</td>';
          echo '<td>' . $value['nombre'] . '</td>';
          echo '<td>' . $value['descripcion'] . '</td>';
          echo '<td>' . $value['precio'] . '</td>';
          echo '<td>' . $value['stock'] . '</td>';
          echo '<td>
                    
                    <a class="boton" href="?controller=producto&function=destroyById&id=' . $value['id'] . '">BORRAR</a>
                    <a class="boton" href="?controller=producto&function=edit&id=' . $value['id'] . '">Editar</a>
                    </td>';

          echo '</tr>';
        }
        ?>
      </tbody>

    </table>
  </main>
</body>

</html>