<?php

include '../conexion.php';

//reciviendo datos del formulario

$usuario = $_POST['usuario'];
$fecha = new DateTime();
$anio = $fecha->format('Y');


if (!isset($usuario)) {
    header("location:../page-datos-alumno.php");
}

$buscarA = "SELECT * FROM alumno WHERE AlumnoDni='$usuario'";
$resultado = $conexion->query($buscarA);
$provBD = $resultado->fetch_assoc();
//print_r($provBD);
//mkdir("oli", 755);
if ($provBD['AlumnoDeclaracionJurada'] == '0') {
    $carpeta = "../siageiEstudiantes/" . $usuario . "-" . $anio;
//    $carpt = $usuario . "-" . $anio;
    mkdir($carpeta, 755);
//    if (!mkdir($carpeta, 755)) {
//        die('Fallo al crear las carpetas...');
//    }

    $actualiza = "UPDATE alumno SET AlumnoDeclaracionJurada='1' WHERE AlumnoDni='$usuario'";


    if ($conexion->query($actualiza) == TRUE) {
        echo '1';
        //echo "Registro exitoso";
        header("location:../page-subir-documentos.php?usuario=$usuario");
    } else {
        echo '0';
        //echo "Error, nombre de usuario existente";
    }
} else {
    header("location:../page-subir-documentos.php?usuario=$usuario");
}



$conexion->close();





