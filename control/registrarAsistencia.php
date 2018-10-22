<?php

include '../conexion.php';

//reciviendo datos del formulario
$estadoAlumno = $_POST['estadoAlumno'];
$date=$_POST['date'];
$AlumnoDni=$_POST['AlumnoDni'];
$grupo=$_POST['grupo'];
if (!isset($estadoAlumno) || !isset($date) || !isset($AlumnoDni)) {
    header("location:../page-asistencia.php");
}

$insertar="INSERT INTO asistencia(estadoAlumno, date, AlumnoDni,grupo) VALUES ('$estadoAlumno', '$date', '$AlumnoDni','$grupo')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



