<?php
include '../conexion.php';

//recibiendo datos del formulario
$IngresosNumRecibo = $_POST['IngresosNumRecibo'];
$IngresosFechaEmitida = $_POST['IngresosFechaEmitida'];
$IngresosMonto = $_POST['IngresosMonto'];
$IngresoDescripcion = $_POST['IngresoDescripcion'];

if (!isset($IngresosNumRecibo) ||  !isset($IngresosFechaEmitida)|| !isset($IngresosMonto) || !isset($IngresoDescripcion)) {
    header("location:../page-registrar-ingresos.php");
}

$insertar="INSERT INTO ingresos(IngresosNumRecibo,IngresosFechaEmitida, IngresosMonto,IngresoDescripcion) VALUES ('$IngresosNumRecibo','$IngresosFechaEmitida','$IngresosMonto','$IngresoDescripcion')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();