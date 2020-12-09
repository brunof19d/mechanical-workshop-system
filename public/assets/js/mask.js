$(document).ready(function () {
    $('#cep').mask('00000-000');
    $('#phone_one').mask('(00) 00000-0000');
    $('#phone_two').mask('(00) 00000-0000');
    $('#license').mask('ZZZ-0000', {
        translation: {
            'Z': {
                pattern: /[A-Za-z]/, optional: false
            }
        }
    });
    $('#engine').mask('0000');
    $('#yearManufacture').mask('0000');
    $('#yearModel').mask('0000');

    let options = {
        onKeyPress: function (cpf, ev, el, op) {
            let masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('#identification').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    };

    if ($('#identification').length > 11) {
        $('#identification').mask('00.000.000/0000-00', options)
    } else {
        $('#identification').mask('000.000.000-00#', options)
    }

});


