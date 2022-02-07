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

    <div class="section container contenedor">
        <div class="cont-login">
            <form id="form" style="text-align: center;">
                <h5 class="title">Olvidó su contraseña</h5>
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <input type="text" name="email" id="email">
                    <label for="email">Ingrese su correo electrónico</label>
                </div>
                <div class="progress red accent-4" id="progress" style="display: none;">
                    <div class="indeterminate"></div>
                </div>
                <button type="submit" class="btn red accent-4" id="btn-submit"><i class="material-icons left">send</i>Enviar</button>
                <input type="hidden" name="token" value="1">
            </form>
        <p class="parrafo">Por favor de ser necesario revise su correo de spam</p>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/elementos_materialize.js"></script>
    <script>
        $('#form').submit(function(e) {
            $("#btn-submit").prop("disabled", true)
            $("#progress").css("display", "block")
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'logica/olvido_password.php',
                data: $(this).serialize(),
                enctype: 'application/x-www-form-urlencoded',
                success: function(response) {
                    if (response.substring(response.length - 2, response.length) == "ok"){
                        location.href = "resetear_password.php"
                    } else {
                        M.toast({
                            html: response,
                            classes: 'rounded red'
                        })
                        $("#btn-submit").prop("disabled", false)
                        $("#progress").css("display", "none")
                    }
                }
            });
        });
    </script>
</body>

</html>