<?php

include '../conexion.php';

//reciviendo datos del formulario

$nombre = $_POST['nombretipo'];


if (  !isset($nombre)) {
    header("location:../page-crear-tipoConcepto.php");
}


$insertar="INSERT INTO tipoconcepto( TipoConceptoDetalle) VALUES ('$nombre')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();





