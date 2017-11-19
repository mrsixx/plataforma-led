$(document).ready(function() {

    //função para efetuar uma postagem com ajax
    $('#frmCriaEvento').submit(function() {
        var controller = "/calendario/cadEvento";
        // var dados = jQuery(this).serialize();
        var dados = $(this).serialize();
        $.ajax({
            type: "GET",
            url: controller,
            data: dados,
            cache: false,
            contentType: false,
            // data: new FormData($('#frmPost')[0]), //Seletor do formulário
            // processData: false, //Com FormData Não precisa processar os dados
            success: function (data) {
                alert('Evento criado com sucesso.');
            },
            error: function (data) {
                alert('Houve um erro ao criar este evento.');
            }
        });
        return false;
    });

    

    
});
