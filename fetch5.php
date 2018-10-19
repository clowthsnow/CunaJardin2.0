<?php
//fetch.php
include 'conexion.php';
$columns = array('EgresosId', 'EgresosTipoRecibo', 'EgresosNumRecibo', 'EgresosFechaEmitida', 'EgresosCantidad');

$query = "SELECT * FROM egresos WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'EgresosFechaEmitida BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (EgresosId LIKE "%'.$_POST["search"]["value"].'%" 
  OR EgresosTipoRecibo LIKE "%'.$_POST["search"]["value"].'%" 
  OR EgresosNumRecibo LIKE "%'.$_POST["search"]["value"].'%"
  OR EgresosCantidad LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY EgresosId DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conexion, $query));

$result = mysqli_query($conexion, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 
 $sub_array[] = $row["EgresosId"];
 $sub_array[] = $row["EgresosTipoRecibo"];
 $sub_array[] = $row["EgresosNumRecibo"];
 $sub_array[] = $row["EgresosFechaEmitida"];
 $data[] = $sub_array;
}

function get_all_data($conexion)
{
 $query = "SELECT * FROM egresos";
 $result = mysqli_query($conexion, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conexion),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
