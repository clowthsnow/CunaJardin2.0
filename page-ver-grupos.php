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
            <title>Ver Grupos</title>
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
                                        <h5 class="breadcrumbs-title">Ver Grupos</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Curso
                                            </li>
                                            <li class="active blue-text">Ver Grupos</li>
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
                                            <h4 class="header">Ver Grupos</h4>
                                            <p class="caption">
                                                En este panel usted podra ver todos los Grupos de cada Curso almacenadas en el sistema y poder gestionarlas.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="container">
                                                <!--DataTables example-->
                                                <div id="table-datatables">
                                                    <h4 class="header">Grupos:</h4>
                                                    <div class="row">

                                                        <div class="col s12 m12 l12">
                                                            <table id="data-table-row-grouping" class="responsive-table display " cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Curso</th>
                                                                        <th>Turno</th>
                                                                        <th>Semestre</th>
                                                                        <th>Docente</th>
                                                                        <th>Aula</th>
                                                                        <th>Asistencia</th>
                                                                        <th>Alumnos</th>
                                                                        <th>Configurar</th>
                                                                        <th>Eliminar</th>
                                                                    </tr>
                                                                </thead>

                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Curso</th>
                                                                        <th>Turno</th>
                                                                        <th>Semestre</th>
                                                                        <th>Docente</th>
                                                                        <th>Aula</th>
                                                                        <th>Asistencia</th>
                                                                        <th>Alumnos</th>
                                                                        <th>Configurar</th>
                                                                        <th>Eliminar</th>
                                                                    </tr>
                                                                </tfoot>

                                                                <tbody>
                                                                    <?php
                                                                    $consultaUser = "SELECT cursodetalle.*, curso.*, docente.*, turno.*, semestre.*, aula.* FROM cursodetalle "
                                                                            . "LEFT JOIN curso ON cursodetalle.CursoDetalleCurso=curso.CursoId "
                                                                            . "LEFT JOIN docente ON cursodetalle.CursoDetalleDocente=docente.DocenteDni "
                                                                            . "LEFT JOIN turno ON cursodetalle.CursoDetalleTurno=turno.TurnoId "
                                                                            . "LEFT JOIN semestre ON cursodetalle.CursoDetalleSemestre=semestre.SemestreId "
                                                                            . "LEFT JOIN aula ON cursodetalle.CursoDetalleAula=aula.AulaId"
                                                                            . " WHERE CursoDetalleEstReg='A'";
                                                                    $resultado = $conexion->query($consultaUser) or die($conexion->error);
                                                                    while ($row = $resultado->fetch_assoc()) {
//                                                                        print_r($row);
                                                                        echo "<tr>
                                                                        <td>" . $row['CursoNombre'] . "</td>
                                                                        <td>" . $row['TurnoDetalle'] . "</td>
                                                                        <td>" . $row['SemestreDetalle']. "</td>
                                                                        <td>" . $row['DocenteNombre']." ".$row['DocenteApellido']. "</td>
                                                                        <td>" , $row['AulaUbicacion']." ".$row['AulaNumero']."</td>";
                                                                        
                                                                        
                                                                        echo "<td><a href=\"page-asistencia-alumnos.php?id=" . $row['CursoDetalleId'] . "\"><span class=\"task-cat green\">Asistencia</span></a></td>"
                                                                                . " <td><a href=\"page-asignar-alumnos.php?id=" . $row['CursoDetalleId'] . "\"><span class=\"task-cat orange\">Asignar</span></a></td>"
                                                                                . "<td><a href=\"page-configurar-plan.php?id=" . $row['CursoDetalleId'] . "\"><span class=\"task-cat cyan\">Configurar</span></a></td>
                                                                        <td><a href=\"control/eliminarPlan.php?id=" . $row['CursoDetalleId'] . "\" class=\"delete\"><span class=\"task-cat red\">Eliminar</span></a></td>
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
                                <p>Plan no encontrado en la base de datos</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-ver-plan.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal eliminar-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ELIMINAR!!!</h4>
                                <p>¿Desea eliminar este plan?</p>
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



