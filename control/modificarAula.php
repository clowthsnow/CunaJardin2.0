<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$num = $_POST['numeroaula'];
$an = $_POST['anhoaula'];
$doc = $_POST['auladocente'];

if (!isset($id) || !isset($num) || !isset($an) || !isset($doc)) {
   // header("location:../page-ver-aula.php");
}
$actualiza="UPDATE aula SET AulaGrado='$num' , AulaAnho='$an', Auladocente='$doc' WHERE AulaId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();