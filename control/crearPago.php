<?php

sleep(2);
include_once '../conexion2.php';

if (isset($_POST['crearPago']) && $_POST['crearPago'] == 'sim'):
    $nuevos_campos = array();
    $campos_post = $_POST['campos'];

    $respuestas = array();
    foreach ($campos_post as $indice => $valor) {
        $nuevos_campos[$valor['name']] = $valor['value'];
    }

    /* echo '<pre>';
      print_r($nuevos_campos);
     */
    date_default_timezone_set("America/Mexico_City");
    $end = $nuevos_campos['pagoFecha'];
    $fecha_actual = strtotime(date("Y-m-d H:i:s"));
    $fecha_nacimiento = strtotime($end);
    if (strlen($nuevos_campos['idpago']) < 5 || strlen($nuevos_campos['idpago']) > 11) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'Codigo Invalido, Ingrese un codigo valido';
    } elseif (!is_numeric($nuevos_campos['AlumnoDni']) || strlen($nuevos_campos['AlumnoDni']) <> 8) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'El dni no es valido debe ser numerico y tener 8 digitos';
    } elseif ($fecha_nacimiento >= $fecha_actual) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'Fecha Incorrecta';
    } elseif (!is_numeric($nuevos_campos['pagoMonto'])) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'El Monto no es valido';
    } else {
        //$respuestas['erro'] = 'ahora';
        //$respuestas['msg'] = 'Ahora insertaremos sus datos';
        $insert_pago=$pdo->prepare("INSERT INTO pago SET idpago=?,AlumnoDni=?,pagoFecha=?,pagoMonto=?,pagoTipo=?,pagoEstReg=?");
        $array_sql= array(
            $nuevos_campos['idpago'],
            $nuevos_campos['AlumnoDni'],
            $nuevos_campos['pagoFecha'],
            $nuevos_campos['pagoMonto'],
            $nuevos_campos['pagoTipo'],
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