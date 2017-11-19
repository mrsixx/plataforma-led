$(document).ready(function(){
	//função para alterar avatar
    $('#edtAvatar').submit(function(){
		var token = $('#txtToken').val();
    	$.ajax({
    		type: "POST",
    		url: '/alteraAvatar',
    		data: $(this).serialize(),
    		success: function(data){
    			$('#edtAvatar').modal('hide');
    			window.location.replace('/perfil/'+token);

    		},
    		error: function(data) {
                var _html = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Erro!</strong> Houve um erro ao atualizar seu avatar :/ </div>";
                $('#edtAvatar #msg').html(_html);
            }
    	});
        return false;
    });



    //função para alterar informações do perfil 
    $('#alteraPerfil').submit(function(){
    	$.ajax({
    		type: "POST",
    		url: '/atualizaPerfil',
    		data: $(this).serialize(),
    		success: function(data){
    			var _html = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sucesso!</strong> A atualização de perfil foi bem sucedida :) </div>";
                $('#alteraPerfil #msg').html(_html);
    		},
    		error: function(data){
    			var _html = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Erro!</strong> Houve um erro ao atualizar seu perfil :/ </div>";
                $('#alteraPerfil #msg').html(_html);
    		}
    	});

    });

    // //função para alterar foto de perfil
    // $('#frm-jcrop').submit(function(){
    //     // $.ajax({
    //     //     type: "POST",
    //     //     url: '/attFoto',
    //     //     data: $().cropper('getCroppedCanvas'),
    //     //     success: function(data){
    //     //         alert("CERTO");
    //     //     },
    //     //     error: function(data){
    //     //         alert("ERRO");
    //     //     }
    //     // });
    //     // {
    //     //     img: img, 
    //     //     x: $('#dataX').val(), 
    //     //     y: $('#dataY').val(), 
    //     //     w: $('#dataW').val(), 
    //     //     h: $('#dataH').val()
    //     // },
    //     $.post('/attFoto',$(this).serialize(),function(){
    //         // $('#div-jcrop').html( '<img src="'+img+'?'+Math.random()+'" width ="'+$('#w').val()+'" height ="'+$('#h').val()+'" />' );
    //         alert("foi");
    //     });
    //     return false;
    // });

    // $("#inputImage").change(function(){
    //     if (this.files && this.files[0]) {
    //         var reader = new FileReader();
     
    //         // Define o que será executado após o carregamento da imagem
    //         reader.onload = function (e) {
    //             // Passa para os elementos no DOM as informações
    //             // sobre a imagem a ser exibida e os textos
    //             // $('#visualizacao_img').attr('src', e.target.result);
    //             // $('#visualizacao_img').removeClass('hidden');
    //             // $('#recortar-imagem').removeClass('hidden');
    //             // $('#texto-informativo').html('Arraste o cursor sobre a imagem para selecionar a área de corte.');
    //             // $('#texto-informativo').removeClass('alert-info').addClass('alert-success');
     
    //             // // Ativa o recurso de recorte
    //             // $('#visualizacao_img').Jcrop({
    //             //   aspectRatio: 1,
    //             //   onSelect: atualizaCoordenadas,
    //             //   onChange: atualizaCoordenadas
    //             // });
     
    //             // Calcula o tamanho da imagem
    //             defineTamanhoImagem(e.target.result,$('#visualizacao_img'));
    //         }
     
    //         // Carrega a imagem e chama o 'reader.onload'
    //         reader.readAsDataURL(this.files[0]);
    //     }
    // });

      $("#seleciona-imagem").change(function(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        // Define o que será executado após o carregamento da imagem
        reader.onload = function (e) {
            // Passa para os elementos no DOM as informações
            // sobre a imagem a ser exibida e os textos
            // $('#visualizacao_img').attr('src', e.target.result);
            // $('#visualizacao_img').removeClass('hidden');
            // $('#recortar-imagem').removeClass('hidden');
            // $('#texto-informativo').html('Arraste o cursor sobre a imagem para selecionar a área de corte.');
            // $('#texto-informativo').removeClass('alert-info').addClass('alert-success');

            // Ativa o recurso de recorte
            $('#visualizacao_img').Jcrop({
              aspectRatio: 1,
              onSelect: atualizaCoordenadas,
              onChange: atualizaCoordenadas
            });

            // Calcula o tamanho da imagem
            defineTamanhoImagem(e.target.result,$('#visualizacao_img'));
        }

        // Carrega a imagem e chama o 'reader.onload'
        reader.readAsDataURL(this.files[0]);
    }
  });

  // Ao tentar clicar o botão recortar
  // verifica se foi definida alguma área de corte
  $('#recortar-imagem').click(function(){
    if (parseInt($('#wcrop').val())) return true;
    alert('Selecione a área de corte para continuar.');
    return false;
  });
 
     
    // Faz a atualização das coordenadas em relação ao ponto de corte
    // cada vez que esse é modificado
    // É chamado nos eventos onSelect e onChange do jCrop
    function atualizaCoordenadas(c)
    {
      $('#x').val(c.x);
      $('#y').val(c.y);
      $('#wcrop').val(c.w);
      $('#hcrop').val(c.h);
    };
     
    // Faz a verificação e define o tamanho da imagem original
    // e da imagem na área de visualização para o recorte
    function defineTamanhoImagem(imgOriginal, imgVisualizacao) {
      var image = new Image();
      image.src = imgOriginal;
     
      image.onload = function() {
        $('#wvisualizacao').val(imgVisualizacao.width());
        $('#hvisualizacao').val(imgVisualizacao.height());
        $('#woriginal').val(this.width);
        $('#horiginal').val(this.height);
      };
    }

});