<?php
require_once "../modelo/CompraDTO.php";
require_once "../modelo/CompraDAO.php";
session_start();

$compraDAO = new CompraDAO();
// Si ya existe la compra, se incrementa su cantidad.
$compra = $compraDAO->getCompraByClienteIdAndProductoId($_SESSION["idUsuario"], $_POST["idProducto"]);
if ($compra != null) {
    $compra->setCantidad($compra->getCantidad() + 1);
    $compraDAO->updateCompra($compra);
} else {
    $compraDAO->addCompra(new CompraDTO(null, $_SESSION["idUsuario"], $_POST["idProducto"], date("Y-m-d"), 1));
}

header("location: ../vista/compra.php");
