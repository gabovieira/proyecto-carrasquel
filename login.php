<?php
// Función para registrar un nuevo usuario
function registrarUsuario($nombre, $correo, $clave) {
    $usuarios = file_get_contents("usuarios.txt");

    // Verificar si el correo ya está registrado
    $usuariosArray = explode("\n", $usuarios);
    foreach ($usuariosArray as $usuario) {
        list($nombreGuardado, $correoGuardado, $claveGuardada) = explode(",", $usuario);
        if ($correoGuardado == $correo) {
            return "El correo ya está registrado";
        }
    }

    // Agregar el nuevo usuario al archivo de texto
    $nuevoUsuario = "$nombre,$correo,$clave\n";
    file_put_contents("usuarios.txt", $nuevoUsuario, FILE_APPEND);

    return "Registro exitoso";
}

// Función para realizar el login
function iniciarSesion($correo, $clave) {
    $usuarios = file_get_contents("usuarios.txt");

    // Verificar las credenciales del usuario
    $usuariosArray = explode("\n", $usuarios);
    foreach ($usuariosArray as $usuario) {
        list($nombre, $correoGuardado, $claveGuardada) = explode(",", $usuario);
        if ($correoGuardado == $correo && $claveGuardada == $clave) {
            return "Inicio de sesión exitoso para $nombre";
        }
    }

    return "Credenciales incorrectas";
}

// Verificar si se ha enviado el formulario de registro o login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["registro"])) {
        $nombre = $_POST["usuario"];
        $correo = $_POST["correo"];
        $clave = $_POST["clave"];

        $mensaje = registrarUsuario($nombre, $correo, $clave);
        echo "<p>$mensaje</p>";
    } elseif (isset($_POST["login"])) {
        $correo = $_POST["correo"];
        $clave = $_POST["clave"];

        $mensaje = iniciarSesion($correo, $clave);
        echo "<p>$mensaje</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de página de ropa</title>
    <link rel="stylesheet" href="loginestilo.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<div class="container-form register">
    <div class="information">
        <div class="info-childs">
            <h2>Bienvenido</h2>
            <p>Gracias por unirte a nuestra tienda</p>
            <input type="button" value="iniciar sesion" id="Sing-in">
        </div>
    </div>
    <div class="form-information">
        <div class="form-information-childs">
            <h2>Crear una cuenta</h2>
            <p>Usa tu email para registrarte</p>
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label>
                    <i class='bx bx-user' ></i>
                    <input type="text" placeholder="Nombre completo" name="usuario">
                </label>
                <label>
                    <i class='bx bx-envelope'></i>
                    <input type="email" placeholder="Correo electrónico" name="correo">
                </label>
                <label>
                    <i class='bx bxs-lock' ></i>
                    <input type="password" placeholder="Contraseña" name="clave">
                </label>
                <input type="submit" name="registro" value="Registrarse">
            </form>
        </div>
    </div>
</div>

<div class="container-form login hide">
    <div class="information">
        <div class="info-childs">
            <h2>Bienvenido nuevamente</h2>
            <p>Gracias por querer unirte a nuestra familia KB shop esperamos que te registres con éxito</p>
            <input type="button" value="Registrarse" id="Sing-up">
        </div>
    </div>
    <div class="form-information">
        <div class="form-information-childs">
            <h2>Iniciar sesión</h2>
            <p>O iniciar sesión con una cuenta</p>
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label>
                    <i class='bx bx-envelope'></i>
                    <input type="email" placeholder="Correo electrónico" name="correo">
                </label>
                <label>
                    <i class='bx bxs-lock' ></i>
                    <input type="password" placeholder="Contraseña" name="clave">
                </label>
                <input type="submit" name="login" value="Iniciar sesión">
            </form>
        </div>
    </div>
</div>

</body>
</html>
