<?php
include '../conexion.php';

//recibiendo datos del formulario
$BoletaCodigo = $_POST['BoletaCodigo'];
$BoletaFechaCanje = $_POST['BoletaFechaCanje'];
$BoletaFechaPago = $_POST['BoletaFechaPago'];
$BoletaVoucher = $_POST['BoletaVoucher'];
$BoletaMonto = $_POST['BoletaMonto'];
$BoletaDescripcion = $_POST['BoletaDescripcion'];

if (!isset($BoletaCodigo) ||  !isset($BoletaFechaCanje)|| !isset($BoletaFechaPago) || !isset($BoletaMonto) || !isset($BoletaDescripcion)) {
    header("location:../page-registrar-boleta.php");
}

$insertar="INSERT INTO boleta(BoletaFechaCanje,BoletaVoucher, BoletaCodigo,BoletaDescripcion, BoletaFechaPago,BoletaMonto) VALUES ('$BoletaFechaCanje','$BoletaVoucher','$BoletaCodigo','$BoletaDescripcion','$BoletaFechaPago','$BoletaMonto')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();