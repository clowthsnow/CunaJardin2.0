<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$ComunicadoAula = $_POST['ComunicadoAula'];
$ComunicadoDescripcion = $_POST['ComunicadoDescripcion'];
$ComunicadoFecha=$_POST['ComunicadoFecha'];
if (!isset($id) || !isset($ComunicadoAula) || !isset($ComunicadoDescripcion) || !isset($ComunicadoFecha)) {
    header("location:../page-ver-comunicados.php");
}
$actualiza="UPDATE comunicado SET ComunicadoAula='$ComunicadoAula', ComunicadoDescripcion='$ComunicadoDescripcion', ComunicadoFecha='$ComunicadoFecha' WHERE ComunicadoId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();