<?php
require_once "../modelo/CompraDAO.php";
require_once "../modelo/CompraDTO.php";
session_start();

if (isset($_POST["accion"])) {
    $compraDAO = new CompraDAO();

    switch ($_POST["accion"]) {
        // AÑADIR COMPRA
        case "addCompra":
            // Si ya existe la compra, se incrementa su cantidad.
            $compra = $compraDAO->getCompraByClienteIdAndProductoId($_SESSION["idUsuario"], $_POST["idProducto"]);
            if ($compra != null) {
                $compra->setCantidad($compra->getCantidad() + 1);
                $compraDAO->updateCompra($compra);
            } else {
                $compraDAO->addCompra(new CompraDTO(null, $_SESSION["idUsuario"], $_POST["idProducto"], date("Y-m-d"), 1));
            }
            header("location: ../vista/index.php");
            break;
        // BORRAR COMPRA
        case "deleteCompra":
            // Comprobamos si la cantidad del producto de la compra es mayor a 1.
            $compra = $compraDAO->getCompraById($_POST["idCompra"]);
            if ($compra->getCantidad() > 1) {
                $compra->setCantidad($compra->getCantidad() - 1);
                $compraDAO->updateCompra($compra);
            } else {
                $compraDAO->deleteCompra($compra);
            }
            header("location: ../vista/compra.php");
            break;
        // BORRAR TODAS LAS COMRPAS
        case "deleteAllCompras":
            $compra = $compraDAO->getCompraById($_POST["idCompra"]);
            $compraDAO->deleteCompra($compra);
            header("location: ../vista/compra.php");
            break;
    }
}
