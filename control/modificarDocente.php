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

$cur= $_FILES['docentecurr']['name'];
$archivoC = $_FILES['docentecurr']['tmp_name'];
$ruta1="../curriculum";
$ruta1=$ruta1."/".$cur;
move_uploaded_file($archivoC, $ruta1);


$foto = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];
$ruta="../fotoDocentes";
$ruta=$ruta."/".$foto;
move_uploaded_file($archivo, $ruta);

if (!isset($dni)||!isset($nombre)||!isset($apellido)||!isset($titulo)||!isset($correo) ||!isset($tel) ||!isset($pais) ||!isset($ciudad)
    ||!isset($fecha) ||!isset($domicilio) ||!isset($distrito) ||!isset($grado) ||!isset($ocupacion) ||!isset($dirtrabajo) ||!isset($centro) ||!isset($sangre)
    ||!isset($unsa) ||!isset($vin) ||!isset($sit) ||!isset($sitlab) ||!isset($seguro) ||!isset($segsoc) ||!isset($tipo) ||!isset($cur) ||!isset($foto)) {
    

    header("location:../page-ver-docente.php");
}
$actualiza="UPDATE docente SET DocenteNombre`= $nombre, DocenteApellidos=$apellido,DocenteTitulo=$titulo,DocenteCorreo =$correo],"
        . "DocenteTelefono=$tel,DocentePaisNacimiento`=$pais,DocenteCiudadNacimiento=$ciudad,DocenteFechaNaciemiento=$fecha,"
        . "DocenteDomicilio=$domicilio,DocenteDistrito=$distrito,DocenteGradoInstruccion=$grado,DocenteOcupacion=$ocupacion,"
        . "DocenteDireccionTrabajo=$dirtrabajo,DocenteCentroTrabajo=$centro,DocenteTipoSangre=$sangre,DocenteVinculoUnsa=$unsa,DocenteVinculoEspecifica=$vin,"
        . "DocenteSituacionLaboral=$sit,DocenteSituacionDet=$sitlab,DocenteTipo=$tipo,DocenteSeguro=$seguro,DocenteSeguroDetalle=$segsoc,"
        . "DocenteFoto=$foto,DocenteCurriculum=$cur WHERE DocenteDni='$dni'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();