<?php
require_once "DB.php";
require_once "ProductoDTO.php";

class ProductoDAO {

    private $conn; // conexión a la base de datos

    public function __construct() {
        $this->conn = DB::getConnection();
    }

    // Obtener un producto mediante su ID
    public function getProductoById($id) {
        $sql = "SELECT * FROM producto WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new ProductoDTO($fila["id"], $fila["nombre"], $fila["descripcion"], $fila["precio"], $fila["imagen"]);
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
            $producto = new ProductoDTO($fila["id"], $fila["nombre"], $fila["descripcion"], $fila["precio"], $fila["imagen"]);
            $productos[] = $producto;
        }
        return $productos;
    }

    // Añadir producto
    public function addProducto(ProductoDTO $producto) {
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $precio = $producto->getPrecio();

        $sql = "INSERT INTO producto (nombre, descripcion, precio, imagen) VALUES (:nombre, :descripcion, :precio, :imagen)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        return $stmt->execute();
    }

    // Actualizar producto
    public function updateProducto($id, ProductoDTO $producto) {
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $precio = $producto->getPrecio();
        $imagen = $producto->getImagen();

        $sql = "UPDATE producto SET nombre=:nombre, descripcion=:descripcion, precio=:precio, imagen=:imagen WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":imagen", $imagen);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Borrar producto
    public function deleteProducto($id) {
        $sql = "DELETE FROM producto WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
