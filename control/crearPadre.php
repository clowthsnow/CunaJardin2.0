<?php

include '../conexion.php';

//reciviendo datos del formulario
$PadreDni=$_POST['PadreDni'];
$PadreNombre = $_POST['PadreNombre'];
$PadreApellidos=$_POST['PadreApellidos'];
$PadreCorreo=$_POST['PadreCorreo'];
$PadreTelefono=$_POST['PadreTelefono'];
$PadreCelular=$_POST['PadreCelular'];
$PadreCelularOperador=$_POST['PadreCelularOperador'];
$PadreFechaNac=$_POST['PadreFechaNac'];
$PadreEdad=$_POST['PadreEdad'];
$PadreEstCivil=$_POST['PadreEstCivil'];
$PadreEstCivilEspecifique=$_POST['PadreEstCivilEspecifique'];
$PadreViveCon=$_POST['PadreViveCon'];
$PadreProcedenciaLugar=$_POST['PadreProcedenciaLugar'];
$PadreGradoInstruccion=$_POST['PadreGradoInstruccion'];
$PadreOcupacionTipo=$_POST['PadreOcupacionTipo'];
$PadreOcupacionRubro=$_POST['PadreOcupacionRubro'];
$PadreDireccionTrabajo=$_POST['PadreDireccionTrabajo'];
$PadreCentroTrabajo=$_POST['PadreCentroTrabajo'];


if (!isset($PadreDni) || !isset($PadreNombre) || !isset($PadreApellidos) || !isset($PadreCorreo)) {
    header("location:../page-crear-padre.php");
}

$insertar="INSERT INTO padre(PadreDni, PadreNombre, PadreApellidos, PadreCorreo,PadreTelefono,PadreCelular,PadreCelularOperador,PadreFechaNac,PadreEdad,PadreEstCivil,PadreEstCivilEspecifique,PadreViveCon,PadreProcedenciaLugar,PadreGradoInstruccion,PadreOcupacionTipo,PadreOcupacionRubro,PadreDireccionTrabajo,PadreCentroTrabajo) "
        . "VALUES ('$PadreDni', '$PadreNombre', '$PadreApellidos', '$PadreCorreo','$PadreTelefono','$PadreCelular','$PadreCelularOperador','$PadreFechaNac','$PadreEdad','$PadreEstCivil','$PadreEstCivilEspecifique','$PadreViveCon','$PadreProcedenciaLugar','$PadreGradoInstruccion','$PadreOcupacionTipo','$PadreOcupacionRubro','$PadreDireccionTrabajo','$PadreCentroTrabajo')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
