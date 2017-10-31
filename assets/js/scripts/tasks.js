        $(document).on('click', '#close-preview', function() {
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function() {
                    $('.image-preview').popover('show');
                },
                function() {
                    $('.image-preview').popover('hide');
                }
            );
        });

        $(function() {
            // Create the close button
            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class", "close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Pré-visualização </strong>" + $(closebtn)[0].outerHTML,
                content: "Sem arquivo",
                placement: 'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function() {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function() {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function(e) {
                    $(".image-preview-input-title").text("Escolher");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).ready(function () {
            //botão para premiar aluno
        	$('.star').on('click', function(){
                var status = $(this).attr('data-status');
                var cod = $(this).attr('data-cod');
                var premio = $(this).attr('data-premio');
                var codDesempenho = $(this).attr('data-desempenho');
                if(status == 0){
                    $('#confirmXp').modal('show');
                    $('#CodUsuario').val(cod);
                    $('#CodDesempenho').val(codDesempenho);
                    $('#Premio').val(premio);
                }
            });



            $('#confirmXp').on('submit',function(e){
                var id = '#premio'+ $('#CodUsuario').val();
                e.preventDefault;
                $.post( "/task/premiaAluno", $(this).serialize(), function(data) {
                        $('#confirmXp').modal('hide');
                        $(id).toggleClass('star-checked');
                        // alert('Sucesso!');
                });
                return false;


            });





            $('.ckbox label').on('click', function () {
              $(this).parents('tr').toggleClass('selected');
            });

            $('.btn-filter').on('click', function () {
              var $target = $(this).data('target');
              if ($target != 'todos') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
              } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
              }
            });

         });

      //  initSample();

