<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
//si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    $estudiante = $_GET['estudiante'];
//    if (!isset($barraP)) {
//        header("location:page-ver-kardexDiario.php");
//    }
//buscar Barra ok
    $consultaGrado = "SELECT * FROM aulaalumnos WHERE AulaAlumnosAlumno='$estudiante'";
    $resultadoGrado = $conexion->query($consultaGrado) or die($conexion->error);
    $grado = $resultadoGrado->fetch_assoc();


    $consultaAlumno = "SELECT alumno.AlumnoNombre, alumno.AlumnoApellidos, aulaalumnos.*, aula.* FROM alumno "
            . "LEFT JOIN aulaalumnos ON alumno.AlumnoDni=aulaalumnos.AulaAlumnosAlumno "
            . "LEFT JOIN aula ON aulaalumnos.AulaAlumnosId=aula.AulaId "
            . "WHERE alumno.AlumnoDni='$estudiante'";
    $resultadoAlumno = $conexion->query($consultaAlumno) or die($conexion->error);
    $alumno = $resultadoAlumno->fetch_assoc();

    $contArea = 0;
    $contLogro = 0;
    ?>


    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Libreta de notas</title>
            <link href="libreta/css/materialize.css" type="text/css" rel="stylesheet">
            <link href="libreta/css/misEstilos.css" type="text/css" rel="stylesheet">
            <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">



        </head>

        <body >
            <div class="container">

                <div class="row">
                    <div class="col s12">
                        <p><center>CUNA JARDIN "UNSA"</center>
                        </p>

                        <p><center>BOLETA DE INFORMACION DEL PROGRESO DEL NIÑO 2018</center>
                        </p>

                    </div>

                </div>

                <div class="row">
                    <div class="col s12 m12 l12">

                        <div class="col m8 s8 l8 offset-m2 offset-s2 offset-l2 ">
                            <ul class="collection with-header">
                                <?php // print_r($alumno);  ?>
                                <table>

                                    <tbody>
                                        <tr>
                                            <td colspan="1" class="blue lighten-4">UGEL:</td>
                                            <td colspan="3">NORTE</td>
                                        </tr>
                                        <tr>
                                            <td class="blue lighten-4">I.E.</td>
                                            <td class="blue lighten-4">UNSA</td>
                                            <td class="blue lighten-4">Cod. Mod. I.E.</td>
                                            <td>1334747</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" class="blue lighten-4">NIVEL</td>
                                            <td rowspan="2"> INICIAL CUNA-JARDIN </td>
                                            <td class="blue lighten-4">Grado</td>
                                            <td><?php echo $alumno['AulaGrado'] ?> año(s)</td>
                                        </tr>
                                        <tr>
                                            <td class="blue lighten-4">Seccion</td>
                                            <td>Unica</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="blue lighten-4">CODIGO ESTUDIANTE</td>
                                            <td colspan="2"><?php echo $estudiante ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="blue lighten-4">APELLIDOS Y NOMBRES</td>
                                            <td colspan="2"><?php echo strtoupper($alumno['AlumnoApellidos'] . " " . $alumno['AlumnoNombre']) ?></td>
                                        </tr>

                                    </tbody>



                                </table>
                                </li>
                            </ul>
                        </div>


                        <div class="col m12 s12 l12">

                            <div class="col m12 s12 l12">
                                <ul class="collection with-header">
                                    <?php
                                    $consultaCategorias = "SELECT "
                                            . " curso.*, competencia.* FROM curso "
                                            . "LEFT JOIN competencia ON  curso.CursoId=competencia.CompetenciaCurso "
                                            . "GROUP BY curso.CursoId ";
                                    $resultadoCategorias = $conexion->query($consultaCategorias) or die($conexion->error);
                                    ?>
                                    <table>

                                        <tbody>
                                            <tr>
                                                <td rowspan="2" class="blue lighten-4"><center>AREA</center> </td>
                                        <td rowspan="2" class="blue lighten-4"><center>LOGROS DE APRENDIZAJE</center></td>
                                        <td colspan="2" class=""><center>PERIODO</center></td>
                                        <td class=""><center>CALIFICACION DEL AREA</center></td>
                                        </tr>
                                        <tr>
                                            <td class=""><center>1</center></td>
                                        <td class=""><center>2</center></td>
                                        <td class=""></td>

                                        </tr>
                                        <?php
                                        while ($fila = $resultadoCategorias->fetch_assoc()) {
                                            $contArea++;
//                                            print_r($fila);
//                                            echo "<br><br>";
                                            $cursoID = $fila['CursoId'];
                                            $consultaLogros = "SELECT "
                                                    . " * FROM competencia "
                                                    . "WHERE CompetenciaCurso='$cursoID'";
                                            $resultadoLogros = $conexion->query($consultaLogros) or die($conexion->error);


                                            $numlogros = "SELECT COUNT(*) FROM competencia WHERE CompetenciaCurso='$cursoID'";
                                            $resultadoNum = $conexion->query($numlogros) or die($conexion->error);

                                            $num = $resultadoNum->fetch_assoc();
                                            ?>


                                            <tr>
                                                <td data-codigo="<?php echo $cursoID ?>" rowspan="<?php echo $num['COUNT(*)'] + 1 ?>" class="blue lighten-4 " id="<?php echo "area" . $contArea ?>"> <?php echo $fila['CursoNombre'] ?> </td>
                                                <td ></td>
                                                <td></td>
                                                <td></td>
                                                <td valign="middle" rowspan="<?php echo $num['COUNT(*)'] + 1 ?>" class=" "> <center><input type="text" maxlength="1" required="" class="center-align" style="text-transform:uppercase"></center> </td>

                                            </tr>
                                            <?php
                                            while ($filasLogros = $resultadoLogros->fetch_assoc()) {
                                                $contLogro++;
//                                                print_r($filasLogros);
                                                ?>
                                                <tr>
                                                    <td data-codigo="<?php echo $filasLogros['CompetenciaId'] ?>" id="<?php echo "logro" . $contLogro ?>"><?php echo $filasLogros['CompetenciaNombre'] ?></td>
                                                    <td data-periodo="1"><center><input id="<?php echo "notaL1" . $contLogro ?>" type="text" maxlength="1" required="" class="center-align" style="text-transform:uppercase"></center></td>
                                                <td data-periodo="2"><center><input id="<?php echo "notaL2" . $contLogro ?>" type="text" maxlength="1" required="" class="center-align" style="text-transform:uppercase"></center></td>

                                                </tr>
                                                <?php
                                            }
                                            ?>






                                        <?php } ?>

                                        </tbody>



                                    </table>
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12 m6 l6 center" style="padding-bottom: 10px;">
                        <button class="btn cyan waves-effect waves-light center" id="pr" name="action" onclick="guardar()">Guardar Calificaciones
                            <i class="mdi-content-save left"></i>
                        </button>
                    </div>
                    <div class="input-field col s12 m6 l6 center " style="padding-bottom: 10px;">
                        <button class="btn red waves-effect waves-light right center" name=enter"action" onclick="cancelar()">Cancelar
                            <i class="mdi-content-save left"></i>
                        </button>
                    </div>
                    <!--                    <div class="input-field col s12 m4 l4 " style="padding-bottom: 10px;">
                                            <button class="btn grey darken-3 waves-effect waves-light right" name=enter"action" onclick="anular()">Anular Kardex
                                                <i class="mdi-content-save left"></i>
                                            </button>
                                        </div>-->

                </div>


            </div>
            <!-- jQuery Library -->
            <script type="text/javascript" src="libreta/js/jquery-3.1.1.min.js"></script>  

            <!--materialize js-->
            <script type="text/javascript" src="libreta/js/materialize.js"></script>



            <script>


                            function cancelar() {
                                history.back();
                            }

                            function guardar() {
                                //                                $('#resultado').append("Cargando...");
                                
                                var alumno = "<?php echo $estudiante; ?>";
                                var areas = "<?php echo $contArea; ?>";
                                var logros = "<?php echo $contLogro; ?>";

                                for (var i = 1; i <= logros; i++) {
                                    $templogro = "logro".concat(i);
                                    $tempnota1="notaL1".concat(i);
                                    $tempnota2="notaL2".concat(i);
                                    $logro=$('#'+$templogro);
                                    $nota1=$('#'+$tempnota1);
                                    $nota2=$('#'+$tempnota2);
                                    $url="control/anadirNotasLogro.php?alumno="+alumno+"&logro="+$logro.data("codigo")+"&notap1="+$nota1.val()+"&notap2="+$nota2.val();
                                    console.log($url);
//                                    if(typeof($nota1.val()) === "undefined"){
//                                        console.log($nota1.val());
//                                    }
//                                    if($nota2.val() !==null){
//                                        console.log($nota2.val())
//                                    }
                                }

                            }



            </script>
        </body>

    </html>

    <?php
}
?> 



