<?php

sleep(2);
include_once '../conexion2.php';

if (isset($_POST['crearMatricula']) && $_POST['crearMatricula'] == 'sim'):
    $nuevos_campos = array();
    $campos_post = $_POST['campos'];

    $respuestas = array();
    foreach ($campos_post as $indice => $valor) {
        $nuevos_campos[$valor['name']] = $valor['value'];
    }

    /* echo '<pre>';
      print_r($nuevos_campos);
     */

    if (strlen($nuevos_campos['idMatricula']) < 5 || strlen($nuevos_campos['idMatricula']) > 11) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'Codigo de matricula Invalido, Ingrese un codigo valido';
    } elseif (strlen($nuevos_campos['idPago']) < 5 || strlen($nuevos_campos['idPago']) > 11) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'Codigo de pago Invalido, Ingrese un codigo valido';
    
    } else {
        //$respuestas['erro'] = 'ahora';
        //$respuestas['msg'] = 'Ahora insertaremos sus datos';
        $insert_pago=$pdo->prepare("INSERT INTO matricula SET idMatricula=?,idPago=?,matriculaFecha=?,matriculaTipoAlumno=?,idGrado=?,matriculaEstReg=?");
        $array_sql= array(
            $nuevos_campos['idMatricula'],
            $nuevos_campos['idPago'],
            $nuevos_campos['matriculaFecha'],
            $nuevos_campos['matriculaTipoAlumno'],
            $nuevos_campos['idGrado'],
            'A'
        );
        if($insert_pago->execute($array_sql)){
            $respuestas['erro'] = 'ahora';
            $respuestas['msg']='Registro exitoso';
        }else{
            $respuestas['erro'] = 'sim';
            $respuestas['getErro'] = 'No fue posible insertar el pago';
        }
    }
    echo json_encode($respuestas);
    endif;