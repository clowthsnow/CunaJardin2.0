<?php

include '../conexion.php';

//reciviendo datos del formulario

$alumno = $_POST['id'];
$aula=$_POST['aula'];
$fecha = new DateTime();
$anio = $fecha->format('Y');

if (  !isset($alumno) || !isset($aula)) {
    header("location:../page-matricula-estudiante.php");
}


$insertar="INSERT INTO aulaalumnos( AulaAlumnosId,AulaAlumnosAlumno,AulaAlumnosAnio) VALUES ('$aula','$alumno','$anio')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();