<?php
    session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../resources/style.css">
</head>
<body>
    <div class="header">
        <a href="index.php" class="house-icon"><i class="fa-solid fa-house"></i></a>
        Añadir Producto
        <a href="compra.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>
        <p class="usuario"><?= $_SESSION["nombreUsuario"] ?></p>

        <form action="../controlador/ControladorSignOut.php">
            <button type="submit" class="salida"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
        </form>
    </div>
    <form action="../controlador/ControladorProducto.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">
        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio">
        <br>
        <button type="submit" name="accion" value="addProducto">Añadir</button>
    </form>
    <?php
    require_once "../modelo/ProductoDTO.php";
    if (isset($_SESSION['errorAnadir'])) {
        echo "<span class='error'> Por favor rellene todos los datos</span>";
        unset($_SESSION['errorAnadir']);
    }
    ?>
</body>
</html>
