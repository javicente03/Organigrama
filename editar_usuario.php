<?php
session_start();
if (!isset($_SESSION["id"]))
    header("Location: login.php");
else {
    if (!$_SESSION["permisos"])
        header("Location: organigrama.php");

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

    $cargos = $con->query("SELECT * FROM cargos WHERE id_usuario_cargo IS NULL");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
            <div class="col s9">
                <h4 class="title">Editar Usuario <?php if (!$user["activo"]) { ?> (Suspendido) <?php } else echo "(Activo)" ?></h4>
            </div>
            <div class="col s3">
                <button type="button" id="suspender" <?php if ($user["activo"]) { ?>title="Suspender" <?php } else echo "title='Activar'" ?> class="btn btn-flat">
                    <i class="material-icons left">not_interested</i>Suspender
                </button>
            </div>
            <form id="form" style="text-align: center;">
                <div class="input-field col s12 m6">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombres" value="<?php echo $user["nombres"] ?>">
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="apellido" id="apellido" placeholder="Apellidos" value="<?php echo $user["apellidos"] ?>">
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="profesion" id="profesion" placeholder="Profesión" value="<?php echo $user["profesion"] ?>">
                </div>
                <div class="file-field input-field col s12 m6">
                    <div class="btn red accent-4">
                        <span><i class="material-icons">add_a_photo</i></span>
                        <input type="file" name="img" id="img">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Cargue una imágen">
                    </div>
                </div>
                <div class="input-fiel col s12 m6">
                    <label style="text-align: left;font-weight: bold;color: black;">Cargo Actual</label>
                    <h6 class="title"><?php echo $user["nombre_cargo"] ?></h6>
                </div>
                <div class="input-field col s12 m6 center">
                    <button type="submit" class="btn red accent-4" id="btn-submit">
                        <i class="material-icons left">send</i>Editar</button>
                    <div class="progress red accent-4" id="progress" style="display: none;">
                        <div class="indeterminate"></div>
                    </div>
                </div>
                <input type="hidden" name="id_usuario" value="<?php echo $id ?>">
                <input type="hidden" name="token" value="token">
            </form>
        </div>

        <div class="row z-depth-3" style="padding: 10px;">
            <form id="formCargo">
                <h5 class="title">Editar Cargo</h5>
                <div class="input-field col s12 m6">
                    <select name="cargo" id="cargo">
                        <option value="" selected disabled>Seleccione un cargo</option>
                        <?php while ($row = $cargos->fetch_assoc()) { ?>
                            <option value="<?php echo $row["id_cargo"] ?>"><?php echo $row["nombre_cargo"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="usuario_cargo" value="<?php echo $id ?>">
                <input type="hidden" name="token" value="token">
                <div class="input-field col s12 m6"><button class="btn red accent-4"><i class="material-icons">edit</i></button></div>
            </form>
        </div>

        <div class="row z-depth-3" style="padding: 10px;">
            <form id="formAdministrador">
                <?php if ($user["super_usuario"]) { ?>
                    <h5 class="title">Revocar permisos como Administrador</h5>
                <?php } else { ?>
                    <h5 class="title">Designar como Administrador</h5>
                <?php } ?>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">vpn_key</i>
                    <input type="password" name="password" id="password" placeholder="Ingrese su clave de seguridad">
                </div>
                <input type="hidden" name="usuario_cargo" value="<?php echo $id ?>">
                <input type="hidden" name="token" value="token">
                <div class="input-field col s12 m6"><button type="submit" class="btn red accent-4"><i class="material-icons">send</i></button></div>
            </form>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/elementos_materialize.js"></script>
    <script>
        $('#form').submit(function(e) {
            $("#progress").css("display", "block")
            $("#btn-submit").prop("disabled", true)
            $("#btn-submit").css("background-color", "gray")
            var formData = new FormData(document.getElementById("form"));
            formData.append('img', $('#img')[0].files[0]);
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'logica/editar_usuario.php',
                data: formData,
                enctype: 'multipart/form-data',
                processData: false, // tell jQuery not to process the data
                contentType: false,
                success: function(response) {
                    if (response == "ok" || response.substring(0, 15) == "<!DOCTYPE html>") {
                        location.href = ""
                    } else {
                        M.toast({
                            html: response,
                            classes: 'rounded red'
                        })
                        $("#progress").css("display", "none")
                        $("#btn-submit").prop("disabled", false)
                        $("#btn-submit").css("background-color", "#1a237e")
                    }
                }
            });
        });

        $('#formCargo').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'logica/cambiar_cargo.php',
                data: $(this).serialize(),
                enctype: 'application/x-www-form-urlencoded',
                success: function(response) {
                    if (response == "ok" || response.substring(0, 15) == "<!DOCTYPE html>") {
                        location.href = ""
                    } else {
                        M.toast({
                            html: response,
                            classes: 'rounded red'
                        })
                    }
                }
            });
        });

        $("#suspender").click(function(e) {
            option = "¿Seguro desea continuar con esta acción?"

            if (confirm(option)) {
                var formData = new FormData()
                formData.append("id_usuario", <?php echo $id ?>)
                formData.append("token", "token")
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'logica/suspender.php',
                    data: formData,
                    enctype: 'application/x-www-form-urlencoded',
                    processData: false, // tell jQuery not to process the data
                    contentType: false,
                    success: function(response) {
                        if (response == "ok" || response.substring(0, 15) == "<!DOCTYPE html>") {
                            location.href = ""
                        } else {
                            M.toast({
                                html: response,
                                classes: 'rounded red'
                            })
                        }
                    }
                });
            }
        })

        $("#formAdministrador").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'logica/designar_super.php',
                data: $(this).serialize(),
                enctype: 'application/x-www-form-urlencoded',
                success: function(response) {
                    if (response == "ok" || response.substring(0, 15) == "<!DOCTYPE html>") {
                        location.href = ""
                    } else {
                        M.toast({
                            html: response,
                            classes: 'rounded red'
                        })
                    }
                }
            });
        })
    </script>
</body>

</html>