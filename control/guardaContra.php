<?php

include '../conexion.php';

//reciviendo datos del formulario
$usuario = $_POST['usuario'];
$antigua = $_POST['antigua'];
$n1 = $_POST['nueva1'];
$n2 = $_POST['nueva2'];
if (!isset($antigua) || !isset($n1)) {
    header("location:../page-mi-cuenta.php");
}


$buscaU = "SELECT * FROM usuario WHERE UsuarioId='$usuario'";
$result1 = $conexion->query($buscaU);
$user = $result1->fetch_assoc();
$cantigua=$user['UsuarioContra'];
$antigua= md5($antigua);
if ($antigua == $cantigua) {
    $n1= md5($n1);
    $upd = "UPDATE usuario SET UsuarioContra='$n1' WHERE usuarioId='$usuario'";
    if ($conexion->query($upd) == TRUE) {
        echo '1';
        //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
    }
} else {
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();




