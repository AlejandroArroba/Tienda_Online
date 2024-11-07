<?php
class ControladorLogin {
    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $db = "mi_tienda";
    private static $conn = null;

    public function __construct() {
        if (is_null(self::$conn)) {
            self::$conn = new mysqli(self::$host, self::$user, self::$password, self::$db);
            if (self::$conn->connect_error) {
                die("Error de conexión: " . self::$conn->connect_error);
            }
        }
    }

    public function validarFormulario() {
        $errores = [];
        $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
        $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty(trim($nickname))) {
                $errores['nickname'] = "El nombre de usuario es obligatorio.";
            }
            if (empty(trim($contraseña))) {
                $errores['contraseña'] = "La contraseña es obligatoria.";
            }

            if (!$errores) {
                if ($this->autenticarUsuario($nickname, $contraseña)) {
                    echo "<p style='color: green;'>Inicio de sesión exitoso. ¡Bienvenido!</p>";
                    return;
                } else {
                    $errores['general'] = "Nombre de usuario o contraseña incorrectos.";
                }
            }
        }

        $this->mostrarFormulario($errores, $nickname);
    }

    private function autenticarUsuario($nickname, $contraseña) {
        $stmt = self::$conn->prepare("SELECT * FROM cliente WHERE nickname = ? AND password = ?");
        $stmt->bind_param("ss", $nickname, $contraseña);
        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado->num_rows > 0;
    }

    private function mostrarFormulario($errores, $nickname) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Inicio de Sesión</title>
            <style>.error { color: red; }</style>
        </head>
        <body>
        <h1>Inicio de Sesión</h1>
        <form action="ControladorLogin.php" method="post">
            <label for="nickname">Nombre de Usuario:</label>
            <input type="text" id="nickname" name="nickname" value="<?php echo htmlspecialchars($nickname, ENT_QUOTES); ?>">
            <?php if (isset($errores['nickname'])): ?>
                <span class="error"><?php echo $errores['nickname']; ?></span>
            <?php endif; ?>
            <br><br>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            <?php if (isset($errores['contraseña'])): ?>
                <span class="error"><?php echo $errores['contraseña']; ?></span>
            <?php endif; ?>
            <br><br>

            <?php if (isset($errores['general'])): ?>
                <span class="error"><?php echo $errores['general']; ?></span>
            <?php endif; ?>
            <br><br>

            <button type="submit">Iniciar Sesión</button>
            <br><br>

            <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </form>
        </body>
        </html>
        <?php
    }
}

$controlador = new ControladorLogin();
$controlador->validarFormulario();
?>
