<?php
include '../conexion.php';

//recibiendo datos del formulario
$id = $_POST['id'];
$ContabilidadAlumno = $_POST['ContabilidadAlumno'];
$ContabilidadNumeroRecibo = $_POST['ContabilidadNumeroRecibo'];
$ContabilidadMonto = $_POST['ContabilidadMonto'];
$ContabilidadConcepto = $_POST['ContabilidadConcepto'];
$ContabilidadDescripcion = $_POST['ContabilidadDescripcion'];
$ContabilidadFecha = $_POST['ContabilidadFecha'];

if (!isset($id) || !isset($ContabilidadAlumno) ) {
    header("location:../page-ver-vouchers.php");
}
$actualiza="UPDATE contabilidad SET "
        . "ContabilidadAlumno='$ContabilidadAlumno',"
        . "ContabilidadNumeroRecibo='$ContabilidadNumeroRecibo',"
        . "ContabilidadMonto='$ContabilidadMonto',"
        . "ContabilidadConcepto='$ContabilidadConcepto',"
        . "ContabilidadDescripcion='$ContabilidadDescripcion',"
        . "ContabilidadFecha='$ContabilidadFecha' "
        . "WHERE ContabilidadId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();