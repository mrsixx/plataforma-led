$(document).ready(function () {
$('.excluir').click(function(){
        var confirma = confirm('Tem certeza que deseja excluir este item?');
        if(confirma){
            // var codigo = $(this).attr('id');
            var controller = $(this).attr('data-controller');
            // var tabela = $(this).attr('data-table')
            $.ajax({
                type: "GET",
                url: controller+'?cod='+codigo+'&tb='+tabela,
                beforeSend: function(){ 
                    $('#loader').addClass('loader');
                    $('body').addClass('loader-body');
                },
                success: function(retorno){
                    location.reload();
                },
                complete: function(){
                    $('#loader').removeClass('loader');
                    $('body').removeClass('loader-body');
                }
            });
        }else{
            return false;
        }
    });  

});
