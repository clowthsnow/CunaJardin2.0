<?php
	include 'conexion.php';

    $salida = "";

    $query = "SELECT * FROM contabilidad WHERE ContabilidadAlumno NOT LIKE '' ORDER By ContabilidadId LIMIT 25";

    if (isset($_POST['consulta'])) {
    	$q = $conexion->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM contabilidad WHERE ContabilidadId LIKE '%$q%' OR ContabilidadAlumno LIKE '%$q%' OR ContabilidadNumeroRecibo LIKE '%$q%' OR ContabilidadConcepto LIKE '%$q%' OR ContabilidadFecha LIKE '$q' ";
    }

    $resultado = $conexion->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>ContabilidadId</td>
    					<td>ContabilidadAlumno</td>
    					<td>ContabilidadNumeroRecibo</td>
    					<td>ContabilidadMonto</td>
    					<td>ContabilidadConcepto</td>
                                        <td>ContabilidadDescripcion</td>
    					<td>ContabilidadFecha</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['ContabilidadId']."</td>
    					<td>".$fila['ContabilidadAlumno']."</td>
    					<td>".$fila['ContabilidadNumeroRecibo']."</td>
    					<td>".$fila['ContabilidadMonto']."</td>
    					<td>".$fila['ContabilidadConcepto']."</td>
                                        <td>".$fila['ContabilidadDescripcion']."</td>
                                        <td>".$fila['ContabilidadFecha']."</td>
                                       
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conexion->close();



?>