<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    date_default_timezone_set('America/Lima');
    $fecha = new DateTime();
    include 'conexion.php';
    $buscar = "SELECT * FROM alumno";
    $result = $conexion->query($buscar);

    $buscar2 = "SELECT * FROM tipoconcepto";
    $result2 = $conexion->query($buscar2);
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Registar Nuevo Usuario</title>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <!-- Favicons-->
            <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">


            <!-- CORE CSS-->    
            <link href="css/materialize.css" type="text/css" rel="stylesheet">
            <link href="css/style.css" type="text/css" rel="stylesheet" >
            <link href="css/estilos.css" type="text/css" rel="stylesheet" >


            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" >
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="js/buscarAlumno.js"></script>
            <script src="js/modal.js"></script>

        </head>

        <body onload="focus();">

            <!-- START MAIN -->
            <div id="main">
                <!-- START WRAPPER -->
                <div class="wrapper">

                    <!-- START LEFT SIDEBAR NAV-->
                    <?php include 'inc/menu.inc'; ?>
                    <!-- END LEFT SIDEBAR NAV-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!-- START CONTENT -->
                    <section id="content">

                        <!--breadcrumbs start-->
                        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <h5 class="breadcrumbs-title">Registar Nuevo Usuario</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Usuarios
                                            </li>
                                            <li class="active blue-text" >Registar Nuevo Usuario</li>

                                        </ol>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs end-->

                        <!--start container-->
                        <div class="container">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="section">
                                        <div id="roboto">
                                            <h4 class="header">Registar Nuevo Usuario</h4>
                                            <p class="caption">
                                                En este panel usted podra Registar Nuevo Usuario con los que cuenta en la Escuela.
                                            </p>
                                            <div class="divider"></div>

                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2" align="center">Registar Nuevo Usuario</h4>
                                                        <div class="row">
                                                            <div class="resp" align="center"></div>
                                                            <!--<form id="create" class="col s12" action="control/registrarVaucher.php" method="POST">-->
                                                            <form id="" method="POST" enctype="multipart/form-data" name="formulario">
                                                                <div class="row">
                                                                    <div class="input-field col s12 m12 l8">
                                                                        <input id="UsuarioNombre" type="text" class="validate" name="UsuarioNombre" required="">
                                                                        <label for="UsuarioNombre">Usuario Nombre:</label>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12 m12 l8">
                                                                        <input id="UsuarioApellidos" type="text" class="validate" name="UsuarioApellidos" required="" maxlength="8">
                                                                        <label for="UsuarioApellidos">Usuario Apellido:</label>
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12 m12 l8">
                                                                        <input id="UsuarioId" type="text" class="validate" name="UsuarioId" required="" maxlength="8">
                                                                        <label for="UsuarioId">User Name:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12 m12 l8">
                                                                        <input id="UsuarioContra" type="text" class="validate" name="UsuarioContra" required="" maxlength="8">
                                                                        <label for="UsuarioContra">Password:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Tipo:</label>
                                                                        <select id="vivtipo" class="browser-default" name="UsuarioTipoUsuario" required="">
                                                                            <option value="" disabled selected>Tipo:</option>
                                                                            <option value="1" >Administrador</option>
                                                                            <option value="2" >Contador</option>
                                                                            <option value="3" >Profesor</option>
                                                                            <option value="4" >Padre</option>
                                                                            
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="divider"></div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="registrar">Registrar
                                                                            <i class="mdi-image-edit left"></i>
                                                                        </button>
                                                                        <a href="page-ver-usuarios.php" class="btn green">Listar Usuarios</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!--end container-->

                        <!--modal error-->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ERROR!!!</h4>
                                <p>Usuario no creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="green-text">EXITO!!!</h4>
                                <p>Pago creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-ver-usuarios.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                    </section>
                    <!-- END CONTENT -->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->
                    <!-- START RIGHT SIDEBAR NAV-->
                    <aside id="right-sidebar-nav">

                    </aside>
                    <!-- LEFT RIGHT SIDEBAR NAV-->

                </div>
                <!-- END WRAPPER -->

            </div>
            <!-- END MAIN -->



            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START FOOTER -->
            <?php include 'inc/footer.inc'; ?>
            <!-- END FOOTER -->


            <!-- ================================================
            Scripts
            ================================================ -->
            <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

            <script>
            $(function () {
                var formulario = $('form[name=formulario]');
                $('button[type=submit]').click(function (evento) {
                    var array = formulario.serializeArray();
                    if (array[0].value == '' || array[1].value == '' || array[2].value == '' || array[3].value == '' || array[4].value == '') {
                        $('.resp').html('<div class="errors"><p>Informe todos los detalle para finalizar con exito</p></div>');
                    } else {
                        $.ajax({
                            method: 'POST',
                            url: 'control/crearUsuario.php',
                            data: {crearUsuario: 'sim', campos: array},
                            dataType: 'json',
                            beforeSend: function () {
                                $('.resp').html('<div class="erros"><p>Espere mientras procesamos sus datos</p></div>');
                            },
                            success: function (valor) {
                                //$('.resp').html(valor);
                                if (valor.erro == 'sim') {
                                    $('.resp').html('<div class="erros"><p>' + valor.getErro + '</p></div>');
                                } else {
                                    $('.resp').html('<div class="ok">' + valor.msg + '</div>');
                                }
                            }
                        });
                    }
                    evento.preventDefault();
                });
            });

            </script>
            <!-- jQuery Library -->
            <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
            <!--materialize js-->
            <script type="text/javascript" src="js/materialize.js"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="js/plugins.js"></script>

            <script>
            $(document).ready(function () {
                // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered

                $('#modal2').modal();
                $('#modal1').modal();
            });

            var frm = $('#create');
            frm.submit(function (ev) {
                ev.preventDefault();
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (respuesta) {
                        if (respuesta == 1) {
                            //$('#modal2').openModal();
                            //document.location.href = "page-crear-proveedor.php";
                            //                                location.reload();
                            $('#modal2').openModal();

                        } else {

                            $('#modal1').openModal();
                        }
                    }
                });


            });
            </script>
        </body>

    </html>
    <?php
}