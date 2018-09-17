$(function(){
    var formulario = $('form[name=formulario]');
    $('input[type=submit]').click(function (evento) {
        var array = formulario.serializeArray();
        if (array[0].value == '' || array[1].value == '' || array[2].value == '' || array[3].value == '' || array[4].value == '' || array[5].value == '') {
            $('.resp').html('<div class="errors"><p>Informe todos los detalle para finalizar con exito</p></div>');
        } else {
            $.ajax({
                method: 'POST',
                url: 'validacion/validarAdmin.php',
                data: {validarAdmin: 'sim', campos: array},
                dataType: 'json',
                beforeSend: function () {
                    $('.resp').html('<div class="erros"><p>Espere mientras procesamos sus datos</p></div>');
                },
                success: function (valor) {
                    //$('.resp').html(valor);
                    if (valor.erro == 'sim') {
                        $('.resp').html('<div class="erros"><p>' + valor.getErro + '</p></div>');
                    } else {
                        $('.resp').html('<div class="ok">' + valor.msg + '</div>');
                    }
                }
            });
        }
        evento.preventDefault();
    });
});
