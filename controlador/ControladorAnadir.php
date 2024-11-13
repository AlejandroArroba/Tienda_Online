<?php
session_start();
require_once "../modelo/ProductoDAO.php";
require_once "../modelo/ProductoDTO.php";

if (trim($_POST["nombre"]) == "" || trim($_POST["descripcion"]) == "" || trim($_POST["precio"] == "")) {
    $_SESSION["errorAnadir"] = "Rellene todos los datos para continuar";
    header("Location: ../vistas/anadir.php");
} else {
    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = trim($_POST["precio"]);
    $producto = new ProductoDTO(null, $nombre, $descripcion, $precio);

    try {
        $productoDAO = new ProductoDAO();
        $productoDAO->addProducto($producto);
        $_SESSION["anadir"] = "El producto se ha agregado correctamente";
        header("Location: ../vista/index.php");
    } catch (Exception $e) {
        $_SESSION["errorAnadir"] = "No se pudo crear el producto";
        header("location:../vista/anadir.php");
    }
}
