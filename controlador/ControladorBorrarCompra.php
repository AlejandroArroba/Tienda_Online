<?php
require_once "../modelo/CompraDTO.php";
require_once "../modelo/CompraDAO.php";
session_start();

$compraDAO = new CompraDAO();
// Comprobamos si la cantidad del producto de la compra es mayor a 1.
$compra = $compraDAO->getCompraById($_POST["idCompra"]);
if ($compra->getCantidad() > 1) {
    $compra->setCantidad($compra->getCantidad() - 1);
    $compraDAO->updateCompra($compra);
} else {
    $compraDAO->deleteCompra($compra);
}

header("location: ../vista/compra.php");
