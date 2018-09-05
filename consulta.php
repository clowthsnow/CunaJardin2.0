<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexion.php';
$tabla="";
$query="SELECT * FROM padre ORDEN BY PadreDni";
if(isset($_POST['padre'])){
    $q=$conexion->real_escape_string($_POST['padre']);
    $query="SELECT * FROM padre WHERE PadreDni LIKE '%".$q."%'";
}
$buscarPadre=$conexion->query($query);
if($buscarPadre->num_rows>0){
    $tabla.=
            '<table class="table">'
            . '<tr class="bg-primary">'
            . '<td>Apellidos:</td>'
            . '<td>Nombres:</td>'
            . '<td>Edad:</td>'
            . '<td>Fecha de Nac:</td>'
            . '<td>Telefono fijo:</td>'
            . '<td>Celular:</td>'
            . '<td>Estado Civil:</td>'
            . '<td>Vive con niño(a):</td>'
            . '<td>Lugar de Procedencia:</td>'
            . '<td>Grado de Instruccion:</td>'
            . '<td>Ocupacion actual:</td>'
            . '<td>Tipo de Rubro:</td>'
            . '<td>Centro de trabajo:</td>'
            . '<td>Direccion del trabajo:</td>'
            . '</tr>';
    
    while($filaPadre=$buscarPadre->fetch_assoc()){
        $tabla.=
                '<tr>'
                . '<td>'.$filaPadre['PadreApellidos'].'</td>'
                . '<td>'.$filaPadre['PadreNombre'].'</td>'
                . '<td>'.$filaPadre['PadreEdad'].'</td>'
                . '<td>'.$filaPadre['PadreFechaNac'].'</td>'
                . '<td>'.$filaPadre['PadreTelefono'].'</td>'
                . '<td>'.$filaPadre['PadreCelular'].'</td>'
                . '<td>'.$filaPadre['PadreEstCivil'].'</td>'
                . '<td>'.$filaPadre['PadreViveCon'].'</td>'
                . '<td>'.$filaPadre['PadreProcedenciaLugar'].'</td>'
                . '<td>'.$filaPadre['PadreGradoInstruccion'].'</td>'
                . '<td>'.$filaPadre['PadreOcupacionTipo'].'</td>'
                . '<td>'.$filaPadre['PadreOcupacionRubro'].'</td>'
                . '<td>'.$filaPadre['PadreCentroTrabajo'].'</td>'
                . '<td>'.$filaPadre['PadreDireccionTrabajo'].'</td>'
                . '</tr>';
    }
    $tabla.='</table>';
}else{
    $tabla="No se encontraron coincidencias con sus criterios de busqueda.";
}
echo $tabla;
?>

