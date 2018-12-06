<?php

include '../conexion.php';

$fecha = new DateTime();
$anio = $fecha->format('Y');
$usuario = $_POST['id'];
//if (!isset($usuario)) {
//    header("location:../page-datos-alumno_1.php");
//}

$ruta = "../siageiEstudiantes/" . $usuario . "-" . $anio;

$busca = "SELECT * FROM alumno WHERE AlumnoDni='$usuario'";
$resultado = $conexion->query($busca);
$provBD = $resultado->fetch_assoc();

if ($provBD['AlumnoTipoAlumno'] == '1') {
    //==============DNI==============//
    $nombreDni = $_FILES['dni']['name']; //Nombre de la imagen
    $archivoDni = $_FILES['dni']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['dni']['name']));
    $nombreDni2 = "DNI-" . $usuario . "-" . $anio . "." . $ext;

    $ruta1 = $ruta . "/" . $nombreDni2;
    move_uploaded_file($archivoDni, $ruta1);

    //=================CARNET===============//
    $nombreCarnet = $_FILES['carnet']['name']; //Nombre de la imagen
    $archivoCarnet = $_FILES['carnet']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['carnet']['name']));
    $nombreCarnet2 = "CARNET-SIS-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreCarnet2;
    move_uploaded_file($archivoCarnet, $ruta1);

    //=================VACUNAS===============//
    $nombreVacunas = $_FILES['vacunas']['name']; //Nombre de la imagen
    $archivoVacunas = $_FILES['vacunas']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['vacunas']['name']));
    $nombreVacunas2 = "CARNET-VACUNAS-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreVacunas2;
    move_uploaded_file($archivoVacunas, $ruta1);
}

if ($provBD['AlumnoTipoAlumno'] == '2' || $provBD['AlumnoTipoAlumno'] == '3' ) {
    //==============DNI==============//
    $nombreDni = $_FILES['dni']['name']; //Nombre de la imagen
    $archivoDni = $_FILES['dni']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['dni']['name']));
    $nombreDni2 = "DNI-" . $usuario . "-" . $anio . "." . $ext;

    $ruta1 = $ruta . "/" . $nombreDni2;
    move_uploaded_file($archivoDni, $ruta1);

    //=================CARNET===============//
    $nombreCarnet = $_FILES['carnet']['name']; //Nombre de la imagen
    $archivoCarnet = $_FILES['carnet']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['carnet']['name']));
    $nombreCarnet2 = "CARNET-SIS-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreCarnet2;
    move_uploaded_file($archivoCarnet, $ruta1);

    //=================VACUNAS===============//
    $nombreVacunas = $_FILES['vacunas']['name']; //Nombre de la imagen
    $archivoVacunas = $_FILES['vacunas']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['vacunas']['name']));
    $nombreVacunas2 = "CARNET-VACUNAS-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreVacunas2;
    move_uploaded_file($archivoVacunas, $ruta1);
    
    //=================BOLETA===============//
    $nombreBoleta = $_FILES['boleta']['name']; //Nombre de la imagen
    $archivoBoleta = $_FILES['boleta']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['boleta']['name']));
    $nombreBoleta2 = "BOLETAS-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreBoleta2;
    move_uploaded_file($archivoBoleta, $ruta1);
}

if ($provBD['AlumnoTipoAlumno'] == '4' ) {
    //==============DNI==============//
    $nombreDni = $_FILES['dni']['name']; //Nombre de la imagen
    $archivoDni = $_FILES['dni']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['dni']['name']));
    $nombreDni2 = "DNI-" . $usuario . "-" . $anio . "." . $ext;

    $ruta1 = $ruta . "/" . $nombreDni2;
    move_uploaded_file($archivoDni, $ruta1);

    //=================CARNET===============//
    $nombreCarnet = $_FILES['carnet']['name']; //Nombre de la imagen
    $archivoCarnet = $_FILES['carnet']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['carnet']['name']));
    $nombreCarnet2 = "CARNET-SIS-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreCarnet2;
    move_uploaded_file($archivoCarnet, $ruta1);

    //=================VACUNAS===============//
    $nombreVacunas = $_FILES['vacunas']['name']; //Nombre de la imagen
    $archivoVacunas = $_FILES['vacunas']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['vacunas']['name']));
    $nombreVacunas2 = "CARNET-VACUNAS-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreVacunas2;
    move_uploaded_file($archivoVacunas, $ruta1);
    
    //=================LIBRETA===============//
    $nombreLibreta = $_FILES['libreta']['name']; //Nombre de la imagen
    $archivoLibreta = $_FILES['libreta']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['libreta']['name']));
    $nombreLibreta2 = "LIBRETA-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreLibreta2;
    move_uploaded_file($archivoLibreta, $ruta1);
    
    //=================CONSTANCIA===============//
    $nombreConstancia = $_FILES['constancia']['name']; //Nombre de la imagen
    $archivoConstancia = $_FILES['constancia']['tmp_name']; //Archivo
    $ext = end(explode(".", $_FILES['constancia']['name']));
    $nombreConstancia2 = "CONSTANCIA-" . $usuario . "-" . $anio . "." . $ext;
    $ruta1 = $ruta . "/" . $nombreConstancia2;
    move_uploaded_file($archivoConstancia, $ruta1);
}

$actualiza = "UPDATE alumno SET AlumnoSiagie='1' WHERE AlumnoDni='$usuario'";


if ($conexion->query($actualiza) == TRUE) {
    echo '1';
    //echo "Registro exitoso";
    header("location:../page-matricula-estudiante.php?usuario=$usuario");
} else {
    echo '0';
    //echo "Error, nombre de usuario existente";
}

//reciviendo datos del formulario
//move_uploaded_file($archivo, $ruta);
//if($conexion->query($actualiza)==TRUE){
//    echo '1';
//    //echo "Registro exitoso";
//}else{
//    echo '0';
//    //echo "Error, nombre de usuario existente";
//}
$conexion->close();
