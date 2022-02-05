<?php
session_start();
if (!isset($_SESSION["id"]))
    header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigrama</title>
    <link rel="stylesheet" href="css/organigrama.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <a class="brand-logo right"><img src="img/resources/logo.png" height="54px"
                                alt=""></a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <?php include("boton_flotante.php"); ?>

    <div style="width: 100%;" class="section">
        <div class="funcionario" id="funcionario1">
            <div class="f1">
                <img src="img/resources/none.png" id="img1" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
                <?php if($_SESSION["permisos"]) {?><a id="editar1" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo1">
                </a>
            </div>

        </div>
        <div title="linea 1" class="linea-1"></div>
        <div title="linea 2" class="linea-2"></div>
        <div title="linea 3" class="linea-3"></div>
        <div title="linea 4" class="linea-4"></div>
        <div title="linea 5" class="linea-5"></div>
        <div title="linea 6" class="linea-6"></div>
        <div title="linea 7" class="linea-7"></div>
        <div title="linea 8" class="linea-8"></div>

        <div class="funcionario" id="funcionario2" style="transform: translateX(251px) translateY(-660px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img2" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
                <?php if($_SESSION["permisos"]) {?><a id="editar2" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo2">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario3" style="transform: translateX(-251px) translateY(-740px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img3" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar3" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo3">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario4" style="transform: translateX(251px) translateY(-730px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img4" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar4" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo4">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario5" style="transform: translateX(-251px) translateY(-810px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img5" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar5" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo5">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario6" style="transform: translateX(251px) translateY(-800px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img6" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar6" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo6">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario7" style="transform: translateX(-251px) translateY(-880px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img7" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar7" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo7">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario8" style="transform: translateX(-251px) translateY(-870px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img8" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar8" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo8">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario9" style="transform: translateX(251px) translateY(-905px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img9" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar9" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo9">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario10" style="transform: translateX(-251px) translateY(-855px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img10" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar10" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo10">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario11" style="transform: translateX(251px) translateY(-935px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img11" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar11" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo11">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario11" style="transform: translateX(251px) translateY(-920px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img12" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar12" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo12">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario12" style="transform: translateX(-140px) translateY(-995px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img13" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar13" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo13">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario13" style="transform: translateX(-360px) translateY(-1085px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img14" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar14" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo14">
                </a>
            </div>
        </div>

        <div title="linea 9" class="linea-9"></div>
        <div title="linea 10" class="linea-10"></div>
        <div title="linea 11" class="linea-11"></div>
        <div title="linea 12" class="linea-12"></div>
        <div title="linea 13" class="linea-13"></div>
        <div title="linea 14" class="linea-14"></div>

        <div class="funcionario" id="funcionario15" style="transform: translateX(-480px) translateY(-1255px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img15" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar15" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo15">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario16" style="transform: translateX(-150px) translateY(-1345px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img16" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar16" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo16">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario17" style="transform: translateX(400px) translateY(-1435px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img17" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar17" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo17">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario18" style="transform: translateX(800px) translateY(-1530px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img18" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar18" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo18">
                </a>
            </div>
        </div>

        <div title="linea 15" class="linea-15"></div>
        <div title="linea 16" class="linea-16"></div>
        <div title="linea 17" class="linea-17"></div>
        <div title="linea 18" class="linea-18"></div>
        <div class="funcionario" id="funcionario19" style="transform: translateX(-570px) translateY(-1560px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img19" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar19" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo19">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario20" style="transform: translateX(-570px) translateY(-1540px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img20" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar20" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo20">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario21" style="transform: translateX(-350px) translateY(-1520px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img21" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar21" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo21">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario22" style="transform: translateX(-570px) translateY(-1600px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img22" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar22" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo22">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario23" style="transform: translateX(-350px) translateY(-1600px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img23" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar23" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo23">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario24" style="transform: translateX(-570px) translateY(-1670px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img24" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar24" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo24">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario25" style="transform: translateX(-250px) translateY(-2091px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img25" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar25" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo25">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario26" style="transform: translateX(-320px) translateY(-2078px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img26" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar26" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo26">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario27" style="transform: translateX(-10px) translateY(-2270px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img27" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar27" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo27">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario28" style="transform: translateX(-110px) translateY(-2257px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img28" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar28" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo28">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario29" style="transform: translateX(300px) translateY(-2430px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img29" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar29" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo29">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario30" style="transform: translateX(520px) translateY(-2540px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img30" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar30" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo30">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario31" style="transform: translateX(300px) translateY(-2490px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img31" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar31" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo31">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario32" style="transform: translateX(520px) translateY(-2560px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img32" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar32" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo32">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario33" style="transform: translateX(120px) translateY(-2570px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img33" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar33" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo33">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario34" style="transform: translateX(300px) translateY(-2560px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img34" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar34" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo34">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario35" style="transform: translateX(570px) translateY(-2660px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img35" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar35" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo35">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario36" style="transform: translateX(300px) translateY(-2631px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img36" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar36" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo36">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario37" style="transform: translateX(570px) translateY(-2710px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img37" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar37" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo37">
                </a>
            </div>
        </div>
        <div class="funcionario" id="funcionario38" style="transform: translateX(800px) translateY(-3250px);">
            <div class="f1">
                <img src="img/resources/none.png" id="img38" height="86px" width="100%" class="materialboxed" >
            </div>
            <div class="f2">
            <?php if($_SESSION["permisos"]) {?><a id="editar38" class="right btn3p"><i class="material-icons">edit</i></a> <?php } ?>
                <a id="cargo38">
                </a>
            </div>
        </div>
        <div title="linea 19" class="linea-19"></div>
        <div title="linea 20" class="linea-20"></div>
        <div title="linea 21" class="linea-21"></div>
        <div title="linea 22" class="linea-22"></div>
        <div title="linea 23" class="linea-23"></div>
        <div title="linea 24" class="linea-24"></div>
        <div title="linea 25" class="linea-25"></div>
        <div title="linea 26" class="linea-26"></div>
        <div title="linea 27" class="linea-27"></div>
        <div title="linea 28" class="linea-28"></div>
        <div title="linea 29" class="linea-29"></div>
        <div title="linea 30" class="linea-30"></div>
        <div title="linea 31" class="linea-31"></div>
        <div title="linea 32" class="linea-32"></div>
        <div title="linea 33" class="linea-33"></div>
        <div title="linea 34" class="linea-34"></div>
        <div title="linea 35" class="linea-35"></div>
        <div title="linea 36" class="linea-36"></div>
        <div title="linea 37" class="linea-37"></div>
        <div title="linea 38" class="linea-38"></div>
        <div title="linea 39" class="linea-39"></div>
        <div title="linea 40" class="linea-40"></div>
        <div title="linea 41" class="linea-41"></div>
        <div title="linea 42" class="linea-42"></div>
        <div title="linea 43" class="linea-43"></div>
        <div title="linea 44" class="linea-44"></div>

    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/elementos_materialize.js"></script>

    <script>
        window.onload = cargarDatos()

        function cargarDatos(){
            // console.log(super)
            var formData = new FormData()
            formData.append("token", true)
            $.ajax({
                type: "POST",
                url: 'logica/datos.php',
                data: formData,
                enctype: 'application/x-www-form-urlencoded',
                processData: false, // tell jQuery not to process the data
                contentType: false,
                success: function(response) {
                    var data = JSON.parse(response)
                    // console.log(data)
                    var i = 1

                    data.forEach(e => {
                        $("#cargo"+i).html(e.nombre_cargo)

                        if(e.id_usuario != null ){
                            $("#img"+i).prop("src", "organigrama/"+e.img)
                            $("#funcionario"+i).prop("title", e.nombres+" "+e.apellidos)
                            $("#cargo"+i).prop("href", "ver_usuario.php?id="+e.id_usuario)

                            try {
                                $("#editar"+i).prop("href", "editar_usuario.php?id="+e.id_usuario)
                            } catch (error) {
                            }
                        } else {
                            try {
                                $("#editar"+i).css("display", "none")
                            } catch (error) {
                            }
                        }

                        i++
                    });
                }
            });
        }

    </script>
</body>

</html>