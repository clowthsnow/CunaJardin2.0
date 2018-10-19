<?php

include '../conexion.php';

$alumno = $_GET['alumno'];
$logro = $_GET['logro'];
$notap1 = $_GET['notap1'];
$notap2 = $_GET['notap2'];

echo $alumno;
echo $logro;
echo $notap1;
echo $notap2;
date_default_timezone_set('America/Lima');
$fecha = new DateTime();
$fecha = $fecha->format('Y-m-d');

if (!isset($alumno) || !isset($logro)) {
    header("location:../page-ver-grupos.php");
}


$buscarActivo = "SELECT COUNT(*),nota.* FROM nota WHERE NotaAlumno='$alumno' AND NotaCompetencia='$logro'";
$resultadoBuscarActivo = $conexion->query($buscarActivo);
$cantidad = $resultadoBuscarActivo->fetch_assoc();

$cantidad1 = $cantidad['COUNT(*)'];
echo $cantidad1;

if ($cantidad1 == 0) {
    if ($notap1 != "") {
        $insert = "INSERT INTO nota (NotaAlumno, NotaCompetencia, NotaAnho, NotaCalificacion, NotaEstReg) VALUES ('$alumno','$logro','$fecha','$notap1','1')";
        $conexion->query($insert) or die($conexion->error);
    }
    if ($notap2 != "") {
        $insert = "INSERT INTO nota (NotaAlumno, NotaCompetencia, NotaAnho, NotaCalificacion, NotaEstReg) VALUES ('$alumno','$logro','$fecha','$notap2','2')";
        $conexion->query($insert) or die($conexion->error);
    }
}

if ($cantidad1 == 1) {
    if ($cantidad['NotaEstReg'] == 1 && $notap1 != "") {

        $update = "UPDATE nota SET NotaAnho='$fecha' , NotaCalificacion='$notap1' WHERE NotaAlumno='$alumno' AND NotaCompetencia='$logro' AND NotaEstReg='1'";
        $conexion->query($update) or die($conexion->error);

        if ($notap2 != "") {
            $insert = "INSERT INTO nota (NotaAlumno, NotaCompetencia, NotaAnho, NotaCalificacion, NotaEstReg) VALUES ('$alumno','$logro','$fecha','$notap2','2')";
            $conexion->query($insert) or die($conexion->error);
        }
    } if ($cantidad['NotaEstReg'] == 2 && $notap2 != "") {
        $update = "UPDATE nota SET NotaAnho='$fecha' , NotaCalificacion='$notap2' WHERE NotaAlumno='$alumno' AND NotaCompetencia='$logro' AND NotaEstReg='2'";
        $conexion->query($update) or die($conexion->error);
        if ($notap1 != "") {
            $insert = "INSERT INTO nota (NotaAlumno, NotaCompetencia, NotaAnho, NotaCalificacion, NotaEstReg) VALUES ('$alumno','$logro','$fecha','$notap1','1')";
            $conexion->query($insert) or die($conexion->error);
        }
    }
}


if ($cantidad1 == 2) {
    if ($notap1 != "") {

        $update = "UPDATE nota SET NotaAnho='$fecha' , NotaCalificacion='$notap1' WHERE NotaAlumno='$alumno' AND NotaCompetencia='$logro' AND NotaEstReg='1'";
        $conexion->query($update) or die($conexion->error);
    } if ($notap2 != "") {
        $update = "UPDATE nota SET NotaAnho='$fecha' , NotaCalificacion='$notap2' WHERE NotaAlumno='$alumno' AND NotaCompetencia='$logro' AND NotaEstReg='2'";
        $conexion->query($update) or die($conexion->error);
    }
}

$conexion->close();
