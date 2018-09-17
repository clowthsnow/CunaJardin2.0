<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';
$tabla="";
$query="SELECT * FROM alumno ORDEN BY AlumnoDni";
if(isset($_POST['dni'])){
    $q=$conexion->real_escape_string($_POST['dni']);
    //$query="SELECT * FROM padre WHERE PadreDni LIKE '%".$q."%'";
    $query="SELECT * FROM alumno WHERE AlumnoDni ='$q'";
}
$buscarAlumno=$conexion->query($query);
if($buscarAlumno->num_rows>0){
    /*$tabla.=
            '<table class="table">';
            
    while($filaAlumno=$buscarAlumno->fetch_assoc()){
        $tabla.=
                '<tr>'
                . '<th>Nombres:</th>'
                . '<td>'.$filaAlumno['AlumnoNombre'].'</td></tr>'
                . '<th>Apellidos:</th>'
                . '<td>'.$filaAlumno['AlumnoApellidos'].'</td></tr>'
              
                . '</tr>';
    }
    $tabla.='</table>';*/
    $filaAlumno=$buscarAlumno->fetch_assoc();
    $tabla.='<p>'.$filaAlumno['AlumnoNombre']." ".$filaAlumno['AlumnoApellidos'].'</p>';
}else{
    $tabla="No se encontraron coincidencias con sus criterios de busqueda.";
}
echo $tabla;
?>

