$(document).ready(function() {

    function cleanForm() {
        $("#address").val("");
        $("#neighborhood").val("");
        $("#city").val("");
        $("#uf").val("");
    }

    $("#cep").blur(function() {
        let cep = $(this).val().replace(/\D/g, '');

        if (cep !== "") {
            let verifyCep = /^[0-9]{8}$/;

            if(verifyCep.test(cep)) {
                $("#address").val("...");
                $("#neighborhood").val("...");
                $("#city").val("...");
                $("#uf").val("...");

                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {
                    if (!("erro" in data)) {
                        $("#address").val(data.logradouro);
                        $("#neighborhood").val(data.bairro);
                        $("#city").val(data.localidade);
                        $("#uf").val(data.uf);
                    }
                    else {
                        cleanForm();
                        alert("CEP não encontrado.");
                    }
                });
            }
        }
    });

});
