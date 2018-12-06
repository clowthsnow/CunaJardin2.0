<?php

include 'conexion.php';
require('fpdf.php');
global $foo;
$usuario = $_GET['usuario'];
date_default_timezone_set('America/Lima');
$fecha = new DateTime();

class PDF extends FPDF {

    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    function WriteHTML($html) {
        // Intérprete de HTML
        $html = str_replace("\n", ' ', $html);
        $a = preg_split('/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($a as $i => $e) {
            if ($i % 2 == 0) {
                // Text
                if ($this->HREF)
                    $this->PutLink($this->HREF, $e);
                else
                    $this->Write(5, $e);
            }
            else {
                // Etiqueta
                if ($e[0] == '/')
                    $this->CloseTag(strtoupper(substr($e, 1)));
                else {
                    // Extraer atributos
                    $a2 = explode(' ', $e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach ($a2 as $v) {
                        if (preg_match('/([^=]*)=["\']?([^"\']*)/', $v, $a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag, $attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr) {
        // Etiqueta de apertura
        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
            $this->SetStyle($tag, true);
        if ($tag == 'A')
            $this->HREF = $attr['HREF'];
        if ($tag == 'BR')
            $this->Ln(5);
    }

    function CloseTag($tag) {
        // Etiqueta de cierre
        if ($tag == 'B' || $tag == 'I' || $tag == 'U')
            $this->SetStyle($tag, false);
        if ($tag == 'A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable) {
        // Modificar estilo y escoger la fuente correspondiente
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach (array('B', 'I', 'U') as $s) {
            if ($this->$s > 0)
                $style .= $s;
        }
        $this->SetFont('', $style);
    }

    function PutLink($URL, $txt) {
        // Escribir un hiper-enlace
        $this->SetTextColor(0, 0, 255);
        $this->SetStyle('U', true);
        $this->Write(5, $txt, $URL);
        $this->SetStyle('U', false);
        $this->SetTextColor(0);
    }

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
        $this->Cell(0, 23, 'DECLARACION JURADA DEL PADRE DE FAMILIA', 0, 0, 'R');

// Salto de línea
        $this->Ln(30);
        $this->Cell(0, 0, '', 'B', 0, 'C');
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
$padre = $foo['AlumnoTutorIdPadre'];
$consultaPadre = "SELECT * FROM padre WHERE PadreDni='$padre'";
$resultado = $conexion->query($consultaPadre) or die($conexion->error);
if ($row = $resultado->fetch_assoc()) {
//    print_r($row);
    $padres = $row;
//    print_r($padres);
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
//for ($i = 1; $i <= 40; $i++)

$html = '<p>  Yo, ' . ucwords($padres['PadreNombre']) . ' ' . ucwords($padres['PadreApellidos']) . ' identificado (a) con DNI N° ' . $padres['PadreDni'] . ' suscribo el presente documento, de acuerdo a lo establecido en el articulo 3° de la ley n° 26459  de los Centros Educativos Privados, concordante con el articul 5° del Decreto Legislativo n° 882 Ley de la Promocion de la Inversion en la Educacion, con el articulo 5° inciso d) y el articulo 6° inciso e) del Decreto supremo n°011-998-ED y el articulo 3° del Decreto Supremo n° 005-2002-ED.
    <br><br><b>Declaro conocer la informacion relacionada con el Costo del Servicio Educativo</b>, que sustenta la Educacion en la Cuna Jardin UNSA y por lo tanto, sus fines y obejitvos establecidos en el Reglamentos Interno de la Institucion; por lo que expreso mi comportamiento de observar y respetar el Reglamento.
    <br>
    <br>
    <p style=\"margin-left: 0.5em\">1. <b>Asumo el Compromiso de cumplir con el pago de pensiones de enseñanza dentro de los primeros 3 ultimos dias correspondientes al mes</b>, por que reconozco que el Presupuesto de la Operacion e Inversion de la I.E.I. se financia con las pensiones de enseñanza que a su vez solventan el pago de remuneraciones del personal docente, administrativo y de mantenimiento.</p>
    <br><br>
    <p style=\"margin-left: 0.5em\">2. Declaro conocer que en caso de incumplimiento del pago de pensiones de la Institucion Educativa Cuna Jardin UNSA, a no ser por causa justificada , <b>no se le ratificara la matricula del estudiante para el año siguiente</b>. Asimismo no se entregara ninguna documentacion del niño (a) hasta el pago de las pensiones faltantes.</p>
    <br><br>
    <p style=\"margin-left: 2em\">3. Declaro conocer que el Informe del Progreso del Niño sera Entregrado a los Padres de Familia o Apoderados que se encuentren al dia con el pago de las pensiones de enseñanza.</p>
    <br><br>
    <p style="margin-left: 0.5em\">4. Los niños que ocasionen daños a los bienes, mobiliario u objetos, los padres deberan reponer o reparar o cambiar segun sea el daño.</p>
    
    <br><br><br>
    <b>En base a estos fundamentos</b> y como Padre de Familia acepto libremente las clausulas anteriores, las nomas internas de la institucion Educativa Inicial y en la ciudad de Arequipa a fecha ' . $fecha->format('Y-m-d') . '
    <br><br><br><br><br><br><br><br>
                ------------------------------------------<br><br>
                        Firma del Aporedaro
</p> ';


//$pdf->Cell(0, 10, '1. Apellidos y Nombres: '.$foo['AlumnoApellidos'].' '.$foo['AlumnoNombre'], 0, 1);
//$pdf->Image('fotoEstudiante/'.$foo['AlumnoFoto'], 160, 50, 40);
//$pdf->Cell(0, 10, '2. Fecha de Nacimiento: '.$foo['AlumnoFechaNacimiento'], 0, 1);
//$pdf->Ln(10);
//$pdf->Cell(0, 10, '3. DATOS GENERALES DEL ESTUDANTE', 0, 1);
//$pdf->Cell(0, 10, '         3.1. DNI: '.$foo['AlumnoDni'], 0, 1);
//$pdf->Cell(0, 10, '         3.2. Sexo: '.$foo['AlumnoSexo'], 0, 1);
//$pdf->Cell(0, 10, '         3.3. Edad: '.$foo['AlumnoEdad'], 0, 1);
//$pdf->Cell(0, 10, '         3.4. Lugar de Nacimiento: '.$foo['AlumnoLugarNacimiento'], 0, 1);
//$pdf->Cell(0, 10, '         3.5. Situacion de escolaridad Promovido Ingresante I.E.I: '.$foo['AlumnoSituacionPromovido'], 0, 1);
//$pdf->Cell(0, 10, '4. DATOS DE ATENCION DEL ESTUDIANTE', 0, 1);
//$pdf->Cell(0, 10, '         4.1. Embarazo de la madre ', 0, 1);
//$pdf->Cell(0, 10, '              Contol Medico: '.$foo['AlumnoControlMedico'], 0, 1);
//$pdf->Cell(0, 10, '         4.2. Parto: '.$foo['AlumnoParto'], 0, 1);
//$pdf->Cell(0, 10, '         4.3. Alimentacion: Lactancia '.$foo['AlumnoLactanciaTipo'], 0, 1);
//$pdf->Cell(0, 10, '         4.4. Vacunas: '.$foo['AlumnoVacunas'], 0, 1);
//$pdf->Cell(0, 10, '         4.5. Temores Frecuentes: '.$foo['AlumnoTemores'].' '.$foo['AlumnoTemoresDetalles'], 0, 1);
//$pdf->Cell(0, 10, '         4.6. Limitaciones Fisicas: '.$foo['AlumnoLimitacionFisica'].' '.$foo['AlumnoLimitacionFisicaDet'], 0, 1);
//$pdf->Cell(0, 10, '         4.7. Dificultades Sensiorales: '.$foo['AlumnoDificultadControl'].' '.$foo['AlumnoDificultadControlDet'], 0, 1);
//$pdf->Cell(0, 10, '         4.8. Alergias: '.$foo['AlumnoAlergias'].' '.$foo['AlumnoAlergiasDet'], 0, 1);
$html = utf8_decode($html);
$pdf->WriteHTML($html);
$pdf->Output();
?>
