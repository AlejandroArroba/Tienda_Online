<?php
require_once "../modelo/ProductoDAO.php";
require_once "../modelo/ProductoDTO.php";
session_start();

if (isset($_POST["accion"])) {
    $productoDAO = new ProductoDAO();

    switch ($_POST["accion"]) {
        // GET PRODUCTO BY ID
        case "getProductoById":
            if ($_POST["id"] == "") {
                $_SESSION["errorId"] = "El id es inválido";
            } else {
                $id = $_POST["id"];
                $producto = $productoDAO->getProductoById($id);
                $_SESSION["producto"] = serialize($producto);
            }
            header("location: ../vista/buscar.php");
            break;
        // AÑADIR PRODUCTO
        case "addProducto":
            $nombre = trim($_POST["nombre"]);
            $descripcion = trim($_POST["descripcion"]);
            $precio = trim($_POST["precio"]);
            if ($nombre == "" || $descripcion == "" || $precio == "") {
                $_SESSION["errorAnadir"] = "Rellene todos los datos para continuar";
                header("Location: ../vista/anadir.php");
            } else {
                try {
                    $productoDAO->addProducto(new ProductoDTO(null, $nombre, $descripcion, $precio));
                    $_SESSION["anadir"] = "El producto se ha agregado correctamente";
                    header("Location: ../vista/index.php");
                } catch (Exception $e) {
                    $_SESSION["errorAnadir"] = "No se pudo crear el producto";
                    header("location:../vista/anadir.php");
                }
            }
            break;

        // ACTUALIZAR PRODUCTO
        case "updateProducto":
            $id = $_POST["id"];
            $nombre = trim($_POST["nombre"]);
            $descripcion = trim($_POST["descripcion"]);
            $precio = trim($_POST["precio"]);
            if ($id == "" || $nombre == "" || $descripcion == "" || $precio == "") {
                $_SESSION["errorUpdate"] = "Rellene todos los campos para continuar";
                header("location:../vista/update.php");
            } else {
                try {
                    $productoDAO->updateProducto(new ProductoDTO($id, $nombre, $descripcion, $precio));
                    $_SESSION["update"] = "Producto actualizado correctamente";
                    header("Location: ../vista/index.php");
                } catch (Exception $e) {
                    $_SESSION["errorUpdate"] = "Error al actualizar el producto";
                    header("Location: ../vista/update.php");
                }
            }
            break;
        // ELIMINAR PRODUCTO
        case "deleteProducto":
            $id = $_POST["idProducto"];
            $productoDAO->deleteProducto($id);
            header("location: ../vista/delete.php");
    }
}
