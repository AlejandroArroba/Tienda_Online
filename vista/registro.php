<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro</title>
        <link rel="stylesheet" href="../resources/css/stylesRegister.css">
    </head>
    <body>
        <div class="register">
            <h1>Registro</h1>
            <form action="../controlador/ControladorRegistro.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"><br>
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido"><br>
                <label for="nickname">Nombre de usuario:</label>
                <input type="text" id="nickname" name="nickname"><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password"><br>
                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono"><br>
                <label for="domicilio">Domicilio:</label>
                <input type="text" id="domicilio" name="domicilio"><br>
                <input type="submit" value="Registrarse">
            </form>
            <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
            <?php
                session_start();
                if (isset($_SESSION["errorRegistro"])) {
                    echo "<span class='error'>$_SESSION[errorRegistro]</span>";
                    unset($_SESSION["errorRegistro"]);
                }
            ?>
        </div>
    </body>
</html>
