<?php

include '../conexion.php';


//reciviendo datos del formulario
$id = $_GET['id'];;
if (!isset($id) ) {
    header("location:../page-ver-usuarios.php");
}
$actualiza="UPDATE usuario SET UsuarioEstReg='*' WHERE UsuarioId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();