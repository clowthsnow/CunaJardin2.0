<?php

include '../conexion.php';

//reciviendo datos del formulario
$ComunicadoEstadoIdComunicado=$_POST['ComunicadoEstadoIdComunicado'];
$ComunicadoEstadoPadre = $_POST['ComunicadoEstadoPadre'];
$ComunicadoEstadoEstado=$_POST['ComunicadoEstadoEstado'];

if (!isset($ComunicadoEstadoIdComunicado) || !isset($ComunicadoEstadoPadre) || !isset($ComunicadoEstadoEstado)) {
    header("location:../page-crear-comunicadoEstado.php");
}

$insertar="INSERT INTO comunicadoestado(ComunicadoEstadoIdComunicado, ComunicadoEstadoPadre, ComunicadoEstadoEstado) VALUES ('$ComunicadoEstadoIdComunicado', '$ComunicadoEstadoPadre', '$ComunicadoEstadoEstado')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



