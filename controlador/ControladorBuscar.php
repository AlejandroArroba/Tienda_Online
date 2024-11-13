<?php
session_start();
require_once "../modelo/ProductoDAO.php";
require_once "../modelo/ProductoDTO.php";

if ($_POST["id"] == "") {
    $_SESSION["errorId"] = "El id es inválido";
} else {
    $id = $_POST["id"];
    $productoDAO = new ProductoDAO();
    $producto = $productoDAO->getProductoById($id);
    $_SESSION["producto"] = serialize($producto);

}
header("location: ../vista/buscar.php");
