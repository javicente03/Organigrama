<?php
if (isset($_POST["token"])) {
    $token = true;
    $cedula = addslashes(trim($_POST["cedula"]));
    $clave = addslashes(trim($_POST["password"]));

    if ($cedula != "" && $clave != "") {
        include("conectar.php");
        $user = ($con->query("SELECT * FROM usuarios WHERE cedula = $cedula"))->fetch_assoc();
        if ($user) {
            if (password_verify($clave, $user['password'])) {
                if ($user['activo']) {
                    session_start();
                    $_SESSION['id'] = $user['id_usuario'];
                    $_SESSION['nombre'] = $user['nombres'];
                    $_SESSION['apellido'] = $user['apellidos'];
                    $_SESSION['cedula'] = $user['cedula'];
                    $_SESSION['permisos'] = $user['super_usuario'];
                    $_SESSION['img'] = $user['img'];
                    echo "ok";
                } else
                    echo "Usuario no activo";
            } else
                echo "Contraseña inválida";
        } else
            echo "Usuario no existente";
    } else
        echo "Debe completar los datos";
} else
    header("Location: ../error.php");
