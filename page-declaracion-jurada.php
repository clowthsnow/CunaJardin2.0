<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    date_default_timezone_set('America/Lima');
    $fecha = new DateTime();
    include 'conexion.php';
    $usuario = $_GET['usuario'];
    $padre = $_GET['padre'];

    if (!isset($usuario) || !isset($padre)) {
//        header("location:page-datos-alumno.php");
    }
    //echo $usuario;

    $buscapadre = "SELECT * FROM padre WHERE PadreDni='$padre'";
    $resultado = $conexion->query($buscapadre);
    if ($resultado->num_rows === 0) {
        header("location:page-datos-alumno.php");
    }
    $provBD = $resultado->fetch_assoc();
//    print_r($provBD);
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Declaracion Jurada</title>
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
                                        <h5 class="breadcrumbs-title">Declaracion Jurada</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Usuarios
                                            </li>
                                            <li class="grey-text lighten-4" >Datos del Estudiante</li>
                                            <li class="active blue-text">Declaracion Jurada</li>
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
                                            <h4 class="header">Declaracion Jurada</h4>
                                            <p class="caption">
                                                En este panel usted encontrara la declaracion Jurada debe leerla y aceptarla para continuar.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Declaracion del Padre de Familia</h4>
                                                        <div class="row">
                                                            <form id="permisos" class="col s12" action="control/aceptarDeclaracion.php" method="POST">
                                                                <input type="text" name="usuario" hidden="true" value="<?php echo $usuario; ?>">
                                                                <div class="row">
                                                                    <div class="col s12">
                                                                        <p>

                                                                            Yo, <?php echo $provBD['PadreNombre'] . " " . $provBD['PadreApellidos']; ?> identificado (a) con DNI N° <?php echo $padre; ?> 
                                                                            suscribo el presente documento, de acuerdo a lo establecido en el articulo 3° de la ley n° 26459  de los Centros Educativos
                                                                            Privados, concordante con el articul 5° del Decreto Legislativo n° 882 Ley de la Promocion de la Inversion en la Educacion, 
                                                                            con el articulo 5° inciso d) y el articulo 6° inciso e) del Decreto supremo n°011-998-ED y el articulo 3° del Decreto Supremo n° 005-2002-ED.
                                                                            <br>
                                                                            <br><b>Declaro conocer la informacion relacionada con el Costo del Servicio Educativo</b>, que sustenta la Educacion 
                                                                            en la Cuna Jardin UNSA y por lo tanto, sus fines y obejitvos establecidos en el Reglamentos Interno de la Institucion; por lo 
                                                                            que expreso mi comportamiento de observar y respetar el Reglamento.
                                                                            <br>
                                                                        <p style='margin-left: 2em'>1. <b>Asumo el Compromiso de cumplir con el pago de pensiones de enseñanza dentro de los primeros 3 ultimos dias correspondientes al mes</b>, 
                                                                            por que reconozco que el Presupuesto de la Operacion e Inversion de la I.E.I. se financia con las pensiones de enseñanza que a su vez solventan el pago de remuneraciones 
                                                                            del personal docente, administrativo y de mantenimiento.</p>
                                                                        <p style='margin-left: 2em'>2. Declaro conocer que en caso de incumplimiento del pago de pensiones de la Institucion Educativa Cuna Jardin UNSA, a no ser por causa justificada 
                                                                            , <b>no se le ratificara la matricula del estudiante para el año siguiente</b>. Asimismo no se entregara ninguna documentacion del niño (a) hasta el pago de las pensiones faltantes.</p>
                                                                        <p style='margin-left: 2em'>3. Declaro conocer que el Informe del Progreso del Niño sera Entregrado a los Padres de Familia o Apoderados que se encuentren al dia con el pago de las pensiones 
                                                                            de enseñanza.</p>
                                                                        <p style='margin-left: 2em'>4. Los niños que ocasionen daños a los bienes, mobiliario u objetos, los padres deberan reponer o reparar o cambiar segun sea el daño.</p>
                                                                        <p style='margin-left: 2em'></p>
                                                                        <p style='margin-left: 2em'></p>
                                                                        <p style='margin-left: 2em'></p>
                                                                        <p style='margin-left: 2em'></p>
                                                                        <b>En base a estos fundamentos</b> y como Padre de Familia acepto libremente las clausulas anteriores, las nomas internas de la institucion Educativa Inicial y en la ciudad de Arequipa a fecha <?php echo $fecha->format('Y-m-d'); ?>
                                                                        </p> 
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        <br>
                                                        <div class="divider"></div>
                                                        <div class="row">
<!--                                                            <div class="input-field col s12 m4 l4">
                                                                                                                                <button class="btn cyan waves-effect waves-light right" > Aceptar y Continuar
                                                                                                                                    <i class="mdi-image-edit left"></i>
                                                                                                                                </button>
                                                                <a href="page-imprimir-registro.php?usuario=<?php echo $usuario;?>" target="_blank" class="btn cyan waves-effect waves-light">Imprimir ficha</a>

                                                            </div>
                                                            <div class="input-field col s12 m4 l4">
                                                                <a href="page-imprimir-declaracion.php?usuario=<?php echo $usuario;?>" target="_blank" class="btn cyan waves-effect waves-light">Imprimir declaracion</a>

                                                            </div>-->
                                                            <div class="input-field col s12 m12 l12">
                                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action"> Aceptar y Continuar
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
                <!--modal correcto-->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4 class="green-text">EXITO!!!</h4>
                        <p>Usuario y privilegios registrados correctamente</p>
                    </div>
                    <div class="modal-footer">
                        <a href="page-crear-usuario.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <!--modal error-->
                <div id="modal2" class="modal">
                    <div class="modal-content">
                        <h4 class="red-text">ERROR!!!</h4>
                        <p>Escoja un sistema para poder asignarle los permisos necesarios al usuario</p>
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
        var frm = $('#permisos');
        });
    </script>

    </body>

    </html>
    <?php
}
?>
