<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$ComunicadoEstadoPadre = $_POST['ComunicadoEstadoPadre'];
$ComunicadoEstadoEstado = $_POST['ComunicadoEstadoEstado'];
if (!isset($id) || !isset($ComunicadoEstadoPadre) || !isset($ComunicadoEstadoEstado)) {
    header("location:../page-ver-comunicadoEstados.php");
}
$actualiza="UPDATE comunicadoestado SET ComunicadoEstadoPadre='$ComunicadoEstadoPadre', ComunicadoEstadoEstado='$ComunicadoEstadoEstado' WHERE ComunicadoEstadoIdComunicado='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();