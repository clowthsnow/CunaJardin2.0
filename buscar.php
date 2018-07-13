<?php
    include 'conexion.php';
    $salida = "";

    $query = "SELECT * FROM contabilidad ORDER By ContabilidadId";

    if (isset($_POST['consulta'])) {
    	$q = $conexion->real_escape_string($_POST['consulta']);
    	$query = "SELECT ContabilidadId, ContabilidadAlumno,ContabilidadNumeroRecibo,ContabilidadMonto,ContabilidadConcepto,ContabilidadDescripcion,ContabilidadFecha FROM contabilidad 
            WHERE ContabilidadAlumno LIKE '%".$q."%' OR ContabilidadNumeroRecibo LIKE '%".$q."%' OR ContabilidadConcepto LIKE '%".$q."%'";
    }
        
    $resultado = $conexion->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>ID</td>
    					<td>Alumno</td>
    					<td>Num Recibo</td>
    					<td>Monto</td>
                                        <td>Concepto</td>
                                        <td>Descripcion</td>
    					<td>Fecha</td>
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