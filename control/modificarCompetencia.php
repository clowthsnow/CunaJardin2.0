<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$CompetenciaCurso = $_POST['CompetenciaCurso'];
$CompetenciaNombre = $_POST['CompetenciaNombre'];
$CompetenciaDescripcion=$_POST['CompetenciaDescripcion'];
if (!isset($id) || !isset($CompetenciaCurso) || !isset($CompetenciaNombre) || !isset($CompetenciaDescripcion)) {
    header("location:../page-ver-competencias.php");
}
$actualiza="UPDATE competencia SET CompetenciaCurso='$CompetenciaCurso', CompetenciaNombre='$CompetenciaNombre', CompetenciaDescripcion='$CompetenciaDescripcion' WHERE CompetenciaId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();