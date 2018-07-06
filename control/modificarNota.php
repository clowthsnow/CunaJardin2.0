<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$NotaAlumno = $_POST['NotaAlumno'];
$NotaCompetencia = $_POST['NotaCompetencia'];
$NotaAnho=$_POST['NotaAnho'];
$NotaCalificacion=$_POST['NotaCalificacion'];
if (!isset($id) || !isset($NotaAlumno) || !isset($NotaCompetencia) || !isset($NotaAnho)||!isset($NotaCalificacion)) {
    header("location:../page-ver-notas.php");
}
$actualiza="UPDATE nota SET NotaAlumno='$NotaAlumno', NotaCompetencia='$NotaCompetencia', NotaAnho='$NotaAnho',NotaCalificacion='$NotaCalificacion' WHERE NotaId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();