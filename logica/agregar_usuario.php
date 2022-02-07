<?php
if (isset($_POST["token"])) {
    $token = true;
    $nombre = addslashes(trim($_POST["nombre"]));
    $apellido = addslashes(trim($_POST["apellido"]));
    $cedula = addslashes(trim($_POST["cedula"]));
    $profesion = addslashes(trim($_POST["profesion"]));
    $email = trim(addslashes($_POST['email']));

    if (isset($_POST["cargo"])) {
        $cargo = $_POST["cargo"];
        if ($nombre != "" && $apellido != "" && $cedula != "" && $profesion != "") {
            include("conectar.php");
            $cargo_bd = ($con->query("SELECT* FROM cargos WHERE id_cargo = $cargo AND id_usuario_cargo IS NULL"))->fetch_assoc();
            if ($cargo_bd) {
                if (($con->query("SELECT * FROM usuarios WHERE cedula = $cedula"))->num_rows == 0) {
                    include("validaciones.php");
                    $email_valido = validar_email($email);
                    if ($email_valido) {
                        if(($con->query("SELECT * FROM usuarios WHERE email = '$email'"))->num_rows == 0){
                            if (!empty($_FILES['img']['tmp_name'])) {
                                include("subir_imagenes.php");
                                $tipo = $_FILES["img"]["type"];
                                $archivo = $_FILES["img"]["tmp_name"];
                                $upload = subir_imagen($tipo, $archivo, "ced".$cedula);
                                if ($upload) {
                                    $password = bin2hex(random_bytes(5));

                                    $opciones = [
                                        'cost' => 12,
                                    ];
                                    $hash = password_hash($password, PASSWORD_BCRYPT, $opciones);
                                    $con->query("INSERT INTO usuarios (password,nombres,apellidos,cedula,profesion,img,email)
                                                VALUES ('$hash','$nombre','$apellido','$cedula','$profesion','$upload','$email')");
                                    
                                    $recien_creado = ($con->query("SELECT * FROM usuarios ORDER BY id_usuario DESC LIMIT 1"))->fetch_assoc();
                                    
                                    $con->query("UPDATE cargos SET id_usuario_cargo = ".$recien_creado["id_usuario"]." WHERE id_cargo = $cargo");
                                    
                                    $asunto = "Clave de Ingreso - Alcaldia de Los Taques";
                                    include("email/enviar-mail.php");
                                    $sendMail = sendMail($email, $asunto, $nombre, $apellido, $password);
                                    if ($sendMail)
                                        echo "ok";
                                } else
                                    echo "Archivo inválido, debe subir una imágen JPEG, PNG o GIF";
                            } else {
                                echo "Debe subir una foto del funcionario";
                            }
                        } else
                            echo "Correo ya registrado";
                    } else
                        echo "Email inválido";
                } else
                    echo "Cédula ya registrada";
            } else
                echo "Asignación inválida, el cargo no existe o ya otra persona lo ocupa actualmente";
        } else
            echo "Debe completar los datos correctamente";
    } else
        echo "Debe seleccionar un cargo";
} else
    header("Location: ../error.php");
