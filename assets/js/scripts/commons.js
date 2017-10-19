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
                        $.post('/panel/attNotificacao', {
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

    if (self != top) { top.location.replace(window.location.href) }

    // //função para inputs type date não renderizados arrumar isso dps
    //   $(function(){           
    //     if (!Modernizr.inputtypes.date) {
    //         $('input[type=date]').datepicker({
    //               dateFormat : 'yy-mm-dd'
    //             }
    //          );
    //     }
    // });

    //função para dar refresh na página ao fechar um modal     
    $('.att').click(function(){
        location.reload();
    });