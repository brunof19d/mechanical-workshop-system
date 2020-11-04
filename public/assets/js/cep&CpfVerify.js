$("#licensePlate").mask("AAA-0000");
$('#kmMotorcycle').mask("##.#00", {reverse: true, maxlength: false});

$(document).ready(function(){
    $('.money').mask('000.000.000.000.000,00', {reverse: true});

    $(".money").change(function(){
        $("#value").html($(this).val().replace(/\D/g,''))
    })

});

$("#cep").mask("##.###-###");

$("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        $("#endereco").val("...");
        $("#bairro").val("...");
        $("#cidade").val("...");
        $("#uf").val("...");
        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (data) {
            if (!("erro" in data)) {
                $("#endereco").val(data.logradouro);
                $("#bairro").val(data.bairro);
                $("#uf").val(data.uf);
                $("#cidade").val(data.localidade);
                $("#numero").focus();
            } else {
                var form = document.commentForm;
                form.onsubmit = function(){
                    var cep = form.cep;
                        alert('CEP Indisponível');
                        cep.value = ''; // limpa o campo
                        return false; // cancela o submit
                }
            }
        });
    }
});

$("#cpf_cnpj").keydown(function () {
    try {
        $("#cpf_cnpj").unmask();
    } catch (e) {
    }

    var tamanho = $("#cpf_cnpj").val().length;

    if (tamanho < 11) {
        $("#cpf_cnpj").mask("999.999.999-99");
    } else if (tamanho >= 11) {
        $("#cpf_cnpj").mask("99.999.999/9999-99");
    }

    var elem = this;
    setTimeout(function () {
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);

    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});