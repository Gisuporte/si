<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-md-12">
        <h1 class="page-header">Novo Usuário</h1>
    </div>

    <div class="col-md-10">
        
        <form action="<?= base_url() ?>usuario/cadastrar" method="post">
            
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input class="form-control col-md-7" id="nome" name="nome" placeholder="Informe o nome..." required="" type="text">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input class="form-control" id="email" name="email" placeholder="Informe o nome..." required="" type="email">
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ccu_idCcu">Centro de Custo:</label>
                        <select id="ccu_idCcu" class="form-control"  name="ccu_idCcu" required>
                        <option value="0"> --- </option>
                        <?php foreach ($centro_custos as $centro_custo){?>
                        <option value="<?= $centro_custo->idCcu?>"><?= $centro_custo->idCcu; ?> - <?= $centro_custo->desc_Ccu; ?> </option>
                        <?php } ?>
                    </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="treina_r">Treinamento Realizado:</label>
                        <select class="form-control" id="treina_r" name="treina_r" required="">
                        <option value="0"> --- </option>
                        <option value="1"> Sim </option>
                        <option value="2"> Não </option>

                    </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="cdi_E">CDI Entregue: </label>
                    <select class="form-control" id="cdi_E" name="cdi_E" required="">
                        <option value="0"> --- </option>
                        <option value="1"> Sim </option>
                        <option value="2"> Não </option>

                    </select>
                   
                    
                </div>
                <div class="col-md-2">
                    <label for="cdi_A">CDI Assinado: </label>
                    <select class="form-control" id="cdi_A" name="cdi_A" required="">
                        <option value="0"> --- </option>
                        <option value="1"> Sim </option>
                        <option value="2"> Não </option>

                    </select>
                   
                    
                </div>
                <div class="col-md-2">
                    <label for="nivel">Nível: </label>
                    <select class="form-control" id="nivel" name="nivel" required="">
                        <option value="0"> --- </option>
                        <option value="1"> Administrador </option>
                        <option value="2"> Usuário </option>

                    </select>
                   
                    
                </div>
                
                
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="senha">Senha: </label>
                        <input class="form-control" id="senha" name="senha" placeholder="Informe a senha..." required="" type="password">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="status">Status: </label>
                    <select class="form-control" id="status" name="status" required="">
                        <option value="0"> --- </option>
                        <option value="1"> Ativo </option>
                        <option value="2"> Inativo </option>

                    </select>
                </div>
                 <div class="col-md-2">
                     <label for="cargos">Cargo: </label>
                    <select id="cargos" class="form-control"  name="cargos" required>
                        <option value="0"> --- </option>
                        <?php foreach ($cargo as $cargos){?>
                        <option value="<?= $cargos->idCargo?>"> <?= $cargos->desc_cargo; ?> </option>
                        <?php } ?>
                    </select>
                     
                
             </div>
               
                
            </div>
             <div class="row">
                    
                    <div class="col-md-8">
                    <div class="form-group">
                        <label for="obs">Observação</label>
                        <textarea class="form-control" id="obs" rows="10" cols="40" name="obs"  placeholder="OBS:." required="" type="text"></textarea>
                    </div>
                    </div>
                </div>
            <div style="text-align: right;">
                <button class="btn btn-success" type="submit">Enviar</button>
                <button class="btn btn-default" type="reset">Cancelar</button>
            </div>
        </form>
    </div>
</div> 