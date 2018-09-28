<?php

include '../conexion.php';

//recibiendo datos del formulario
$fechainicio = $_POST['fechainicio'];
$fechafin = $_POST['fechafin'];

if (!isset($fechainicio) || !isset($fechafin)) {
   header("location:../page-reporte-alumnosG.php");
}

$in = "SELECT * FROM matricula WHERE matriculaFecha BETWEEN '$fechainicio' AND '$fechafin' AND matriculaEstReg='A'";
if($conexion->query($in)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
