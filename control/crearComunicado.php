<?php

include '../conexion.php';

//reciviendo datos del formulario
$ComunicadoAula = $_POST['ComunicadoAula'];
$ComunicadoDescripcion = $_POST['ComunicadoDescripcion'];
$ComunicadoFecha = $_POST['ComunicadoFecha'];

if (!isset($ComunicadoAula) || !isset($ComunicadoDescripcion) || !isset($ComunicadoFecha)) {
    header("location:../page-crear-comunicado.php");
}

$insertar = "INSERT INTO comunicado(ComunicadoAula, ComunicadoDescripcion, ComunicadoFecha) VALUES ('$ComunicadoAula', '$ComunicadoDescripcion', '$ComunicadoFecha')";

if ($conexion->query($insertar) == TRUE) {
    echo '1';

    $cod;
    $rs = $conexion->query("SELECT MAX(ComunicadoId) AS id FROM comunicado");
    if ($row = $rs->fetch_assoc()) {
        $id = $row;
        $cod = $id['id'];
    } else {
        $cod = 0;
    }

    $buscaCom = "SELECT comunicado.*, aula.AulaId, aulaalumnos.*, alumno.* FROM comunicado
LEFT JOIN aula ON comunicado.ComunicadoAula=aula.AulaId
LEFT JOIN aulaalumnos ON aula.AulaId=aulaalumnos.AulaAlumnosId
LEFT JOIN alumno ON aulaalumnos.AulaAlumnosAlumno=alumno.AlumnoDni
WHERE comunicado.ComunicadoId='$cod'";
    $resul = $conexion->query($buscaCom);
    while ($fila = $resul->fetch_assoc()) {
        $idcom = $fila['ComunicadoId'];
        $mad = $fila['AlumnoTutorIdMadre'];
        $pad = $fila['AlumnoTutorIdPadre'];
        if ($mad != NULL) {
            $insertar2 = "INSERT INTO comunicadoestado(ComunicadoEstadoIdComunicado, ComunicadoEstadoPadre) VALUES ('$idcom', '$mad')";
            $conexion->query($insertar2);
        }
        if ($pad != NULL) {
            $insertar3 = "INSERT INTO comunicadoestado(ComunicadoEstadoIdComunicado, ComunicadoEstadoPadre) VALUES ('$idcom', '$pad')";
            $conexion->query($insertar3);
        }
    }
    //echo "Registro exitoso";
    //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
} else {
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



