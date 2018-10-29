<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$PadreNombre = $_POST['PadreNombre'];
$PadreApellidos = $_POST['PadreApellidos'];
$PadreCorreo=$_POST['PadreCorreo'];
$PadreTelefono=$_POST['PadreTelefono'];
$PadreCelular = $_POST['PadreCelular'];
$PadreCelularOperador = $_POST['PadreCelularOperador'];
$PadreFechaNac=$_POST['PadreFechaNac'];
$PadreEdad=$_POST['PadreEdad'];
$PadreEstCivil = $_POST['PadreEstCivil'];
$PadreEstCivilEspecifique = $_POST['PadreEstCivilEspecifique'];
$PadreViveCon=$_POST['PadreViveCon'];
$PadreProcedenciaLugar=$_POST['PadreProcedenciaLugar'];
$PadreGradoInstruccion = $_POST['PadreGradoInstruccion'];
$PadreOcupacionTipo = $_POST['PadreOcupacionTipo'];
$PadreOcupacionRubro=$_POST['PadreOcupacionRubro'];
$PadreDireccionTrabajo=$_POST['PadreDireccionTrabajo'];
$PadreCentroTrabajo = $_POST['PadreCentroTrabajo'];

if (!isset($id) || !isset($PadreNombre) || !isset($PadreApellidos) || !isset($PadreCorreo)||!isset($PadreTelefono)) {
    header("location:../page-ver-padres.php");
}
$actualiza="UPDATE padre SET PadreNombre='$PadreNombre', PadreApellidos='$PadreApellidos', PadreCorreo='$PadreCorreo',PadreTelefono='$PadreTelefono',PadreCelular='$PadreCelular',PadreCelularOperador='$PadreCelularOperador',"
        . "PadreFechaNac='$PadreFechaNac',PadreEdad='$PadreEdad',PadreEstCivil='$PadreEstCivil',PadreEstCivilEspecifique='$PadreEstCivilEspecifique',PadreViveCon='$PadreViveCon',"
        . "PadreProcedenciaLugar='$PadreProcedenciaLugar',PadreGradoInstruccion='$PadreGradoInstruccion',PadreOcupacionTipo='$PadreOcupacionTipo',PadreOcupacionRubro='$PadreOcupacionRubro',"
        . "PadreDireccionTrabajo='$PadreDireccionTrabajo',PadreCentroTrabajo='$PadreCentroTrabajo', PadreEstReg='A' WHERE PadreDni='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();