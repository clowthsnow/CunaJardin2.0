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
            <title>Registar Nuevo Vaucher</title>
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
                                        <h5 class="breadcrumbs-title">Registar Nuevo Voucher</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de la Contabilidad
                                            </li>
                                            <li class="active blue-text" >Registar Nuevo Voucher</li>

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
                                            <h4 class="header">Registar Nuevo Voucher</h4>
                                            <p class="caption">
                                                En este panel usted podra Registar Nuevo Voucher con los que cuenta en la Escuela.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Registar Nuevo Voucher</h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" action="control/registrarVaucher.php" method="POST">
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="nombre" type="text" class="validate" name="ContabilidadAlumno" required="">
                                                                        <label for="nombre">DNI:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="buscar">Buscar
                                                                            <i class="mdi-image-edit left"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="" required="" disabled>
                                                                        <label for="nombre">Nombres y Apellidos:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="seccion" type="text" class="validate" name="" disabled>
                                                                        <label for="dnim">Seccion:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="año" type="text" class="validate" name="" disabled>
                                                                        <label for="dnip">Año:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="fecha" type="text" class="datepicker" name="ContabilidadFecha" required="" value="<?php echo $fecha->format('Y-m-d'); ?>">
                                                                        <label for="fecha" class="active">Fecha:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="ContabilidadNumeroRecibo" required="">
                                                                        <label for="nombre">Numero de Recibo:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="ContabilidadMonto" required="">
                                                                        <label for="nombre">Monto:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col s12 m12 l12">
                                                                        <label>Concepto:</label>
                                                                        <select id="disco" class="browser-default" name="ContabilidadConcepto" required="">
                                                                            <option value="" disabled selected>Escoge un Tipo Concepto</option>
                                                                            <?php while ($row2 = $result2->fetch_assoc()) { ?>
                                                                                <option value="<?php echo $row2['TipoConceptoId']; ?>"><?php echo $row2['TipoConceptoDetalle']; ?></option>
                                                                            <?php }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="ContabilidadDescripcion" required="">
                                                                        <label for="nombre">Descripcion:</label>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="divider"></div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="registrar">Registrar
                                                                            <i class="mdi-image-edit left"></i>
                                                                        </button>
                                                                        <a href="page-ver-vouchers.php" class="btn green">Listar Vauchers</a>
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
                                <p>Contabilidad no creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="green-text">EXITO!!!</h4>
                                <p>Contabilidad creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-ver-vouchers.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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
