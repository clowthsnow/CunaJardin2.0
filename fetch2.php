<?php
//fetch.php
include 'conexion.php';
$columns = array('ContabilidadId', 'ContabilidadAlumno', 'ContabilidadNumeroRecibo', 'ContabilidadMonto', 'ContabilidadConcepto','ContabilidadDescripcion','ContabilidadFecha');

$query = "SELECT * FROM contabilidad WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'ContabilidadFecha BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (ContabilidadId LIKE "%'.$_POST["search"]["value"].'%" 
  OR ContabilidadAlumno LIKE "%'.$_POST["search"]["value"].'%" 
  OR ContabilidadNumeroRecibo LIKE "%'.$_POST["search"]["value"].'%"
  OR ContabilidadMonto LIKE "%'.$_POST["search"]["value"].'%"
  OR ContabilidadConcepto LIKE "%'.$_POST["search"]["value"].'%"
  OR ContabilidadDescripcion LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY ContabilidadId DESC ';
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
 $sub_array[] = $row["ContabilidadId"];
 $sub_array[] = $row["ContabilidadAlumno"];
 $sub_array[] = $row["ContabilidadNumeroRecibo"];
 $sub_array[] = $row["ContabilidadMonto"];
 $sub_array[] = $row["ContabilidadConcepto"];
 $sub_array[] = $row["ContabilidadDescripcion"];
 $sub_array[] = $row["ContabilidadFecha"];
 $data[] = $sub_array;
}

function get_all_data($conexion)
{
 $query = "SELECT * FROM contabilidad";
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
