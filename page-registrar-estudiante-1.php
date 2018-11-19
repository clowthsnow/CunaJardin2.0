<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    include_once 'control/crearEstudiante.php';
    date_default_timezone_set('America/Lima');
    $fecha = new DateTime();
    
    
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
            <link href="css/style2.css" type="text/css" rel="stylesheet" >
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="js/peticion.js"></script>
            <script src="js/datosPadre.js"></script>
            
            <script src="js/modal.js"></script>


            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" >
            <style>
                table {
                    width: 100%;
                    border: 1px solid #000;
                }
                th, td {
                   width: 25%;
                   text-align: left;
                   vertical-align: top;
                   border: 1px solid #000;
                   border-collapse: collapse;
                   padding: 0.3em;
                   caption-side: bottom;
                }
                caption {
                   padding: 0.3em;
                   color: #fff;
                    background: #000;
                }
                th {
                   background: #eee;
                }
            </style>


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
                                            <li class="active blue-text" >Datos del Estudiante</li>

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
                                                En este panel usted podra rellenar los respectivos datos del alumno para hacer la respectiva matricula.

                                                <br><br>

                                                En caso que los datos llenados al ser corraborados  no sean fidedignos sera anulada y/o invalidada su Matricula.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Estudiante:</h4>
                                                        <div class="row">
                                                            <div class="resp"></div>
                                                            
                                                            <!--<div class="ok"><p>Su solicitud ha sido enviada</p></div>-->
                                                            
                                                            <!--<form id="formulario" action="control/crearEstudiante.php" method="POST" enctype="multipart/form-data" name="formulario">-->
                                                            <form id="" method="POST" enctype="multipart/form-data" name="formulario">
                                                                <ul id="progress">
                                                                    <li class="activo">Principal</li>
                                                                    <li>Datos Generales del niño</li>
                                                                    <li>Datos de Atencion al niño</li>
                                                                    <li>Datos Familiares</li>
                                                                    <li>Vivienda</li>
                                                                </ul>
                                                                
                                                                <fieldset>
                                                                    <h4 class="header2">Datos de Matricula:</h4>
                                                                    <div class="row">
                                                                        <div class="file-field input-field col s12 m12 l12">
                                                                            <input class="file-path validate" type="text" />
                                                                            <div class="btn">
                                                                                <span>*Foto</span>
                                                                                <input type="file" name="foto"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="nombre" type="text" class="validate" name="nombre">
                                                                            <label for="nombre">*Nombres:</label>
                                                                        </div>
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="apellidos" type="text" class="validate" name="apellido" >
                                                                            <label for="apellidos">*Apellidos:</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="input-field col s6 m6 l6">
                                                                            <input id="fecha" type="text" class="datepicker" name="fechaNac"  value="<?php echo $fecha->format('Y-m-d'); ?>">
                                                                            <label for="fecha" class="active">*Fecha de Nacimiento:</label>
                                                                        </div>
                                                                        <div class="col s12 m6 l6">
                                                                            <label>Tipo:</label>
                                                                            <select id="tipoa" class="browser-default" name="tipoA">
                                                                                <option value="" disabled selected>*Escoge el tipo de alumno:</option>
                                                                                <?php
                                                                                $btipoa = "SELECT * FROM tipoalumno WHERE TipoAlumnoEstReg='A'";
                                                                                $resTipo = $conexion->query($btipoa);
                                                                                while ($fila = $resTipo->fetch_assoc()) {
                                                                                    echo " <option value=\"".$fila['TipoAlumnoId']."\" >".$fila['TipoAlumnoDetalle']."</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="next1" class="next right" value="Proximo"/>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="divider"></div>
                                                                    <br>
                                                                    <h4 class="header2">Datos Generales del niño:</h4>
                                                                    <div class="row">
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="dni" type="number" class="validate" name="dni" required="" maxlength="8">
                                                                            <label for="dni">*DNI:</label>
                                                                        </div>
                                                                        <div class="col s12 m6 l6">
                                                                            <label>Sexo:</label>
                                                                            <select id="disco" class="browser-default" name="sexo" required="">
                                                                                <option value="" disabled selected>*Escoge el sexo del niño:</option>
                                                                                <option value="Femenino" >Femenino</option>
                                                                                <option value="Masculino" >Masculino</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="edad" type="text" class="validate" name="edad" required="" placeholder=" A años B meses">
                                                                            <label for="edad" class="active">*Edad:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12 m12 l12">
                                                                            <input id="nacimiento" type="text" class="validate" name="nacimiento" required="">
                                                                            <label for="nacimiento">*Lugar de Nacimiento:</label>
                                                                        </div>
                                                                        <div class="input-field col s12 m12 l12">
                                                                            <input id="direccion" type="text" class="validate" name="direccion" required="">
                                                                            <label for="direccion">*Direccion:</label>
                                                                        </div>

                                                                        <div class="input-field col s12 m12 l12">
                                                                            <input id="escolaridad" type="text" class="validate" name="escolaridad" >
                                                                            <label for="escolaridad">Situacion de Escolaridad Promovido:</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="prev" class="prev acao" value="Anteror"/>
                                                                    <input type="button" name="next2" class="next right" value="Proximo"/>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="divider"></div>
                                                                    <br>
                                                                    <h4 class="header2">Datos de Atencion del niño:</h4>

                                                                    <div class="row">

                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Control Medico en el Embarazo:</label>
                                                                            <select id="disco" class="browser-default" name="controlmed" required="">
                                                                                <option value="" disabled selected>Control Medico:</option>
                                                                                <option value="Si" >Si</option>
                                                                                <option value="No" >No</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Parto:</label>
                                                                            <select id="disco" class="browser-default" name="parto" required="">
                                                                                <option value="" disabled selected>Tipo de Parto:</option>
                                                                                <option value="Normal" >Normal</option>
                                                                                <option value="Cesarea" >Cesarea</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="peso" type="text" class="validate" name="peso" required="">
                                                                            <label for="peso" >*Peso:</label>
                                                                        </div>
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="talla" type="text" class="validate" name="talla" required="">
                                                                            <label for="talla">*Talla:</label>
                                                                        </div>

                                                                        <div class="input-field col s12 m12 l12">
                                                                            <input id="dificulta" type="text" class="validate" name="dificultad" >
                                                                            <label for="dificultad">Dificultades:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Alimentacion:</label>
                                                                            <select id="lactancia" class="browser-default" name="lactancia" required="">
                                                                                <option value="" disabled selected>Tipo de Lactancia:</option>
                                                                                <option value="Materna" >Materna</option>
                                                                                <option value="Artificial" >Artificial</option>
                                                                                <option value="Mixta" >Mixta</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Vacunas:</label>
                                                                            <select id="vacunas" class="browser-default" name="vacunas" required="">
                                                                                <option value="" disabled selected>Vacunas:</option>
                                                                                <option value="Completa" >Completa</option>
                                                                                <option value="Incompleta" >Incompletas</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Temores:</label>
                                                                            <select id="temor" class="browser-default" name="temores" required="">
                                                                                <option value="" disabled selected>Temores:</option>
                                                                                <option value="Si" >Si</option>
                                                                                <option value="No" >No</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="temordet" type="text" class="validate" name="temordetalle" >
                                                                            <label for="temordet">Especifique:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Limitaciones Fisicas:</label>
                                                                            <select id="limitacion" class="browser-default" name="limitacionfis" required="">
                                                                                <option value="" disabled selected>Limitaciones Fisicas:</option>
                                                                                <option value="Si" >Si</option>
                                                                                <option value="No" >No</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="limitaciondet" type="text" class="validate" name="limitacionfisdetalle" >
                                                                            <label for="limitaciondet">Especifique:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Dificultades Sensoriales:</label>
                                                                            <select id="sensorial" class="browser-default" name="dificultadsens" required="">
                                                                                <option value="" disabled selected>Dificultades Sensoriales:</option>
                                                                                <option value="Si" >Si</option>
                                                                                <option value="No" >No</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="sensorialdet" type="text" class="validate" name="dificultadsensdet" >
                                                                            <label for="sensorialdet">Especifique:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Alergias:</label>
                                                                            <select id="alergia" class="browser-default" name="alergia" required="">
                                                                                <option value="" disabled selected>Alergias:</option>
                                                                                <option value="Si" >Si</option>
                                                                                <option value="No" >No</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="alergiadet" type="text" class="validate" name="alergiadet" >
                                                                            <label for="alergiadet">Especifique:</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="button" name="prev" class="prev acao" value="Anteror"/>
                                                                    <input type="button" name="next3" class="next right" value="Proximo"/>
                                                                </fieldset>
                                                                
                                                                <fieldset>
                                                                    <div class="divider"></div>
                                                                    <br>
                                                                    <h4 class="header2">Datos de la Madre:</h4>
                                                                    <div class="row">
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="dnim" type="text" class="validate" name="dnim" required="" maxlength="8" placeholder="Buscar...">
                                                                            <label for="dnim">*DNI de la Madre:</label>
                                                                        </div>
                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="dnip" type="text" class="validate" name="dnip" required="" maxlength="8" placeholder="Buscar...">
                                                                            <label for="dnip">*DNI del Padre:</label>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="row">
                                                                        
                                                                        <section id="tabla_resultado" class="input-field col s12 m6 l6">

                                                                        </section>
                                                                        <section id="tabla_resultado2" class="input-field col s12 m6 l6">

                                                                        </section>
                                                                    </div>
                                                                    <input type="button" name="prev" class="prev acao" value="Anteror"/>
                                                                    <input type="button" name="next4" class="next right" value="Proximo"/>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <div class="divider"></div>
                                                                    <br>
                                                                    <h4 class="header2">Vivienda:</h4>
                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Tipo:</label>
                                                                            <select id="vivtipo" class="browser-default" name="vivtipo" required="">
                                                                                <option value="" disabled selected>Tipo:</option>
                                                                                <option value="Unifamiliar" >Unifamiliar</option>
                                                                                <option value="Multifamiliar" >Multifamiliar</option>
                                                                                <option value="Alquilado" >Alquilado</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Material:</label>
                                                                            <select id="vivmaterial" class="browser-default" name="vivmaterial" required="">
                                                                                <option value="" disabled selected>Material de Construccion:</option>
                                                                                <option value="Noble" >Noble</option>
                                                                                <option value="Provisional" >Provisional</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Habitaciones:</label>
                                                                            <select id="vivhab" class="browser-default" name="vivhab" required="">
                                                                                <option value="" disabled selected>Numero de Habitaciones:</option>
                                                                                <option value="1-2" >1-2</option>
                                                                                <option value="3-4" >3-4</option>
                                                                                <option value="5+" >5+</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="input-field col s12 m6 l6">
                                                                            <input id="vivpers" type="number" class="validate" name="vivpers" required="" maxlength="2">
                                                                            <label for="vivpers">*Numero de Personas:</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Agua Potable:</label>
                                                                            <select id="vivagua" class="browser-default" name="vivagua" required="">
                                                                                <option value="" disabled selected>Tipo de Agua Potable:</option>
                                                                                <option value="Individual" >Individual</option>
                                                                                <option value="Comunal" >Comunal</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Luz Electrica:</label>
                                                                            <select id="vivluz" class="browser-default" name="vivluz" required="">
                                                                                <option value="" disabled selected>Tipo de Luz Electrica:</option>
                                                                                <option value="Si" >Si</option>
                                                                                <option value="No" >No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 m6 l6">
                                                                            <label>*Servicio Higienico:</label>
                                                                            <select id="vivserv" class="browser-default" name="vivserv" required="">
                                                                                <option value="" disabled selected>Tipo de Servicio Higienico:</option>
                                                                                <option value="Water" >Water</option>
                                                                                <option value="Silo" >Silo</option>
                                                                                <option value="Otro" >Otro</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <input type="button" name="prev" class="prev acao" value="Anterior"/>
                                                                    <!--<input type="submit" name="next" class="next right" value="Registrar"/>-->
                                                                    
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <button class="next right" type="submit" name="registrarEstudiante">Registrar
                                                                                
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <!--<input type="submit" name="next" class="next" value="Proximo"/>-->
                                                                </fieldset>
                                                                <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                                                                <script type="text/javascript" src="js/function.js"></script>
                                                                
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


                //                });
            </script>
        </body>

    </html>
    <?php
}
?>

