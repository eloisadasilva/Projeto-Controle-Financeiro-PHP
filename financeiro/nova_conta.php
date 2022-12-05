<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/ContaDAO.php';

if(isset($_POST['btnGravar'])){
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $conta = $_POST['conta'];
    $saldo = $_POST['saldo'];

    $objdao = new ContaDAO();

    $ret = $objdao->CadastrarConta($banco, $agencia, $conta, $saldo);
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
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
                    <?php include_once '_msg.php'; ?>
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas as suas contas:</h5>

                    </div>
                </div>
                <hr />
                <form action="nova_conta.php" method="POST">
                <div class="form-group" id="divConta">
                    <label>Nome do Banco*</label>
                    <input class="form-control" placeholder="Digite o nome do banco" name="banco" id="nomebanco" maxlength="20"/>
                </div>
                <div class="form-group" id="divContaAgencia">
                    <label>Agência*</label>
                    <input class="form-control" placeholder="Digite o número da agência" name="agencia" id="agencia" maxlength="8" />
                </div>
                <div class="form-group" id="divContaNumconta">
                    <label>Número da Conta*</label>
                    <input class="form-control" placeholder="Digite o número da conta" name="conta" id="numconta" maxlength="12"/>
                </div>
                <div class="form-group" id="divContaSaldo">
                    <label>Saldo*</label>
                    <input class="form-control" placeholder="Digite o saldo da conta" name="saldo" id="saldo" maxlength="13"/>
                </div>
                <button type="submit" onclick="return ValidarConta()" class="btn btn-success" name="btnGravar">Gravar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>