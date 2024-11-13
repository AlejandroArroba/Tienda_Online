<?php
session_start();

unset($_SESSION["idUsuario"]);
unset($_SESSION["nombreUsuario"]);
header("location:../vista/login.php");