<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
<fieldset>
    <legend>Cadastro de usuário</legend>
    <form class="form-validate form-vertical" id="formExemplo" data-toggle="validator" role="form" method="POST" action="cadastro/step-2">
        <div class="row">
            <input type="hidden" name="txtToken" value="<?php echo $Token; ?>">
            <div class="form-group col-md-6 col-xs-12">
                <label for="txtNick">Nome <small>*</small></label>
                <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo $Nome; ?>" placeholder="Insira seu Nome" maxlength="50" required>
            </div>
            <div class="form-group col-md-6 col-xs-12">
                <label for="txtNick">Sobrenome <small>*</small></label>
                <input type="text" class="form-control" id="txtSobrenome" name="txtSobrenome" value="<?php echo $Sobrenome; ?>" placeholder="Insira seu sobrenome" maxlength="50" required>
            </div>

            <div class="form-group col-md-6 col-xs-12">
                <label for="txtCidade" class="control-label pull-left">Cidade</label>
                <input id="txtCidade" name="txtCidade" class="form-control" type="text" placeholder="Insira o nome de sua cidade">
            </div>

            <!-- <div class="form-group col-md-6 col-xs-12">
            <label for="txtNick">Nickname</label>
            <input type="text" class="form-control" id="txtNick" name="txtNick" placeholder="Seu nome no mundo LED" maxlength="10" required>
        </div> -->
            <div class="form-group col-md-6 col-xs-12">
                <label for="cmbSexo">Sexo <small>*</small></label>
                <select name="cmbSexo" id="cmbSexo" class="form-control" required>
                    <option selected disabled >Selecione seu sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="dtNascimento" class="control-label pull-left">Data de nascimento <small>*</small></label>
            <input id="dtNascimento" name="dtNascimento" class="form-control" type="date" placeholder="Insira sua data de nascimento" max="<?php echo date('Y-m-d');?>" required oninvalid="this.setCustomValidity('Viagens no tempo ainda não são possíveis :D')" oninput="setCustomValidity('')">
        </div>


        <div class="form-group">
            <label for="txtEmail" class="control-label pull-left">Email <small>*</small></label>
            <input id="txtEmail" name="txtEmail" class="form-control" type="text" placeholder="Insira seu email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
        </div>

        <div class="form-group">
            <label for="txtSenha" class="control-label pull-left">Senha <small>*</small></label>
            <input id="txtSenha" name="txtSenha" class="form-control" type="password" placeholder="Insira sua senha" required />
        </div>

        <div class="form-group">
            <label for="txtConfirmaSenha" class="control-label pull-left">Confirmação de senha <small>*</small></label>
            <input id="txtConfirmaSenha" name="txtConfirmaSenha" class="form-control" type="password" placeholder="Confirme sua senha" required>
        </div>

        <button type="submit" id="btnEnviar" class="btn btn-primary pull-right">Próximo</button>
        <br/>
    </form>
</fieldset>
<div class="modal fade" id="welcome" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Olá
                    <?php echo "$Nome $Sobrenome";?>
            </div>
            <div class="modal-body">
                <p>Boas vindas a plataforma LED.<br/> Se tudo correr bem, em alguns cliques seu cadastro estará completo. :D</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" aria-label="Close">Certo, vamos lá</button>
            </div>
        </div>
    </div>
</div>