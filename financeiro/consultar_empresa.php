<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/EmpresaDAO.php';

$dao = new EmpresaDAO();


$tipo_filtro = '';


if (isset($_POST['btnPesquisar'])) {
    $tipo_filtro = $_POST["tipo_filtro"];

    if ($tipo_filtro == '') {
        $empresas = $dao->ConsultarEmpresa();
    } else if ($tipo_filtro != '') {
        $filtro = $_POST["filtro"];
        $empresas = $dao->Filtrar($tipo_filtro, $filtro);
    }
} else {
    $empresas = $dao->ConsultarEmpresa();
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
                        <h2>Consultar Empresa</h2>
                        <h5>Consulte todas as suas empresas aqui:</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <hr />
                                <!-- Advanced Tables -->
                                <div class="form-group">
                                    <form action="consultar_empresa.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="form-control" name="tipo_filtro">
                                                        <option value=''>Escolha o tipo de pesquisa</option>
                                                        <option value="nome_empresa" <?= $tipo_filtro  == 'nome_empresa' ? 'selected'  : '' ?>>Nome</option>
                                                        <option value="telefone_empresa" <?= $tipo_filtro  == 'telefone_empresa' ? 'selected'  : '' ?>>Telefone</option>
                                                        <option value="endereco_empresa" <?= $tipo_filtro  == 'endereco_empresa' ? 'selected'  : '' ?>>Endereço</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Digite aqui a sua pesquisa." name='filtro' value="<?= isset($filtro) ? $filtro : '' ?>" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <button type="submit" name='btnPesquisar' class="btn btn-success">Pesquisar</button>
                                            </div>
                                        </div>
                                    </form>

                                    <br><br>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Empresas cadastradas. Caso queira alterar os dados, clique no botão.
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Nome da Empresa</th>
                                                            <th>Telefone</th>
                                                            <th>Endereço</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 0; $i < count($empresas); $i++) { ?> 
                                                            <tr class="odd gradeX">
                                                                <td><?= $empresas[$i]['nome_empresa'] ?></td>
                                                                <td><?= $empresas[$i]['telefone_empresa'] ?></td>
                                                                <td><?= $empresas[$i]['endereco_empresa'] ?></td>
                                                                <td>
                                                                    <a href="alterar_empresa.php?cod=<?= $empresas[$i]['id_empresa'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
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