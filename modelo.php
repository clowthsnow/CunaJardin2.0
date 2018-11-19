<?php
session_start();
$operacion=$_REQUEST['operacion'];
switch ($operacion){
    case 'agregar':agregar();
        break;
}
function agregar(){
    
    $fecha=$_REQUEST['fecha'];
    $numOficio=$_REQUEST['numOficio'];
    $numExpediente=$_REQUEST['numExpediente'];
    $concepto=$_REQUEST['concepto'];
    $fechaPago=$_REQUEST['fechaPago'];
    $monto=$_REQUEST['monto'];
    
    $_SESSION['fecha']=$fecha;
    $_SESSION['numOficio']=$numOficio;
    $_SESSION['numExpediente']=$numExpediente;
    $_SESSION['concepto']=$concepto;
    $_SESSION['fechaPago']=$fechaPago;
    $_SESSION['monto']=$monto;
    header("location:page-registrar-egreso2.php");
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

