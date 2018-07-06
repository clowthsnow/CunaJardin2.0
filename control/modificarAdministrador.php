<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombreAdministrador'];
$ape = $_POST['apellidoAdministrador'];
$tipo = $_POST['tipoAdministrador'];
$telefono = $_POST['telefonoAdministrador'];
$email = $_POST['emailAdministrador'];

if (!isset($id) || !isset($nombre) || !isset($ape) || !isset($telefono) || !isset($email) ) {
    header("location:../page-ver-administrador.php");
}
$actualiza="UPDATE administrador SET AdministradorNombre='$nombre' , AdministradorApellidos='$ape' , AdministradorTipo='$tipo', AdministradorCorreo='$email',AdministradorTelefono='$telefono' WHERE AdministradorDni='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();