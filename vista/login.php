<!DOCTYPE html>
<html>
<body>
<h1>Inicio de Sesión</h1>
<form action="../Controlador/ControladorLogin.php">
    <label>Nombre de Usuario</label>
    <label for="nickname"></label><input type="text" id="nickname" name="nickname" required> <br>
    <label>Contraseña</label>
    <label for="contraseña"></label><input type="password" id="contraseña" name="contraseña" required><br><br>
    <button id="login" name="login">Iniciar Sesión</button><br><br>

    <label>¿No tienes cuenta? <a href="registro.php">Resgistrate aquí</a></label>
</form>
</body>
</html>