<?php

include '../conexion.php';

$fecha = new DateTime();
$anio = $fecha->format('Y');
$usuario = $_POST['id'];
if (!isset($usuario)) {
    header("location:../page-datos-alumno_1.php");
}

$ruta = "../siageiEstudiantes/" . $usuario . "-" . $anio;

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

if ($_FILES['archivo']) {
    $file_ary = reArrayFiles($_FILES['archivo']);

    foreach ($file_ary as $file) {
//        print 'File Name: ' . $file['name'];
//        print 'File Type: ' . $file['type'];
//        print 'File Size: ' . $file['tmp_name'];

        $nombreImagen = $file['name']; //Nombre del archivo
        $archivo = $file['tmp_name']; //Archivo
        $ruta1 = $ruta . "/" . $nombreImagen;
        move_uploaded_file($archivo, $ruta1);
    }
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
//$conexion->close();
