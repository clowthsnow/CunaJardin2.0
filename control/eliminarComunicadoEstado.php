<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_GET['id'];;
if (!isset($id) ) {
    header("location:../page-ver-comunicadoEstados.php");
}
$actualiza="UPDATE comunicadoestado SET ComunicadoEstadoEstReg='*' WHERE ComunicadoEstadoIdComunicado='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();