<!DOCTYPE html>
<html>
<head>
  <title>Página web</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
    <!-- Contenido de la página -->
    <h1>HOLA SOY ADMIN</h1>
    <p>AQUI VIENE UNA TABLA CON LOS PRODUCTOS Y LAS OPCIONES PARA HACER UN CRUD</p>
    <p>PIENSA EN EL DISEÑO ALGO MAS SENCILLO</p>
  </main>
</body>
</html>