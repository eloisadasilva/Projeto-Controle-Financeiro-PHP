<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/MovimentoDAO.php';

$dao = new MovimentoDAO();

$total_entrada = $dao->TotalEntrada();
$total_saida = $dao->TotalSaida();

$movimentos = $dao->MostrarUltimosLancamentos();

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
                        <h2>Página Inicial</h2>
                        <h5>Aqui você acompanha todos os números de uma forma geral. </h5>
                    </div>
                </div>
                <hr />
                <div class="col-md-6">
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$ <?= $total_entrada[0]['total'] != '' ? number_format($total_entrada[0]['total'], 2, ',', '.') : '0' ?> </h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                            Total de Entrada

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$ <?= $total_saida[0]['total'] != '' ? number_format($total_saida[0]['total'], 2, ',', '.') : '0' ?> </h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            Total de Saída

                        </div>
                    </div>
                </div>
                <hr>

                <?php if (count($movimentos) > 0 ) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Últimos 10 lançamentos de Movimento:
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
                <?php } else{
                 ?>
                 <center>
                 <div class="alert alert-info col-md-12"> 
                    Não existe nenhum movimento para ser exibido. 
                </div>
                </center>
<?php }?>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>

    <script>

    </script>
</body>

</html>