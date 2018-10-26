<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    $id = $_GET['id'];
    if (!isset($id)) {
        header("location:page-ver-usuarios.php");
    }
    $buscar = "SELECT * FROM contador WHERE ContadorDni='$id'";
    $resultado = $conexion->query($buscar);
    if ($resultado->num_rows === 0) {
        header("location:page-ver-contador.php");
    }
    $provBD = $resultado->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Configurar Contador</title>
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
                                        <h5 class="breadcrumbs-title">Configurar Contador</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Usuarios
                                            </li>
                                            <li class="grey-text lighten-4" >Ver Contador</li>
                                            <li class="active blue-text">Configurar Contador</li>
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
                                            <h4 class="header">Configuracion de Contador</h4>
                                            <p class="caption">
                                                En este panel usted podra hacer la configuracion del Contador.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Contador: <?php echo $provBD['ContadorNombre'] . " " . $provBD['ContadorApellidos']; ?> <br>
                                                            DNI: <?php echo$provBD['ContadorDni']; ?>
                                                        </h4>
                                                        <div class="row">
                                                            <form id="configurar" class="col s12" action="control/modificarContador.php" method="POST">
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="username" type="text" class="validate" name="id" required="" hidden="true" value="<?php echo $provBD['ContadorDni']; ?>">

                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="nombreContador" required="" value="<?php echo $provBD['ContadorNombre']; ?>" onkeypress="return val(event)" minlength="2" maxlength="45" style="text-transform: capitalize;">
                                                                        <label class="active" for="nombre">Nombre: *</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="apellido" type="text" class="validate" name="apellidoContador" required="" value="<?php echo $provBD['ContadorApellidos']; ?>" onkeypress="return val(event)" minlength="2" maxlength="45" style="text-transform: capitalize;">
                                                                        <label class="active" for="apellido">Apellido: *</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="email" type="text" class="validate" name="emailContador" required="" value="<?php echo $provBD['ContadorCorreo']; ?>">
                                                                        <label class="active" for="email">Correo: *</label>
                                                                    </div>
                                                                </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <input id="telefono" type="text" class="validate" name="telefonoContador" required="" value="<?php echo $provBD['ContadorTelefono']; ?>">
                                                                <label class="active" for="telefono">Telefono: *</label>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div class="divider"></div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Guardar Cambios
                                                                    <i class="mdi-content-save left"></i>
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
                <!--modal correcto-->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4 class="green-text">EXITO!!!</h4>
                        <p> Dato modificado correctamente.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="page-ver-usuarios.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <!--modal error-->
                <div id="modal2" class="modal">
                    <div class="modal-content">
                        <h4 class="red-text">ERROR!!!</h4>
                        <p>El dato no puede ser modificado, intentelo de nuevo.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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

                $('#modal1').modal();
                $('#modal2').modal();
            });
            var frm = $('#configurar');

            frm.submit(function (ev) {
                ev.preventDefault();
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: frm.serialize(),
                    success: function (respuesta) {
                        if (respuesta == 1) {
                            $('#modal1').openModal();
                        } else {

                            $('#modal2').openModal();
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





