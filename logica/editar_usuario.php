<?php
if (isset($_POST["token"])) {
    $token = true;
    $nombre = addslashes(trim($_POST["nombre"]));
    $apellido = addslashes(trim($_POST["apellido"]));
    $profesion = addslashes(trim($_POST["profesion"]));


    if ($nombre != "" && $apellido != "" && $profesion != "") {
        include("conectar.php");

        $user = ($con->query("SELECT * FROM usuarios WHERE id_usuario = " . $_POST["id_usuario"]))->fetch_assoc();

        if ($user) {

            $con->query("UPDATE usuarios SET nombres='$nombre', apellidos='$apellido', profesion='$profesion'
                    WHERE id_usuario = " . $_POST["id_usuario"]);

            if (!empty($_FILES['img']['tmp_name'])) {
                include("subir_imagenes.php");
                $tipo = $_FILES["img"]["type"];
                $archivo = $_FILES["img"]["tmp_name"];
                $upload = subir_imagen($tipo, $archivo, "ced" . $user["cedula"]);
                if ($upload) {
                    $con->query("UPDATE usuarios SET img='$upload'
                                    WHERE id_usuario = " . $_POST["id_usuario"]);
                } else
                    echo "Archivo inválido, debe subir una imágen JPEG, PNG o GIF";
            }

            echo "ok";
        } else
            echo "Usuario no encontrado";
    } else
        echo "Debe completar los datos correctamente";
} else
    header("Location: ../error.php");
