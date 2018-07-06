<?php

include '../conexion.php';

//reciviendo datos del formulario
$nombreImagen = $_FILES['foto']['name']; //Nombre de la imagen
$archivo = $_FILES['foto']['tmp_name']; //Archivo
$ruta = "../siageiEstudiantes";
$ruta = $ruta . "/" . $nombreImagen;
move_uploaded_file($archivo, $ruta);
$usuario=$_POST['id'];
if (  !isset($usuario)) {
    header("location:../page-datos-alumno.php");
}

$actualiza="UPDATE alumno SET AlumnoSiagie='$nombreImagen' WHERE AlumnoDni='$usuario'";


if($conexion->query($actualiza)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        header("location:../page-matricula-estudiante.php?usuario=$usuario");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
