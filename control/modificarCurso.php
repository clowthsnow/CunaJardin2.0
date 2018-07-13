<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];

if (!isset($nombre) ) {
    header("location:../page-ver-cursos.php");
}
$actualiza="UPDATE curso SET CursoNombre='$nombre' WHERE CursoId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();