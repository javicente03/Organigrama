<?php
if (isset($_POST["token"])) {
    $token = true;

    if (isset($_POST["cargo"])) {
        $cargo = addslashes(trim($_POST["cargo"]));
        include("conectar.php");
        $cargo_bd = ($con->query("SELECT* FROM cargos WHERE id_cargo = $cargo AND id_usuario IS NULL"))->fetch_assoc();
        if ($cargo_bd) {
            $user = ($con->query("SELECT * FROM usuarios WHERE id_usuario = " . $_POST["usuario_cargo"]))->fetch_assoc();

            if ($user) {

                if($user["activo"]){
                    $con->query("UPDATE cargos SET id_usuario=NULL WHERE id_usuario = " . $_POST["usuario_cargo"]);

                    $con->query("UPDATE cargos SET id_usuario = ".$user["id_usuario"]." WHERE id_cargo = $cargo");

                    echo "ok";
                } else
                    echo "Este usuario se encuentra suspendido";
            } else
                echo "Usuario no encontrado";
        } else
            echo "Cargo no encontrado";
    } else
        echo "Debe seleccionar un cargo";
} else
    header("Location: ../error.php");
