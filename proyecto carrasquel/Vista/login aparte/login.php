<?php
require_once "usuarios.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $usuarioEncontrado = false;
    foreach ($usuarios as $usuario) {
        if ($usuario["email"] === $email && $usuario["password"] === $password) {
            $usuarioEncontrado = true;
            break;
        }
    }

    if ($usuarioEncontrado) {
        header("Location: index.php");
    } else {
        $error = "Email o contraseña incorrectos.";
    }
}
?>