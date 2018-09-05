/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function obtener_registros(padre){
    $.ajax({
      url:'consulta.php',
      type:'POST',
      dataType:'html',
      data:{padre:padre},
    })
    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}
$(document).on('keyup','#dnim',function(){
    var valorBusqueda=$(this).val();
    if(valorBusqueda!=""){
        obtener_registros(valorBusqueda)
    }else{
        obtener_registros();
    }
});

