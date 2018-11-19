<?php

include '../conexion.php';

date_default_timezone_set('America/Lima');
    $fecha = new DateTime();

//reciviendo datos del formulario
$PadreDni=$_POST['PadreDni'];
$PadreNombre = $_POST['PadreNombre'];
$PadreApellidos=$_POST['PadreApellidos'];
$PadreCorreo="";
$PadreTelefono="";
$PadreCelular="";
$PadreCelularOperador="";
$PadreFechaNac=$fecha->format('Y-m-d');
$PadreEdad="";
$PadreEstCivil="";
$PadreEstCivilEspecifique="";
$PadreViveCon="";
$PadreProcedenciaLugar="";
$PadreGradoInstruccion="";
$PadreOcupacionTipo="";
$PadreOcupacionRubro="";
$PadreDireccionTrabajo="";
$PadreCentroTrabajo="";


if (!isset($PadreDni) || !isset($PadreNombre) || !isset($PadreApellidos) ) {
    header("location:../page-crear-padre.php");
}

$insertar="INSERT INTO padre(PadreDni, PadreNombre, PadreApellidos, PadreCorreo,PadreTelefono,PadreCelular,PadreCelularOperador,PadreFechaNac,PadreEdad,PadreEstCivil,PadreEstCivilEspecifique,PadreViveCon,PadreProcedenciaLugar,PadreGradoInstruccion,PadreOcupacionTipo,PadreOcupacionRubro,PadreDireccionTrabajo,PadreCentroTrabajo, PadreEstReg) "
        . "VALUES ('$PadreDni', '$PadreNombre', '$PadreApellidos', '$PadreCorreo','$PadreTelefono','$PadreCelular','$PadreCelularOperador','$PadreFechaNac','$PadreEdad','$PadreEstCivil','$PadreEstCivilEspecifique','$PadreViveCon','$PadreProcedenciaLugar','$PadreGradoInstruccion','$PadreOcupacionTipo','$PadreOcupacionRubro','$PadreDireccionTrabajo','$PadreCentroTrabajo', 'I')";

if($conexion->query($insertar)==TRUE or die($conexion->error)){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
