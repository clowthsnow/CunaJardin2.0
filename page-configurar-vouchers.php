<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    $id = $_GET['id'];
    if (!isset($id)) {
        header("location:page-ver-vouchers.php");
    }
    $buscar = "SELECT * FROM contabilidad WHERE ContabilidadId='$id'";
    $resultado = $conexion->query($buscar);
    if ($resultado->num_rows === 0) {
        header("location:page-ver-vouchers.php");
    }
    $provBD = $resultado->fetch_assoc();


    $buscarDoc = "SELECT * FROM alumno where AlumnoEstReg='A'";
    $resultDoc = $conexion->query($buscarDoc);

    $buscar2 = "SELECT * FROM tipoconcepto";
    $result2 = $conexion->query($buscar2);
    ?>




    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Configurar Voucher</title>
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
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


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
                                        <h5 class="breadcrumbs-title">Configurar Voucher</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Voucher
                                            </li>
                                            <li class="grey-text lighten-4" >Ver Voucher</li>
                                            <li class="active blue-text">Configurar Voucher</li>
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
                                            <h4 class="header">Configuracion de Voucher</h4>
                                            <p class="caption">
                                                En este panel usted podra hacer la configuracion del Voucher.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Voucher: <?php echo $provBD['ContabilidadNumeroRecibo']; ?></h4>
                                                        <div class="row">
                                                            <form id="configurar" class="col s12" action="control/modificarVoucher.php" method="POST">
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="username" type="text" class="validate" name="id" required="" hidden="true" value="<?php echo $provBD['ContabilidadId']; ?>">

                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12 m4 26 ">
                                                                        <input id="ContabilidadAlumno" type="text" class="validate" name="ContabilidadAlumno" required=""value="<?php echo $provBD['ContabilidadAlumno']; ?>">
                                                                        <label for="nombre">DNI:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m4 13">
                                                                        <span id="resultado"></span>
                                                                    </div>
                                                                    <div class="input-field col s12 m4 l3">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="buscar" id="buscar">Buscar
                                                                            <i class="mdi-action-search left"></i>
                                                                        </button>
    <!--                                                                        <input id="buscar" name="buscar" type="button" value="BUSCAR">-->
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s6">
                                                                        <input style="font-weight: bold;" id="AlumnoNombre" type="text" value="" class="validate" name="AlumnoNombre" disabled="" >
                                                                        <label class="active" for="AlumnoNombre">Nombres</label>
                                                                    </div>
                                                                    <div class="input-field col s6">
                                                                        <input style="font-weight: bold;" id="AlumnoApellidos" type="text" value="" class="validate" name="AlumnoApellidos" disabled="" >
                                                                        <label class="active" for="AlumnoApellidos">Apellidos</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="seccionA" type="text" class="validate" name="seccionA" disabled>
                                                                        <label class="active" for="seccionA">Seccion:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="gradoA" type="text" class="validate" name="gradoA" disabled>
                                                                        <label class="active" for="gradoA">Grado:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="fecha" type="text" class="datepicker" name="ContabilidadFecha" required="" value="<?php echo $provBD['ContabilidadFecha']; ?>">
                                                                        <label for="fecha" class="active">*Fecha de Nacimiento:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="ContabilidadNumeroRecibo" required="" value="<?php echo $provBD['ContabilidadNumeroRecibo']; ?>">
                                                                        <label for="nombre">Numero de Recibo:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="ContabilidadMonto" required="" value="<?php echo $provBD['ContabilidadMonto']; ?>">
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
                                                                        <input id="nombre" type="text" class="validate" name="ContabilidadDescripcion" required="" value="<?php echo $provBD['ContabilidadDescripcion']; ?>">
                                                                        <label for="nombre">Descripcion:</label>
                                                                    </div>
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
                        <p> Aula modificada correctamente.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="page-ver-vouchers.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <!--modal error-->
                <div id="modal2" class="modal">
                    <div class="modal-content">
                        <h4 class="red-text">ERROR!!!</h4>
                        <p>El aula no pudo ser modificada, intentelo de nuevo.</p>
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

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <?php include 'inc/footer.inc'; ?>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#ContabilidadAlumno").focus();
            $("#buscar").click(function (e) {
                ;
                var url = "enter.php";
                $.getJSON(url, {_num1: $("#ContabilidadAlumno").val()}, function (alumnos) {
                    $.each(alumnos, function (i, alumno) {
                        $("#AlumnoNombre").val(alumno.nombre);
                        $("#AlumnoApellidos").val(alumno.apellido);
                        $("#seccionA").val(alumno.aula);
                        $("#gradoA").val(alumno.grado);

                        if (alumno.resultado == "0") {
                            $("#resultado").css("color", "red");
                            $("#resultado").text("codigo no disponible");
                        } else {
                            $("#resultado").css("color", "green");
                            $("#resultado").text("codigo disponible");
                        }
                    })
                })
            })
        })
    </script>
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





