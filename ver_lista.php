<?php
session_start();
if (!isset($_SESSION["id"]))
    header("Location: login.php");
else {
    if (!$_SESSION["permisos"])
        header("Location: organigrama.php");

    $token = true;
    include("logica/conectar.php");
    $usuarios = $con->query("SELECT * FROM usuarios U LEFT JOIN cargos C ON U.id_usuario = C.id_usuario_cargo");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/datatables.min.css">
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
        <div class="row">
            <h5 class="title title-table">Lista de Usuarios</h5>
            <table id="tabla" class="centered">
                <thead>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Permiso</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php while ($row = $usuarios->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row["nombres"] ?></td>
                            <td><?php echo $row["apellidos"] ?></td>
                            <td><?php echo $row["nombre_cargo"] ?></td>
                            <td><?php if ($row["activo"]) echo "Activo";
                                else echo "Suspendido"; ?></td>
                            <td><?php if ($row["super_usuario"]) echo "Administrador";
                                else echo "Básico"; ?></td>
                            <td><a href="editar_usuario.php?id=<?php echo $row['id_usuario'] ?>" class="btn btn-flat"><i class="material-icons">edit</i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/elementos_materialize.js"></script>
    <script src="js/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabla').DataTable({
                "language": {
                    "lengthMenu": "Display _MENU_ records per page",
                    "zeroRecords": "No hay data encontrada",
                    "info": "Total: _MAX_ resultados",
                    "infoEmpty": "No hay coincidencias",
                    "infoFiltered": "",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
</body>

</html>