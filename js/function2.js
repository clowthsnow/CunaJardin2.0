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
       
           next($(this));
       
   });
   
   $('input[name=next2]').click(function(){
       
           next($(this));
       
   });
   $('input[name=next3]').click(function(){
       
           next($(this));
          
    });
   
   
   $('input[name=next4]').click(function(){
      
          
           next($(this));
       
   });
   
   
});

