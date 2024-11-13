<?php
session_start();
require_once '../modelo/ClienteDAO.php';
require_once '../modelo/ClienteDTO.php';

if (trim($_POST["nickname"] == "") || trim($_POST["password"] == "")) {
    $_SESSION["errorLogin"] = "Por favor, introduzca los datos.";
    header("location: ../vista/login.php");
} else {
    $nickname = trim($_POST["nickname"]);
    $password = trim($_POST["password"]);

    $clienteDAO = new ClienteDAO();
    $cliente = $clienteDAO->getClienteByNicknameAndPassword($nickname, $password);
    if ($cliente != null) {
        $_SESSION["idUsuario"] = $cliente->getId();
        header("location: ../vista/index.php");
    } else {
        $_SESSION["errorLogin"] = "Inicio de sesión incorrecto. Revise los datos.";
        header("location: ../vista/login.php");
    }
}
