<?php
session_start();
require_once "../modelo/ProductoDTO.php";

if (trim($_POST["id"]) == ""
    || trim($_POST["nombre"]) == ""
    || trim($_POST["descripcion"]) == ""
    || trim($_POST["precio"] == "")) {
    $_SESSION["errorUpdate"] = "Rellene todos los campos para continuar";
    header("location:../vistas/update.php");
} else {
    $id = trim($_POST["id"]);
    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = trim($_POST["precio"]);
    $update = new ProductoDTO($id, $nombre, $descripcion, $precio);
}
