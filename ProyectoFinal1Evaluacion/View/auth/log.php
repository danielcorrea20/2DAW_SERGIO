<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index de usuario</title>
    <link rel="stylesheet" href="asset/css/EstiloLogin2.css">
    
</head>

<body>
    <div class="signupFrm ">
        <form method="post" action="?controller=auth&function=doLogin" class="form">
            <h1 class="title">Logeate</h1>

            <div class="inputContainer">
                <input type="text" class="input" placeholder="a" name="email">
                <label for="email" class="label">Email</label>
            </div>

            <div class="inputContainer">
                <input type="text" class="input" placeholder="a" name="password">
                <label for="password" class="label">Password</label>
            </div>

            <div style="display:inline">
                <input type="submit" class="submitBtn" value="Log">
                <a id=atrasCrear class="submitBtn" href="index.php">Atrás</a>
            </div>
        </form>
    </div>

</body>

</html>