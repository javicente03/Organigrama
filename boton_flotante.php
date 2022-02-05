

<?php if(isset($_SESSION["id"])){?>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">menu</i>
        </a>
        <ul>
            <?php if($_SESSION["permisos"]){ ?>
            <li><a href="agregar_usuario.php" class="btn-floating red" title="Agregar Persona"><i class="material-icons">person_add</i></a></li>
            <li><a href="ver_lista.php" class="btn-floating yellow" title="Ver lista de usuarios"><i class="material-icons">supervisor_account</i></a></li>
            <?php } ?>
            <li><a href="logica/logout.php" class="btn-floating blue" title="Salir"><i class="material-icons">close</i></a></li>
        </ul>
    </div>
<?php } else header("Location: error.php"); ?>