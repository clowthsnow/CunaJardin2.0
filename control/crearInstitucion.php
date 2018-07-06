<?php

include '../conexion.php';

//reciviendo datos del formulario
$nom=$_POST['nombreIns'];
$dir=$_POST['direccionIns'];
$tel = $_POST['telefonoIns'];
$correo=$_POST['correoIns'];
    


if (!isset($nom) || !isset($dir) || !isset($tel) || !isset($correo)) {
    header("location:../page-crear-institucion.php");
}

$insertar="INSERT INTO institucion(InstitucionNombre, InstitucionDireccion, InstitucionTelefono, InstitucionCorreo) VALUES ('$nom','$dir', '$tel', '$correo' )";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



