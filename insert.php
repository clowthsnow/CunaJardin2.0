<?php
//insert.php
include 'conexion.php';
//$connect = mysqli_connect("localhost", "root", "", "testing");

$EgresosNroExpediente=$_POST['numOficio'];
$EgresosFecha=$_POST['fecha'];
$EgresosNroOficio=$_POST['item_num_expediente'];
$EgresosConcepto=$_POST['concepto'];
$EgresosFechaPago=$_POST['fechaPago'];
$EgresosMonto=$_POST['monto'];

echo "$EgresosConcepto";

$insertar="INSERT INTO egreso(EgresosNroExpediente,EgresosFecha, EgresosNroOficio,EgresosConcepto, EgresosFechaPago,EgresosMonto) VALUES ('$EgresosNroExpediente','$EgresosFecha','$EgresosNroOficio','$EgresosConcepto','$EgresosFechaPago','$EgresosMonto')";
if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo 'Registro no satisfactorio, ya ingresado anteriormente';
    //echo "Error, nombre de usuario existente";
}


if(isset($_POST["item_comprobante"]))
{
 $item_num_expediente=$_POST["item_num_expediente"];
 $item_comprobante = $_POST["item_comprobante"];
 $item_fecha = $_POST["item_fecha"];
 $item_razonSocial = $_POST["item_razonSocial"];
 $item_concepto = $_POST["item_concepto"];
 $item_importe = $_POST["item_importe"];
 $query = '';
 echo "$item_comprobante";
 for($count = 0; $count<count($item_comprobante); $count++)
 {
  $item_comprobante_clean = mysqli_real_escape_string($conexion, $item_comprobante[$count]);
  $item_fecha_clean = mysqli_real_escape_string($conexion, $item_fecha[$count]);
  $item_razonSocial_clean = mysqli_real_escape_string($conexion, $item_razonSocial[$count]);
  $item_concepto_clean = mysqli_real_escape_string($conexion, $item_concepto[$count]);
  $item_importe_clean = mysqli_real_escape_string($conexion, $item_importe[$count]);
  if($item_comprobante_clean != '' && $item_fecha_clean != '' && $item_razonSocial_clean != '' && $item_concepto_clean != '' && $item_importe_clean != '')
  {
   $query .= '
   INSERT INTO egresodetalle(Egresos,Comprobante, Fecha , RazonSocial, Concepto,Importe) 
   VALUES("'.$item_num_expediente.'", "'.$item_comprobante_clean.'", "'.$item_fecha_clean.'", "'.$item_razonSocial_clean.'", "'.$item_concepto_clean.'", "'.$item_importe_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($conexion, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>
