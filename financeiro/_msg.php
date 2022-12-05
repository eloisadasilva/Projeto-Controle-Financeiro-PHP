<?php

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {

    switch ($ret) {
        case 0:
            echo '<div class="alert alert-warning">
         Preencher o(s) campo(s) obrigatório(s).
        </div>';
            break;

        case 1:
            echo '<div class="alert alert-success">
            Ação realizada com sucesso. 
           </div>';
            break;

        case -1:
            echo '<div class="alert alert-danger">
            Ocorreu um erro na operação. Tente mais tarde! 
           </div>';
            break;

        case -2:
            echo '<div class="alert alert-danger">
            Campo senha deve ter pelo menos 6 caracteres. 
           </div>';
            break;

        case -3:
            echo '<div class="alert alert-danger">
            Senha e Repetir Senha não conferem. 
            </div>';
            break;

        case -4:
            echo '<div class="alert alert-danger">
            Registro não pode ser excluído porque já está sendo utilizado. 
            </div>';
            break;
        case -5:
            echo '<div class="alert alert-warning">
            Não foi encontrado nenhum registro. 
            </div>';
            break;

        case -6:
            echo '<div class="alert alert-danger">
            E-mail já cadastrado. Coloque outro e-mail.
            </div>';
            break;
        
        case -7:
            echo '<div class="alert alert-danger">
            Usuário não encontrado. Verifique a digitação do e-mail ou senha.
            </div>';
            break;
    }
}
