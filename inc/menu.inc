<?php
include 'conexion.php';
if ('1' == $_SESSION['permisos']) {
    ?>
    <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="images/user.png" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">

                        <a class="btn-flat waves-effect waves-light white-text profile-btn" href="#!"><?php echo $_SESSION['usuarioNombres']; ?></a>
                        <p class="user-roal">Administrador</p>
                    </div>
                </div>
            </li>
            <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Inicio</a>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-box"></i>Gestion de Usuarios</a>
                        <div class="collapsible-body">
                            <ul>

                                <li><a class="lia" href="page-crear-administrador.php">Crear Administrador</a>
                                </li>                                        
                                <!--                                <li><a class="lia" href="page-ver-administrador.php">Ver Administradores</a>
                                                                </li>-->
                                <li><a href="page-crear-contador.php">Crear Contador</a>
                                </li>                                        
                                <!--                                <li><a href="page-ver-contador.php">Ver Contadores</a></li>-->
                                <li><a href="page-crear-docente2.php">Crear Docente</a>
                                </li>
                                <!--                                <li><a href="page-ver-docentes.php">Ver Docente</a>
                                                                </li>-->
                                <li><a class="lia" href="page-ver-usuarios.php">Ver Usuarios</a>
                                </li>
                                <li><a href="page-crear-padreAdmi.php">Crear Nuevo Padre</a>
                                </li>                                        
                                <li><a href="page-ver-padres.php">Ver Padres</a> </li>

                                <li><a href="page-datos-alumno_1.php">Crear nuevo Estudiante</a>
                                </li>
                                <li><a href="page-ver-Estudiantes-1.php">Ver Estudiantes</a>
                                </li>

                                <li><a href="page-crear-tipoAlumno.php">Crear Tipo Alumno</a>
                                </li>
                                <li><a href="page-ver-tipoAlumnos.php">Ver Tipo Alumno</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-assignment"></i>Gestion de Notas</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="page-ver-grupos.php">Ver Grupos</a>
                                </li>    
                                <!--                                <li><a href="page-crear-nota.php">Ingresar Nota</a>
                                                                </li>
                                                                <li><a href="page-ver-notas.php">Ver Notas</a>
                                                                </li>-->

                            </ul>
                        </div>
                    </li>
    <!--                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-assignment"></i>Asistencia</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="page-ver-grupos2.php">Ver Grupos</a>
                                </li>    

                                <li><a href="page-ver-notas.php">Ver Asistencias</a>
                                </li>

                            </ul>
                        </div>
                    </li>-->

                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i>Gestion de Matricula</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="page-ver-Estudiantes.php">Gestionar Matricula</a>
                                </li>                                        
                                <li><a href="page-ver-matriculados.php">Ver Matriculados</a>
                                </li>

                            </ul>
                        </div>
                    </li>


                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-balance-wallet"></i>Gestion de Aula</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="page-crear-aula.php">Crear Nueva Aula</a>
                                </li>                                        
                                <li><a href="page-ver-aula.php">Ver aula</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-balance"></i>Gestion de Curso</a>
                        <div class="collapsible-body">
                            <ul>

                                <li><a href="page-crear-area.php">Crear Areas</a>
                                </li>
                                <li><a href="page-ver-areas.php">Ver Areas</a>

                                </li>
                                <li><a href="page-crear-logro.php">Crear Logro</a>
                                </li>                                        
                                <li><a href="page-ver-competencias.php">Ver Logros</a>
                                </li>


                            </ul>
                        </div>
                    </li>

                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-info"></i>Gestion de Comunicados</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="page-crear-comunicado.php">Crear Comunicado</a>
                                </li>
                                <li><a href="page-ver-comunicados.php">Ver Comunicado</a>
                                </li>



                            </ul>
                        </div>
                    </li>

                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Gestion de Contabilidad</a>
                        <div class="collapsible-body">
                            <ul>
                                <!--                                <li><a href="page-crear-contabilidad.php">Crear Registro</a>
                                                                </li>
                                                                <li><a href="page-ver-contabilidad.php">Ver Registro</a>
                                                                </li>-->
                                <li><a href="page-ver-vouchers.php">Gestion de Voucher</a>
                                </li>
                                <li><a href="page-ver-boletas.php">Gestion de Boletas</a>
                                </li>
                                <li><a href="page-import-boletas.php">Importar Bolestas CSV</a>
                                </li>
                                <li><a href="page-ver-ingresos.php">Gestion de Ingresos</a>
                                </li>
                                <li><a href="page-import-ingresos.php">Importar Ingresos CSV</a>
                                </li>
                                <li><a href="page-ver-egresos.php">Gestion de Egresos</a>
                                </li>
                                <li><a href="page-crear-tipoConcepto.php">Crear Tipo de Concepto</a>
                                </li>
                                <li><a href="page-ver-tipoConceptos.php">Ver Tipos de Concepto</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i>Reportes Contables</a>
                        <div class="collapsible-body">
                            <ul>
                                <!--                                <li><a href="page-crear-contabilidad.php">Crear Registro</a>
                                                                </li>
                                                                <li><a href="page-ver-contabilidad.php">Ver Registro</a>
                                                                </li>-->
                                <li><a href="page-ver-rVouchers.php">Reportes de Vouchers</a>
                                </li>
                                <li><a href="page-ver-rBoletas.php">Reportes de Boletas</a>
                                </li>
                                <li><a href="page-ver-rIngresos.php">Reportes de Ingresos</a>
                                </li>
                                <li><a href="page-ver-rEgresos.php">Reportes de Egresos</a>
                                </li>
                                <li><a href="reporteIG.php">Reporte Ingresos y Egresos</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i>Reportes de Matricula</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="page-reporte-alumnos.php">Alumnos General</a>
                                </li>
                                <li><a href="page-reporte-alumnosG.php">Reporte de Matriculas</a>
                                </li>
                                <li><a href="page-reporte-usuarios.php">Usuario General</a>
                                </li>
                                <li><a href="page-reporte-docentes.php">Profesor General</a>
                                </li>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </li>
            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">MAS</p></li>

            <li><a href="page-mi-cuenta.php"><i class="mdi-action-perm-identity"></i> Mi Cuenta</a>
            </li>

            <li><a href="logout.php"><i class="mdi-hardware-keyboard-tab"></i> Salir</a>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
    </aside>
    <?php
} else {
    ?>

    <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="images/user.png" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">

                        <a class="btn-flat waves-effect waves-light white-text profile-btn" href="#!"><?php echo $_SESSION['usuarioNombres']; ?></a>
                        <p class="user-roal"><?php
                            switch ($_SESSION['permisos']) {
                                case 2:
                                    echo "Docente";
                                    break;
                                case 3:
                                    echo "Contador";
                                    break;
                                case 4:
                                    echo "Padre";
                                    break;
                            }
                            ?></p>
                    </div>
                </div>
            </li>
            <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Inicio</a>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <?php
                    if ('2' == $_SESSION['permisos']) {
                        ?>


                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-assignment"></i>Gestion de Notas</a>
                            <div class="collapsible-body">
                                <ul>
                                    <!--                                    <li><a href="page-crear-nota.php">Ingresar Nota</a>
                                                                        </li>                                        
                                                                        <li><a href="page-ver-notas.php">Ver Notas</a>
                                                                        </li>-->
                                    <li><a href="page-ver-grupos.php">Ver Grupos</a>
                                    </li>   

                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-info"></i>Gestion de Comunicados</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="page-crear-comunicado.php">Crear Comunicado</a>
                                    </li>
                                    <li><a href="page-ver-comunicados.php">Ver Comunicado</a>
                                    </li>



                                </ul>
                            </div>
                        </li> <?php } ?>
                    <?php if ('3' == $_SESSION['permisos']) { ?>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Gestion de Contabilidad</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="page-crear-contabilidad.php">Crear Registro</a>
                                    </li>
                                    <li><a href="page-ver-contabilidad.php">Ver Registro</a>
                                    </li>
                                    <li><a href="page-crear-tipoConcepto.php">Crear Tipo de Concepto</a>
                                    </li>
                                    <li><a href="page-ver-tipoConceptos.php">Ver Tipos de Concepto</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Gestion de Vouchers</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="page-registar-voucher.php">Registar Voucher</a>
                                    </li>
                                    <li><a href="page-ver-vouchers.php">Ver Vouchers</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Gestion de Boletas</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="page-registrar-boleta.php">Registrar Boleta</a>
                                    </li>
                                    <li><a href="page-ver-boletas.php">Ver Boletas</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Gestion de Ingresos</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="page-registrar-ingresos.php">Registrar R. de Ingresos</a>
                                    </li>
                                    <li><a href="page-ver-ingresos.php">Ver Recibo de Ingresos</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Gestion de Egresos</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="page-registrar-egresos.php">Registrar R. de Egresos</a>
                                    </li>
                                    <li><a href="page-ver-egresos.php">Ver Recibo de Egresos</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Reportes </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="page-crear-contabilidad.php">Registrar R. de Egresos</a>
                                    </li>
                                    <li><a href="page-ver-contabilidad.php">Ver Recibo de Egresos</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    <?php } ?>
                    <?php
                    if ('4' == $_SESSION['permisos']) {

                        $dni = $_SESSION['usuario'];
                        $buscarPadres = "SELECT * FROM padre WHERE PadreDni='$dni'";
                        $resultado = $conexion->query($buscarPadres) or die($conexion->error);
                        $row = $resultado->fetch_assoc();
                        if ($row['PadreEstReg'] == "I") {
//                            header("location:../page-configurar-padre.php?id=$dni");
                            header("location:page-terminar-registro-padre.php?id=$dni");
//                            print_r($row32165487);
                        }
                        ?>
                        <li class="bold"><a href="page-configurar-padre.php?id=<?php echo $dni ?>" class=" waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i>Mis Datos</a>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Mi(s) Hijo(s)</a>
                            <div class="collapsible-body">
                                <ul>
                                    <?php
                                    $userid = $_SESSION['usuario'];
                                    $buscar = "SELECT * FROM alumno WHERE alumno.AlumnoTutorIdMadre='$userid'";
                                    $resulthijos = $conexion->query($buscar) or die($conexion->error);
                                    while ($fila = $resulthijos->fetch_assoc()) {
                                        ?>
                                        <li><a href="page-configurar-estudiante.php?id=<?php echo $fila['AlumnoDni'] ?>"><?php echo $fila['AlumnoNombre'] . " " . $fila['AlumnoApellidos'] ?></a>
                                        </li>
            <!--                                        <li><a href="page-matricula-estudiante.php?usuario=<?php echo $fila['AlumnoDni'] ?>">Matricular a <?php echo $fila['AlumnoNombre'] ?></a>
                                        </li>-->
                                        <li class="divider"></li>
                                        <?php
                                    }
                                    ?>

                                    <li><a href="page-datos-alumno_1.php">Ingresar Nuevo Hijo</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Matricular</a>
                            <div class="collapsible-body">
                                <ul>
                                    <?php
                                    $userid = $_SESSION['usuario'];
                                    $buscar = "SELECT * FROM alumno WHERE alumno.AlumnoTutorIdMadre='$userid'";
                                    $resulthijos = $conexion->query($buscar) or die($conexion->error);
                                    while ($fila = $resulthijos->fetch_assoc()) {
                                        ?>
            <!--                                        <li><a href="page-configurar-estudiante.php?id=<?php echo $fila['AlumnoDni'] ?>"><?php echo $fila['AlumnoNombre'] . " " . $fila['AlumnoApellidos'] ?></a>
                                            </li>-->
            <!--                                        <li><a href="page-matricula-estudiante.php?usuario=<?php echo $fila['AlumnoDni'] ?>">Matricular a <?php echo $fila['AlumnoNombre'] ?></a>
                                            </li>
                                        -->
                                        <li><a href="page-declaracion-jurada.php?usuario=<?php echo $fila['AlumnoDni'] ?>&padre=<?php echo $dni ?>">Matricular a <?php echo $fila['AlumnoNombre'] ?></a>
                                        </li>
                                        <li class="divider"></li>
                                        <?php
                                    }
                                    ?>



                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i>Comunicados</a>
                            <div class="collapsible-body">
                                <ul>
                                    <?php
                                    $userid = $_SESSION['usuario'];
                                    $buscar = "SELECT * FROM alumno WHERE alumno.AlumnoTutorIdMadre='$userid'";
                                    $resulthijos = $conexion->query($buscar) or die($conexion->error);
                                    while ($fila = $resulthijos->fetch_assoc()) {
                                        ?>
                                        <li><a href="page-ver-comunicados.php?id=<?php echo $fila['AlumnoDni'] ?>">Ver Comunicados <?php echo $fila['AlumnoNombre'] ?></a>
                                        </li>

                                        <li class="divider"></li>
                                        <?php
                                    }
                                    ?>



                                </ul>
                            </div>
                        </li>

                    <?php } ?>


                </ul>
            </li>

            <li class="li-hover"><div class="divider"></div></li>
            <li class="li-hover"><p class="ultra-small margin more-text">MAS</p></li>

            <li><a href="page-mi-cuenta.php"><i class="mdi-action-perm-identity"></i> Mi Cuenta</a>
            </li>

            <li><a href="logout.php"><i class="mdi-hardware-keyboard-tab"></i> Salir</a>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
    </aside>
    <?php
}
?>
<div class="fixed-action-btn l0" id="fijo-arriba">
    <a class="btn-floating btn-large waves-effect waves-light red sideMenu" href="#!" data-activates="slide-out">
        <i class="mdi-navigation-menu">menu</i>
    </a>
</div>