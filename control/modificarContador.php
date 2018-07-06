<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombreContador'];
$ape = $_POST['apellidoContador'];
$telefono = $_POST['telefonoContador'];
$email = $_POST['emailContador'];

if (!isset($id) || !isset($nombre) || !isset($ape) || !isset($telefono) || !isset($email) ) {
    header("location:../page-ver-secretaria.php");
}
$actualiza="UPDATE contador SET ContadorNombre='$nombre' , ContadorApellidos='$ape' , ContadorCorreo='$email',ContadorTelefono='$telefono' WHERE ContadorDni='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();