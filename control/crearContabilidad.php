<?php

include '../conexion.php';

//recibiendo datos del formulario
$ContabilidadAlumno = $_POST['ContabilidadAlumno'];
$ContabilidadNumeroRecibo = $_POST['ContabilidadNumeroRecibo'];
$ContabilidadMonto = $_POST['ContabilidadMonto'];
$ContabilidadConcepto = $_POST['ContabilidadConcepto'];
$ContabilidadDescripcion = $_POST['ContabilidadDescripcion'];
$ContabilidadFecha = $_POST['ContabilidadFecha'];


if (!isset($ContabilidadAlumno) ||  !isset($ContabilidadNumeroRecibo)|| !isset($ContabilidadMonto) || !isset($ContabilidadConcepto) || !isset($ContabilidadDescripcion)|| !isset($ContabilidadFecha)) {
    header("location:../page-crear-contabilidad.php");
}

$insertar="INSERT INTO contabilidad(ContabilidadAlumno,ContabilidadNumeroRecibo, ContabilidadMonto,ContabilidadConcepto, ContabilidadDescripcion,ContabilidadFecha) VALUES ('$ContabilidadAlumno','$ContabilidadNumeroRecibo','$ContabilidadMonto','$ContabilidadConcepto','$ContabilidadDescripcion','$ContabilidadFecha')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
