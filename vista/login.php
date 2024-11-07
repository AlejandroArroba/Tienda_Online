<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>

<h1>Inicio de Sesión</h1>

<form action="../controlador/ControladorLogin.php" method="post">
    <label for="nickname">Nombre de Usuario:</label>
    <input type="text" id="nickname" name="nickname">
    <br><br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña">
    <br><br>

    <button type="submit" id="login" name="login">Iniciar Sesión</button>
    <br><br>

    <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
</form>

</body>
</html>
