<?php

include '../conexion.php';

//reciviendo datos del formulario
$nombreImagen = $_FILES['foto']['name']; //Nombre de la imagen
$archivo = $_FILES['foto']['tmp_name']; //Archivo
$ruta = "../fotoEstudiante";
$ruta = $ruta . "/" . $nombreImagen;
move_uploaded_file($archivo, $ruta);

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nacimientoF = $_POST['fechaNac'];
$tipoAlumno=$_POST['tipoA'];
$dni = $_POST['dni'];
$sexo = $_POST['sexo'];
$edad = $_POST['edad'];
$lugarNac = $_POST['nacimiento'];
$direccion = $_POST['direccion'];
$escolaridad = $_POST['escolaridad'];
$controlmed = $_POST['controlmed'];
$parto = $_POST['parto'];
$peso = $_POST['peso'];
$talla = $_POST['talla'];
$dificultad = $_POST['dificultad'];
$lactancia = $_POST['lactancia'];
$vacunas = $_POST['vacunas'];
$temores = $_POST['temores'];
$temordet = $_POST['temordetalle'];
$limitacionf = $_POST['limitacionfis'];
$limitacionfdet = $_POST['limitacionfisdetalle'];
$dificultadsen = $_POST['dificultadsens'];
$dificultadsendet = $_POST['dificultadsensdet'];
$alergias = $_POST['alergia'];
$alergiasdet = $_POST['alergiadet'];
$dnim = $_POST['dnim'];
$dnip = $_POST['dnip'];
$vtipo = $_POST['vivtipo'];
$vmat = $_POST['vivmaterial'];
$habitaciones = $_POST['vivhab'];
$personas = $_POST['vivpers'];
$agua = $_POST['vivagua'];
$luz = $_POST['vivluz'];
$servicios = $_POST['vivserv'];

if (!isset($nombre) || !isset($dni) || !isset($sexo) || !isset($apellido) || !isset($edad) || !isset($parto)) {
    header("location:../page-ver-estudiantes.php");
}





//$insertaralumno = "INSERT INTO alumno ( ,,,,,,,,,,,,,,,,,,,,,,,,,,,,AlumnoCodigoUgel,AlumnoDeclaracionJurada,AlumnoSiagie) "
//        . "VALUES ('$dni','','','','','','','','','','','','','','','','','','','','','','','','','','','','00000','0','---')";
////}
$actualiza="UPDATE alumno SET AlumnoNombre='$nombre', AlumnoApellidos='$apellido', AlumnoEdad='$edad', AlumnoTutorIdMadre='$dnim',AlumnoTipoAlumno='$tipoAlumno',"
        . " AlumnoFoto='$nombreImagen',AlumnoFechaNacimiento='$nacimientoF', AlumnoTutorIdPadre='$dnip',AlumnoSexo='$sexo',AlumnoLugarNacimiento='$lugarNac',"
        . " AlumnoDomicilio='$direccion',AlumnoSituacionPromovido='$escolaridad',AlumnoControlMedico='$controlmed',AlumnoParto='$parto',AlumnoPeso='$peso',AlumnoTalla='$talla',"
        . " AlumnoDifucaltades='$dificultad',AlumnoLactanciaTipo='$lactancia',AlumnoTemores='$temores',AlumnoTemoresDetalles='$temordet',AlumnoLimitacionFisica='$limitacionf',"
        . " AlumnoLimitacionFisicaDet='$limitacionfdet', AlumnoDificultadControl='$dificultadsen',AlumnoDificultadControlDet='$dificultadsendet',AlumnoAlergias='$alergias',"
        . " AlumnoAlergiasDet='$alergiasdet',AlumnoVacunas='$vacunas' WHERE AlumnoDni='$dni'";

if ($conexion->query($actualiza) == TRUE) {
// 
//    $insertarVivienda = "INSERT INTO  (,,,,,,,)"
//            . "VALUES ('','','','','','','','')";
    
    $actualizaVivienda="UPDATE vivienda SET ViviendaTipo='$vtipo', ViviendaMaterial='$vmat', ViviendaHabitaciones='$habitaciones', ViviendaPersonas='$personas',"
            . " ViviendaAguaTipo='$agua',ViviendaLuz='$luz',ViviendaSsHh='$servicios' WHERE ViviendaAlumno='$dni'";

    if ($conexion->query($actualizaVivienda) == TRUE) {
        echo '1';
        header("location:../page-ver-estudiantes.php");
    }
//    echo '2';
    //echo "Registro exitoso";
    //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
} else {
    echo '0';
    header("location:../page-configurar-estudiante.php?id=$dni");
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



