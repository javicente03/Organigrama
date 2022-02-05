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
            <form id="form">
                <h5 class="title">Resetee su contraseña</h5>
                <div class="input-field">
                    <i class="material-icons prefix">key</i>
                    <input type="text" name="token" id="token">
                    <label for="token">Ingrese el token enviado al correo</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" onclick="visualizar()" id="icon-password" style="cursor: pointer;">visibility</i>
                    <input type="password" name="password" id="password">
                    <label for="password">Ingrese su nueva contraseña</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" onclick="visualizar()" id="icon-password2" style="cursor: pointer;">visibility</i>
                    <input type="password" name="confirm" id="confirm">
                    <label for="confirm">Confirme su contraseña</label>
                </div>
                <div class="progress red accent-4" id="progress" style="display: none;">
                    <div class="indeterminate"></div>
                </div>
                <button type="submit" class="btn red accent-4" id="btn-submit">Enviar</button>
            </form>
            <p class="parrafo">La contraseña solo debe contener letras y números con una longitud de entre 8 y 12 caracteres</p>

        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/elementos_materialize.js"></script>
    <script>
        $('#form').submit(function(e) {
            $("#progress").css("display", "block")
            $("#btn-submit").prop("disabled", true)
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'logica/resetear_password.php',
                data: $(this).serialize(),
                enctype: 'application/x-www-form-urlencoded',
                success: function(response) {
                    if (response == "ok") {
                        M.toast({
                            html: 'Su contraseña ha sido reestablecida',
                            classes: 'rounded green'
                        })
                        setTimeout(() => {
                            location.href = "login.php"
                        }, 3000);
                    } else {
                        M.toast({
                            html: response,
                            classes: 'rounded red'
                        })
                        $("#progress").css("display", "none")
                        $("#btn-submit").prop("disabled", false)
                    }
                }
            });
        });

        function visualizar() {
            var pass = document.getElementById("password");
            var icon = document.getElementById("icon-password");
            var pass2 = document.getElementById("confirm");
            var icon2 = document.getElementById("icon-password2");

            if (pass.getAttribute("type", "password") == "password") {
                pass.setAttribute("type", "text")
                icon.innerHTML = "visibility_off"
                pass2.setAttribute("type", "text")
                icon2.innerHTML = "visibility_off"
            } else {
                pass.setAttribute("type", "password")
                icon.innerHTML = "visibility"
                pass2.setAttribute("type", "password")
                icon2.innerHTML = "visibility"
            }
        }
    </script>
</body>

</html>