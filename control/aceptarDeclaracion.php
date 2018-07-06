<?php

include '../conexion.php';

//reciviendo datos del formulario

$usuario= $_POST['usuario'];


if (  !isset($usuario)) {
    header("location:../page-datos-alumno.php");
}

$actualiza="UPDATE alumno SET AlumnoDeclaracionJurada='1' WHERE AlumnoDni='$usuario'";


if($conexion->query($actualiza)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        header("location:../page-subir-siagei.php?usuario=$usuario");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();





