<?php
session_start();
if (!isset($_SESSION["id"]))
    header("Location: login.php");
else {

    if (!isset($_GET["id"]))
        header("Location: error.php");

    $id = $_GET["id"];

    if (!is_numeric($id))
        header("Location: error.php");

    $token = true;
    include("logica/conectar.php");
    $user = ($con->query("SELECT * FROM usuarios U LEFT JOIN cargos C ON U.id_usuario = C.id_usuario_cargo
                    WHERE U.id_usuario = $id"))->fetch_assoc();

    if (!$user)
        header("Location: error.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuario</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white fixed">
                <div class="container">
                    <div class="contenedor-nav">

                        <ul class="left hide-on-med-and-down">
                            <li><a href="organigrama.php">ESTRUCTURA ORGANIZATIVA 2022
                                    ALCALDÍA DEL MUNICIPIO LOS TAQUES
                                </a></li>
                        </ul>
                        <ul class="right">
                            <li><a>Bienvenido <?php echo $_SESSION["nombre"] ?></a></li>
                        </ul>
                        <a class="brand-logo right"><img src="img/resources/logo.png" height="54px" alt=""></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <?php include("boton_flotante.php"); ?>

    <div class="section container">
        <div class="row z-depth-3" style="padding: 10px;">
            <h5 class="title">Datos del Funcionario</h5>
            <div class="card horizontal">
                <div class="card-image">
                    <img src="organigrama/<?php echo $user["img"] ?>">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                    <h5 class="title"><?php echo $user["nombres"] . " " . $user["apellidos"] ?></h5>
                    <h6 class="title"><?php echo $user["cedula"] ?></h6>
                    <h6 class="title"><?php echo $user["profesion"] ?></h6>
                    <h6 class="title"><?php echo $user["email"] ?></h6>
                    <h6 class="title"><?php echo $user["nombre_cargo"] ?></h6>
                    </div>
                    <div class="card-action">
                    <?php if($_SESSION["permisos"]){ ?><a href="editar_usuario.php?id=<?php echo $user["id_usuario"] ?>" class="red-text"><i class="material-icons left">edit</i><b>Editar</b></a> <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/elementos_materialize.js"></script>
    <script>
    </script>
</body>

</html>