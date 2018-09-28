<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';
$tabla = "";
$query = "SELECT * FROM pago ORDEN BY idpago";
if (isset($_POST['dni'])) {
    $q = $conexion->real_escape_string($_POST['dni']);
    //$query="SELECT * FROM padre WHERE PadreDni LIKE '%".$q."%'";
    $query = "SELECT * FROM pago WHERE idpago ='$q'";
}
$buscarAlumno = $conexion->query($query);
if ($buscarAlumno->num_rows > 0) {
    $filaAlumno = $buscarAlumno->fetch_assoc();

    $p = $filaAlumno['AlumnoDni'];
    $query2 = "SELECT * FROM alumno WHERE AlumnoDni ='$p'";
    $buscar = $conexion->query($query2);
    if ($buscar->num_rows > 0) {
        $fila = $buscar->fetch_assoc();
        $tabla .= '<p>' . $fila['AlumnoNombre'] . " " . $fila['AlumnoApellidos'] . '</p>';
    }
} else {
    $tabla = "No se encontraron coincidencias con sus criterios de busqueda.";
}
echo $tabla;
?>

