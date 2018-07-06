<?php

include '../conexion.php';

//reciviendo datos del formulario
$NotaAlumno=$_POST['NotaAlumno'];
$NotaCompetencia = $_POST['NotaCompetencia'];
$NotaAnho=$_POST['NotaAnho'];
$NotaCalificacion=$_POST['NotaCalificacion'];

if (!isset($NotaAlumno) || !isset($NotaCompetencia) || !isset($NotaAnho) || !isset($NotaCalificacion)) {
    header("location:../page-crear-nota.php");
}

$insertar="INSERT INTO nota(NotaAlumno, NotaCompetencia, NotaAnho, NotaCalificacion) VALUES ('$NotaAlumno', '$NotaCompetencia', '$NotaAnho', '$NotaCalificacion')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
