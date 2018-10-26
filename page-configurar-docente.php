<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    $id = $_GET['id'];
    if (!isset($id)) {
        header("location:page-ver-usuarios.php");
    }
    $buscar = "SELECT * FROM docente WHERE DocenteDni='$id'";
    $resultado = $conexion->query($buscar);
    if ($resultado->num_rows === 0) {
        header("location:page-ver-docente.php");
    }
    $provBD = $resultado->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Configurar Docente</title>
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
                                        <h5 class="breadcrumbs-title">Configurar Docente</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Usuarios
                                            </li>
                                            <li class="grey-text lighten-4" >Ver Docente</li>
                                            <li class="active blue-text">Configurar Docente</li>
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
                                            <h4 class="header">Configuracion de Docente</h4>
                                            <p class="caption">
                                                En este panel usted podra hacer la configuracion del Docente.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Docente: <?php echo $provBD['DocenteDni']; ?></h4>
                                                        <div class="row">
                                                            <form id="configurar" class="col s12" action="control/modificarDocente.php" method="POST">
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="username" type="text" class="validate" name="docentedni" required="" hidden="true" value="<?php echo $provBD['DocenteDni']; ?>">

                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="nombre" type="text" class="validate" name="docentenombre" required="" value="<?php echo $provBD['DocenteNombre']; ?>">
                                                                        <label class="active" for="nombre">Nombre:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="ape" type="text" class="validate" name="docenteapellido" required="" value="<?php echo $provBD['DocenteApellidos']; ?>">
                                                                        <label class="active" for="ape">Apellido:</label>
                                                                    </div>
                                                                </div>
                                                               
                                                                 <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="titulo" type="text" class="validate" name="docentetitulo" required="" value="<?php echo $provBD['DocenteTitulo']; ?>">
                                                                        <label class="active" for="titulo">Titulo:</label>
                                                                    </div>
                                                                </div>
                                                          
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="cor" type="text" class="validate" name="docentecorreo" required="" value="<?php echo $provBD['DocenteCorreo']; ?>">
                                                                        <label class="active" for="cor">Correo:</label>
                                                                    </div>
                                                                </div>                 
                                                                                                                        
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="tel" type="text" class="validate" name="docentetelefono" required="" value="<?php echo $provBD['DocenteTelefono']; ?>">
                                                                        <label class="active" for="tel">Telefono:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="pais" type="text" class="validate" name="docentepais" required="" value="<?php echo $provBD['DocentePaisNacimiento']; ?>">
                                                                        <label class="active" for="pais">Pais de Nacimiento:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="ciu" type="text" class="validate" name="docenteciudad" required="" value="<?php echo $provBD['DocenteCiudadNacimiento']; ?>">
                                                                        <label class="active" for="ciu">Ciudad de Nacimiento:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="fecha" type="text" class="datepicker" name="docentefecha" required="" value="<?php echo $provBD['DocenteFechaNaciemiento']; ?>">
                                                                        <label class="active" for="fecha" >Fecha de nacimiento:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="dom" type="text" class="validate" name="docentedomicilio" required="" value="<?php echo $provBD['DocenteDomicilio']; ?>">
                                                                        <label class="active" for="dom">Domicilio:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="dis" type="text" class="validate" name="docentedistrito" required="" value="<?php echo $provBD['DocenteDistrito']; ?>">
                                                                        <label class="active" for="dis">Distrito:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="grado" type="text" class="validate" name="docentegrado" required="" value="<?php echo $provBD['DocenteGradoInstruccion']; ?>">
                                                                        <label class="active" for="grado">Grado de instruccion:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="ocu" type="text" class="validate" name="docenteocupacion" required="" value="<?php echo $provBD['DocenteOcupacion']; ?>">
                                                                        <label class="active" for="ocu">Ocupacion:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="di" type="text" class="validate" name="docentedirtrabajo" required="" value="<?php echo $provBD['DocenteDireccionTrabajo']; ?>">
                                                                        <label class="active" for="di">Direccion de trabajo:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="cen" type="text" class="validate" name="docentecentro" required="" value="<?php echo $provBD['DocenteCentroTrabajo']; ?>">
                                                                        <label class="active" for="cen">Centro de trabajo:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="san" type="text" class="validate" name="docentesangre" required="" value="<?php echo $provBD['DocenteTipoSangre']; ?>">
                                                                        <label class="active" for="san">Tipo de sangre:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="unsa" type="text" class="validate" name="docenteUNSA" required="" value="<?php echo $provBD['DocenteVinculoUnsa']; ?>">
                                                                        <label class="active" for="unsa">Vinculo con UNSA(Si/No):</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="vin" type="text" class="validate" name="docentevinculo" required="" value="<?php echo $provBD['DocenteVinculoEspecifica']; ?>">
                                                                        <label class="active" for="vin">Especifique el vinculo:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="sit" type="text" class="validate" name="docentesituacion" required="" value="<?php echo $provBD['DocenteSituacionLaboral']; ?>">
                                                                        <label class="active" for="sit">Situacion laboral:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="det" type="text" class="validate" name="docentedetallelab" required="" value="<?php echo $provBD['DocenteSituacionDet']; ?>">
                                                                        <label class="active" for="det">Detalle su situacion laboral:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="tip" type="text" class="validate" name="docentetipo" required="" value="<?php echo $provBD['DocenteTipo']; ?>">
                                                                        <label class="active" for="tip">Tipo de docente:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="seg" type="text" class="validate" name="docenteseguro" required="" value="<?php echo $provBD['DocenteSeguro']; ?>">
                                                                        <label class="active" for="seg">Seguro social(Si/no):</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="soc" type="text" class="validate" name="docentesocial" required="" value="<?php echo $provBD['DocenteSeguroDetalle']; ?>">
                                                                        <label class="active" for="soc">Detalle su seguro social:</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <br>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="foto" type="file" class="validate" name="imagen" required="">
                                                                        
                                                                        <label for="foto">Foto:</label>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="curr" type="file" class="validate" name="docentecurr" required="">
                                                                        <label for="curr">Curriculum:</label>
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
                                <p> Dato modificado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-ver-docente.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ERROR!!!</h4>
                                <p>El dato no puede ser modificado, intentelo de nuevo.</p>
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
               
            </script>

        </body>

    </html>
    <?php
}
?>





