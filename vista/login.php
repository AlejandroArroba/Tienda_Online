<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" href="../resources/css/style.css">
        <link rel="stylesheet" href="../resources/css/stylesLogin.css">
    </head>
    <body>
        <div class="login">
            <h1>Inicio de Sesión</h1>
            <form action="../controlador/ControladorLogin.php" method="post">
                <label for="nickname">Nombre de usuario:</label>
                <input type="text" id="nickname" name="nickname">
                <br><br>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password">
                <br><br>

                <input type="submit" id="login" name="login" value="Inicar Sesión">
                <br><br>

                <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
                <?php
                    session_start();
                    if (isset($_SESSION["errorLogin"])) {
                        echo "<p class='error'>$_SESSION[errorLogin]</p>";
                        unset($_SESSION["errorLogin"]);
                    }
                ?>
            </form>
        </div>
    </body>
</html>
