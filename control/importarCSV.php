<?php

include '../conexion.php';

if ($_FILES['csv']['size'] > 0) {

    $csv = $_FILES['csv']['tmp_name'];

    $handle = fopen($csv, 'r');

    while ($data = fgetcsv($handle, 1000, ";", "'")) {

        if ($data[0]) {
           
//            mysql_query("INSERT INTO boleta (BoletaCodigo, BoletaFechaCanje, BoletaFechaPago, BoletaMonto, BoletaDescripcion) VALUES('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "','" . $data[3] . "','" . $data[4] . "') ");
            $insertar="INSERT INTO boleta(BoletaCodigo, BoletaFechaCanje, BoletaFechaPago, BoletaMonto) VALUES ( '.$data[0].','.$data[1].','.$data[2].','.$data[3]. ')";
            $conexion->query($insertar);
        }
    }

    echo 'OK';
}
?>