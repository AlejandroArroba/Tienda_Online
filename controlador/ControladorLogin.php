<?php
session_start();
require_once '../modelo/ClienteDAO.php';

if (trim($_POST["nickname"] == "") || trim($_POST["password"] == "")) {
    $_SESSION["errorLogin"] = "Por favor, introduzca los datos.";
    header("location: ../vista/login.php");
} else {
    $nickname = trim($_POST["nickname"]);
    $password = trim($_POST["password"]);

    $clienteDAO = new ClienteDAO();
    if ($clienteDAO->getClienteByNicknameAndPassword($nickname, $password) != null) {
        header("location: ../vista/index.php");
    } else {
        $_SESSION["errorLogin"] = "Inicio de sesión incorrecto. Revise los datos.";
        header("location: ../vista/login.php");
    }
}
