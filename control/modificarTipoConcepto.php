<?php


include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombretipo'];

if (!isset($id) || !isset($nombre) ) {
    header("location:../page-ver-tipoConceptos.php");
}
$actualiza="UPDATE tipoconcepto SET TipoConceptoDetalle='$nombre' WHERE TipoConceptoId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();