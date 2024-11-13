<?php
require_once "DB.php";
require_once "CompraDTO.php";
class CompraDAO {

    private $conn;

    public function __construct() {
        $this->conn = DB::getConnection();
    }

    public function getComprasByClienteId($clienteId) {
        $sql = "SELECT * FROM compra WHERE cliente_id=:cliente_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":cliente_id", $clienteId);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $compras = [];
        foreach ($resultados as $fila) {
            $compra = new CompraDTO($fila["id"], $fila["cliente_id"], $fila["producto_id"], $fila["fecha_compra"], $fila["cantidad"]);
            $compras[] = $compra;
        }
        return $compras;
    }

    public function getCompraByClienteIdAndProductoId($clienteId, $productoId) {
        $sql = "SELECT * FROM compra WHERE cliente_id=:cliente_id AND producto_id=:producto_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":cliente_id", $clienteId);
        $stmt->bindParam(":producto_id", $productoId);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new CompraDTO($fila["id"], $fila["cliente_id"], $fila["producto_id"], $fila["fecha_compra"], $fila["cantidad"]);
        }
        return null; // si no se encuentra, devolvemos null
    }

    public function addCompra(CompraDTO $compra) {
        $cliente_id = $compra->getIdCliente();
        $producto_id = $compra->getIdProducto();
        $fecha_compra = $compra->getFechaCompra();
        $cantidad = $compra->getCantidad();

        $sql = "INSERT INTO compra (cliente_id, producto_id, fecha_compra, cantidad) VALUES (:cliente_id, :producto_id, :fecha_compra, :cantidad)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->bindParam(":producto_id", $producto_id);
        $stmt->bindParam(":fecha_compra", $fecha_compra);
        $stmt->bindParam(":cantidad", $cantidad);
        return $stmt->execute();
    }

    public function updateCompra(CompraDTO $compra) {
        $cantidad = $compra->getCantidad();
        $cliente_id = $compra->getIdCliente();
        $producto_id = $compra->getIdProducto();

        $sql = "UPDATE compra SET cantidad=:cantidad WHERE cliente_id=:cliente_id AND producto_id=:producto_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":cantidad", $cantidad);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->bindParam(":producto_id", $producto_id);
        return $stmt->execute();
    }

    public function deleteCompra(CompraDTO $compra) {
        $cliente_id = $compra->getIdCliente();
        $producto_id = $compra->getIdProducto();

        $sql = "DELETE FROM compra WHERE cliente_id=:cliente_id AND producto_id=:product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->bindParam(":product_id", $producto_id);
        return $stmt->execute();
    }
}
