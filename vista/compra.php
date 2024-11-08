<?php
    session_start();
    require_once "../modelo/CompraDAO.php";
    $compraDAO = new CompraDAO();
    $compras = $compraDAO->getComprasByClienteId($_SESSION["usuario"]);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito</title>
    <link rel="stylesheet" href="../resources/style.css">
</head>
    <body>
        <div class="header">
            Carrito Compra
        </div>

    </body>
</html>
