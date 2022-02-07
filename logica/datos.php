<?php
if(isset($_POST["token"])){
    $token = true;
    include("conectar.php");

    $datos = $con->query("SELECT * FROM cargos C LEFT JOIN usuarios U
                            ON C.id_usuario_cargo = U.id_usuario");
    $array = array();

    while ($row = $datos->fetch_assoc()) {
        array_push($array, $row);
    }

    echo json_encode($array);
} else
    header("Location: ../error.php");