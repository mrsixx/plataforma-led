$(document).ready(function () {
    $('#escola').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "ambiente/attEscola",
            data: dados,
            success: function (data) {
                var _html = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sucesso!</strong> A atualização foi bem sucedida :) </div>";
                $('#escola #msg').html(_html);
            },
            error: function (data) {
                var _html = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Erro!</strong> A atualização não foi bem sucedida :/ </div>";
                $('#escola #msg').html(_html);
            }
        });

        return false;
    });

    $('.modalform').submit(function () {
        var dados = jQuery(this).serialize();
        var controller = $(this).attr('data-controller');
        $.ajax({
            type: "POST",
            url: controller,
            data: dados,
            success: function (data) {
                var _html = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sucesso!</strong> A operação foi bem sucedida :) </div>";
                $('.modalform #msg').html(_html);
            },
            error: function (data) {
                var _html = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Erro!</strong> O operação não foi bem sucedida :/ </div>";
                $('.modalform #msg').html(_html);
            }
        });

        return false;
    });

    $('#dtInicio').change(function (e) {
        var inicio = $('#dtInicio').val();
        $('#dtFinal').attr('min',inicio);
    });

});