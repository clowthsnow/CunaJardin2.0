<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    $buscarDir = "SELECT * FROM director";
    $resultDir = $conexion->query($buscarDir);
    $buscarSec = "SELECT * FROM secretaria";
    $resultSec = $conexion->query($buscarSec);
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Crear Escuela</title>
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
                                        <h5 class="breadcrumbs-title">Crear Escuela</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Escuela
                                            </li>
                                            <li class="active blue-text" >Crear Escuela</li>

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
                                            <h4 class="header">Creación de Escuela</h4>
                                            <p class="caption">
                                                En este panel usted podra crear los datos de la Escuela.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Nueva Escuela</h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" action="control/crearEscuela.php" method="POST">
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">

                                                                        <input id="cod" type="text" class="validate" name="codigoescuela" required="">
                                                                        <label for="cod">Codigo: </label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">

                                                                        <input id="prov" type="text" class="validate" name="nombreescuela" required="">
                                                                        <label for="prov">Nombre: </label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">

                                                                        <input id="tel" type="text" class="validate" name="telefonoescuela" required="">
                                                                        <label for="tel">Telefono: </label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col s12 m12 l12">
                                                                        <label>Director:</label>
                                                                        <select id="director" class="browser-default" name="directorescuela" required="">
                                                                            <option value="" disabled selected>Selecciona</option>
                                                                            <?php while ($row = $resultDir->fetch_assoc()) { ?>
                                                                                <option value="<?php echo $row['DirectorDni']; ?>"><?php echo $row['DirectorNombre']; ?></option>
                                                                            <?php }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col s12 m12 l12">
                                                                        <label>Secretaria:</label>
                                                                        <select id="secretaria" class="browser-default" name="secretariaescuela" required="">
                                                                            <option value="" disabled selected>Selecciona</option>
                                                                            <?php while ($row = $resultSec->fetch_assoc()) { ?>
                                                                                <option value="<?php echo $row['SecretariaDni']; ?>"><?php echo $row['SecretariaNombre']; ?></option>
                                                                            <?php }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
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
                                <p>Escuela no creada correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="green-text">EXITO!!!</h4>
                                <p>Escuela creada correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-crear-escuela.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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
                    $('input#ruc').characterCounter();
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
                                $('#modal2').openModal();
                                //document.location.href = "page-crear-producto.php";
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