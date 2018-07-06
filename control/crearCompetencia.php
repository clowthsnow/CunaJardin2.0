<?php

include '../conexion.php';

//reciviendo datos del formulario
$CompetenciaCurso = $_POST['CompetenciaCurso'];
$CompetenciaNombre=$_POST['CompetenciaNombre'];
$CompetenciaDescripcion=$_POST['CompetenciaDescripcion'];

if (!isset($CompetenciaCurso) || !isset($CompetenciaNombre) || !isset($CompetenciaDescripcion)) {
    header("location:../page-crear-competencia.php");
}

$insertar="INSERT INTO competencia(CompetenciaCurso, CompetenciaNombre, CompetenciaDescripcion) VALUES ('$CompetenciaCurso', '$CompetenciaNombre', '$CompetenciaDescripcion')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



