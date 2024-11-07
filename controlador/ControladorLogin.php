<?php
session_start();
require_once '../modelo/ClienteDTO.php';
require_once '../modelo/ClienteDAO.php';

if (trim($_POST["nickname"]) != "" && trim($_POST["password"]) != "") {
    $nickname = trim($_POST["nickname"]);
    $password = trim($_POST["password"]);

    $clienteDAO = new ClienteDAO();
    if ($clienteDAO->getClienteByNickname($nickname) != null) {
        header("location: ../vista/index.php");
    } else {
        $_SESSION["errorLogin"] = "No se ha encontrado el usuario.";
        header("location: ../vista/login.php");
    }
} else {
    $_SESSION["errorLogin"] = "Por favor, introduzca los datos.";
    header("location: ../vista/login.php");
}
