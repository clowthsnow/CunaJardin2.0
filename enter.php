
<?php

include 'conexion.php';
$cod = $_GET['_num1'];
if (!empty($cod)) {
    comprobar($cod);
}

function comprobar($cod) {
    $conexion = mysqli_connect('localhost', 'root', '', 'cunajardin');
    
    $consultaUser = "SELECT aulaalumnos.*, aula.*, alumno.* FROM aulaalumnos 
        LEFT JOIN aula ON aulaalumnos.AulaAlumnosId=aula.AulaId 
        LEFT JOIN alumno ON aulaalumnos.AulaAlumnosAlumno=alumno.AlumnoDni WHERE AlumnoDni='".$cod."'";
    #$buscar = "SELECT * FROM alumno WHERE AlumnoDni='" . $cod . "'";
    
    #$buscar2 = "SELECT * FROM aulaalumnos WHERE AulaAlumnosAlumno='" . $cod . "'";
    
    #$result = mysqli_query($conexion, $buscar);
    #$result2 = mysqli_query($conexion, $buscar2);
    $result = mysqli_query($conexion, $consultaUser);
    $alumnos = array();
    $contar = mysqli_num_rows($result);
    #$contar2 = mysqli_num_rows($result2);
    if ($contar == 0) {
        $alumnos[] = array('codigo' => 'y', 'nombre' => 'y', 'aula' => 'y','grado' => 'y','resultado' => 0);
    } else {
        while ($row = mysqli_fetch_row($result)) {
            $aula=$row[0];
            $codigo = $row[1];
            $grado = $row[4];
            $nombre = $row[9];
            $apellido = $row[10];

            $alumnos[] = array('codigo' => $codigo, 'nombre' => $nombre,'apellido' => $apellido,'aula' => $aula,'grado' => $grado, 'resultado' => 1);
        }
    }
    $json_string = json_encode($alumnos);
    echo $json_string;
}
