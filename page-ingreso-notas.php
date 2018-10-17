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
                                <?php print_r($alumno);?>
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
                                            <td><?php echo $alumno['AulaGrado']?> año(s)</td>
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
                                            <td colspan="2"><?php echo strtoupper($alumno['AlumnoApellidos'] . " ". $alumno['AlumnoNombre'])?></td>
                                        </tr>

                                    </tbody>



                                </table>
                                </li>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="col m6 s6 l6">
                        <?php
                        //solo jarras
                        if (!$kardex['kardexJarra'] == NULL) {

                            $kardexJarra = $kardex['kardexJarra'];
                            $consultaCategorias = "SELECT "
                                    . " categorialicor.* FROM kardexjarra "
                                    . "LEFT JOIN licor ON  kardexjarra.KardexJarraLicor=licor.licorId "
                                    . "LEFT JOIN categorialicor ON licor.licorCategoria=categorialicor.categoriaLicorId "
                                    . "WHERE kardexjarra.KardexJarraId='$kardexJarra'"
                                    . "GROUP BY categoriaLicorId "
                                    . "";
                            $resultadoCategorias = $conexion->query($consultaCategorias) or die($conexion->error);
                            ?>
                            <ul class="collection with-header">
                                <li class="collection-header"><h5>Jarras</h5></li>
                                <li class="collection-item">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th class="delg">Aumento</th>
                                                <th class="delg">Inicio</th>
                                                <th class="delg">Final</th>
                                                <th class="delg">Vendido</th>
                                            </tr>
                                        </thead>    
                                        <?php while ($fila = $resultadoCategorias->fetch_assoc()) { ?>
                                            <thead>
                                                <tr>
                                                    <th colspan = "5"><?php echo $fila['categoriaLicorNombre']; ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $consultaSelladas = "SELECT kardexjarra.*"
                                                        . ", licor.licorNombre, licor.licorId, categorialicor.categoriaLicorNombre FROM kardexjarra "
                                                        . "LEFT JOIN licor ON  kardexjarra.KardexJarraLicor=licor.licorId "
                                                        . "LEFT JOIN categorialicor ON licor.licorCategoria=categorialicor.categoriaLicorId "
                                                        . "WHERE kardexjarra.KardexJarraId='$kardexJarra' AND categorialicor.categoriaLicorId='" . $fila['categoriaLicorId'] . "' AND licor.licorEstReg='A'"
                                                        . " ORDER BY licor.licorNombre";
                                                //echo $consultaSelladas;
                                                $resultadoSelladas = $conexion->query($consultaSelladas) or die($conexion->error);

                                                while ($sellada = $resultadoSelladas->fetch_assoc()) {
                                                    echo "<tr><td data-codigo=\"" . $sellada['licorId'] . "\" id=\"jarra" . $contJarr . "\">" . $sellada['licorNombre'] . "</td><td>" . $sellada['KardexJarraAumento'] . "</td><td>" . $sellada['KardexJarraInicio'] . "</td>"
                                                    . "<td  style=\"width: 50px;\"><input style=\"width: 50px;\" id=\"finj" . $contJarr . "\" type=\"number\" value=\"" . $sellada['KardexJarraFinal'] . "\"</td><td>" . $sellada['KardexJarraVenta'] . "</td></tr>";

                                                    $contJarr++;
                                                }
                                                ?>

                                            </tbody>
                                            <?php
                                        }
                                        //print_r($categoria);
                                        ?>


                                    </table>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                        
                            
                    </div>
                </div>
            </div>
                

            <div class="row">
                <div class="input-field col s12 m4 l4 center" style="padding-bottom: 10px;">
                    <button class="btn cyan waves-effect waves-light center" id="pr" name="action" onclick="guardar()">Cuadrar Kardex
                        <i class="mdi-content-save left"></i>
                    </button>
                </div>
                <div class="input-field col s12 l4 l4 " style="padding-bottom: 10px;">
                    <button class="btn red waves-effect waves-light right" name=enter"action" onclick="cerrar()">Cerrar Kardex
                        <i class="mdi-content-save left"></i>
                    </button>
                </div>
                <div class="input-field col s12 m4 l4 " style="padding-bottom: 10px;">
                    <button class="btn grey darken-3 waves-effect waves-light right" name=enter"action" onclick="anular()">Anular Kardex
                        <i class="mdi-content-save left"></i>
                    </button>
                </div>

            </div>


        </div>
        <!-- jQuery Library -->
        <script type="text/javascript" src="kardex/js/jquery-3.1.1.min.js"></script>  

        <!--materialize js-->
        <script type="text/javascript" src="kardex/js/materialize.js"></script>



        <script>
                        function guardar() {
                            //                                $('#resultado').append("Cargando...");
                            console.log("cargando...");
                            var selladaTrue = "<?php echo $kardexSellada; ?>";
                            var jarraTrue = "<?php echo $kardexVaso; ?>";


                            if (selladaTrue != 0) {
                                //console.log("oli es cero");
                                var selladas =<?php echo $contSell; ?>;
                                var codSell = "<?php echo $kardex['kardexSellada']; ?>";
                                var discoteca = "<?php echo $barra['discotecaId'] ?>";
                                //Para selladas;
                                for (var i = 0; i < selladas; i++) {
                                    $templicor = "sellada".concat(i);
                                    $tempcant = "fin".concat(i);
                                    $licor = $('#' + $templicor);
                                    $stock = $('#' + $tempcant);
                                    $url = "control/anadirCierreSellada.php?licor=" + $licor.data("codigo") + "&fin=" + $stock.val() + "&bd=" + codSell + "&disco=" + discoteca;
                                    //                                    console.log($url);
                                    if ($stock.val() >= 0) {
                                        //                                        console.log('oli');
                                        $.ajax({
                                            type: 'GET',
                                            url: $url,
                                            async: false,

                                            success: function (respuesta) {
                                                console.log("sucecs");
                                                //                                                console.log(respuesta);
                                                //                                                    location.reload();
                                                //                                                    if (jarraTrue == 0) {
                                                //
                                                //                                                        location.reload();
                                                //                                                    }

                                            }
                                        });
                                    }


                                }

                                //                                    if (jarraTrue == 0) {
                                //                                        //cuadrar();
                                //                                        location.reload();
                                //                                    }

                            }
                            if (jarraTrue != 0) {
                                //console.log("jarra es cero");
                                //Para jarras;
//                                    var jarras =
//                                    var codJarr = ";
//                                    for (var i = 0; i < jarras; i++) {
//                                        $templicor = "jarra".concat(i);
//                                        $tempcant = "finj".concat(i);
//                                        $licor = $('#' + $templicor);
//                                        $stock = $('#' + $tempcant);
//                                        $url = "control/anadirCierreJarra.php?licor=" + $licor.data("codigo") + "&fin=" + $stock.val() + "&bd=" + codJarr + "&disco=" + discoteca;
//    //                                    console.log($url);
//                                        if ($stock.val() >= 0) {
//                                            //console.log('oli');
//                                            $.ajax({
//                                                type: 'GET',
//                                                url: $url,
//                                                async: false,
//
//                                                success: function (respuesta) {
//                                                    console.log("sucecs");
//    //                                                console.log(respuesta);
//    //                                                    location.reload();
//                                                }
//                                            });
//                                        }
//
//
//                                    }
                                //Para vaso;
                                var vasos =<?php echo $contVas; ?>;
                                var codVas = "<?php echo $kardex['kardexVaso']; ?>";
                                for (var i = 0; i < vasos; i++) {
                                    //                                    console.log(oli);
                                    $templicor = "vaso".concat(i);
                                    $tempcant = "finv".concat(i);
                                    $licor = $('#' + $templicor);
                                    $stock = $('#' + $tempcant);
                                    $url = "control/anadirCierreVaso.php?licor=" + $licor.data("codigo") + "&fin=" + $stock.val() + "&bd=" + codVas + "&disco=" + discoteca;
                                    //console.log($url);
                                    if ($stock.val() >= 0) {
                                        //console.log('oli');
                                        $.ajax({
                                            type: 'GET',
                                            url: $url,
                                            async: false,

                                            success: function (respuesta) {
                                                console.log("sucecs");
                                                //console.log(respuesta);
                                                //                                                    location.reload();
                                            }
                                        });
                                    }


                                }
                                //cuadrar();
                                //                                    location.reload();
                            }

                            //                                location.reload();
                            // cuadrar();
                            console.log("final");
                            cuadrar();
                        }


                        function cuadrar() {
                            var kardex = "<?php echo $kardex['kardexId']; ?>";
                            var descuento = $('#descuento').val();
                            var visa = $('#visa').val();
                            var master = $('#master').val();
                            var dinero = $('#dinero').val();
                            //console.log(descuento);
                            $url = "control/calcularCierre.php?kardex=" + kardex + "&visa=" + visa + "&descuento=" + descuento + "&master=" + master + "&dinero=" + dinero;
                            $.ajax({
                                type: 'GET',
                                url: $url,
                                async: false,

                                success: function (respuesta) {
                                    console.log(respuesta);
                                    //console.log(respuesta);
                                    //console.log(respuesta);
                                    location.reload();

                                }
                            });
                            //                                $.get("control/calcularCierre.php", {kardex: kardex, descuento: descuento, visa: visa, master: master}, function () {
                            //    //                                                location.reload();
                            //                                });
                            //                                location.reload();
                        }

                        function cerrar() {
                            var kardex = "<?php echo $kardex['kardexId']; ?>";
                            $url = "control/cerrarKardexDiario.php?kardex=" + kardex;
                            $.ajax({
                                type: 'GET',
                                url: $url,
                                async: false,

                                success: function (respuesta) {
                                    console.log(respuesta);
                                    //                                                console.log(respuesta);
                                    location.reload();
                                }
                            });
                        }

                        function anular() {
                            var kardex = "<?php echo $kardex['kardexId']; ?>";
                            $url = "control/anularKardexDiario.php?kardex=" + kardex;
                            $.ajax({
                                type: 'GET',
                                url: $url,
                                async: false,

                                success: function (respuesta) {
                                    console.log(respuesta);
                                    //                                                console.log(respuesta);
                                    location.reload();
                                }
                            });
                        }
        </script>
    </body>

</html>





