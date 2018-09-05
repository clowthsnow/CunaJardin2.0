<?php
include '../conexion.php';

//recibiendo datos del formulario
$id = $_POST['id'];
$BoletaCodigo = $_POST['BoletaCodigo'];
$BoletaFechaCanje = $_POST['BoletaFechaCanje'];
$BoletaFechaPago = $_POST['BoletaFechaPago'];
$BoletaMonto = $_POST['BoletaMonto'];
$BoletaDescripcion = $_POST['BoletaDescripcion'];

if (!isset($id) || !isset($BoletaCodigo) ) {
    header("location:../page-ver-boletas.php");
}
$actualiza="UPDATE boleta SET "
        . "BoletaCodigo='$BoletaCodigo',"
        . "BoletaFechaCanje='$BoletaFechaCanje',"
        . "BoletaFechaPago='$BoletaFechaPago',"
        . "BoletaMonto='$BoletaMonto',"
        . "BoletaDescripcion='$BoletaDescripcion' "
        . "WHERE BoletaId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();