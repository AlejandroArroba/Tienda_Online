<?php
require_once "../modelo/CompraDTO.php";
require_once "../modelo/CompraDAO.php";
session_start();

$compraDAO = new CompraDAO();
$compra = $compraDAO->getCompraById($_POST["idCompra"]);
$compraDAO->deleteCompra($compra);

header("location: ../vista/compra.php");
