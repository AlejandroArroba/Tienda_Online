<?php
session_start();
require_once '../modelo/ClienteDTO.php';
require_once '../modelo/ClienteDAO.php';

if (trim($_POST["nombre"]) == ""
    || trim($_POST["apellido"]) == ""
    || trim($_POST["nickname"]) == ""
    || trim($_POST["password"]) == "") {
    $_SESSION["errorRegistro"] = "Por favor, compruebe que ha introducido todos los datos necesarios.";
    header("location: ../vista/registro.php");
} else {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $nickname = trim($_POST["nickname"]);
    $password = trim($_POST["password"]);
    $telefono = trim($_POST["telefono"]);
    $domicilio = trim($_POST["domicilio"]);
    $cliente = new ClienteDTO(null, $nombre, $apellido, $nickname, $password, $telefono, $domicilio);

    try {
        $clienteDAO = new ClienteDAO();
        $clienteDAO->addCliente($cliente);
        header("location: ../vista/login.php");
    } catch (Exception $e) {
        $_SESSION["errorRegistro"] = "Error al registrar al usuario. Revise los datos.";
        header("location: ../vista/registro.php");
    }
}
