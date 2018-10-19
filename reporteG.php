<?php
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
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>GRAFICA DE INGRESOS</title>

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
	</head>
	<body>
            <script src="Highcharts-4.1.5/js/highcharts.js"></script>
<script src="Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>