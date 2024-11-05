<?php
require_once "DB.php";

class ProductoDAO {

    private $conn; // conexión a la base de datos

    public function __construct() {
        $this->conn = DB::getConnection();
    }

    // Obtener un producto mediante su ID
    public function getProductoById() {
        $sql = "SELECT * FROM producto WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new ProductoDTO($fila["id"], $fila["nombre"], $fila["descripcion"], $fila["precio"], $fila["cliente_id"]);
        }
        return null; // si no se encuentra, devolvemos null
    }

    // Obtener todos los productos
    public function getAllProductos() {
        $sql = "SELECT * FROM producto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productos = [];
        foreach ($resultados as $fila) {
            $producto = new ProductoDTO($fila["id"], $fila["nombre"], $fila["descripcion"], $fila["precio"], $fila["cliente_id"]);
            $productos[] = $producto;
        }
        return $productos;
    }

    // Añadir producto
    public function addProducto() {
        $sql = "INSERT INTO producto (nombre, descripcion, precio, cliente_id) VALUES (:nombre, :descripcion, :precio, :cliente_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":cliente_id", $cliente_id);
        return $stmt->execute();
    }

    // Actualizar producto
    public function updateProducto() {
        $sql = "UPDATE producto SET nombre=:nombre, descripcion=:descripcion, precio=:precio, cliente_id=:cliente_id WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Borrar producto
    public function deleteProducto() {
        $sql = "DELETE FROM producto WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
