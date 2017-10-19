$(document).ready(function () {
    //função para dar refresh na página ao fechar um modal     
    $('.att').click(function(){
        location.reload();
    });

    //regra de negócio do formulário com turmas (períodos letivos não podem terminar antes de começar)
    $('#dtInicio').change(function (e) {
        var inicio = $('#dtInicio').val();
        $('#dtFinal').attr('min',inicio);
    });

    //pegando dados do banco para preencher form cursos
    $('.editarcurso').click(function () {
        var codigo = $(this).attr('id');
        $('#hiddenCod').attr('value', codigo);
        $('#cursosUpd').modal('show');
        $.ajax({
            type: "GET",
            url: 'ambiente/retornaCursosAjax?cod='+codigo,
            contentType: "application/json; charset=utf-8",
            cache: false,
            success: function(json){
                $('#cursosUpd #txtNome').val(json.Nome);
                $('#cursosUpd #nbInicial').val(json.SerieInicial);
                $('#cursosUpd #nbFinal').val(json.SerieFinal);
                if(json.Status == 1){
                    $('#cursosUpd #cmbStatus option[value=1]').attr('selected', 'selected');
                }else{
                    $('#cursosUpd #cmbStatus option[value=0]').attr('selected', 'selected');
                }
                $('#cursosUpd #txtDescricao').val(json.Descricao);
            }
        })
    });

    //pegando dados do banco para preencher form cursos
    $('.editarturma').click(function () {
        var codigo = $(this).attr('id');
        $("input[type='hidden']").attr('value', codigo);
        $('#turmasUpd').modal('show');
        $.ajax({
            type: "GET",
            url: 'ambiente/retornaTurmaAjax?cod='+codigo,
            contentType: "application/json; charset=utf-8",
            cache: false,
            success: function(json){
                $('#turmasUpd #txtNome').val(json.NomeTurma);
                $('#turmasUpd #dtInicio').val(json.InicioLetivo);
                $('#turmasUpd #dtFinal').val(json.FimLetivo);
                $('#turmasUpd #nbQtd').val(json.QtdAlunos);
                $("#turmasUpd #cmbPeriodo option[value='"+json.Periodo+"']").attr('selected','selected');
                $("#turmasUpd #cmbModulo option[value='"+json.Modulo+"']").attr('selected','selected');
                $("#turmasUpd #cmbCurso option[value='"+json.CodCurso+"']").attr('selected','selected');
                $('#turmasUpd #txtModulo').val(json.Modulo+" º");
                $('#turmasUpd #txtIdn').val(json.NomeTurma);
                // alert(json.Modulo);

    
                
                // $('#cursosUpd #txtDescricao').val(json.Descricao);
            }
        })
    });

    //pegando dados do banco para preencher form componentes curriculares
    $('.editarcomp').click(function () {
        var codigo = $(this).attr('id');
        $("input[type='hidden']").attr('value', codigo);
        var url = $(this).attr('data-url');
        $('#compUpd').modal('show');
        $.ajax({
            type: "GET",
            url: url+'?cod='+codigo,
            contentType: "application/json; charset=utf-8",
            cache: false,
            success: function(json){
                $('#compUpd #txtNome').val(json.Nome);
                $('#compUpd #txtSigla').val(json.Sigla);
            //     $('#turmasUpd #dtFinal').val(json.FimLetivo);
            //     $('#turmasUpd #nbQtd').val(json.QtdAlunos);
            //     $("#turmasUpd #cmbPeriodo option[value='"+json.Periodo+"']").attr('selected','selected');
            //     $("#turmasUpd #cmbModulo option[value='"+json.Modulo+"']").attr('selected','selected');
            //     $("#turmasUpd #cmbCurso option[value='"+json.CodCurso+"']").attr('selected','selected');
                // alert(json.Modulo);
                
                // $('#cursosUpd #txtDescricao').val(json.Descricao);
            }
        })
    });

    //pegando dados do banco para preencher form hierarquia
    $('.editarhierarquia').click(function () {
        var codigo = $(this).attr('id');
        $("input[type='hidden']").attr('value', codigo);
        var url = $(this).attr('data-url');
        $('#funcUpd').modal('show');
        $.ajax({
            type: "GET",
            url: url+'?cod='+codigo,
            contentType: "application/json; charset=utf-8",
            cache: false,
            success: function(json){
                $('#funcUpd #txtNome').val(json.Nome);
                $('#funcUpd #txtDescricao').val(json.Descricao);
                $("#funcUpd #cmbNivel option[value='"+json.Nivel+"']").attr('selected','selected');
                $('#funcUpd #txtDescricao').val(json.Descricao);
                
            }
        })
    });

    //delete assíncrono 

    $('.excluir').click(function(){
        var confirma = confirm('Tem certeza que deseja excluir este item?');
        if(confirma){
            var codigo = $(this).attr('id');
            var controller = $(this).attr('data-controller');
            var tabela = $(this).attr('data-table')
            $.ajax({
                type: "GET",
                url: controller,
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

    //cadastro assíncrono
    $('.modalcad').submit(function () {
        var controller = $(this).attr('data-controller');
        var dados = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: controller,
            data: dados,
            success: function (data) {
                var _html = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sucesso!</strong> A operação foi bem sucedida :) </div>";
                $('.modalcad #msg').html(_html);
                $('.modalcad')[0].reset();
            },
            error: function (data) {
                var _html = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Erro!</strong> O operação não foi bem sucedida :/ </div>";
                $('.modalcad #msg').html(_html);
            }
        });
        return false;
    });


    //update assíncrono
    $('.modalupd').submit(function () {
        $('.modalupd #msg').html('');
        var dados = jQuery(this).serialize();
        var controller = $(this).attr('data-controller');
        $.ajax({
            type: "POST",
            url: controller,
            data: dados,
            success: function (data) {
                var _html = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Sucesso!</strong> A atualização foi bem sucedida :) </div>";
                $('.modalupd #msg').html(_html);
            },
            error: function (data) {
                var _html = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Erro!</strong> A atualização não foi bem sucedida :/ </div>";
                $('.modalupd #msg').html(_html);
            }
        });

        return false;
    });

    //função para adicionar campos no formulário de cadastro de funcionários
    $('.addComp').click(function(){
        var codigo = $(this).attr('id');
        $("input[type='hidden']").attr('value', codigo);
        $('#compAdd').modal('show');
    });

    $('.comp').click(function(){
        var codigo = $(this).attr('id');
        $("input[type='hidden']").attr('value', codigo);
        $('#compUpd').modal('show');
        $.ajax({
            type: "GET",
            url: 'ambiente/retornaComponentesCurricularesAjax?cod='+codigo,
            contentType: "application/json; charset=utf-8",
            cache: false,
            success: function(json){
                for (var i = json.length - 1; i >= 0; i--) {
                     $('#campos #cmbProfessor option[value='+json[i].CodProfessor+']').attr('selected', 'selected');
                    $('#campos #txtNome').val(json[i].Nome);
                    $('#campos #txtSigla').val(json[i].Sigla);
                }
            },
        })
    });

    $('#turmasCad #txtNome').keyup(function() {
        var valor = $(this).val();
        // $('#turmasCad #txtIdn').val();
        $('#turmasCad #txtIdn').val(valor);
    });
    $('#turmasCad #cmbModulo').change(function() {
        var modulo = $(this).val();
        $('#turmasCad #txtModulo').val(modulo+"º ");
    });

    
});

// $(document).ready(function() {
//   var max_fields = 10; //maximum input boxes allowed
//   var wrapper = $(".wrapper"); //Fields wrapper
//   var add_button = $("#addField"); //Add button ID

//   var x = 1; //initlal text box count
//   $(add_button).click(function(e) { //on add input button click
//     e.preventDefault();
//     var length = wrapper.find("input:text").length;

//     var nome = '<div class="form-group col-md-5"><small for="txtNome" class="control-label pull-left">Categoria <span class="required">*</span></small><br/><input id="txtNome" name="txtNome" class="form-control" type="text" placeholder="Insira a categoria" maxlength="150" required /></div>';
//     var qtd = '<div class="form-group col-md-3"><small for="nbFuncionarios" class="control-label pull-left">Nº funcionários <span class="required">*</span></small><br/><input id="nbFuncionarios" name="nbFuncionarios" class="form-control" type="number" placeholder="Insira o número de funcionários desta categoria" min="1" value="1" required /></div>';
//     var nivel = '<div class="form-group col-md-3"><small for="cmbNivel" class="control-label">Nível<span class="required">*</span></small><select name="cmbNivel" id="cmbNivel" class="form-control" required><option selected value="">Selecione o nível de hierarquia</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div>';
//     var btn = '<a href="#" class="btn btn-primary btn-xs remove_field pull-right" style="margin-right:10px;"><span class="glyphicon glyphicon-remove"></span></a>';
//     if (x < max_fields) { //max input box allowed
//       x++; //text box increment
//       $(wrapper).append('<div class="row"><hr/>'+btn+nome+qtd+nivel+'</div>'); //add input box
//     }
//   });

//   $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
//     e.preventDefault();
//     $(this).parent('div').remove();
//     x--;
//   })

// });
                            

                            