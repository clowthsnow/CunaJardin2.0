<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombreInstitucion'];
$dir = $_POST['direccionInstitucion'];
$telefono = $_POST['telefonoInstitucion'];
$email = $_POST['emailInstitucion'];

if (!isset($id) || !isset($nombre) || !isset($dir) || !isset($telefono) || !isset($email) ) {
    header("location:../page-ver-institucion.php");
}
$actualiza="UPDATE institucion SET InstitucionNombre='$nombre' , InstitucionDireccion='$dir', InstitucionTelefono='$telefono', InstitucionCorreo='$email' WHERE InstitucionId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();