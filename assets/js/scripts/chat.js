$(document).ready(function() {
	var div = $('#chat_area');div.prop("scrollTop", div.prop("scrollHeight"));
	$('#chat_area').ready(function(){
		var id = $('#chat').attr('data-id');
		id = id.split(':');
		var ult = $('#chat').attr('data-ultima');
		// if(ult == undefined){
		// 	var ult = $('#chat').attr('data-ultima');
		// }
		refresh(ult,id[0],id[1]);

	});

	//parei aqui, tenho que arrumar bug da distância da barra de rolagem...


	function refresh(ultima,ele,eu){
		var grp;
		if($('#grp').val() != undefined)
			grp = true;
		else
			grp = false;
		var timer = setInterval(function(){
			var ultima = $('#chat').attr('data-ultima');
			retornaMsg('/chat/retornaMsg?ult='+ultima+'&ele='+ele+'&eu='+eu+'&grp='+grp);
		},1000);
	}



	function retornaMsg(url){
		// var grp;
		// if($('#grp').val() != undefined)
			// grp = true;
		// else
			// grp = false;

		$.ajax({
			type: "GET",
			url: url,
			contentType: "application/json; charset=utf-8",
			cache: false,
			success: function(json){
					if(json.length != 0 && $('#chat').attr('data-ultima') != 1){

						$('.nd').html('');
						for (var i = json.length - 1; i >= 0; i--) {
							var msg;
							if(json[i].Enviada){
								var msg = '<li class="right clearfix row" id="'+json[i].CodMensagem+'">';
								msg += '<div class="chat-body2 clearfix col-xs-9 col-xs-offset-2 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">';
								msg += '<p>'+json[i].Texto+'</p>';
								msg += '<div class="chat_time pull-left"><!--<i class="fa fa-eye-slash" aria-hidden="true"></i>--> '+json[i].DataHora+'</div>';
								msg += '</div>';
								msg += '</li>';
							}else{
								var msg = '<li class="left clearfix row">';
								msg += '<span class="chat-img1 pull-left col-xs-1">';
								msg += '<img src="'+json[i].Foto+'" alt="Foto de '+json[i].Nome+'" class="img-circle"/>';
								msg += '</span>';
								msg += '<div class="chat-body1 clearfix col-xs-9 col-sm-8 col-md-6">';
								msg += '<p>'+json[i].Texto+'</p>';
								msg += '<div class="chat_time pull-right">'+json[i].DataHora+'</div>';
								msg += '</div>';
								msg += '</li>';
							}
							$('#chat').append(msg);
							$('#chat').attr('data-ultima',json[i].CodMensagem);
						}
					}
				},
				error: function(data){
					// alert('erro');
				}            
			});
	}
	$('#status_message').keypress(function(e){
		if((e.keyCode || e.wich) == 13 && !e.shiftKey){
			$('#frmMsg').submit();
		}
	});


	$('#frmMsg').submit(function(e){
		e.preventDefault();
		var msg = $('#status_message').val();
		if(msg.trim() == '')
			return false;

		var grp;
		if($('#grp').val() != undefined)
			grp = true;
		else
			grp = false;

		msg = msg.replace(/\r\n|\r|\n/g, "<br/>");
		$.post("/chat/cadMsg", {msg: msg, id: $(this).attr('data-id'),grp:grp},function(data){
			if(data != undefined){
				var ultima = $('#chat').attr('data-ultima');
				// var ultima = data;
				// alert(ultima);

				$('#chat').attr('data-ultima',parseInt(ultima));
				// alert($('#chat').attr('data-ultima'));
				var div = $('#chat_area');
				$('#status_message').val('');
				div.prop("scrollTop", div.prop("scrollHeight"));
			}  
		});

			var foto = $('#foto').val();
			var nome = $('#nome').val();
			var sobrenome = $('#sobrenome').val();
			var dados  = $(this).serialize();

			if($("#existeMsg").val() == 'n'){
			   window.location.reload();
			}
		});




	//função para visualizar msgs
	$('#chat').ready(function(){
		var grp;
		if($('#grp').val() != undefined)
			grp = true;
		else
			grp = false;

		var id = $('#chat').attr('data-id');
		id = id.split(':');

		if(!grp)
			$.post("/chat/visualizaMsg", {eu: id[1], ele: id[0]});

		var badge = $('#side'+id[0]+' .badge').html('');
	});

});