<?php

include '../conexion.php';

//reciviendo datos del formulario
$region = $_GET['region'];
$query = "SELECT * FROM provinces WHERE region_id='$region' ";
$resultado = $conexion->query($query);
$salida = "<option value=\"\" disabled selected>Provincia :*</option>";

while ($fila = $resultado->fetch_assoc()) {
    $salida .= "<option value=\"".$fila['id']."\">".$fila['name']."</option>";
}
echo utf8_encode($salida);

$conexion->close();
