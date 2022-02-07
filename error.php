<?php
session_start();
if (isset($_SESSION["id"]))
    header("Location: organigrama.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidó su contraseña</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white fixed">
                    <ul class="left hide-on-med-and-down">
                        <li><a href="login.php">ALCALDIA BOLIVARIANA DEL MUNICIPIO LOS TAQUES
                            </a></li>
                    </ul>
                    <a class="brand-logo right"><img src="img/resources/logo.png" height="54px" alt=""></a>
            </div>
        </nav>
    </div>
    <div class="container">
        <h1>Lo siento, página no encontrada</h1>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/elementos_materialize.js"></script>
    
</body>

</html>