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
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper white fixed">
                    <ul class="left hide-on-med-and-down">
                        <li><a>ALCALDIA BOLIVARIANA DEL MUNICIPIO LOS TAQUES
                            </a></li>
                    </ul>
                    <a class="brand-logo right"><img src="img/resources/logo.png" height="54px" alt=""></a>
            </div>
        </nav>
    </div>

    <div class="section container contenedor">
        <div class="cont-login">
            <form id="form" style="text-align: center;">
                <h4 class="title">Inicio de Sesión</h4>
                <div class="input-field">
                    <i class="material-icons prefix">person</i>
                    <input type="text" name="cedula" id="cedula" placeholder="Cédula">
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" id="ver" style="cursor: pointer;">visibility</i>
                    <input type="password" name="password" id="password" placeholder="Contraseña">
                </div>
                <div class="input-field">
                <button type="submit" class="btn red accent-4" id="btn-submit">
                    <i class="material-icons left">send</i>Ingresar</button>
                </div>
                <input type="hidden" name="token" value="1">
            </form>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/elementos_materialize.js"></script>
    <script>
        $("#ver").click(function(e) {
            var pass = document.getElementById("password");
            var icon = document.getElementById("ver");

            if (pass.getAttribute("type", "password") == "password") {
                pass.setAttribute("type", "text")
                icon.innerHTML = "visibility_off"
            } else {
                pass.setAttribute("type", "password")
                icon.innerHTML = "visibility"
            }
        })

        $('#form').submit(function(e) {
            $("#btn-submit").prop("disabled", true)
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'logica/login.php',
                data: $(this).serialize(),
                enctype: 'application/x-www-form-urlencoded',
                success: function(response) {
                    if (response == "ok") {
                        location.href = "organigrama.php"
                    } else {
                        M.toast({
                            html: response,
                            classes: 'rounded red'
                        })
                        $("#btn-submit").prop("disabled", false)
                    }
                }
            });
        });
    </script>
</body>

</html>