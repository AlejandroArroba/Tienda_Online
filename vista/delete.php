<?php
    require_once "../modelo/ProductoDAO.php";
    $productoDAO = new ProductoDAO();
    $productos = $productoDAO->getAllProductos();
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inicio</title>
        <link rel="stylesheet" href="../resources/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body>
    <div class="header">
        <a href="index.php" class="house-icon"><i class="fa-solid fa-house"></i></a>
        Borrar Producto
        <a href="compra.php" class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    <h1>Lista de productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($productos as $producto) { ?>
            <tr>
                <td><?= $producto->getId() ?></td>
                <td><?= $producto->getNombre() ?></td>
                <td><?= $producto->getDescripcion() ?></td>
                <td><?= $producto->getPrecio() ?></td>
                <td>
                    <form action="../controlador/ControladorBorrar.php" method="POST">
                        <button name="idProducto" value="<?= $producto->getId() ?>" type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    </body>
</html>
