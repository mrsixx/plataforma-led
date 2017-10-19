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

        //função para alterar foto de perfil
        $('#fotoPerfil').submit(function(){
            // $.ajax({
            //     type: "POST",
            //     url: '/attFoto',
            //     data: $().cropper('getCroppedCanvas'),
            //     success: function(data){
            //         alert("CERTO");
            //     },
            //     error: function(data){
            //         alert("ERRO");
            //     }
            // });
            $.post( '/perfil/alteraFoto', {
                img:img, 
                x: $('#dataX').val(), 
                y: $('#dataY').val(), 
                w: $('#dataW').val(), 
                h: $('#dataH').val()
            }, function(){
                // $('#div-jcrop').html( '<img src="'+img+'?'+Math.random()+'" width ="'+$('#w').val()+'" height ="'+$('#h').val()+'" />' );
                alert("foi");
            });
            return false;
        });




    });
});