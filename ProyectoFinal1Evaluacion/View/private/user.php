<!DOCTYPE html>
<html>
<head>
  <title>Página web</title>
  <link rel="stylesheet" type="text/css" href="aseet/css/style.css">
  <link rel="stylesheet" type="text/css" href="aseet/css/auth.css">
  <link rel="stylesheet" href="asset/CSS/private.css">
 
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="navbar-brand">
        <a href="#">Logo</a>
      </div>
      <div class="user-profile">
        <img src="asset/img/fotoPerfil" alt="Foto de perfil" class="profile-pic" id="dropdownMenuLink">
        <a href="#" class="username" id="dropdownMenuLink"><?php echo $_SESSION['user']['email']?> <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Ver perfil</a>
          <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Ajustes</a>
          <a class="dropdown-item" href="?controller=auth&function=logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        </div>
      </div>
    </nav>
  </header>
  
  <main>
  <h1>Bienvenido usuario, ¿Listo para hacer tu compra?</h1>
    <table>
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
                    <a id=bt1 href="">Comprar</a>
                    </td>';
       
                    echo '</tr>';
                }
                ?>
            </tbody>

        </table>
    
  </main>
</body>
</html>