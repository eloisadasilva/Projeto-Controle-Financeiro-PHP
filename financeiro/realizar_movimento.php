<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';
require_once '../DAO/CategoriaDAO.php';
require_once '../DAO/EmpresaDAO.php';
require_once '../DAO/ContaDAO.php';

$dao_cat = new CategoriaDAO();
$categorias = $dao_cat->ConsultarCategoria();

$dao_emp = new EmpresaDAO();
$empresas = $dao_emp->ConsultarEmpresa();

$dao_con = new ContaDAO();

if (isset($_POST['btnFinalizar'])) {
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
    $data = $_POST['data'];
    $empresa = $_POST['empresa'];
    $valor = $_POST['valor'];
    $conta = $_POST['conta'];
    $obs = $_POST['obs'];
    
    $objdao = new MovimentoDAO();
    
    $ret = $objdao->RealizarMovimento($tipo, $categoria, $data, $empresa, $valor, $conta, $obs);
}
$contas = $dao_con->ConsultarConta();

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
                        <h2>Realizar Movimento</h2>
                        <h5>Aqui você poderá realizar seus movimentos de entrada e saída: </h5>

                    </div>
                </div>
                <hr />
                <form action="realizar_movimento.php" method="POST">
                    <div class="col-md-6">
                        <div class="form-group" id="divTipo">
                            <label>Tipo do movimento*</label>
                            <select class="form-control" name="tipo" id="tipomovimento" value="<?= isset($tipo) ? $tipo : '' ?>">
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>
                        </div>
                        <div class="form-group" id="divData">
                            <label>Data*</label>
                            <input type="date" class="form-control" placeholder="Digite a data do movimento" name="data" id="data" value="<?= UtilDAO::DataAtual()?>" />
                        </div>
                        <div class="form-group" id="divValor">
                            <label>Valor*</label>
                            <input class="form-control" placeholder="Digite o valor do movimento" name="valor" id="valor" maxlength="13" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="divCategoria">
                            <label>Categoria*</label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option value="">Selecione</option>
                                <?php foreach ($categorias as $cat) { ?>
                                    <option value="<?= $cat['id_categoria'] ?>"><?= $cat['nome_categoria'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" id="divEmpresa">
                            <label>Empresa*</label>
                            <select class="form-control" name="empresa" id="empresa">
                                <option value="">Selecione</option>
                                <?php foreach ($empresas as $emp) { ?>
                                    <option value="<?= $emp['id_empresa'] ?>"> <?= $emp['nome_empresa'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" id="divConta">
                            <label>Conta*</label>
                            <select class="form-control" name="conta" id="conta">
                                <option value="">Selecione</option>
                                <?php foreach ($contas as $con) { ?>
                                    <option value="<?= $con['id_conta'] ?>"> <?= $con['banco_conta'] ?> / Agência: <?= $con['agencia_conta'] ?> / Número: <?= $con['numero_conta'] ?> / Saldo: R$<?= $con['saldo_conta'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação (opcional)</label>
                            <textarea class="form-control" rows="5" name="obs" maxlength="100" placeholder="Você pode digitar uma observação aqui"></textarea>
                        </div>
                    </div>
                    <button type="submit" onclick="return ValidarMovimento()" class="btn btn-success" name="btnFinalizar">Finalizar lançamento</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>