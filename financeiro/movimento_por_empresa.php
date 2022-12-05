<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';

require_once '../DAO/EmpresaDAO.php';

 $tipo = '';
 $empresa = '';

$dao_emp = new EmpresaDAO();
$empresas = $dao_emp->ConsultarEmpresa();

if (isset($_POST['btnPesquisar'])) {
    $tipo = $_POST["tipo"];
    $empresa = $_POST['empresa'];
    $data_inicial = $_POST["data_inicial"];
    $data_final = $_POST["data_final"];

    $dao = new MovimentoDAO();
    $movimentos = $dao->FiltrarMovimentoPorEmpresa($tipo, $empresa, $data_inicial, $data_final);
    if (!is_array($movimentos)) {
        $ret = $movimentos;
    } else if (count($movimentos) == 0) {
        $ret = -5;
    }
} else if (isset($_POST['btnExcluir'])) {
    $idMov = $_POST["idMov"];
    $idConta = $_POST["idConta"];
    $tipo = $_POST["tipo"];
    $valor = $_POST["valor"];

    $dao = new MovimentoDAO();
    $ret = $dao->ExcluirMovimento($idMov, $idConta, $valor, $tipo);
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

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>
                        <h2>Consultar Movimento por Empresa</h2>
                        <h5>Consulte seus movimentos por empresa em determinado período:</h5>
                        <hr />
                        <form action="movimento_por_empresa.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tipo do movimento</label>
                                        <select class="form-control" name="tipo" value="<?= isset($tipo) ? $tipo :'' ?>">
                                            <option value="0" <?= $tipo  == '0' ? 'selected'  : '' ?>>TODOS</option>
                                            <option value="1" <?= $tipo  == '1' ? 'selected'  : '' ?>>Entrada</option>
                                            <option value="2" <?= $tipo == '2' ? 'selected'  : '' ?>>Saída</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="divEmpresa">
                                        <label>Empresa*</label>
                                        <select class="form-control" name="empresa" id="empresa" value="<?= isset($empresa) ? $empresa :'' ?>">
                                            <option value="">Selecione</option>
                                            <?php foreach ($empresas as $emp) { ?>
                                                <option value="<?= $emp['id_empresa'] ?>" <?= $empresa == $emp['id_empresa'] ? 'selected' : '' ?>  > <?= $emp['nome_empresa'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-6" id="divDatainicial">
                                        <div class="form-group">
                                            <label>Data Inicial*</label>
                                            <input type="date" name="data_inicial" class="form-control" placeholder="Digite a data inicial do movimento" id="data_inicial" value="<?= $data_inicial ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="divDatafinal">
                                        <div class="form-group">
                                            <label>Data Final*</label>
                                            <input type="date" name="data_final" class="form-control" placeholder="Digite a data final do movimento" id="data_final" value="<?= $data_final ?>" />
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <button type="submit" onclick="return ValidarConsultaMovimentoEmpresa()" name='btnPesquisar' class="btn btn-success">Pesquisar</button>
                                </center>
                        </form>
                        <hr>
                        <?php if (isset($movimentos) && is_array($movimentos) && count($movimentos) > 0) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Resultado encontrado:
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Data</th>
                                                            <th>Tipo</th>
                                                            <th>Categoria</th>
                                                            <th>Empresa</th>
                                                            <th>Conta</th>
                                                            <th>Valor</th>
                                                            <th>Observação</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $total = 0;
                                                        for ($i = 0; $i < count($movimentos); $i++) {
                                                            if ($movimentos[$i]['tipo_movimento'] == 1) {
                                                                $total = $total + $movimentos[$i]['valor_movimento'];
                                                            } else {
                                                                $total = $total - $movimentos[$i]['valor_movimento'];
                                                            }
                                                        ?>
                                                            <tr class="odd gradeX">
                                                                <td><?= $movimentos[$i]['data_movimento'] ?></td>
                                                                <td><?= $movimentos[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                                <td><?= $movimentos[$i]['nome_categoria'] ?></td>
                                                                <td><?= $movimentos[$i]['nome_empresa'] ?></td>
                                                                <td><?= $movimentos[$i]['banco_conta'] ?> / Ag. <?= $movimentos[$i]['agencia_conta'] ?> - Núm. <?= $movimentos[$i]['numero_conta'] ?></td>
                                                                <td>R$ <?= number_format($movimentos[$i]['valor_movimento'], 2, ',', '.') ?></td>
                                                                <td><?= $movimentos[$i]['obs_movimento'] ?></td>


                                                                <td>
                                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalExcluir<?= $i ?>">Excluir</a>
                                                                    <form action="movimento_por_empresa.php" method="POST">
                                                                        <input type="hidden" name="idMov" value="<?= $movimentos[$i]['id_movimento'] ?>">
                                                                        <input type="hidden" name="idConta" value="<?= $movimentos[$i]['id_conta'] ?>">
                                                                        <input type="hidden" name="tipo" value="<?= $movimentos[$i]['tipo_movimento'] ?>">
                                                                        <input type="hidden" name="valor" value="<?= $movimentos[$i]['valor_movimento'] ?>">
                                                                        <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <center><b> Confirme a exclusão do seguinte movimento: </b> <br><br></center>
                                                                                        <b> Data do movimento: </b> <?= $movimentos[$i]['data_movimento'] ?> <br>
                                                                                        <b> Tipo de movimento: </b> <?= $movimentos[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?> <br>
                                                                                        <b> Categoria: </b> <?= $movimentos[$i]['nome_categoria'] ?> <br>
                                                                                        <b> Empresa: </b> <?= $movimentos[$i]['nome_empresa'] ?> <br>
                                                                                        <b> Conta: </b> <?= $movimentos[$i]['banco_conta'] ?> / Ag. <?= $movimentos[$i]['agencia_conta'] ?> - Núm. <?= $movimentos[$i]['numero_conta'] ?> <br>
                                                                                        <b> Valor: </b> <?= number_format($movimentos[$i]['valor_movimento'], 2, ',', '.') ?> <br>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                                        <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <center>
                                                    <label style="color: <?= $total < 0 ? 'red' : 'green' ?>">TOTAL: <?= number_format($total, 2, ',', '.'); ?></label>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <hr />

    </div>
    </div>
    </div>


</body>

</html>