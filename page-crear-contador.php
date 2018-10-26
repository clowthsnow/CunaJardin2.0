<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Crear Contador</title>
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


        </head>

        <body>

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
                                        <h5 class="breadcrumbs-title">Crear Contador</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Usuarios
                                            </li>
                                            <li class="active blue-text" >Crear Contador</li>

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
                                            <h4 class="header">Creación de datos del Contador</h4>
                                            <p class="caption">
                                                En este panel usted podra crear nuevos datos para la contadora
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Nuevo Contador</h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" action="control/crearContador.php" method="POST">
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <p id="rpta"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="dni" type="text" class="validate" name="dniConta" required="" minlength="8" maxlength="8" onKeyPress="return num(event)">
                                                                        <label for="dni">DNI: *</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="nombreConta" required="" onkeypress="return val(event)" minlength="2" maxlength="45" style="text-transform: capitalize;">
                                                                        <label for="nombre">Nombre: *</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="apellido" type="text" class="validate" name="apellidoConta" required="" onkeypress="return val(event)" minlength="2" maxlength="45" style="text-transform: capitalize;">
                                                                        <label for="apellido">Apellido: *</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="email" type="email" class="validate" name="emailConta" required="">
                                                                        <label for="email">Email: *</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="telefono" type="text" class="validate" name="telefonoConta" required="" minlength="9" maxlength="9" onkeypress="return num(event)">
                                                                        <label for="telefono">Telefono: *</label>
                                                                    </div>
                                                                </div>

                                                                <br>
                                                                <div class="divider"></div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Registrar
                                                                            <i class="mdi-image-edit left"></i>
                                                                        </button>
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
                                <p>Contador no creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="green-text">EXITO!!!</h4>
                                <p>Contador creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-crear-contador.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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

            <!-- jQuery Library -->
            <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
            <!--materialize js-->
            <script type="text/javascript" src="js/materialize.js"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="js/plugins.js"></script>

            <script>
                                                                            function val(e) {
                                                                                tecla = (document.all) ? e.keyCode : e.which;
                                                                                if (tecla == 8)
                                                                                    return true;
                                                                                patron = /[A-Za-z áéíóú]/;
                                                                                te = String.fromCharCode(tecla);
                                                                                return patron.test(te);
                                                                            }
                                                                            function num(e) {
                                                                                tecla = (document.all) ? e.keyCode : e.which;
                                                                                if (tecla == 8)
                                                                                    return true;
                                                                                patron = /[0-9]/;
                                                                                te = String.fromCharCode(tecla);
                                                                                return patron.test(te);
                                                                            }
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

                                                                                            $('#rpta').html(respuesta);
                                                                                        }
                                                                                    }
                                                                                });


                                                                            });
            </script>
        </body>

    </html>
    <?php
}
?>
