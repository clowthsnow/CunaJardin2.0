<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    $id = $_GET['id'];
   
    include 'conexion.php';
    //echo $usuario;
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Ver Alumnos</title>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <!-- Favicons-->
            <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
            <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">
            <script src="js/jquery-1.10.2.js"></script>

            <!-- CORE CSS-->    
            <link href="css/materialize.css" type="text/css" rel="stylesheet">
            <link href="css/style.css" type="text/css" rel="stylesheet" >
            <link href="css/estilos.css" type="text/css" rel="stylesheet" >

            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">



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
                                        <h5 class="breadcrumbs-title">Ver Alumnos</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Notas
                                            </li>
                                            <li class="active blue-text">Ver Ver Alumnos</li>
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
                                            <h4 class="header">Ver Ver Alumnos</h4>
                                            <p class="caption">
                                                En este panel usted podra ver Ver Alumnos almacenados en el sistema y poder gestionarlas.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="container">
                                                <!--DataTables example-->
                                                <div id="table-datatables">
                                                    <h4 class="header">Alumnos:</h4>
                                                    <div class="row">

                                                                <!--<h1>Alumnos <small></small></h1>-->
                                                        <a href="#" class="btn btn-default"><i class='fa fa-asterisk'></i> Nuevo Alumno</a>

                                                        <a href="#" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a>
                                                        <a href="#" class="btn btn-default"><i class='fa fa-smile-o'></i> Comportamiento</a>
                                                        <a href="page-crear-nota2.php?id=<?php echo $id;?>" class="btn btn-default"><i class='fa fa-tasks'></i> Calificaciones</a>
                                                        <a href="#" class="btn btn-default"><i class='fa fa-th-large'></i> Bloques</a>
                                                        <!-- Single button -->
                                                        
                                                            <div class="btn-group">
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                <i class='fa fa-th-list'></i> Listas <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a href="#">Asistencia</a></li>
                                                                <li><a href="#">Comportamiento</a></li>
                                                                <li><a href="#">Calificaciones</a></li>
                                                            </ul>
                                                        </div>
                                                        <a href="#" class="btn btn-default"><i class='fa fa-download'></i> Descargar</a>


                                                        <div class="col s12 m12 l12">
                                                            <table id="data-table-simple" class="responsive-table display " cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Codigo</th>
                                                                        <th>Alumno</th>
                                                                        
                                                                        <th>Configurar</th>
                                                                        <th>Eliminar</th>
                                                                    </tr>
                                                                </thead>

                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Codigo</th>
                                                                        <th>Alumno</th>
                                                                        
                                                                        <th>Configurar</th>
                                                                        <th>Eliminar</th>
                                                                    </tr>
                                                                </tfoot>

                                                                <tbody>
                                                                    <?php
                                                                    $consultaUser = "SELECT * FROM aulaalumnos WHERE AulaAlumnosId='$id'";
                                                                    $resultado = $conexion->query($consultaUser) or die($conexion->error);
                                                                    while ($row = $resultado->fetch_assoc()) {
                                                                        echo "<tr>
                                                                        <td>" . $row['AulaAlumnosId'] . "</td>";

                                                                        $consultaCat = "SELECT * FROM alumno WHERE AlumnoDni='" . $row['AulaAlumnosAlumno'] . "'";
                                                                        $resultado2 = $conexion->query($consultaCat) or die($conexion->error);
                                                                        while ($row2 = $resultado2->fetch_assoc()) {
                                                                            echo "<td>" . $row2['AlumnoNombre'] . "</td>";
                                                                        }
                                       
                                                                        echo "<td><a href=\"page-configurar-nota.php?id=" . $row['AulaAlumnosId'] . "\"><span class=\"task-cat cyan\">Configurar</span></a></td>
                                                                        <td><a href=\"control/eliminarNota.php?id=" . $row['AulaAlumnosId'] . "\" class=\"delete\"><span class=\"task-cat red\">Eliminar</span></a></td>
                                                                        </tr>";
                                                                    }
                                                                    ?>
                                                                </tbody>
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
                                <p>Nota no se encontrado en la base de datos</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-ver-notas.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal eliminar-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ELIMINAR!!!</h4>
                                <p>¿Desea eliminar esta nota?</p>
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


            <!-- ================================================
            Scripts
            ================================================ -->
            <script src="res/bootstrap3/js/bootstrap.min.js"></script>
            <!-- jQuery Library -->
            <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>  

            <!--materialize js-->
            <script type="text/javascript" src="js/materialize.js"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <!-- data-tables -->
            <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/plugins/data-tables/data-tables-inventario.js"></script>

            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="js/plugins.js"></script>

            <script>
                $(document).ready(function () {
                    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
                    $('#modal1').modal();
                    $('#modal2').modal();
                });
                var href;
                $('.delete').click(function (evt) {
                    evt.preventDefault();
                    $('#modal2').openModal();
                    href = $(this).attr('href');
                });

                $('#eliminar').click(function (ev) {
                    ev.preventDefault();

                    $.ajax({
                        type: "GET",
                        url: href,
                        success: function (respuesta) {

                            if (respuesta == 1) {
                                location.reload(true);
                                //$('#modal1').openModal();
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

