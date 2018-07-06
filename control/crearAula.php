<?php

include '../conexion.php';

//recibiendo datos del formulario

$grado = $_POST['gradoaula'];
$anho = $_POST['anhoaula'];
$docente = $_POST['docenteaula'];



if (!isset($grado) ||  !isset($anho)|| !isset($docente)) {
    header("location:../page-crear-aula.php");
}

$insertar="INSERT INTO aula( AulaGrado, AulaAnho, AulaDocente) VALUES ('$grado','$anho','$docente')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();

