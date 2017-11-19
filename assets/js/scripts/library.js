        $(document).ready(function(){

            $('#searchField').keyup(function(e){
                var ctrl = false;
                var shift = false;
                var alt = false;
                var esc = false;

                //verifico se a tecla pressionada é alguma tecla de atalho
                if(e.which == 16) shift = true;
                if(e.which == 17) ctrl = true;
                if(e.which == 18) alt = true;
                if(e.which == 27) esc = true;

                if(!shift && !ctrl && !alt && !esc){
                    //se não for nenhuma delas eu dou um alert
                    var search = $('#searchField').val();
                    // alert(search);
                    $('#sidebarled').html('');
                    $.ajax({
                        type: "GET",
                        url: '/biblioteca/retornaBusca?search='+search,
                        contentType: "application/json; charset=utf-8",
                        cache: false,
                        success: function(json){
                            // alert(json);
                            //parei aqui, preciso fazer um each para exibir todos os comentarios e verificar se o código do usuario é o mesmo do usuario que comentou para habilitar as opções para ele
                            if(json.length == 0){
                                $('#sidebarled').html('');
                                    var livro = '<a class="list-group-item" href="javascript:void(0)">';
                                    livro += '<i class="" aria-hidden="true">&nbsp;</i>';
                                    livro += 'Nenhum arquivo encontrado';
                                    livro += '</a>';
                                $('#sidebarled').append(livro);
                            }else{
                                //aqui vou exibir as li's com os comentários :D
                                for (var i = json.length - 1; i >= 0; i--) {
                                    
                                            
                                            
                                        

                                    var livro = '<a class="list-group-item" href="'+json[i].Link+'">';
                                    livro += '<i class="'+json[i].Icon+'" aria-hidden="true">&nbsp;</i>';
                                    livro += json[i].Nome;
                                    livro += '</a>';


                                    


                                    $('#sidebarled').append(livro);
                                        // var div = $('#comentarioScroll');
                                        // div.prop("scrollTop", div.prop("scrollHeight"));
                                }
                            }
                        }           
                    });
                }
                // var valida = false;
                // $('input[name=rdbDificuldade]').each(function() {
                //     if($('input[type=radio]:checked').length != 0) {
                //         valida = true;
                //     }
                // });
                

                // if(!valida) {
                //     alert('Você precisa escolher uma dificuldade para esta atividade.');
                //     return false;
                // }else{
                //     $('#frmCriaTask').submit();
                // }
            });
        });

      