<?php
//fetch.php
include 'conexion.php';
$columns = array('BoletaId', 'BoletaCodigo', 'BoletaFechaCanje', 'BoletaFechaPago', 'BoletaMonto','BoletaDescripcion');

$query = "SELECT * FROM boleta WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'BoletaFechaPago BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (BoletaId LIKE "%'.$_POST["search"]["value"].'%" 
  OR BoletaCodigo LIKE "%'.$_POST["search"]["value"].'%" 
  OR BoletaFechaCanje LIKE "%'.$_POST["search"]["value"].'%"
  OR BoletaMonto LIKE "%'.$_POST["search"]["value"].'%"
  OR BoletaDescripcion LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY BoletaId DESC ';
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
 $sub_array[] = $row["BoletaId"];
 $sub_array[] = $row["BoletaCodigo"];
 $sub_array[] = $row["BoletaFechaCanje"];
 $sub_array[] = $row["BoletaFechaPago"];
 $sub_array[] = $row["BoletaMonto"];
 $sub_array[] = $row["BoletaDescripcion"];
 $data[] = $sub_array;
}

function get_all_data($conexion)
{
 $query = "SELECT * FROM boleta";
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
