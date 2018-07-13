<?php

include '../conexion.php';

//reciviendo datos del formulario
$ComunicadoAula=$_POST['ComunicadoAula'];
$ComunicadoDescripcion = $_POST['ComunicadoDescripcion'];
$ComunicadoFecha=$_POST['ComunicadoFecha'];

if (!isset($ComunicadoAula) || !isset($ComunicadoDescripcion) || !isset($ComunicadoFecha)) {
    header("location:../page-crear-comunicado.php");
}

$insertar="INSERT INTO comunicado(ComunicadoAula, ComunicadoDescripcion, ComunicadoFecha) VALUES ('$ComunicadoAula', '$ComunicadoDescripcion', '$ComunicadoFecha')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



