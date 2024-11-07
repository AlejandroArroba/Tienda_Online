<?php
require_once "DB.php";
require_once "ClienteDTO.php";

class ClienteDAO {

    private $conn; // conexión a la base de datos

    public function __construct() {
        $this->conn = DB::getConnection();
    }

    // Obtener un cliente mediante su nombre de usuario y contraseña
    public function getClienteByNicknameAndPassword($nickname, $password) {
        $sql = "SELECT * FROM cliente WHERE nickname=:nickname AND password=:password";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nickname", $nickname);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new ClienteDTO($fila["nombre"], $fila["apellido"], $fila["nickname"], $fila["password"], $fila["telefono"], $fila["domicilio"]);
        }
        return null; // si no se encuentra, devolvemos null
    }

    // Obtener todos los clientes
    public function getAllClientes() {
        $sql = "SELECT * FROM cliente";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $clientes = [];
        foreach ($resultados as $fila) {
            $cliente = new ClienteDTO($fila["nombre"], $fila["apellido"], $fila["nickname"], $fila["password"], $fila["telefono"], $fila["domicilio"]);
            $clientes[] = $cliente;
        }
        return $clientes;
    }

    // Añadir cliente
    public function addCliente(ClienteDTO $cliente) {
        $nombre = $cliente->getNombre();
        $apellido = $cliente->getApellido();
        $nickname = $cliente->getNickname();
        $password = $cliente->getPassword();
        $telefono = $cliente->getTelefono();
        $domicilio = $cliente->getDomicilio();

        $sql = "INSERT INTO cliente (nombre, apellido, nickname, password, telefono, domicilio) VALUES (:nombre, :apellido, :nickname, :password, :telefono, :domicilio)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":nickname", $nickname);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":domicilio", $domicilio);
        return $stmt->execute();
    }
    
    // Actualizar cliente
    public function updateCliente($id, ClienteDTO $cliente) {
        $nombre = $cliente->getNombre();
        $apellido = $cliente->getApellido();
        $nickname = $cliente->getNickname();
        $password = $cliente->getPassword();
        $telefono = $cliente->getTelefono();
        $domicilio = $cliente->getDomicilio();

        $sql = "UPDATE cliente SET nombre=:nombre, apellido=:apellido, nickname=:nickname, password=:password, telefono=:telefono, domicilio=:domicilio WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":nickname", $nickname);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":domicilio", $domicilio);
        return $stmt->execute();
    }

    public function deleteCliente($id) {
        $sql = "DELETE FROM cliente WHERE id=:id" ;
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
