$(document).ready(function(){
    $('.btnavatar').click(function(){

        var link = $(this).attr("data-nome");
		var id = $(this).attr("data-id");
		var codigo = $(this).attr("data-cod");
        $('.avatar #'+id).attr('src', link);
        $("input[name='cod"+id+"']").attr('value', codigo);
    })
});