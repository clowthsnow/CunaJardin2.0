<?php

include '../conexion.php';

$alumno=$_GET['alumno'];
$logro=$_GET['logro'];
$notap1=$_GET['notap1'];
$notap2=$_GET['notap2'];

echo $alumno;
echo $logro ;
echo $notap1;
echo $notap2;
if (!isset($alumno) || !isset($logro)) {
        header("location:../page-ver-grupos.php");
}
//
//$buscar="SELECT * FROM kardexsellada WHERE KardexSelladaId='$dataBase' AND KardexSelladaLicor='$licor'";
//$resultadoBuscar=$conexion->query($buscar);
//$fila=$resultadoBuscar->fetch_assoc();
//
//
//
//$venta=($fila['KardexSelladaInicio']*1.0)+($fila['KardexSelladaAumento']*1.0)-($fin*1.0);
//
////escrbimos ventas y fin
//$update="UPDATE kardexsellada SET KardexSelladaFinal='$fin' , KardexSelladaVenta='$venta' WHERE KardexSelladaId='$dataBase' AND KardexSelladaLicor='$licor'";
//$conexion->query($update) or die($conexion->error);

$conexion->close();
