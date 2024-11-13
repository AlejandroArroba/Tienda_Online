<?php
    session_start();
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista de Productos</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="../resources/style.css">
    </head>
    <body>
    <div class="header">
        <a href="index.php" class="house-icon"><i class="fa-solid fa-house"></i></a>
        Buscar Producto
        <a href="compra.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>
        <p class="usuario">¡¡Hola, <?= $_SESSION["nombreUsuario"] ?>!!</p>

        <form action="../controlador/ControladorSignOut.php">
            <button type="submit" class="salida"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
        </form>
    </div>
    <form action="../controlador/ControladorBuscar.php" method="post">
        <label for="id">ID del producto a buscar:</label>
        <input type="number" name="id" id="id">
        <input type="submit" value="Buscar">
    </form>
    <?php
        require_once "../modelo/ProductoDTO.php";
        if (isset($_SESSION["errorId"])) {
            echo "<span class='error'>Por favor, introduzca un id</span>";
            unset($_SESSION["errorId"]);
        }
        if (isset($_SESSION["producto"])) {
            $producto = unserialize($_SESSION["producto"]);
            if ($producto == null) {
                echo "<span class='error'>Producto no encontrado</span>";
            } else {

        ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
                <tr>
                    <td><?= $producto->getNombre() ?></td>
                    <td><?= $producto->getDescripcion() ?></td>
                    <td><?= $producto->getPrecio() ?></td>
                </tr>
        </table>
        <?php }
            unset($_SESSION["producto"]);
        }
        ?>
    </body>
</html>
