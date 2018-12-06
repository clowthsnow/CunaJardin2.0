<?php
include '../conexion.php';

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($conexion,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('ContabilidadAlumno', 'ContabilidadNumeroRecibo');//Columnas de busqueda
		 $sTable = "contabilidad";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './page-modificar-boleta.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($conexion, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Numero de Recibo</th>
					<th>Concepto</th>
					<th>Estudiante</th>
                                        <th>Monto</th>
<!--					<th><span class="pull-right">Cant.</span></th>
					<th><span class="pull-right">Precio</span></th>-->
					<th style="width: 36px;"></th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_producto=$row['ContabilidadId'];
					$codigo_producto=$row['ContabilidadNumeroRecibo'];
					$nombre_producto=$row['ContabilidadConcepto'];
					$id_marca_producto=$row['ContabilidadAlumno'];
					$codigo_producto=$row["ContabilidadNumeroRecibo"];
					$sql_marca=mysqli_query($conexion, "select AlumnoNombre from alumno where AlumnoDni='$id_marca_producto'");
					$rw_marca=mysqli_fetch_array($sql_marca);
					$nombre_marca=$rw_marca['AlumnoNombre'];
					$precio_venta=$row["ContabilidadMonto"];
                                        $float = (double)$precio_venta;
					$precio_venta=number_format($float,2);
					?>
					<tr>
						<td><?php echo $codigo_producto; ?></td>
						<td><?php echo $nombre_producto; ?></td>
						<td ><?php echo $nombre_marca; ?></td>
                                                <td ><?php echo $precio_venta; ?></td>
<!--						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
						</div></td>
						<td class='col-xs-2'><div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="precio_venta_<?php echo $id_producto; ?>"  value="<?php echo $precio_venta;?>" >
						</div></td>-->
						<!--<td ><span class="pull-right"><a href="#" onclick="agregar('<?php echo $id_producto ?>')"><i class="glyphicon glyphicon-plus"></i></a></span></td>-->
                                                <td><a href="page-modificar-boleta.php?voucher=<?php echo $id_producto ?>"><span class="task-cat cyan">Agregar</span></a></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </ta                                                                                                                                                                                  ble>
			</div>
			<?php
		}
	}
?>