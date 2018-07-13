<?php

include '../conexion.php';

//recibiendo datos del formulario
$id = $_POST['cod'];
$grado = $_POST['gradoaula'];
$anho = $_POST['anhoaula'];
$docente = $_POST['docenteaula'];



if (!isset($id) || !isset($grado) ||  !isset($anho)|| !isset($docente)) {
   header("location:../page-crear-aula.php");
}

$in = "INSERT INTO aula(AulaId, AulaGrado, AulaAnho, AulaDocente) VALUES ('$id', '$grado', '$anho', '$docente')";
if($conexion->query($in)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();

