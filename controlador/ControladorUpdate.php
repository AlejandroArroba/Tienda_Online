<?php
session_start();
require_once "../modelo/ProductoDTO.php";
require_once "../modelo/ProductoDAO.php";

if (trim($_POST["id"]) == ""
    || trim($_POST["nombre"]) == ""
    || trim($_POST["descripcion"]) == ""
    || trim($_POST["precio"] == "")) {
    $_SESSION["errorUpdate"] = "Rellene todos los campos para continuar";
    header("location:../vista/update.php");
} else {
    $id = trim($_POST["id"]);
    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = trim($_POST["precio"]);
    $producto = new ProductoDTO($id, $nombre, $descripcion, $precio);

    try {
        $productoDAO = new ProductoDAO();
        $productoDAO->updateProducto($id, $producto);
        $_SESSION["update"] = "Producto actualizado correctamente";
        header("Location: ../vista/index.php");
    } catch (Exception $e) {
        $_SESSION["errorUpdate"] = "Error al actualizar el producto";
        header("Location: ../vista/update.php");
    }
}
