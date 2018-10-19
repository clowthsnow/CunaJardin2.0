<?php
SESSION_START();


if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    //echo $usuario;
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Ver Ingresos</title>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <!-- Favicons-->
            <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">


            <!-- CORE CSS-->    
            <link href="css/materialize.css" type="text/css" rel="stylesheet">
            <link href="css/style.css" type="text/css" rel="stylesheet" >
            <link href="css/estilos.css" type="text/css" rel="stylesheet" >

            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
            
            <link rel="stylesheet" href="css/jquery.dataTables.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <script src="js/jquery.dataTables.min.js"></script>
            <link rel="stylesheet" href="css/buttons.dataTables.min.css">

            <script src="js/dataTables.buttons.min.js"></script>
            <script src="js/buttons.flash.min.js"></script>
            <script src="js/jszip.min.js"></script> 
            <script src="js/pdfmake.min.js"></script>
            <script src="js/vfs_fonts.js"></script>
            <script src="js/buttons.html5.min.js"></script>
            <script src="js/buttons.print.min.js"></script>
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
            <!--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
            <!--<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


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
                                        <h5 class="breadcrumbs-title">Ver Ingresos</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Ingresos
                                            </li>
                                            <li class="active blue-text">Ver Ingresos</li>
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
                                            <h4 class="header">Ver Ingresos</h4>
                                            <p class="caption">
                                                En este panel usted podra Ver Ingresos de Pago almacenadas en el sistema y poder gestionarlas.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="container">
                                                <!--DataTables example-->
                                                <div id="table-datatables">
                                                    <h4 class="header">Ver Ingresos:</h4>
                                                    <div class="row">
                                                        <div class="input-daterange">
                                                            <div class="col-md-4">
                                                                <input type="text" name="start_date" id="start_date" class="form-control" />
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" name="end_date" id="end_date" class="form-control" />
                                                            </div>      
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        
                                                        <div class="col s12 m12 l12">
                                                            
                                                            <table id="data-table-simple" class="responsive-table display " cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Numero Recibo</th>
                                                                        <th>Fecha Emitida</th>
                                                                        
                                                                        <th>Monto</th>
                                                                        <th>Descripcion</th>
                                                                       
                                                                    </tr>
                                                                </thead>

                                                            </table>
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
                                <h4 class="red-text">ERROR!!!</h4>
                                <p>Ingresos no encontrado en la base de datos</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-ver-plan.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal eliminar-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ELIMINAR!!!</h4>
                                <p>¿Desea eliminar este Ingresos?</p>
                            </div>
                            <div class="modal-footer">                                
                                <a href="#!" id="cancelar" class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
                                <a href="#!" id="eliminar" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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

            <script type="text/javascript" language="javascript" >
                $(document).ready(function () {

                    $('.input-daterange').datepicker({
                        todayBtn: 'linked',
                        format: "yyyy-mm-dd",
                        autoclose: true
                    });
                    fetch_data('no');
                    function fetch_data(is_date_search, start_date = '', end_date = '')
                    {
                        var dataTable = $('#data-table-simple').DataTable({
                            "processing": true,
                            "serverSide": true,
                            "dom": 'Bfrtip',
                            "buttons": [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ],

                            "order": [],
                            "ajax": {
                                url: "fetch5.php",
                                type: "POST",
                                data: {
                                    is_date_search: is_date_search, start_date: start_date, end_date: end_date
                                }
                            }
                        });
                    }

                    $('#search').click(function () {
                        var start_date = $('#start_date').val();
                        var end_date = $('#end_date').val();
                        if (start_date != '' && end_date != '')
                        {

                            $('#data-table-simple').DataTable().destroy();
                            fetch_data('yes', start_date, end_date);
                        } else
                        {

                            alert("Both Date is Required");
                        }
                    });
                });
            </script>
            <!-- ================================================
            Scripts
            ================================================ -->

            <!-- jQuery Library -->
            

            <!--materialize js-->
            <script type="text/javascript" src="js/materialize.js"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <!-- data-tables -->
            <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/plugins/data-tables/data-tables-inventario.js"></script>

            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
           
        </body>

    </html>
    <?php
}
?>

