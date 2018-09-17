/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function obtener_alumno(dni){
    $.ajax({
      url:'consultarAlumno.php',
      type:'POST',
      dataType:'html',
      data:{dni:dni},
    })
    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}
$(document).on('keyup','#AlumnoDni',function(){
    var valorBusqueda=$(this).val();
    if(valorBusqueda!=""){
        obtener_alumno(valorBusqueda)
    }else{
        obtener_alumno();
    }
});

