<?php
require_once "../modelo/ProductoDAO.php";

$productoDAO = new ProductoDAO();
$productoDAO->deleteProducto($_POST["idProducto"]);
header("location: ../vista/delete.php");
