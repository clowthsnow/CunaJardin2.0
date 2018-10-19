<?php

include '../conexion.php';

$alumno = $_GET['alumno'];
$aula = $_GET['aula'];
$docente = $_GET['docente'];
$comentario=$_GET['comentario'];
date_default_timezone_set('America/Lima');
$fecha = new DateTime();
$fecha = $fecha->format('Y-m-d');

if (!isset($alumno) || !isset($aula)) {
    header("location:../page-ver-grupos.php");
}

$buscarActivo = "SELECT COUNT(*),detallelibreta.* FROM detallelibreta WHERE DetalleLibretaAlumno='$alumno' AND YEAR(DetalleLibretaAnho)='2018'";
$resultadoBuscarActivo = $conexion->query($buscarActivo);
$cantidad = $resultadoBuscarActivo->fetch_assoc();

$cantidad1 = $cantidad['COUNT(*)'];
echo $cantidad1;

if ($cantidad1 == 0) {

    $insert = "INSERT INTO detallelibreta (DetalleLibretaAlumno, DetalleLibretaAnho, DetalleLibretaComentario, DetalleLibretaGrado,DetalleLibretaDocente) VALUES ('$alumno','$fecha','$comentario','$aula','$docente')";
    $conexion->query($insert) or die($conexion->error);
}

if ($cantidad1 == 1) {
    if ($comentario!= "") {

        $update = "UPDATE detallelibreta SET DetalleLibretaComentario='$comentario' WHERE DetalleLibretaAlumno='$alumno' AND YEAR(DetalleLibretaAnho)='2018'";
        $conexion->query($update) or die($conexion->error);
    }
}

$conexion->close();

