/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    var actual_fs,next_fs,prev_fs;
    var formulario = $('form[name=formulario]');
    //$('.next').click(function(){
    function next(elem){
        actual_fs=$(elem).parent();
        next_fs=$(elem).parent().next();
        
        $('#progress li').eq($('fieldset').index(next_fs)).addClass('activo');
        actual_fs.hide(800);
        next_fs.show(800);
    }
    $('.prev').click(function(){
        actual_fs=$(this).parent();
        prev_fs=$(this).parent().prev();
       
        $('#progress li').eq($('fieldset').index(actual_fs)).removeClass('activo');
        actual_fs.hide(800);
        prev_fs.show(800);
       
    });
    /*$('#formulario input[type=submit]').click(function(){
        return false;
    });
    */
   $('input[name=next1]').click(function(){
       var array=formulario.serializeArray();
       if(array[0].value==''||array[1].value==''||array[2].value==''||array[3].value==''){
           $('.resp').html('<div class="errors"><p>Compete los datos de la primera etapa para poder ir a la 2da etapa</p></div>');
       }else{
           $('.resp').html('');
           next($(this));
       }
   });
   
   $('input[name=next2]').click(function(){
       var array=formulario.serializeArray();
       if(array[4].value==''||array[5].value==''||array[6].value==''||array[7].value==''||array[8].value==''||array[9].value==''){
           $('.resp').html('<div class="errors"><p>Informe todos sus datos para poder continuar</p></div>');
       }else{
           $('.resp').html('');
           next($(this));
       }
   });
   $('input[name=next3]').click(function(){
       var array = formulario.serializeArray();
       if(array[10].value == '' || array[11].value == '' || array[12].value == ''|| array[13].value == ''|| array[14].value == ''|| array[15].value == ''|| array[16].value == ''|| array[17].value == ''){
           $('.resp').html('<div class="erros"><p>Informe-nos seus perfis sociais, para podermos cadastra-lo!</p></div>');
       }else{
           $('.resp').html('');
           next($(this));
	}
    });
   
   
   $('input[name=next4]').click(function(){
       var array=formulario.serializeArray();
       if(array[25].value==''||array[26].value==''){
           $('.resp').html('<div class="errors"><p>Compete los datos de la primera etapa para poder ir a la 2da etapa</p></div>');
       }else{
           $('.resp').html('');
           next($(this));
       }
   });
   
   $('input[type=submit]').click(function(evento){
       var array=formulario.serializeArray();
       if(array[27].value==''||array[28].value==''||array[29].value==''||array[30].value==''||array[31].value==''||array[32].value==''||array[33].value==''){
           $('.resp').html('<div class="errors"><p>Informe todos los detalle para finalizar con exito</p></div>');
       }else{
           $.ajax({
              method:'post',
              url:'validarAlumno.php',
              data:{validarAlumno:'dni',campos:array},
              dataType:'json',
              beforeSend:function(){
                  $('.resp').html('<div class="errors"><p>Espere mientras procesamos sus datos</p>');
              },
              success:function(valor){
                  $('.resp').html(valor);
              }
           });
       }
       evento.preventDefault();
    });
});

