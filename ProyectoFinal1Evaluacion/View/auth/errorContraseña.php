<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea un usuario</title>
    <link rel="stylesheet" href="asset/css/EstiloLogin.css">
</head>

<body>
    <div class="signupFrm ">
        <form method="post" action="?controller=auth&function=doRegister" class="form">
            <h1 class="title">Crea un usuario</h1>

            <div class="inputContainer">
                <input type="text" class="input" placeholder="a" name="email">
                <label for="Email" class="label">Email</label>
            </div>

            <div class="inputContainer">
                <input type="text" class="input" placeholder="a" name="password">
                <label for="password" class="label">Password</label>
            </div>

            
            <div class="inputContainer">
                <input type="text" class="input" placeholder="a" name="contrasena-verify">
                <label for="contrasena-verify" class="label">Confirmar Password</label>
            </div>
            <br>
            <p>Las contraseñas no coinciden</p>

            <input type="submit" class="submitBtn" value="Guarda/Log">
            <!-- <a id=atrasCrear href="index.php">Atrás</a> -->
        </form>
        
    </div>

</body>

</html>