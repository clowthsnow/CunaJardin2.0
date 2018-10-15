<?php

sleep(2);
include_once '../conexion2.php';

if (isset($_POST['crearUsuario']) && $_POST['crearUsuario'] == 'sim'):
    $nuevos_campos = array();
    $campos_post = $_POST['campos'];

    $respuestas = array();
    foreach ($campos_post as $indice => $valor) {
        $nuevos_campos[$valor['name']] = $valor['value'];
    }

    /* echo '<pre>';
      print_r($nuevos_campos);
     */
    
    if (strlen($nuevos_campos['UsuarioNombre']) < 5 || strlen($nuevos_campos['UsuarioNombre']) > 25) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'Nombre Invalido, Ingrese un nombre valido';
    } else if (strlen($nuevos_campos['UsuarioApellidos']) < 5 || strlen($nuevos_campos['UsuarioApellidos']) > 25) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'El Apellido no es valido, Ingrese Apellido correctamente';
    } elseif (!is_numeric($nuevos_campos['UsuarioId']) || strlen($nuevos_campos['UsuarioId']) <> 8) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'Dni Incorrecto';
    } elseif (!is_numeric($nuevos_campos['UsuarioContra']) || strlen($nuevos_campos['UsuarioContra']) <> 8) {
        $respuestas['erro'] = 'sim';
        $respuestas['getErro'] = 'La contraseña es incorrecta';
    } else {
        //$respuestas['erro'] = 'ahora';
        //$respuestas['msg'] = 'Ahora insertaremos sus datos';
        $insert_pago=$pdo->prepare("INSERT INTO usuario SET UsuarioId=?,UsuarioContra=?,UsuarioNombre=?,UsuarioApellidos=?,UsuarioTipoUsuario=?,UsuarioEstReg=?");
        $array_sql= array(
            $nuevos_campos['UsuarioId'],
            $nuevos_campos['UsuarioContra'],
            $nuevos_campos['UsuarioNombre'],
            $nuevos_campos['UsuarioApellidos'],
            $nuevos_campos['UsuarioTipoUsuario'],
            'A'
        );
        if($insert_pago->execute($array_sql)){
            $respuestas['erro'] = 'ahora';
            $respuestas['msg']='Registro exitoso';
        }else{
            $respuestas['erro'] = 'sim';
            $respuestas['getErro'] = 'No fue posible insertar el Usuario';
        }
    }
    echo json_encode($respuestas);
    endif;