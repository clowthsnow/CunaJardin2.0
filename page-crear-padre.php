<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    date_default_timezone_set('America/Lima');
    $fecha = new DateTime();
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Datos Padre</title>
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

        <body >

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
                                        <h5 class="breadcrumbs-title">Datos del Padre</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Usuarios
                                            </li>
                                            <li class="active blue-text" >Datos del Padre</li>

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
                                            <h4 class="header">Datos del Padre</h4>
                                            <p class="caption">
                                                En este panel usted podra rellenar los respectivos datos del padre para hacer la respectiva matricula.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Datos del Padre:</h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" action="control/crearPadre.php" method="POST">
                                                            
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreDni" required="" placeholder=" DNI">
                                                                        <label for="edad" class="active">*DNI:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="nombre" type="text" class="validate" name="PadreNombre" required="">
                                                                        <label for="nombre">*Nombres:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="apellidos" type="text" class="validate" name="PadreApellidos" required="">
                                                                        <label for="apellidos">*Apellidos:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreCorreo" required="" placeholder=" ">
                                                                        <label for="edad" class="active">*correo:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreTelefono" required="" placeholder=" ">
                                                                        <label for="edad" class="active">*Telefono:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreCelular" required="" placeholder=" ">
                                                                        <label for="edad" class="active">*Celular:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreCelularOperador" required="" placeholder=" ">
                                                                        <label for="edad" class="active">*Operador:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m12 l12">
                                                                        <input id="fecha" type="text" class="datepicker" name="PadreFechaNac" required="" value="<?php echo $fecha->format('Y-m-d'); ?>">
                                                                        <label for="fecha" class="active">*Fecha de Nacimiento:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreEdad" required="" placeholder="">
                                                                        <label for="edad" class="active">*Edad:</label>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="nombre" type="text" class="validate" name="PadreEstCivil" required="">
                                                                        <label for="nombre">*Estado Civil:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreEstCivilEspecifique" required="" placeholder="">
                                                                        <label for="edad" class="active">*Especifique:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreViveCon" required="" placeholder="">
                                                                        <label for="edad" class="active">*Padre viven con:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreProcedenciaLugar" required="" placeholder="">
                                                                        <label for="edad" class="active">*Lugar de Procedencia:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreGradoInstruccion" required="" placeholder="">
                                                                        <label for="edad" class="active">*Grado de Institucion:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreOcupacionTipo" required="" placeholder="">
                                                                        <label for="edad" class="active">*Ocupacion:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreOcupacionRubro" required="" placeholder="">
                                                                        <label for="edad" class="active">*Rubro:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreDireccionTrabajo" required="" placeholder="">
                                                                        <label for="edad" class="active">*Direccion de Trabajo:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="PadreCentroTrabajo" required="" placeholder="">
                                                                        <label for="edad" class="active">*Centro de Trabajo:</label>
                                                                    </div>
                                                                </div>


                                                               

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
                                <p>Padre no creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="green-text">EXITO!!!</h4>
                                <p>padre creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-crear-padre.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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
?>

