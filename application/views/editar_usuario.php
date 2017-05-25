<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-10">
        <h1 class="page-header">Atualizar Usuário</h1>
    </div>

    <div class="col-md-12">
        <form action="<?= base_url() ?>usuario/salvar_atualizacao" method="post">
            <inptut type="hidden" id="idUsuario" value="<?= $usuario[0]->idUsuario; ?>">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input class="form-control" id="nome" name="nome" placeholder="Informe o nome..." value="<?= $usuario[0]->nome; ?>" required="" type="text">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input class="form-control" id="cpf" name="cpf" placeholder="Informe o cpf..."value="<?= $usuario[0]->cpf; ?>" required="" type="text">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control" id="endereco" name="email" placeholder="Informe o endereço email..."value="<?= $usuario[0]->email; ?>" required="" type="email">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="nivel">Nível: </label>
                        <select class="form-control" id="nivel" name="nivel" required="">
                            <option value="0"> --- </option>
                            <option value="1" <?= $usuario[0]->nivel == 1 ? ' selected' : ''; ?>>Administrador </option>
                            <option value="2" <?= $usuario[0]->nivel == 2 ? ' selected' : ''; ?>>Usuário </option>

                        </select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="senha">Senha: </label>
                            <input type="button" class="btn btn-default btn-block" value="Atualizar Senha" data-toggle="modal" data-target="#myModal" >
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="status">Status: </label>
                        <select class="form-control" id="status" name="status" required="">
                            <option value="0"> --- </option>
                            <option value="1"<?= $usuario[0]->status == 1 ? ' selected' : ''; ?>> Ativo </option>
                            <option value="2"<?= $usuario[0]->status == 2 ? ' selected' : ''; ?>> Inativo </option>

                        </select>
                    </div>
                </div>
                <div style="text-align: right;">
                    <button class="btn btn-success" type="submit">Enviar</button>
                    <button class="btn btn-default" type="reset">Cancelar</button>
                </div>
        </form>
    </div>
</div> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url() ?>usuario/salvar_senha" method="post">
                    <inptut type="hidden" id="idUsuario" value="<?= $usuario[0]->idUsuario; ?>"></inptut>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Atualização de Senha</h4>
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <div class="col-md-12 form-group" >

                            <label for='senha_antiga'>Senha Antiga:</label>
                            <input type="password" name="senha_antiga" id="senha_antiga" class="form-control">
                        </div>

                        <div class="col-md-12 form-group">

                            <label for='senha_nova'>Nova Senha:</label>
                            <input type="password" name="senha_nova" id="senha_nova" onkeyup="checarSenha()" class="form-control">
                        </div>   

                        <div class="col-md-12 form-group">

                            <label for='senha_confirmar'>Confirmar Senha:</label>
                            <input type="password" name="senha_confirmar" id="senha_confirmar" onkeyup="checarSenha()" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">

                            <div class="col-md-12 form-group">

                                <div id="msg"> 

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" id="enviarsenha" disabled>Salvar</button>
                    </div>
            </div>
            </form>

        </div>


    </div>

    <script type="text/javascript">
        
        $(document).ready(function () {

            $("#senha_nova").keyup(checkPasswordMatch);
            $("#senha_confirmar").keyup(checkPasswordMatch);

        });

        function checarSenha() {

            var password = $("#senha_nova").val();
            var confirmPassword = $("#senha_confirmar").val();

            if (password == '' || '' == confirmPassword) {

                $("#msg").html("<span style='color: red'>Campo de senha vazio!</span>");
                document.getElementById("enviarsenha").disabled = true;
            } else if (password != confirmPassword) {
                $("#msg").html("<span style='color: red'>Senhas não conferem!</span>");
                document.getElementById("enviarsenha").disabled = true;

            } else {

                $("#msg").html("<span style='color: green'>Senha iguais!</span>");
                document.getElementById("enviarsenha").disabled = false;
            }
        }
        

    </script>