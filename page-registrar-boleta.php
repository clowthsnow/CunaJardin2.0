<?php
//session_start();
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    if (isset($_GET['voucher'])) {
        $id = $_GET['voucher'];
        $buscar3 = "SELECT * FROM contabilidad WHERE ContabilidadId='$id'";
        $resultado3 = $conexion->query($buscar3);
//    if ($resultado3->num_rows === 0) {
//        header("location:page-registrar-boleta.php");
//    }
        $provBD = $resultado3->fetch_assoc();
    }


    date_default_timezone_set('America/Lima');
    $fecha = new DateTime();
//    include 'conexion.php';
    $buscar = "SELECT * FROM alumno";
    $result = $conexion->query($buscar);

    $buscar2 = "SELECT * FROM tipoconcepto";
    $result2 = $conexion->query($buscar2);
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Registar Nueva Boleta</title>
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
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<!--            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->



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
                                        <h5 class="breadcrumbs-title">Registar Nueva Boleta</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de la Contabilidad
                                            </li>
                                            <li class="active blue-text" >Registar Nueva Boleta</li>

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
                                            <h4 class="header">Registar Nueva Boleta</h4>
                                            <p class="caption">
                                                En este panel usted podra Registar Nueva Boleta con los que cuenta en la Escuela.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Registar Nueva Boleta</h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" action="control/registrarBoleta.php" method="POST">
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <!--<button data-toggle="modal" data-target="#listaVoucher" type="button" class="btn btn-sm btn-primary">Agregar Voucher</button>-->
                                                                        <a class="waves-effect waves-light btn modal-trigger" href="#listaVoucher">Agregar Voucher</a>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="BoletaMonto" required="" value="<?php if(isset($provBD)){echo $provBD['ContabilidadMonto'];} else {
    
                                                                        }{} ?>">
                                                                        <label for="nombre">Monto:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="BoletaDescripcion" required="" value="<?php if(isset($provBD)){echo $provBD['ContabilidadDescripcion'];} else {
    
                                                                        }{} ?>">
                                                                        <label for="nombre">Descripcion:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="BoletaCodigo" required="">
                                                                        <label for="nombre">Nro. de boleta de venta Electronica:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="fecha" type="text" class="datepicker" name="BoletaFechaCanje" required="" value="<?php echo $fecha->format('Y-m-d'); ?>">
                                                                        <label for="fecha" class="active">Fecha de Canje:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="fecha" type="text" class="datepicker" name="BoletaFechaPago" required="" value="<?php echo $fecha->format('Y-m-d'); ?>">
                                                                        <label for="fecha" class="active">Fecha de Pago:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <br>
                                                                <div class="divider"></div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Registrar
                                                                            <i class="mdi-image-edit left"></i>
                                                                        </button>
                                                                        <a href="page-ver-boletas.php" class="btn green">Listar Boletas</a>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->
<!--                                                         Modal 
                                                        <div class="modal fade" id="listaVoucher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Listado de Voucher</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal">
                                                                            <div class="form-group">
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
                                                                                </div>
                                                                                <button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
                                                                            </div>
                                                                        </form>
                                                                        <div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div> Carga gif animado 
                                                                        <div class="outer_div" ></div> Datos ajax Final 


                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                        <div id="listaVoucher" class="modal">
                                                            <div class="modal-content">
                                                              <h4>Listado de Voucherr</h4>
                                                              <p>A bunch of text</p>
                                                              <form class="form-horizontal">
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
                                                                    </div>
                                                                    <!--<button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>-->
                                                                    <button class="btn waves-effect waves-light" type="button" onclick="load(1)">Buscar
                                                                        <i class="material-icons right">send</i>
                                                                    </button>
                                                               </div>
                                                              </form>
                                                              <!--<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div>--> 
                                                              <div class="outer_div" ></div>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                            </div>
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
                                <a href="page-ver-boletas.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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

            <script>
                $(document).ready(function () {
                    load(1);
                });

                function load(page) {
                    var q = $("#q").val();
                    
//                    $("#loader").fadeIn('slow');
                    $.ajax({
                        url: './ajax/productos_cotizacion.php?action=ajax&page=' + page + '&q=' + q,
//                        beforeSend: function (objeto) {
//                            $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
//                        },
                        success: function (data) {
                            $(".outer_div").html(data).fadeIn('slow');
//                            $('#loader').html('');

                        }
                    })
                }
            </script>
           
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
