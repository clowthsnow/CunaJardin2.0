<?php
SESSION_START();


if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
     $i=1;
    $r = array();
    while($i<=12){
        $sql1="SELECT MONTHNAME(IngresosFechaEmitida) AS mes, SUM(IngresosMonto) AS numFilas1 FROM ingresos WHERE MONTH(IngresosFechaEmitida) = $i";
        $resultado = $conexion->query($sql1);
        $fila=$resultado->fetch_assoc();
        $numFilas1=$fila['numFilas1'];
        if($numFilas1==NULL){
            $r[$i]=0;
        }else{
            $r[$i]=$numFilas1;  
        }
//        echo "'$i'+es:$r[$i]\n";
        $i++;
    }
    
    $j=1;
    $s = array();
    while($j<=12){
        $sql1="SELECT MONTHNAME(EgresosFechaEmitida) AS mes, SUM(EgresosTotal) AS numFilas1 FROM egresos WHERE MONTH(EgresosFechaEmitida) = $j";
        $resultado2 = $conexion->query($sql1);
        $fila2=$resultado2->fetch_assoc();
        $numFilas1=$fila2['numFilas1'];
        if($numFilas1==NULL){
            $s[$j]=0;
        }else{
            $s[$j]=$numFilas1;  
        }
//        echo "'$j'+es:$s[$j]\n";
        $j++;
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Ver Ingresos</title>

            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <style type="text/css">
                ${demo.css}
            </style>
            <script type="text/javascript">
                $(function () {
                    $('#container').highcharts({
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Ingresos de cada mes'
                        },
                        subtitle: {
                            text: 'Grafica: Anual'
                        },
                        xAxis: {
                            categories: [
                                'Jan',
                                'Feb',
                                'Mar',
                                'Apr',
                                'May',
                                'Jun',
                                'Jul',
                                'Aug',
                                'Sep',
                                'Oct',
                                'Nov',
                                'Dec'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'montos(soles)'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} Soles</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                                name: 'Ingresos',
                                data: [
                                    <?php
                                    echo "$r[1],$r[2],$r[3],$r[4],$r[5],$r[6],$r[7],$r[8],$r[9],$r[10],$r[11],$r[12]";
                                    ?>
                                ]
                            }, {
                                name: 'Gastos',
                                data: [
                                    <?php
                                    echo "$s[1],$s[2],$s[3],$s[4],$s[5],$s[6],$s[7],$s[8],$s[9],$s[10],$s[11],$s[12]";
                                    ?>
                                ]

                            }]
                    });
                });
            </script>

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

            <link rel="stylesheet" href="css/jquery.dataTables.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <script src="js/jquery.dataTables.min.js"></script>
            <link rel="stylesheet" href="css/buttons.dataTables.min.css">

            

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
            <!--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
            <!--<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>


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
                                        <h5 class="breadcrumbs-title">Ver Ingresos</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Ingresos
                                            </li>
                                            <li class="active blue-text">Ver Ingresos</li>
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
                                            <h4 class="header">Ver Ingresos</h4>
                                            <p class="caption">
                                                En este panel usted podra Ver Ingresos de Pago almacenadas en el sistema y poder gestionarlas.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="container">


                                                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

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
                                <p>Ingresos no encontrado en la base de datos</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-ver-plan.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal eliminar-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ELIMINAR!!!</h4>
                                <p>¿Desea eliminar este Ingresos?</p>
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
            <script src="Highcharts-4.1.5/js/highcharts.js"></script>
            <script src="Highcharts-4.1.5/js/modules/exporting.js"></script>
            <!-- jQuery Library -->


            <!--materialize js-->
            <script type="text/javascript" src="js/materialize.js"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <!-- data-tables -->
            <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/plugins/data-tables/data-tables-inventario.js"></script>

            <!--plugins.js - Some Specific JS codes for Plugin Settings-->

        </body>

    </html>
    <?php
}
?>

