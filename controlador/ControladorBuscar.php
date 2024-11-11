<?php
session_start();
require_once "modelo/ProductoDAO.php";
require_once "modelo/ProductoDTO.php";


if ($_POST["id"] = "") {
    $_SESSION["errorId"] = "El id es inválido";
    header("location:vista/buscar.php");
} else {
    $id = $_POST["id"];
    $productoDAO = new ProductoDAO();
    $productoDAO->getProductoById($id);
    $_SESSION["producto"] = serialize($productoDAO);
}

