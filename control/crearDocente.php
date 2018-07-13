<?php

include '../conexion.php';

//reciviendo datos del formulario
$dni = $_POST['docentedni'];
$nombre = $_POST['docentenombre'];
$apellido = $_POST['docenteapellido'];
$titulo = $_POST['docentetitulo'];
$correo = $_POST['docentecorreo'];
$tel = $_POST['docentetelefono'];
$pais = $_POST['docentepais'];
$ciudad = $_POST['docenteciudad'];
$fecha = $_POST['docentefecha'];
$domicilio = $_POST['docentedomicilio'];
$distrito = $_POST['docentedistrito'];
$grado = $_POST['docentegrado'];
$ocupacion = $_POST['docenteocupacion'];
$dirtrabajo = $_POST['docentedirtrabajo'];
$centro = $_POST['docentecentro'];
$sangre = $_POST['docentesangre'];
$unsa = $_POST['docenteUNSA'];
$vin = $_POST['docentevinculo'];
$sit = $_POST['docentesituacion'];
$sitlab = $_POST['docentedetallelab'];
$tipo= $_POST['docentetipo'];
$seguro= $_POST['docenteseguro'];
$segsoc= $_POST['docentesocial'];
$cur= $_POST['docentecurr'];



$foto = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];
$ruta="../fotoDocentes";
$ruta=$ruta."/".$foto;
move_uploaded_file($archivo, $ruta);


if (!isset($dni)||!isset($nombre)||!isset($apellido)||!isset($titulo)||!isset($correo) ||!isset($tel) ||!isset($pais) ||!isset($ciudad)
    ||!isset($fecha) ||!isset($domicilio) ||!isset($distrito) ||!isset($grado) ||!isset($ocupacion) ||!isset($dirtrabajo) ||!isset($centro) ||!isset($sangre)
    ||!isset($unsa) ||!isset($vin) ||!isset($sit) ||!isset($sitlab) ||!isset($seguro) ||!isset($segsoc) ||!isset($tipo) ||!isset($cur) ||!isset($foto)) {
    
}

$insertar="INSERT INTO docente(DocenteDni,DocenteNombre,DocenteApellidos,DocenteTitulo,DocenteCorreo,DocenteTelefono,"
        . "DocentePaisNacimiento,DocenteCiudadNacimiento,DocenteFechaNaciemiento,DocenteDomicilio,DocenteDistrito,"
        . "DocenteGradoInstruccion,DocenteOcupacion,DocenteDireccionTrabajo,DocenteCentroTrabajo,DocenteTipoSangre,"
        . "DocenteVinculoUnsa,DocenteVinculoEspecifica,DocenteSituacionLaboral,DocenteSituacionDet,DocenteTipo,"
        . "DocenteSeguro,DocenteSeguroDetalle,DocenteFoto,DocenteCurriculum) VALUES ('$dni','$nombre','$apellido','$titulo','$correo','$tel','$pais','$ciudad','$fecha','$domicilio','$distrito',"
        . "'$grado','$ocupacion','$dirtrabajo','$centro','$sangre','$unsa','$vin','$sit','$sitlab','$tipo','$seguro','$segsoc','$foto','$cur')";



echo "$insertar<br>";
if($conexion->query($insertar)==TRUE or die($conexion->error)){
    echo '1';
    echo "Registro exitoso";
        header("location:../page-crear-docente.php");
}else{
    echo '0';
    echo "Error, nombre de usuario existente";
}



$conexion->close();



