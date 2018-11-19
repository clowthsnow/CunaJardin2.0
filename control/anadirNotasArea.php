<?php

include '../conexion.php';

$alumno = $_GET['alumno'];
$area = $_GET['area'];
$nota = $_GET['nota'];


date_default_timezone_set('America/Lima');
$fecha = new DateTime();
$fecha = $fecha->format('Y-m-d');

if (!isset($alumno) || !isset($area)) {
    header("location:../page-ver-grupos.php");
}

$buscarActivo = "SELECT COUNT(*),notaarea.* FROM notaarea WHERE NotaAreaAlumno='$alumno' AND NotaAreaCurso='$area'";
$resultadoBuscarActivo = $conexion->query($buscarActivo);
$cantidad = $resultadoBuscarActivo->fetch_assoc();
//echo $buscarActivo;
$cantidad1 = $cantidad['COUNT(*)'];
echo $cantidad1;

if ($cantidad1 == 0) {
    if ($nota != "") {

        $insert = "INSERT INTO notaarea (NotaAreaAlumno, NotaAreaCurso, NotaAreacolAnho, NotaAreaCalificacacion) VALUES ('$alumno','$area','$fecha','$nota')";
        $conexion->query($insert) or die($conexion->error);
    }
}

if ($cantidad1 == 1) {
    if ($nota != "") {

        $update = "UPDATE notaarea SET NotaAreacolAnho='$fecha' , NotaAreaCalificacacion='$nota' WHERE NotaAreaAlumno='$alumno' AND NotaAreaCurso='$area'";
//        echo $update;
        $conexion->query($update) or die($conexion->error);
        
    }
}

$conexion->close();
