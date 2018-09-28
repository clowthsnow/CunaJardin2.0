<?php
//fetch.php
include 'conexion.php';
$columns = array('idMatricula', 'idPago', 'matriculaFecha', 'matriculaTipoAlumno', 'idGrado');

$query = "SELECT * FROM matricula WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'matriculaFecha BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (idMatricula LIKE "%'.$_POST["search"]["value"].'%" 
  OR idPago LIKE "%'.$_POST["search"]["value"].'%" 
  OR matriculaTipoAlumno LIKE "%'.$_POST["search"]["value"].'%" 
  OR idGrado LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY idMatricula DESC ';
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
 $sub_array[] = $row["idMatricula"];
 $sub_array[] = $row["idPago"];
 $sub_array[] = $row["matriculaFecha"];
 $sub_array[] = $row["matriculaTipoAlumno"];
 $sub_array[] = $row["idGrado"];
 $data[] = $sub_array;
}

function get_all_data($conexion)
{
 $query = "SELECT * FROM matricula";
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
