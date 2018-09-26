<?php

include 'conexion.php';
require('fpdf.php');
global $foo;
$usuario = $_GET['usuario'];



class PDF extends FPDF {

// Cabecera de página
    function Header() {

        $this->Image('img/LOGO_UNSA.gif', 10, 8, 20);
// Logo
// Arial bold 15
        $this->SetFont('Arial', 'B', 15);
// Movernos a la derecha
        $this->Cell(80);
// Título
        $this->Cell(0, 15, 'Reporte de Matricula', 'RB', 0, 'C');
// Salto de línea
        $this->Ln(30);
    }

// Pie de página
    function Footer() {
// Posición: a 1,5 cm del final
        $this->SetY(-15);
// Arial italic 8
        $this->SetFont('Arial', 'I', 8);
// Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}


$consultaUser = "SELECT * FROM alumno WHERE AlumnoDni='$usuario'";
$resultado = $conexion->query($consultaUser) or die($conexion->error);
if ($row = $resultado->fetch_assoc()) {
//    print_r($row);
    $foo = $row;
//    print_r($foo);
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
for ($i = 1; $i <= 40; $i++)
    $pdf->Cell(0, 10, $foo['AlumnoDni'], 0, 1);

$pdf->Output();
?>
