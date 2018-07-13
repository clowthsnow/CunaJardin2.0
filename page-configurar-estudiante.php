<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    $id = $_GET['id'];
    if (!isset($id)) {
        header("location:page-ver-estudiantes.php");
    }
    $buscar = "SELECT alumno.*, tipoalumno.*,vivienda.* FROM alumno "
            . "LEFT JOIN tipoalumno ON tipoalumno.TipoAlumnoId=alumno.AlumnoTipoAlumno "
            . "LEFT JOIN vivienda ON vivienda.ViviendaAlumno=alumno.AlumnoDni "
            . "WHERE AlumnoDni='$id'";
    $resultado = $conexion->query($buscar);
    if ($resultado->num_rows === 0) {
        header("location:page-ver-estudiantes.php");
    }
    $provBD = $resultado->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Configurar Contador</title>
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
                                        <h5 class="breadcrumbs-title">Configurar Datos del Estudiante</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Usuarios
                                            </li>
                                            <li class="grey-text lighten-4" >Ver Estudiantes</li>
                                            <li class="active blue-text">Configurar Datos del Estudiante</li>
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
                                            <h4 class="header">Configuracion de Estudiantes</h4>
                                            <p class="caption">
                                                En este panel usted podra hacer la configuracion de los datos del Estudiante.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Estudiante: <?php echo $provBD['AlumnoDni']; ?></h4>
                                                        <div class="row">
                                                            <div class="col s12 m12 l12 center">
                                                                <img class="materialboxed" width="240" src="fotoEstudiante/<?php echo $provBD['AlumnoFoto']; ?>" alt="sample">
                                                            </div> 
                                                        </div>
                                                        <div class="row">

                                                            <form id="configurar" class="col s12" action="control/modificarEstudiante.php" method="POST" enctype="multipart/form-data">

                                                                <div class="row">
                                                                    <div class="file-field input-field col s12 m12 l12">
                                                                        <input class="file-path validate" type="text"  value="<?php echo $provBD['AlumnoFoto']; ?>"/>
                                                                        <div class="btn">
                                                                            <span>*Foto</span>
                                                                            <input type="file" name="foto"/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="nombre" type="text" class="validate" name="nombre" required="" value="<?php echo $provBD['AlumnoNombre']; ?>">
                                                                        <label for="nombre" class="active">*Nombres:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="apellidos" type="text" class="validate" name="apellido" required="" value="<?php echo $provBD['AlumnoApellidos']; ?>">
                                                                        <label for="apellidos" class="active">*Apellidos:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <div class="input-field col s6 m6 l6">
                                                                        <input id="fecha" type="text" class="datepicker" name="fechaNac" required="" value="<?php echo $provBD['AlumnoFechaNacimiento']; ?>">
                                                                        <label for="fecha" class="active">*Fecha de Nacimiento:</label>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <label>Tipo:</label>
                                                                        <select id="tipoa" class="browser-default" name="tipoA" required="">
                                                                            <option value="" disabled selected>*Escoge el tipo de alumno:</option>
                                                                            <?php
                                                                            $btipoa = "SELECT * FROM tipoalumno WHERE TipoAlumnoEstReg='A'";
                                                                            $resTipo = $conexion->query($btipoa);
                                                                            while ($fila = $resTipo->fetch_assoc()) {
                                                                                echo " <option value=\"" . $fila['TipoAlumnoId'] . "\"";
                                                                                if ($fila['TipoAlumnoId'] == $provBD['AlumnoTipoAlumno']) {
                                                                                    echo "selected";
                                                                                }
                                                                                echo " >" . $fila['TipoAlumnoDetalle'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <br>
                                                                <div class="divider"></div>
                                                                <br>
                                                                <h4 class="header2">Datos Generales del niño:</h4>
                                                                <div class="row">
                                                                    <input id="dni" type="number" class="validate" name="dni" required="" maxlength="8" hidden="true" value="<?php echo $provBD['AlumnoDni']; ?>">

                                                                    
                                                                    <div class="col s12 m6 l6">
                                                                        <label>Sexo:</label>
                                                                        <select id="disco" class="browser-default" name="sexo" required="">
                                                                            <option value="" disabled selected>*Escoge el sexo del niño:</option>
                                                                            <option value="Femenino" <?php echo ("Femenino" == $provBD['AlumnoSexo']) ? 'selected' : ''; ?>>Femenino</option>
                                                                            <option value="Masculino" <?php echo ("Masculino" == $provBD['AlumnoSexo']) ? 'selected' : ''; ?>>Masculino</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="edad" type="text" class="validate" name="edad" required="" placeholder=" A años B meses" value="<?php echo $provBD['AlumnoEdad']; ?>">
                                                                        <label for="edad" class="active">*Edad:</label>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12 m12 l12">
                                                                        <input id="nacimiento" type="text" class="validate" name="nacimiento" required="" value="<?php echo $provBD['AlumnoLugarNacimiento']; ?>">
                                                                        <label for="nacimiento" class="active">*Lugar de Nacimiento:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m12 l12">
                                                                        <input id="direccion" type="text" class="validate" name="direccion" required="" value="<?php echo $provBD['AlumnoDomicilio']; ?>">
                                                                        <label for="direccion" class="active">*Direccion:</label>
                                                                    </div>

                                                                    <div class="input-field col s12 m12 l12">
                                                                        <input id="escolaridad" type="text" class="validate" name="escolaridad" value="<?php echo $provBD['AlumnoSituacionPromovido']; ?>">
                                                                        <label for="escolaridad" class="active">Situacion de Escolaridad Promovido:</label>
                                                                    </div>

                                                                </div>

                                                                <br>
                                                                <div class="divider"></div>
                                                                <br>
                                                                <h4 class="header2">Datos de Atencion del niño:</h4>

                                                                <div class="row">

                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Control Medico en el Embarazo:</label>
                                                                        <select id="disco" class="browser-default" name="controlmed" required="">
                                                                            <option value="" disabled selected>Control Medico:</option>
                                                                            <option value="Si" <?php echo ("Si" == $provBD['AlumnoControlMedico']) ? 'selected' : ''; ?>>Si</option>
                                                                            <option value="No" <?php echo ("No" == $provBD['AlumnoControlMedico']) ? 'selected' : ''; ?>>No</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Parto:</label>
                                                                        <select id="disco" class="browser-default" name="parto" required="">
                                                                            <option value="" disabled selected>Tipo de Parto:</option>
                                                                            <option value="Normal" <?php echo ("Normal" == $provBD['AlumnoParto']) ? 'selected' : ''; ?>>Normal</option>
                                                                            <option value="Cesarea" <?php echo ("Cesarea" == $provBD['AlumnoParto']) ? 'selected' : ''; ?>>Cesarea</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="peso" type="text" class="validate" name="peso" required="" value="<?php echo $provBD['AlumnoPeso']; ?>">
                                                                        <label for="peso" class="active">*Peso:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="talla" type="text" class="validate" name="talla" required="" value="<?php echo $provBD['AlumnoTalla']; ?>">
                                                                        <label for="talla" class="active">*Talla:</label>
                                                                    </div>

                                                                    <div class="input-field col s12 m12 l12">
                                                                        <input id="dificulta" type="text" class="validate" name="dificultad" value="<?php echo $provBD['AlumnoDifucaltades']; ?>">
                                                                        <label for="dificultad" class="active">Dificultades:</label>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Alimentacion:</label>
                                                                        <select id="lactancia" class="browser-default" name="lactancia" required="">
                                                                            <option value="" disabled selected>Tipo de Lactancia:</option>
                                                                            <option value="Materna" <?php echo ("Materna" == $provBD['AlumnoLactanciaTipo']) ? 'selected' : ''; ?>>Materna</option>
                                                                            <option value="Artificial" <?php echo ("Artificial" == $provBD['AlumnoLactanciaTipo']) ? 'selected' : ''; ?>>Artificial</option>
                                                                            <option value="Mixta" <?php echo ("Mixta" == $provBD['AlumnoLactanciaTipo']) ? 'selected' : ''; ?>>Mixta</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Vacunas:</label>
                                                                        <select id="vacunas" class="browser-default" name="vacunas" required="">
                                                                            <option value="" disabled selected>Vacunas:</option>
                                                                            <option value="Completa" <?php echo ("Completa" == $provBD['AlumnoVacunas']) ? 'selected' : ''; ?>>Completa</option>
                                                                            <option value="Incompleta" <?php echo ("Incompleta" == $provBD['AlumnoVacunas']) ? 'selected' : ''; ?>>Incompletas</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Temores:</label>
                                                                        <select id="temor" class="browser-default" name="temores" required="">
                                                                            <option value="" disabled selected>Temores:</option>
                                                                            <option value="Si" <?php echo ("Si" == $provBD['AlumnoTemores']) ? 'selected' : ''; ?>>Si</option>
                                                                            <option value="No" <?php echo ("No" == $provBD['AlumnoTemores']) ? 'selected' : ''; ?>>No</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="temordet" type="text" class="validate" name="temordetalle" value="<?php echo $provBD['AlumnoTemoresDetalles']; ?>">
                                                                        <label for="temordet" class="active">Especifique:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Limitaciones Fisicas:</label>
                                                                        <select id="limitacion" class="browser-default" name="limitacionfis" required="">
                                                                            <option value="" disabled selected>Limitaciones Fisicas:</option>
                                                                            <option value="Si" <?php echo ("Si" == $provBD['AlumnoLimitacionFisica']) ? 'selected' : ''; ?>>Si</option>
                                                                            <option value="No" <?php echo ("No" == $provBD['AlumnoLimitacionFisica']) ? 'selected' : ''; ?>>No</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="limitaciondet" type="text" class="validate" name="limitacionfisdetalle" value="<?php echo $provBD['AlumnoLimitacionFisicaDet']; ?>" >
                                                                        <label for="limitaciondet" class="active">Especifique:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Dificultades Sensoriales:</label>
                                                                        <select id="sensorial" class="browser-default" name="dificultadsens" required="">
                                                                            <option value="" disabled selected>Dificultades Sensoriales:</option>
                                                                            <option value="Si" <?php echo ("Si" == $provBD['AlumnoDificultadControl']) ? 'selected' : ''; ?>>Si</option>
                                                                            <option value="No" <?php echo ("No" == $provBD['AlumnoDificultadControl']) ? 'selected' : ''; ?>>No</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="sensorialdet" type="text" class="validate" name="dificultadsensdet" value="<?php echo $provBD['AlumnoDificultadControlDet']; ?>">
                                                                        <label for="sensorialdet" class="active">Especifique:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Alergias:</label>
                                                                        <select id="alergia" class="browser-default" name="alergia" required="">
                                                                            <option value="" disabled selected>Alergias:</option>
                                                                            <option value="Si" <?php echo ("Si" == $provBD['AlumnoAlergias']) ? 'selected' : ''; ?>>Si</option>
                                                                            <option value="No" <?php echo ("No" == $provBD['AlumnoAlergias']) ? 'selected' : ''; ?>>No</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="alergiadet" type="text" class="validate" name="alergiadet" value="<?php echo $provBD['AlumnoAlergiasDet']; ?>">
                                                                        <label for="alergiadet" class="active">Especifique:</label>
                                                                    </div>
                                                                </div>

                                                                <br>
                                                                <div class="divider"></div>
                                                                <br>
                                                                <h4 class="header2">Datos de Familiares:</h4>

                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="dnim" type="number" class="validate" name="dnim" required="" maxlength="8" value="<?php echo $provBD['AlumnoTutorIdMadre']; ?>">
                                                                        <label for="dnim" class="active">*DNI de la Madre:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="dnip" type="number" class="validate" name="dnip" required="" maxlength="8" value="<?php echo $provBD['AlumnoTutorIdPadre']; ?>">
                                                                        <label for="dnip" class="active">*DNI del Padre:</label>
                                                                    </div>
                                                                </div>

                                                                <br>
                                                                <div class="divider"></div>
                                                                <br>
                                                                <h4 class="header2">Vivienda:</h4>
                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Tipo:</label>
                                                                        <select id="vivtipo" class="browser-default" name="vivtipo" required="">
                                                                            <option value="" disabled selected>Tipo:</option>
                                                                            <option value="Unifamiliar" <?php echo ("Unifamiliar" == $provBD['ViviendaTipo']) ? 'selected' : ''; ?>>Unifamiliar</option>
                                                                            <option value="Multifamiliar" <?php echo ("Multifamiliar" == $provBD['ViviendaTipo']) ? 'selected' : ''; ?>>Multifamiliar</option>
                                                                            <option value="Alquilado" <?php echo ("Alquilado" == $provBD['ViviendaTipo']) ? 'selected' : ''; ?>>Alquilado</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Material:</label>
                                                                        <select id="vivmaterial" class="browser-default" name="vivmaterial" required="">
                                                                            <option value="" disabled selected>Material de Construccion:</option>
                                                                            <option value="Noble" <?php echo ("Noble" == $provBD['ViviendaMaterial']) ? 'selected' : ''; ?>>Noble</option>
                                                                            <option value="Provisional" <?php echo ("Provisional" == $provBD['ViviendaMaterial']) ? 'selected' : ''; ?>>Provisional</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Habitaciones:</label>
                                                                        <select id="vivhab" class="browser-default" name="vivhab" required="">
                                                                            <option value="" disabled selected>Numero de Habitaciones:</option>
                                                                            <option value="1-2" <?php echo ("1-2" == $provBD['ViviendaHabitaciones']) ? 'selected' : ''; ?>>1-2</option>
                                                                            <option value="3-4" <?php echo ("3-4" == $provBD['ViviendaHabitaciones']) ? 'selected' : ''; ?>>3-4</option>
                                                                            <option value="5+" <?php echo ("5+" == $provBD['ViviendaHabitaciones']) ? 'selected' : ''; ?>>5+</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="vivpers" type="number" class="validate" name="vivpers" required="" maxlength="2" value="<?php echo $provBD['ViviendaPersonas']; ?>">
                                                                        <label for="vivpers" class="active">*Numero de Personas:</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Agua Potable:</label>
                                                                        <select id="vivagua" class="browser-default" name="vivagua" required="">
                                                                            <option value="" disabled selected>Tipo de Agua Potable:</option>
                                                                            <option value="Individual" <?php echo ("Individual" == $provBD['ViviendaAguaTipo']) ? 'selected' : ''; ?>>Individual</option>
                                                                            <option value="Comunal" <?php echo ("Comunal" == $provBD['ViviendaAguaTipo']) ? 'selected' : ''; ?>>Comunal</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Luz Electrica:</label>
                                                                        <select id="vivluz" class="browser-default" name="vivluz" required="">
                                                                            <option value="" disabled selected>Tipo de Luz Electrica:</option>
                                                                            <option value="Si" <?php echo ("Si" == $provBD['ViviendaLuz']) ? 'selected' : ''; ?>>Si</option>
                                                                            <option value="No" <?php echo ("No" == $provBD['ViviendaLuz']) ? 'selected' : ''; ?>>No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col s12 m6 l6">
                                                                        <label>*Servicio Higienico:</label>
                                                                        <select id="vivserv" class="browser-default" name="vivserv" required="">
                                                                            <option value="" disabled selected>Tipo de Servicio Higienico:</option>
                                                                            <option value="Water" <?php echo ("Water" == $provBD['ViviendaSsHh']) ? 'selected' : ''; ?>>Water</option>
                                                                            <option value="Silo" <?php echo ("Silo" == $provBD['ViviendaSsHh']) ? 'selected' : ''; ?>>Silo</option>
                                                                            <option value="Otro" <?php echo ("Otro" == $provBD['ViviendaSsHh']) ? 'selected' : ''; ?>>Otro</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="divider"></div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Guardar Cambios
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
                                <p> Estudiante modificado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-ver-contador.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ERROR!!!</h4>
                                <p>El estudiante no pudo ser modificado, intentelo de nuevo.</p>
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
                    var frm = $('#configurar1');
    
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





