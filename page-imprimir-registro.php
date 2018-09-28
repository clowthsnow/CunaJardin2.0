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
        $this->Cell(0, 15, 'INSTITUCION EDUCATIVA CUNA JARDIN UNSA', 0, 0, 'R');
        $this->Ln(5);
        $this->Cell(0, 23, 'FICHA INTEGRAL DEL EDUCANDO', 0, 0, 'R');

// Salto de línea
        $this->Ln(30);
        $this->Cell(0,0,'','B',0,'C');
        $this->Ln(10);
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
$padre=$foo['AlumnoTutorIdPadre'];
$consultaPadre= "SELECT * FROM padre WHERE PadreDni='$padre'";
$resultado = $conexion->query($consultaUser) or die($conexion->error);
if ($row = $resultado->fetch_assoc()) {
//    print_r($row);
    $padres = $row;
//    print_r($foo);
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
//for ($i = 1; $i <= 40; $i++)
    

$pdf->Cell(0, 10, '1. Apellidos y Nombres: '.$foo['AlumnoApellidos'].' '.$foo['AlumnoNombre'], 0, 1);
$pdf->Image('fotoEstudiante/'.$foo['AlumnoFoto'], 160, 50, 40);
$pdf->Cell(0, 10, '2. Fecha de Nacimiento: '.$foo['AlumnoFechaNacimiento'], 0, 1);
$pdf->Ln(10);
$pdf->Cell(0, 10, '3. DATOS GENERALES DEL ESTUDANTE', 0, 1);
$pdf->Cell(0, 10, '         3.1. DNI: '.$foo['AlumnoDni'], 0, 1);
$pdf->Cell(0, 10, '         3.2. Sexo: '.$foo['AlumnoSexo'], 0, 1);
$pdf->Cell(0, 10, '         3.3. Edad: '.$foo['AlumnoEdad'], 0, 1);
$pdf->Cell(0, 10, '         3.4. Lugar de Nacimiento: '.$foo['AlumnoLugarNacimiento'], 0, 1);
$pdf->Cell(0, 10, '         3.5. Situacion de escolaridad Promovido Ingresante I.E.I: '.$foo['AlumnoSituacionPromovido'], 0, 1);
$pdf->Cell(0, 10, '4. DATOS DE ATENCION DEL ESTUDIANTE', 0, 1);
$pdf->Cell(0, 10, '         4.1. Embarazo de la madre ', 0, 1);
$pdf->Cell(0, 10, '              Contol Medico: '.$foo['AlumnoControlMedico'], 0, 1);
$pdf->Cell(0, 10, '         4.2. Parto: '.$foo['AlumnoParto'], 0, 1);
$pdf->Cell(0, 10, '         4.3. Alimentacion: Lactancia '.$foo['AlumnoLactanciaTipo'], 0, 1);
$pdf->Cell(0, 10, '         4.4. Vacunas: '.$foo['AlumnoVacunas'], 0, 1);
$pdf->Cell(0, 10, '         4.5. Temores Frecuentes: '.$foo['AlumnoTemores'].' '.$foo['AlumnoTemoresDetalles'], 0, 1);
$pdf->Cell(0, 10, '         4.6. Limitaciones Fisicas: '.$foo['AlumnoLimitacionFisica'].' '.$foo['AlumnoLimitacionFisicaDet'], 0, 1);
$pdf->Cell(0, 10, '         4.7. Dificultades Sensiorales: '.$foo['AlumnoDificultadControl'].' '.$foo['AlumnoDificultadControlDet'], 0, 1);
$pdf->Cell(0, 10, '         4.8. Alergias: '.$foo['AlumnoAlergias'].' '.$foo['AlumnoAlergiasDet'], 0, 1);

$pdf->Output();
?>
