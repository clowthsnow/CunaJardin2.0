<?php
    sleep(2);   
    include_once '../conexion.php';

    if(isset($_POST['validarAdmin']) && $_POST['validarAdmin']=='sim'):
        $nuevos_campos=array();
        $campos_post= $_POST['campos'];
        
        $respuestas=array();
        foreach ($campos_post as $indice=>$valor){
            $nuevos_campos[$valor['name']]=$valor['value'];
        }
        
        /*echo '<pre>';
        print_r($nuevos_campos);
         */
        if(!strstr($nuevos_campos['emailAdmin'], '@')){
            $respuestas['erro']='sim';
            $respuestas['getErro']='Correo invalido, Ingrese un e-mail valido';
            
        }elseif(!is_numeric($nuevos_campos['dniAdmin'])&& strlen($nuevos_campos['dniAdmin']) <> 8){
            $respuestas['erro']='sim';
            $respuestas['getErro']='El dni no es valido debe ser numerico y tener 8 digitos';
            
        }elseif(strlen($nuevos_campos['nombreAdmin']) < 4||strlen($nuevos_campos['nombreAdmin'])>20){
            $respuestas['erro']='sim';
            $respuestas['getErro']='El nombre es muy corto o muy largo';
            
        }elseif(strlen($nuevos_campos['apellidoAdmin']) < 4||strlen($nuevos_campos['apellidoAdmin'])>20){
            $respuestas['erro']='sim';
            $respuestas['getErro']='El apellido no es valido';
            
        }elseif(strlen($nuevos_campos['telefonoAdmin']) <>12&&!is_numeric($nuevos_campos['telefonoAdmin'])){
            $respuestas['erro']='sim';
            $respuestas['getErro']='Numero telefonico invalido (054)123456789';
            
        }else{
            $respuestas['erro']='ahora';
            $respuestas['msg']='Ahora insertaremos sus datos';
        }
        echo json_encode($respuestas);
    endif;