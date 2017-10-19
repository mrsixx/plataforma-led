$(document).ready(function() {

    //função para efetuar uma postagem com ajax
    $('#frmPost').submit(function() {
        var controller = "/posts/postCad";
        // var dados = jQuery(this).serialize();
        var dados = new FormData($('#frmPost')[0]);
        $.ajax({
            type: "POST",
            url: controller,
            data: dados,
            cache: false,
            contentType: false,
            // data: new FormData($('#frmPost')[0]), //Seletor do formulário
            processData: false, //Com FormData Não precisa processar os dados
            success: function (data) {
                var _html = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sucesso!</strong> Sua postagem foi feita com sucesso :D </div>";
                $('#postCad #msg').html(_html);
                // $('#postCad')[0].reset();
                $('.close').click();
            },
            error: function (data) {
                var _html = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Erro!</strong> Houve um erro ao enviar sua postagem :/ </div>";
                $('#postCad #msg').html(_html);
            }
        });
        return false;
    });

    //pegando comentários para aquela postagem do banco e exibindo com JSON

    
    $('.btnComentario').click(function() {
        var codigo = $(this).attr('data-post');
        $('#codPostagem').attr('value', codigo);
        $('#comentario').modal('show');
        $('#containerComentario').html('');
        $.ajax({
            type: "GET",
            url: '/posts/retornaComentario?codPost='+codigo,
            contentType: "application/json; charset=utf-8",
            cache: false,
            success: function(json){
                //parei aqui, preciso fazer um each para exibir todos os comentarios e verificar se o código do usuario é o mesmo do usuario que comentou para habilitar as opções para ele
                if(json.length == 0){
                    $('#containerComentario').attr('data-well','s');
                     $('#containerComentario').html('<div class="well"><center>Não há comentários nesse post...<br/>Seja o primeiro :D</center></div>');
                }else{
                    //aqui vou exibir as li's com os comentários :D
                    for (var i = json.length - 1; i >= 0; i--) {
                        var comentario = '<li class="list-group-item">';
                        comentario += '<div class="row">';
                        comentario += '<div class="col-xs-2 col-md-2">';
                        comentario += '<img src="'+json[i].Foto+'" class="img img-comentario img-responsive" alt="" /></div>';
                        comentario += '<div class="col-xs-10 col-md-10">';
                        comentario += '<div class="comment-text">';
                        comentario += json[i].Comentario;
                        comentario += '</div>';
                        comentario += '<div>';
                        comentario += '<div class="mic-info">';
                        comentario += '<a href="/perfil/'+json[i].Token+'"><b>'+json[i].Nome+"&nbsp;"+json[i].Sobrenome+'</b></a> <i><span class="glyphicon glyphicon-time"></span> '+json[i].DataHora+'</i>';

                        //se for um comentário daquele usuário eu renderizo os botões para editar, salvar e excluir
                        if(json[i].CodUsuario == $('#codUsuario').val()){
                            comentario += '<div class="action">';
                            // comentario += '<button type="button" class="btn btn-primary btn-xs edtComentario" data-id="'+json[i].CodComentario+'" title="Editar">';
                            // comentario += '<span class="glyphicon glyphicon-pencil"></span>';
                            // comentario += '</button>';
                            // comentario += '<button type="button" class="btn btn-success btn-xs saveComentario" data-id="'+json[i].CodComentario+'" title="Salvar">';
                            // comentario += '<span class="glyphicon glyphicon-ok"></span>';
                            // comentario += '</button>';
                            comentario += '<a type="button" href="#" class="excluir btn btn-danger btn-xs" data-controller="/posts/deletaComentario" data-cod="'+json[i].CodComentario+'" title="Excluir">';
                            comentario += '<span class="glyphicon glyphicon-trash"></span>';
                            comentario += '</a>';
                            comentario += '</div>';
                        }
                        comentario += '</div>';
                        comentario += '</div>';
                        comentario += '</li>';

                        $('#containerComentario').append(comentario);
                            var div = $('#comentarioScroll');
                            div.prop("scrollTop", div.prop("scrollHeight"));
                    }
                }
            },
            error: function(data){
                $('#comentario').modal('hide');
                alert('erro');
            }            
        });

        


        return false;
    });



    // $('button .apagaComentario').click(function(){
    //     alert('click');
    // });

    // $('.edtComentario').click(function(){
    //     alert('edit');
    // });

    $('#enviarComentario').submit(function(){
        var msg = $('#cmt').val();
        msg = msg.replace(/\r\n|\r|\n/g, "<br/>");

        var foto = $('#foto').val();
        var nome = $('#nome').val();
        var sobrenome = $('#sobrenome').val();
        var dados  = $(this).serialize();
        $.ajax({
          url:'/posts/converteEmoticon?txtMsg='+msg,
          type:"GET",
          // data: {txtMsg: msg},
          contentType:"application/json; charset=utf-8",
          cache: false,
          success: function (json){
                for (var i = json.length - 1; i >= 0; i--) {
                    msg = json[i].msg;
                }
          },erro: function(erro){
                
          }
        });

        $.ajax({
            type: "POST",
            url: '/posts/enviaComentario',
            data: dados,
            success: function (data) {
                var post = $('#codPostagem').val();
                
                 $('#containerComentario').html('');
                $.ajax({
            type: "GET",
            url: '/posts/retornaComentario?codPost='+post,
            contentType: "application/json; charset=utf-8",
            cache: false,
            success: function(json){
                //parei aqui, preciso fazer um each para exibir todos os comentarios e verificar se o código do usuario é o mesmo do usuario que comentou para habilitar as opções para ele
                if(json.length == 0){
                    $('#containerComentario').attr('data-well','s');
                     $('#containerComentario').html('<div class="well"><center>Não há comentários nesse post...<br/>Seja o primeiro :D</center></div>');
                }else{
                    //aqui vou exibir as li's com os comentários :D
                    for (var i = json.length - 1; i >= 0; i--) {
                        var comentario = '<li class="list-group-item">';
                        comentario += '<div class="row">';
                        comentario += '<div class="col-xs-2 col-md-2">';
                        comentario += '<img src="'+json[i].Foto+'" class="img img-comentario img-responsive" alt="" /></div>';
                        comentario += '<div class="col-xs-10 col-md-10">';
                        comentario += '<div class="comment-text">';
                        comentario += json[i].Comentario;
                        comentario += '</div>';
                        comentario += '<div>';
                        comentario += '<div class="mic-info">';
                        comentario += '<a href="/perfil/'+json[i].Token+'"><b>'+json[i].Nome+"&nbsp;"+json[i].Sobrenome+'</b></a> <i><span class="glyphicon glyphicon-time"></span> '+json[i].DataHora+'</i>';

                        //se for um comentário daquele usuário eu renderizo os botões para editar, salvar e excluir
                        if(json[i].CodUsuario == $('#codUsuario').val()){
                            comentario += '<div class="action">';
                            // comentario += '<button type="button" class="btn btn-primary btn-xs edtComentario" data-id="'+json[i].CodComentario+'" title="Editar">';
                            // comentario += '<span class="glyphicon glyphicon-pencil"></span>';
                            // comentario += '</button>';
                            // comentario += '<button type="button" class="btn btn-success btn-xs saveComentario" data-id="'+json[i].CodComentario+'" title="Salvar">';
                            // comentario += '<span class="glyphicon glyphicon-ok"></span>';
                            // comentario += '</button>';
                            comentario += '<a type="button" href="#" class="excluir btn btn-danger btn-xs" data-controller="/posts/deletaComentario" data-cod="'+json[i].CodComentario+'" title="Excluir">';
                            comentario += '<span class="glyphicon glyphicon-trash"></span>';
                            comentario += '</a>';
                            comentario += '</div>';
                        }
                        comentario += '</div>';
                        comentario += '</div>';
                        comentario += '</li>';

                        $('#containerComentario').append(comentario);
                            var div = $('#comentarioScroll');
                            div.prop("scrollTop", div.prop("scrollHeight"));
                    }
                }
            },
            error: function(data){
                $('#comentario').modal('hide');
                alert('erro');
            }            
        });
                // var comentario = '<li class="list-group-item">';
                // comentario += '<div class="row">';
                // comentario += '<div class="col-xs-2 col-md-2">';
                // comentario += '<img src="'+foto+'" class="img img-comentario img-responsive" alt="" /></div>';
                // comentario += '<div class="col-xs-10 col-md-10">';
                // comentario += '<div class="comment-text">';
                // comentario += msg;
                // // comentario += '<img src="http://localhost/assets/smileys/heart.png" alt="heart" style="width: 20; height: 20; border: 0;">';
                // comentario += '</div>';
                // comentario += '<div>';
                // comentario += '<div class="mic-info">';
                // comentario += '<a href="#"><b>'+nome+"&nbsp;"+sobrenome+'</b></a> <i><span class="glyphicon glyphicon-time"></span> Agora mesmo</i>';
                // comentario += '</div>';
                // comentario += '</div>';
                // comentario += '</li>';


                // var well = $('#containerComentario').attr('data-well');
                // if(well == 's'){
                //     var div = $('.well');
                //     $('#containerComentario').empty(div);
                // }


                // $('#containerComentario').append(comentario);



                $('#cmt').val('');
                var div = $('#comentarioScroll');
                            div.prop("scrollTop", div.prop("scrollHeight"));
                
            }
        });

        return false;
    });
                                

    $('#cmt').keypress(function(e){
        if((e.keyCode || e.wich) == 13 && !e.shiftKey){
             $('#enviarComentario').submit();
        }
    });

    //função para dar refresh na página ao fechar um modal     
    $('.att').click(function(){
        location.reload();
    });


    $('.mandaOp').click(function(){
        var opiniao = $(this).attr('data-tipo');
        var post = $(this).attr('data-post');
        var btn = $('#opiniao'+post);
        $.ajax({
           type: "GET",
            url: '/posts/opina?op='+opiniao+'&post='+post,
            success: function(data){
                if(opiniao == 1){
                    btn.removeClass();
                    btn.addClass('op1');
                }else{
                    btn.removeClass();
                    btn.addClass('op2');
                }
            },
            error:function(erro){
                btn.removeClass();
                btn.addClass('fa fa-lightbulb-o fa-2x');
            }
        });
    });

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
            $("#userfile").change(function() {
                readURL(this);
                 $("#txtPost").removeAttr("required");
            });
            //fim upload imagem


            // $('#frmOp').submit(function(e){
            //     $(document).on('submit','.frmOp', function(e){
            //     e.preventDefault();
            //     //puxo do banco se tem alguma curtida daquele usuário naquele post
            //     //se tiver mostro qual, se não n mostro nd 
            //     $.ajax({
            //        type: "GET",
            //         url: '/posts/retornaOp?'+$(this).serialize(),
            //         success: function(data){
            //             var c = $('#codPost').val();
            //             // alert(data.CodTipoOpiniao);
            //             if(data != null){
            //                 var cod = data.CodTipoOpiniao;
            //                 if(cod == 1){
            //                     $('div#opiniao'+c).removeClass();
            //                     $('div#opiniao'+c).addClass('op1');
            //                 }else if(cod == 2){
            //                     $('div#opiniao'+c).removeClass();
            //                     $('div#opiniao'+c).addClass('op2');
            //                 }
            //             }
            //             else{
            //                 $('div#opiniao'+c).removeClass();
            //                 $('div#opiniao'+c).addClass('fa fa-lightbulb-o fa-2x');
            //             }
            //         },
            //         error:function(erro){
            //             alert(erro);
            //         }
            //     });
            // });

    
});
//parei aqui, terminar o curtir v

$(document).ready(function(){
    $('.frmOp').each(function(){
        $(this).submit(function(e){
            e.preventDefault();
                //puxo do banco se tem alguma curtida daquele usuário naquele post
                //se tiver mostro qual, se não n mostro nd 
                $.ajax({
                   type: "GET",
                    url: '/posts/retornaOp?'+$(this).serialize(),
                    success: function(data){
                        var c = $('#codPost').val();
                        // alert(data.CodTipoOpiniao);
                        if(data != null){
                            var cod = data.CodTipoOpiniao;
                            if(cod == 1){
                                $('div#opiniao'+c).removeClass();
                                $('div#opiniao'+c).addClass('op1');
                            }else if(cod == 2){
                                $('div#opiniao'+c).removeClass();
                                $('div#opiniao'+c).addClass('op2');
                            }
                        }
                        else{
                            $('div#opiniao'+c).removeClass();
                            $('div#opiniao'+c).addClass('fa fa-lightbulb-o fa-2x');
                        }
                    },
                    error:function(erro){
                        alert(erro);
                    }
                });
        });
    });
});

 // $('.excluir').click(function(){
    $(document).on('click','.excluir', function(e){
        e.preventDefault();
        var confirma = confirm('Tem certeza que deseja excluir este item?');
        if(confirma){
            var codigo = $(this).attr('data-cod');
            var controller = $(this).attr('data-controller');
            $.ajax({
                type: "GET",
                url: controller+'?codigo='+codigo,
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



    $(document).on('click','.report',function(e){
        e.preventDefault();
        var post = $(this).attr('data-post');
        $('#codPost').val(post);
        $('#txtLink').val('/post/'+post);
        $('#report').modal('show');
    });

    $(document).on('submit','#report',function(e){
        $('#report').modal('hide');
        e.preventDefault();
        $.ajax({
                   type: "POST",
                   data: $(this).serialize(),
                    url: '/posts/reportaPost',
                    success: function(data){
                        $('#sucesso').modal('show');
                    },
                    error:function(erro){
                        $('#erro').modal('hide');
                    }
                });
    });

function verificaOp(post,usuario){
                $.ajax({
                   type: "GET",
                    url: '/posts/retornaOp?codUser='+usuario+'&codPost='+post, //$(this).serialize(),
                    success: function(data){
                        // var c = $('#codPost').val();
                        var c = post;
                        // alert(data.CodTipoOpiniao);
                        if(data != null){
                            var cod = data.CodTipoOpiniao;
                            if(cod == 1){
                                $('div#opiniao'+c).removeClass();
                                $('div#opiniao'+c).addClass('op1');
                            }else if(cod == 2){
                                $('div#opiniao'+c).removeClass();
                                $('div#opiniao'+c).addClass('op2');
                            }
                        }
                        else{
                            $('div#opiniao'+c).removeClass();
                            $('div#opiniao'+c).addClass('fa fa-lightbulb-o fa-2x');
                        }
                    },
                    error:function(erro){
                        alert(erro);
                    }
                });
}