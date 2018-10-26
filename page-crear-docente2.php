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
            <title>Crear Docentes</title>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <!-- Favicons-->
            <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">


            <!-- CORE CSS-->    
            <link href="css/materialize.css" type="text/css" rel="stylesheet">
            <link href="css/style.css" type="text/css" rel="stylesheet" >
            <link href="css/estilos.css" type="text/css" rel="stylesheet" >
            <link href="css/style2.css" type="text/css" rel="stylesheet" >
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



            <script src="js/modal.js"></script>

            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" >


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
                                        <h5 class="breadcrumbs-title">Crear Docentes</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Docente
                                            </li>
                                            <li class="active blue-text" >Crear Docentes</li>

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
                                            <h4 class="header">Creación de Docentes</h4>
                                            <p class="caption">
                                                En este panel usted podra crear nuevos Docentes con los que cuenta la Cuna Jardin.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Nuevo Docente</h4>
                                                        <div class="row">
                                                            <div class="resp"></div>
                                                            <form id="formulario" class="col s12" action="control/crearDocente.php" method="POST" enctype="multipart/form-data" name="formulario">
                                                                <ul id="progress">
                                                                    <li class="activo">Principal</li>
                                                                    <li>Datos Generales del Docente</li>
                                                                    <li>Datos de Vivienda</li>
                                                                    <li>Datos de Trabajo</li>
                                                                    <li>Otros Datos</li>
                                                                </ul>

                                                                <fieldset>
                                                                    <h4 class="header2">Datos de Principales:</h4>
                                                                    <div class="row">
                                                                        <div class="file-field input-field col s12 m12 l12">
                                                                            <input class="file-path validate" type="text" />
                                                                            <div class="btn">
                                                                                <span>*Foto</span>
                                                                                <input type="file" name="imagen"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--                                                                    <div class="row">
                                                                                                                                            <div class="input-field col s12">
                                                                                                                                                <input id="foto" type="file" class="validate" name="imagen" required="">
                                                                    
                                                                                                                                                <label for="foto">Foto:</label>
                                                                                                                                            </div>
                                                                                                                                        </div>-->
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="dni" type="text" class="validate" name="docentedni" required="">
                                                                            <label for="dni">*Dni:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="nombre" type="text" class="validate" name="docentenombre" required="">
                                                                            <label for="nombre">*Nombre:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="ape" type="text" class="validate" name="docenteapellido" required="">
                                                                            <label for="ape">*Apellido:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="titulo" type="text" class="validate" name="docentetitulo" required="">
                                                                            <label for="titulo">*Titulo:</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="next1" class="next right" value="Proximo"/>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="divider"></div>
                                                                    <br>
                                                                    <h4 class="header2">Datos Complemetarios del Docente:</h4>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="cor" type="text" class="validate" name="docentecorreo" required="">
                                                                            <label for="cor">*Correo:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="tel" type="text" class="validate" name="docentetelefono" required="">
                                                                            <label for="tel">*Telefono:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="pais" type="text" class="validate" name="docentepais" required="">
                                                                            <label for="pais">*Pais de Nacimiento:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="ciu" type="text" class="validate" name="docenteciudad" required="">
                                                                            <label for="ciu">*Ciudad de Nacimiento:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="fecha" type="text" class="datepicker" name="docentefecha" required="" value="<?php echo $fecha->format('Y-m-d'); ?>">
                                                                            <label for="fecha" class="active">*Fecha de nacimiento:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="dom" type="text" class="validate" name="docentedomicilio" required="">
                                                                            <label for="dom">*Domicilio:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="dis" type="text" class="validate" name="docentedistrito" required="">
                                                                            <label for="dis">*Distrito:</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="prev" class="prev acao" value="Anteror"/>
                                                                    <input type="button" name="next2" class="next right" value="Proximo"/>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="divider"></div>
                                                                    <br>
                                                                    <h4 class="header2">Datos de Ocupacion del Docente:</h4>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="grado" type="text" class="validate" name="docentegrado" required="">
                                                                            <label for="grado">*Grado de instruccion:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="ocu" type="text" class="validate" name="docenteocupacion" required="">
                                                                            <label for="ocu">*Ocupacion:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="di" type="text" class="validate" name="docentedirtrabajo" required="">
                                                                            <label for="di">*Direccion de trabajo:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="cen" type="text" class="validate" name="docentecentro" required="">
                                                                            <label for="cen">*Centro de trabajo:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="san" type="text" class="validate" name="docentesangre" required="">
                                                                            <label for="san">*Tipo de sangre:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="unsa" type="text" class="validate" name="docenteUNSA" required="">
                                                                            <label for="unsa">*Vinculo con UNSA(Si/No):</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="vin" type="text" class="validate" name="docentevinculo" required="">
                                                                            <label for="vin">*Especifique el vinculo:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="sit" type="text" class="validate" name="docentesituacion" required="">
                                                                            <label for="sit">*Situacion laboral:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="det" type="text" class="validate" name="docentedetallelab" required="">
                                                                            <label for="det">*Detalle su situacion laboral:</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="prev" class="prev acao" value="Anteror"/>
                                                                    <input type="button" name="next3" class="next right" value="Proximo"/>
                                                                </fieldset>

                                                                <fieldset>
                                                                    <div class="divider"></div>
                                                                    <br>
                                                                    <h4 class="header2">Datos de Extra:</h4>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="tip" type="text" class="validate" name="docentetipo" required="">
                                                                            <label for="tip">*Tipo de docente:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="seg" type="text" class="validate" name="docenteseguro" required="">
                                                                            <label for="seg">*Seguro social(Si/no):</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="soc" type="text" class="validate" name="docentesocial" required="">
                                                                            <label for="soc">*Detalle su seguro social:</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="prev" class="prev acao" value="Anteror"/>
                                                                    <input type="button" name="next4" class="next right" value="Proximo"/>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="divider"></div>
                                                                    <br>
                                                                    <h4 class="header2">Curriculo:</h4>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="curr" type="file" class="validate" name="docentecurr" required="">
                                                                            <label for="curr">*Curriculum:</label>
                                                                        </div>
                                                                    </div>

                                                                    <input type="button" name="prev" class="prev acao" value="Anterior"/>
                                                                    <!--<input type="submit" name="next" class="next right" value="Registrar"/>-->

                                                                    <div class="divider"></div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Registrar
                                                                                <i class="mdi-image-edit left"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>

                            <!--<input type="submit" name="next" class="next" value="Proximo"/>-->
                                                                </fieldset>
                                                                <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                                                                <script type="text/javascript" src="js/function2.js"></script>
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
                                <p>Docente no creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="green-text">EXITO!!!</h4>
                                <p>Docente creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-crear-docente.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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

            //            $(document).ready(function () {
            //                // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            //
            //                $('#modal2').modal();
            //                $('#modal1').modal();
            //            });
            //
            //            var frm = $('#create');
            //            frm.submit(function (ev) {
            //                ev.preventDefault();
            //                $.ajax({
            //                    type: frm.attr('method'),
            //                    url: frm.attr('action'),
            //                    data: frm.serialize(),
            //                    success: function (respuesta) {
            //                        if (respuesta == 1) {
            //                            //$('#modal2').openModal();
            //                            //document.location.href = "page-crear-proveedor.php";
            //    //                                location.reload();
            //                            $('#modal2').openModal();
            //
            //                        } else {
            //
            //                            $('#modal1').openModal();
            //                        }
            //                    }
            //                });
            //
            //
            //            });

            </script>
        </body>

    </html>
    <?php
}
?>

