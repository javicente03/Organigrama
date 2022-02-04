<?php
if (isset($_POST["token"])) {
    $token = true;


        include("conectar.php");

        $user = ($con->query("SELECT * FROM usuarios WHERE id_usuario = " . $_POST["id_usuario"]))->fetch_assoc();

        if ($user) {

            if($user["activo"]){
                $con->query("UPDATE usuarios SET activo=false
                    WHERE id_usuario = " . $_POST["id_usuario"]);

                $con->query("UPDATE cargos SET id_usuario=NULL WHERE id_usuario = ". $_POST["id_usuario"]);
            } else
                $con->query("UPDATE usuarios SET activo=true
                WHERE id_usuario = " . $_POST["id_usuario"]);        

            echo "ok";
        } else
            echo "Usuario no encontrado";
} else
    header("Location: ../error.php");
