//script para fechar e abrir a sidebar em dispositivos móveis
            $(function() {
                $('#slide-submenu').on('click', function() {         
                    $(this).closest('.list-group').hide('slide', function() {
                        $('.mini-submenu').fadeIn();
                    });
                });

                $('.mini-submenu').on('click', function fechar() {
                    $(this).next('.list-group').toggle('slide');
                    $('.mini-submenu').hide();
                })
            });

            //upload de imagem da postagem
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imgInp").change(function() {
                readURL(this);
            });
            //fim upload imagem

            //opinião FAZER PESQUISA COM O AJAX DEPOIS 
            $(function() {
                $('.boa').click(function() {
                    $('#opiniao').removeClass();
                    $('#opiniao').addClass('op1');
                });
                $('.nada').click(function() {
                    $('#opiniao').removeClass();
                    $('#opiniao').addClass('op2');
                });
            });

            //ajax para marcar notificação como lida
            $(document).ready(function() {
                $('div').on("click", '#container-notificacao a', function(e) {
                    e.preventDefault();
                    var href = $(this).attr('href');
                    var div = $(this).children('div')
                    var codnotificacao = $(div).attr('data-cod');
                    var status = $(div).attr('data-status');
                    var coduser = $('#modalNotificacoes').attr('data-user');
                    if (status != 1) {
                        $.post('panel/attNotificacao', {
                            user: coduser,
                            notificacao: codnotificacao
                        }, function retorno(result) {
                            if (result == true) {
                                $(div).addClass('bg-lida');
                            }
                        });
                    }
                    if (href != '#') {
                        location.href = href;
                    } else {
                        //achar um jeito de marcar como lido e tirar uma notificacão das badges
                        $('#modalNotificacoes').modal('hide');
                    }
                });
            });


            //script para exibir tooltips
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        })
    });