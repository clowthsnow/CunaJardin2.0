<?php

include '../conexion.php';

//recibiendo datos del formulario
$dni = $_POST['dniConta'];
$nombre = $_POST['nombreConta'];
$ape = $_POST['apellidoConta'];
$telefono = $_POST['telefonoConta'];
$email = $_POST['emailConta'];


if (!isset($dni) || !isset($nombre) || !isset($ape) || !isset($telefono) || !isset($email)) {
    header("location:../page-crear-contador.php");
}

$insertar = "INSERT INTO contador(ContadorDni,ContadorNombre, ContadorApellidos,ContadorCorreo, ContadorTelefono) VALUES ('$dni','$nombre','$ape','$email','$telefono')";

if ($conexion->query($insertar) == TRUE) {
    echo '1';
    //echo "Registro exitoso";
    //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
} else {
    echo 'Registro no satisfactorio, Dni ya ingresado anteriormente';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
