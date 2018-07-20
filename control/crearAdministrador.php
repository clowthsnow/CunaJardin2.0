<?php

include '../conexion.php';

//recibiendo datos del formulario
$dni = $_POST['dniAdmin'];
$nombre = $_POST['nombreAdmin'];
$ape = $_POST['apellidoAdmin'];
$tipo = $_POST['tipoAdmin'];
$telefono = $_POST['telefonoAdmin'];
$email = $_POST['emailAdmin'];


if (!isset($dni) ||  !isset($nombre)|| !isset($ape) || !isset($telefono) || !isset($email) || !isset($tipo)) {
    header("location:../page-crear-administrador.php");
}

$insertar="INSERT INTO administrador(AdministradorDni,AdministradorNombre, AdministradorApellidos,AdministradorTipo, AdministradorCorreo,AdministradorTelefono) VALUES ('$dni','$nombre','$ape','$tipo','$email','$telefono')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
