<?php
    session_start();
    require_once "../modelo/CompraDAO.php";
    require_once "../modelo/CompraDTO.php";
    require_once "../modelo/ProductoDAO.php";
    require_once "../modelo/ProductoDTO.php";
    $compraDAO = new CompraDAO();
    $productoDAO = new ProductoDAO();
    $compras = $compraDAO->getComprasByClienteId($_SESSION["idUsuario"]);
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Carrito de la Compra</title>
        <link rel="stylesheet" href="../resources/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body>
    <div class="header">
        <a href="index.php" class="house-icon"><i class="fa-solid fa-house"></i></a>
        Carrito de la compra
        <a href="compra.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    <table>
        <?php
            if (count($compras) == 0) {
                echo "<p>No hay productos en el carrito.</p>";
            } else {
        ?>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Añadido en</th>
            <th>Cantidad</th>
            <th colspan="2">Acciones</th>
        </tr>
        <?php
                foreach ($compras as $compra) {
                    $producto = $productoDAO->getProductoById($compra->getIdProducto());
        ?>
            <tr>
                <td><?= $producto->getNombre() ?></td>
                <td><?= $producto->getDescripcion() ?></td>
                <td><?= $producto->getPrecio() ?></td>
                <td><?= $compra->getFechaCompra() ?></td>
                <td><?= $compra->getCantidad() ?></td>
                <td>
                    <form action="../controlador/ControladorBorrarCompra.php" method="POST">
                        <button name="idCompra" value="<?= $compra->getId() ?>" type="submit">➖</button>
                    </form>
                </td>
                <td>
                    <form action="../controlador/ControladorBorrarCompraTotal.php" method="POST">
                        <button name="idCompra" value="<?= $compra->getId() ?>" type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
        <?php
                }
            }
        ?>
    </table>
</html>
