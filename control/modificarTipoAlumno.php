<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['TipoAlumnoDetalle'];

if (!isset($id) || !isset($nombre) ) {
    header("location:../page-ver-tipoAlumnos.php");
}
$actualiza="UPDATE tipoalumno SET TipoAlumnoDetalle='$nombre' WHERE TipoAlumnoId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();