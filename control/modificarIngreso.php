<?php
include '../conexion.php';

//recibiendo datos del formulario
$id = $_POST['id'];
$IngresosNumRecibo = $_POST['IngresosNumRecibo'];
$IngresosFechaEmitida = $_POST['IngresosFechaEmitida'];
$IngresosMonto = $_POST['IngresosMonto'];
$IngresoDescripcion = $_POST['IngresoDescripcion'];

if (!isset($id) || !isset($IngresosNumRecibo) ) {
    header("location:../page-ver-ingresos.php");
}
$actualiza="UPDATE ingresos SET "
        . "IngresosNumRecibo='$IngresosNumRecibo',"
        . "IngresosFechaEmitida='$IngresosFechaEmitida',"
        . "IngresosMonto='$IngresosMonto',"
        . "IngresoDescripcion='$IngresoDescripcion'"
        . "WHERE IngresosId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();