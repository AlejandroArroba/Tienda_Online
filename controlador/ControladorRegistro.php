<?php
session_start();
require_once '../modelo/ClienteDTO.php';
require_once '../modelo/ClienteDAO.php';

if (empty(trim($_POST["nombre"]))
    || empty(trim($_POST["apellido"]))
    || empty(trim($_POST["nickname"]))
    || empty(trim($_POST["password"]))) {
    $_SESSION["errorRegistro"] = "Por favor, compruebe que ha introducido todos los datos necesarios.";
    header("location: ../vista/registro.php");
} else {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $nickname = trim($_POST["nickname"]);
    $password = trim($_POST["password"]);
    $telefono = trim($_POST["telefono"]);
    $domicilio = trim($_POST["domicilio"]);
    $cliente = new ClienteDTO($nombre, $apellido, $nickname, $password, $telefono, $domicilio);

    try {
        $clienteDAO = new ClienteDAO();
        $clienteDAO->addCliente($cliente);
        header("location: ../vista/index.php");
    } catch (Exception $e) {
        $_SESSION["errorRegistro"] = "Error al registrar al usuario. Revise los datos.";
        header("location: ../vista/registro.php");
    }
}
