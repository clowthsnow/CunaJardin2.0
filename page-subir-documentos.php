<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    date_default_timezone_set('America/Lima');
    $fecha = new DateTime();
    $usuario = $_GET['usuario'];
    $busca = "SELECT * FROM alumno WHERE AlumnoDni='$usuario'";
    $resultado = $conexion->query($busca);
    if ($resultado->num_rows === 0) {
        header("location:page-datos-alumno_1.php");
    }
    $provBD = $resultado->fetch_assoc();
    if ($provBD['AlumnoSiagie'] === '1') {
        header("location:../page-matricula-estudiante.php?usuario=$usuario");
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Datos Estudiante</title>
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
                                        <h5 class="breadcrumbs-title">Datos del Estudiante</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Usuarios
                                            </li>
                                            <li class="grey-text lighten-4" >Datos del Estudiante</li>
                                            <li class="grey-text lighten-4" >Declaracion Jurada</li>
                                            <li class="active blue-text">Subir Documentos</li>

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
                                            <h4 class="header">Datos del Estudiante</h4>
                                            <p class="caption">
                                                En este panel usted podra subir los documentos que se piden a continuacion.

                                                <br><br>

                                                En caso que los datos llenados al ser corraborados  no sean fidedignos sera anulada y/o invalidada su Matricula.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Estudiante:<?php echo $provBD['AlumnoNombre'] . " " . $provBD['AlumnoApellidos']; ?></h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" action="control/subirSIAGEI.php" method="POST" enctype="multipart/form-data">
                                                                <div class="input-field col s12">
                                                                    <input id="username" type="text" class="validate" name="id" required="" hidden="true" value="<?php echo $usuario; ?>">

                                                                </div>
                                                                <?php if ($provBD['AlumnoTipoAlumno'] == '1') { ?>

                                                                    <div class="row">
                                                                        <div class="col s12 m12 l12">
                                                                            <p>Soy Particular:</p>
                                                                            <p>* DNI escaneado
                                                                                <br>* Carnet de atención integral de salud del niño
                                                                                <br>* Carnet de vacunas
                                                                            </p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*DNI</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Carnet</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Vacunas</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>

                                                                <?php if ($provBD['AlumnoTipoAlumno'] == '2') { ?>
                                                                    <div class="row">
                                                                        <div class="col s12 m12 l12">
                                                                            <p>Soy Administrativo:</p>
                                                                            <p>* Boleta de pago
                                                                                <br>* DNI escaneado
                                                                                <br>* Carnet de atención integral de salud del niño
                                                                                <br>* Carnet de vacunas
                                                                            </p>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Boleta</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*DNI</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Carnet</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Vacunas</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>                                                                <?php } ?>

                                                                <?php if ($provBD['AlumnoTipoAlumno'] == '3') { ?>
                                                                    <div class="row">
                                                                        <div class="col s12 m12 l12">
                                                                            <p>Soy Pariente:</p>
                                                                            <p>* Boleta del Trabajador
                                                                                <br>* DNI escaneado
                                                                                <br>* Carnet de atención integral de salud del niño
                                                                                <br>* Carnet de vacunas
                                                                            </p>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Boleta</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*DNI</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Carnet</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Vacunas</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                <?php } ?>

                                                                <?php if ($provBD['AlumnoTipoAlumno'] == '4') { ?>
                                                                    <div class="row">
                                                                        <div class="col s12 m12 l12">
                                                                            <p>Soy Estudiante:</p>
                                                                            <p>* Constancia de matrícula de padre o madre
                                                                                <br>* Libreta de notas actual del padre o madre
                                                                                <br>* DNI escaneado
                                                                                <br>* Carnet de atención integral de salud del niño
                                                                                <br>* Carnet de vacunas
                                                                            </p>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Constancia</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Libreta</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*DNI</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Carnet</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 l12 m12">
                                                                            <div class="file-field input-field ">
                                                                                <input class="file-path validate col s9 right" type="text" required="" readonly=""/>
                                                                                <div class="btn">
                                                                                    <span>*Vacunas</span>
                                                                                    <input type="file" name="archivo[]" required="" readonly=""/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="divider"></div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Guardar
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
                                <p>Turno no creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="green-text">EXITO!!!</h4>
                                <p>Turno creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-crear-turno.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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
                var dni = $("#dni").text();
                $(document).ready(function () {
                // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered

                $('#modal2').modal();
                $('#modal1').modal();
                });
                //                var frm = $('#create');
                //                frm.submit(function (ev) {
                ////                    ev.preventDefault();
                //                    $.ajax({
                //                        type: frm.attr('method'),
                //                        url: frm.attr('action'),
                //                        data: frm.serialize(),
                //                        success: function (respuesta) {
                //                            console.log(respuesta);
                //                            
                //                                //$('#modal2').openModal();
                //                                document.location.href = "page-declaracion-jurada.php?alumno="+dni;
                //                                //                                location.reload();
                ////                                $('#modal2').openModal();
                //
                //                        }
                //                    });


                });
            </script>
        </body>

    </html>
    <?php
}
?>



