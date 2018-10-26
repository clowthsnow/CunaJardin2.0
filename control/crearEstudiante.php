<?php

function clear($input) {
    $var = mysqli_escape_string($conexion, $input);
    //$var=$_POST["'"+$input+"'"];
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['registrarEstudiante'])) {
    include ('../conexion.php');
//reciviendo datos del formulario
    $nombreImagen = $_FILES['foto']['name']; //Nombre de la imagen
    $archivo = $_FILES['foto']['tmp_name']; //Archivo
    $ruta = "../fotoEstudiante";
    $ruta = $ruta . "/" . $nombreImagen;
    move_uploaded_file($archivo, $ruta);

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nacimientoF = $_POST['fechaNac'];
    $tipoAlumno = $_POST['tipoA'];
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

    /* var_dump($_FILES);

      echo "<br>";
      var_dump($_POST);

     */
    if (!isset($nombre) || !isset($dni) || !isset($sexo) || !isset($apellido) || !isset($edad) || !isset($parto)) {
        header("location:../page-datos-alumno.php");
    } else {
        if (strlen($nombre) > 20) {

            echo "<script>alert('el nombre es muy largo')</script>";
            //echo "<p class='error'>*El nombre es muy largo </p>";
        } else {
            if (strlen($apellido) > 20) {
                echo "<p class='error'>*El nombre es muy largo </p>";
            } else {
                if (strlen($dni) <> 8) {
                    echo "<p class='error'>*DNI Incorrecto </p>";
                } else {
                    if (!is_numeric($dni)) {
                        echo "<p class='error'>*El DNI debe ser numerico </p>";
                    } else {
                        if (strlen($edad) <> 1) {
                            echo "<p class='error'>*Edad incorrecta </p>";
                        } else {
                            if (!is_numeric($edad)) {
                                echo "<p class='error'>*La edad debe ser un numero </p>";
                            } else {
                                if (!is_numeric($peso)) {
                                    echo "<p class='error'>*El peso debe ser numerico </p>";
                                } else {
                                    if (!is_numeric($talla)) {
                                        echo "<p class='error'>*La talla debe ser numerica </p>";
                                    } else {
                                        if (strlen($dnim) <> 8) {
                                            echo "<p class='error'>*DNI Incorrecto </p>";
                                        } else {
                                            if (!is_numeric($dnim)) {
                                                echo "<p class='error'>*El DNI debe ser numerico </p>";
                                            } else {
                                                if (strlen($dnip) <> 8) {
                                                    echo "<p class='error'>*DNI Incorrecto </p>";
                                                } else {
                                                    if (!is_numeric($dnip)) {
                                                        echo "<p class='error'>*El DNI debe ser numerico </p>";
                                                    } else {
                                                        if (!is_numeric($personas)) {
                                                            echo "<p class='error'>*El campo numero de personas debe ser numerico</p>";
                                                        } else {
                                                            
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }


    $insertaralumno = "INSERT INTO alumno ( AlumnoDni,AlumnoNombre,AlumnoApellidos,AlumnoEdad,AlumnoTutorIdMadre,AlumnoTipoAlumno,AlumnoFoto,AlumnoFechaNacimiento,AlumnoTutorIdPadre,AlumnoSexo,AlumnoLugarNacimiento,AlumnoDomicilio,AlumnoSituacionPromovido,AlumnoControlMedico,AlumnoParto,AlumnoPeso,AlumnoTalla,AlumnoDifucaltades,AlumnoLactanciaTipo,AlumnoTemores,AlumnoTemoresDetalles,AlumnoLimitacionFisica,AlumnoLimitacionFisicaDet,AlumnoDificultadControl,AlumnoDificultadControlDet,AlumnoAlergias,AlumnoAlergiasDet,AlumnoVacunas,AlumnoCodigoUgel,AlumnoDeclaracionJurada,AlumnoSiagie) "
            . "VALUES ('$dni','$nombre','$apellido','$edad','$dnim','$tipoAlumno','$nombreImagen','$nacimientoF','$dnip','$sexo','$lugarNac','$direccion','$escolaridad','$controlmed','$parto','$peso','$talla','$dificultad','$lactancia','$temores','$temordet','$limitacionf','$limitacionfdet','$dificultadsen','$dificultadsendet','$alergias','$alergiasdet','$vacunas','00000','0','---')";
//
    if ($conexion->query($insertaralumno) == TRUE) {

        $insertarVivienda = "INSERT INTO vivienda (ViviendaAlumno,ViviendaTipo,ViviendaMaterial,ViviendaHabitaciones,ViviendaPersonas,ViviendaAguaTipo,ViviendaLuz,ViviendaSsHh)"
                . "VALUES ('$dni','$vtipo','$vmat','$habitaciones','$personas','$agua','$luz','$servicios')";
        if ($conexion->query($insertarVivienda) == TRUE) {
            echo '1';
            header("location:../page-declaracion-jurada.php?usuario=$dni&padre=$dnim");
        }
//    echo '2';
        //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
    } else {
        echo '0';
        //echo "Error, nombre de usuario existente";
        echo "<script type='text/javascript'>";
        echo "window.history.back(-1)";
        echo "</script>";
    }
    $conexion->close();
}
?>





