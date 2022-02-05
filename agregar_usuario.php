<?php
session_start();
if (!isset($_SESSION["id"]))
    header("Location: login.php");
else {
    if (!$_SESSION["permisos"])
        header("Location: organigrama.php");

    $token = true;
    include("logica/conectar.php");
    $cargos = $con->query("SELECT * FROM cargos WHERE id_usuario IS NULL");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Usuario</title>
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
            <form id="form" style="text-align: center;">
                <h4 class="title">Agregar Nuevo Usuario</h4>
                <div class="input-field col s12 m6">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombres">
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="apellido" id="apellido" placeholder="Apellidos">
                </div>
                <div class="input-field col s12 m6">
                    <input type="number" name="cedula" id="cedula" placeholder="Cédula">
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="profesion" id="profesion" placeholder="Profesión">
                </div>
                <div class="input-field col s12 m6">
                    <input type="email" name="email" id="email" placeholder="Correo Electónico">
                </div>
                <div class="input-field col s12 m6">
                    <select name="cargo" id="cargo">
                        <option value="" selected disabled>Seleccione un cargo</option>
                        <?php while ($row = $cargos->fetch_assoc()) { ?>
                            <option value="<?php echo $row["id_cargo"] ?>"><?php echo $row["nombre_cargo"] ?></option>
                        <?php } ?>
                    </select>
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
                <div class="input-field col s12 m6 center">
                    <button type="submit" class="btn red accent-4" id="btn-submit">
                        <i class="material-icons left">send</i>Guardar</button>
                    <div class="progress red accent-4" id="progress" style="display: none;">
                        <div class="indeterminate"></div>
                    </div>
                </div>
                <input type="hidden" name="token" value="token">
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
                url: 'logica/agregar_usuario.php',
                data: formData,
                enctype: 'multipart/form-data',
                processData: false, // tell jQuery not to process the data
                contentType: false,
                success: function(response) {
                    if (response.substring(response.length - 2, response.length) == "ok") {
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
    </script>
</body>

</html>