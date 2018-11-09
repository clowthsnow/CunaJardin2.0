<?php

include '../conexion.php';

//reciviendo datos del formulario
$provincia = $_GET['provincia'];
$query = "SELECT * FROM districts WHERE region_id='$provincia' ";
$resultado = $conexion->query($query);
$salida = "<option value=\"\" disabled selected>Distrito :*</option>";

while ($fila = $resultado->fetch_assoc()) {
    $salida .= "<option value=\"".$fila['id']."\">".$fila['name']."</option>";
}
echo utf8_encode($salida)   ;

$conexion->close();
