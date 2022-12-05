<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/UsuarioDAO.php';

$objdao = new UsuarioDAO();

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $ret = $objdao->GravarMeusDados($nome, $email);
}

$dados = $objdao->CarregarMeusDados();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php'
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        include_once '_msg.php';

                        ?>
                        <h2>Meus Dados</h2>
                        <h5>Nesta tela você poderá alterar os seus dados: </h5>
                    </div>
                </div>
                <hr />
                <form action="meus_dados.php" method="POST">
                    <div class="form-group" id="divNome">
                        <label>Nome</label>
                        <input class="form-control" placeholder="Digite seu nome" name="nome" id="nome" value="<?= $dados[0]['nome_usuario']?>"/>
                    </div> <!-- id é para incluir as funções jquery-->
                    <div class="form-group" id="divEmail">
                        <label>E-mail</label>
                        <input class="form-control" placeholder="Digite seu e-mail" name="email" id="email" value="<?= $dados[0]['email_usuario']?>"/>
                    </div>
                    <button type="submit" onclick="return ValidarMeusDados()" class="btn btn-success" name="btnGravar">Gravar</button>
                    <!-- se retornar false da função ValidarMeusDados, que está no arquivo validacao.js vai executar a função somente no js e não vai para o servidor ser executado no php.  -->
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

<script>

</script>
</body>

</html>