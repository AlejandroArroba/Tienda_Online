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
        <title>Lista de Productos</title>
    </head>
    <body>
        <h1>Lista de productos</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($productos as $producto) { ?>
                <tr>
                    <td><?= $producto->getNombre() ?></td>
                    <td><?= $producto->getDescripcion() ?></td>
                    <td><?= $producto->getPrecio() ?></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
