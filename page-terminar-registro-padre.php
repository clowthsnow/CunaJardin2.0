<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    $id = $_GET['id'];
    if (!isset($id)) {
        header("location:page-ver-padres.php");
    }
    $buscar = "SELECT * FROM padre WHERE PadreDni='$id'";
    $resultado = $conexion->query($buscar);
    if ($resultado->num_rows === 0) {
        header("location:page-ver-padres.php");
    }
    $provBD = $resultado->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Configurar Padre</title>
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

        <body onload="calcularfecha()">

            <!-- START MAIN -->
            <div id="main" style="padding-left: 0px !important ;">
                <!-- START WRAPPER -->
                <div class="wrapper">

                    <!-- START LEFT SIDEBAR NAV-->
                    <!-- END LEFT SIDEBAR NAV-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!-- START CONTENT -->
                    <section id="content">

                        <!--breadcrumbs start-->
                        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <h5 class="breadcrumbs-title">Completar Registro</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Padre
                                            </li>
                                            <li class="active blue-text">Completar Registro</li>
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
                                            <h4 class="header">Completar Registro de Padre</h4>
                                            <p class="caption">
                                                En este panel usted debera terminar el registro del Padre, debe completar todos los campos para poder continuar.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">DNI: <?php echo $provBD['PadreDni']; ?></h4>
                                                        <div class="row">
                                                            <form id="configurar" class="col s12" action="control/modificarPadre.php" method="POST">
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="username" type="text" class="validate" name="id" required="" hidden="true" value="<?php echo $provBD['PadreDni']; ?>">

                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreNombre" required="" value="<?php echo $provBD['PadreNombre']; ?>" readonly="">
                                                                        <label class="active" for="nombre">Nombre:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreApellidos" required="" value="<?php echo $provBD['PadreApellidos']; ?>" readonly="">
                                                                        <label class="active" for="nombre">Apellidos:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="email" class="validate" name="PadreCorreo" required="" value="<?php echo $provBD['PadreCorreo']; ?>">
                                                                        <label class="active" for="nombre">Correo: *</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreTelefono" required="" value="<?php echo $provBD['PadreTelefono']; ?>" minlength="9" maxlength="9" onkeypress="return num(event)">
                                                                        <label class="active" for="nombre">Telefono: *</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreCelular" required="" value="<?php echo $provBD['PadreCelular']; ?>" minlength="9" maxlength="9" onkeypress="return num(event)">
                                                                        <label class="active" for="nombre">Celular: *</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
    <!--                                                                        <input id="nombre" type="text" class="validate" name="PadreCelularOperador" required="" value="<?php echo $provBD['PadreCelularOperador']; ?>">
                                                                        <label class="active" for="nombre">Operador:</label>-->

                                                                        <label class="active">Operador: *</label>
                                                                        <select id="operador" class="browser-default" name="PadreCelularOperador" required="">
                                                                            <option value="" disabled selected>*Escoge el operador:</option>
                                                                            <option value="Claro" >Claro</option>
                                                                            <option value="Movistar" >Movistar</option>
                                                                            <option value="Entel" >Entel</option>
                                                                            <option value="Bitel" >Bitel</option>
                                                                            <option value="Movistar" >Otro</option>
                                                                        </select>

                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="fecha" type="text" class="validate datepicker" name="PadreFechaNac" required="" value="<?php echo $provBD['PadreFechaNac']; ?>" onchange="calcularfecha()">
                                                                        <label class="active" for="nombre">Fecha de Nacimiento: *</label>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="edad" type="text" class="validate" name="PadreEdad" required="" value="<?php echo $provBD['PadreEdad']; ?>" readonly="">
                                                                        <label class="active" for="nombre">Edad: *</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
    <!--                                                                        <input id="nombre" type="text" class="validate" name="PadreEstCivil" required="" value="<?php echo $provBD['PadreEstCivil']; ?>">
                                                                        <label class="active" for="nombre">Estado Civil:</label>-->
                                                                        <label class="active">Estado Civil: *</label>
                                                                        <select id="operador" class="browser-default" name="PadreEstCivil" required="">
                                                                            <option value="" disabled selected>*Escoge su Estado Civil:</option>
                                                                            <option value="1" >Soltero(a)</option>
                                                                            <option value="2" >Casado(a)</option>
                                                                            <option value="3" >Viudo(a)</option>
                                                                            <option value="4" >Divorciado(a)</option>
                                                                            <option value="5" >Conviviente</option>
                                                                            <option value="6" >Otro</option>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreEstCivilEspecifique" value="<?php echo $provBD['PadreEstCivilEspecifique']; ?>">
                                                                        <label class="active" for="nombre">E.Civil Especifique:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
<!--                                                                        <input id="nombre" type="text" class="validate" name="PadreViveCon" required="" value="<?php echo $provBD['PadreViveCon']; ?>">
                                                                        <label class="active" for="nombre">Padre vive con:</label>-->

                                                                        <label class="active">Padre vive con: *</label>
                                                                        <select id="operador" class="browser-default" name="PadreViveCon" required="">
                                                                            <option value="" disabled selected>*Escoge :</option>
                                                                            <option value="Si" >Si</option>
                                                                            <option value="No" >No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreProcedenciaLugar" required="" value="<?php echo $provBD['PadreProcedenciaLugar']; ?>">
                                                                        <label class="active" for="nombre">Lugar de Procedencia:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreGradoInstruccion" required="" value="<?php echo $provBD['PadreGradoInstruccion']; ?>">
                                                                        <label class="active" for="nombre">Grado de Instruccion:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreOcupacionTipo" required="" value="<?php echo $provBD['PadreOcupacionTipo']; ?>">
                                                                        <label class="active" for="nombre">Tipo de ocupacion:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreOcupacionRubro" required="" value="<?php echo $provBD['PadreOcupacionRubro']; ?>">
                                                                        <label class="active" for="nombre">Rubro:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreDireccionTrabajo" required="" value="<?php echo $provBD['PadreDireccionTrabajo']; ?>">
                                                                        <label class="active" for="nombre">Direccion de Trabajo:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="PadreCentroTrabajo" required="" value="<?php echo $provBD['PadreCentroTrabajo']; ?>">
                                                                        <label class="active" for="nombre">Centro de Trabajo:</label>
                                                                    </div>
                                                                </div>


                                                        </div>
                                                        <br>
                                                        <div class="divider"></div>
                                                        <div class="row">
                                                            <div class="input-field col s12 m6 l6">
                                                                <a href="logout.php" class="btn cyan">Salir</a> 
                                                            </div>
                                                            <div class="input-field col s12 m6 l6">
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
                        <p>Padre modificado correctamente.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                    </div>
                </div>
                <!--modal error-->
                <div id="modal2" class="modal">
                    <div class="modal-content">
                        <h4 class="red-text">ERROR!!!</h4>
                        <p>Padre no puedo ser modificado, intentelo de nuevo.</p>
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
                                                                            function val(e) {
                                                                                tecla = (document.all) ? e.keyCode : e.which;
                                                                                if (tecla == 8)
                                                                                    return true;
                                                                                patron = /[A-Za-z áéíóú]/;
                                                                                te = String.fromCharCode(tecla);
                                                                                return patron.test(te);
                                                                            }
                                                                            function num(e) {
                                                                                tecla = (document.all) ? e.keyCode : e.which;
                                                                                if (tecla == 8)
                                                                                    return true;
                                                                                patron = /[0-9]/;
                                                                                te = String.fromCharCode(tecla);
                                                                                return patron.test(te);
                                                                            }
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

                                                                            function calcularfecha() {
                                                                                var fechaA = new Date();
                                                                                var fechaI = $('#fecha').val();



                                                                                var anioA = fechaA.getUTCFullYear();
                                                                                var mesA = fechaA.getUTCMonth() + 1;
                                                                                var anioI = fechaI.slice(0, 4);
                                                                                var mesI = fechaI.slice(5, 7);

                                                                                console.log(anioA);
                                                                                console.log(anioI);
                                                                                console.log(mesA);
                                                                                console.log(mesI);

                                                                                var anioE = anioA - anioI;
                                                                                var mesE;
                                                                                if (mesI > mesA) {
                                                                                    anioE--;
                                                                                    mesE = 12 - (mesI - mesA);
                                                                                } else {
                                                                                    mesE = mesA - mesI;
                                                                                }
                                                                                console.log(anioE + " " + mesE);
                                                                                $('#edad').val(anioE + " año(s) " + mesE + " mes(es)");
                                                                            }
    </script>

    </body>

    </html>
    <?php
}
?>





