<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-10">
        <h1 class="page-header">Atualizar Usuário</h1>
    </div>

    <div class="col-md-12">
        <form action="<?= base_url() ?>usuario/salvar_atualizacao" method="post">
            <inptut type="hidden" id="idUsuario" value="<?= $usuario[0]->idUsuario;?>">
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
                        <input class="form-control" id="senha" name="senha" placeholder="Informe a senha..."value="<?= $usuario[0]->senha; ?>" required="" type="password">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="status">Status: </label>
                    <select class="form-control" id="status" name="status" required="">
                        <option value="0"> --- </option>
                        <option value="1"<?= $usuario[0]->status ==1?' selected':''; ?>> Ativo </option>
                        <option value="2"<?= $usuario[0]->status ==2?' selected':''; ?>> Inativo </option>

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