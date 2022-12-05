<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/CategoriaDAO.php';

$dao = new CategoriaDAO();

$nome_categoria = '';




if (isset($_POST["btnPesquisar"])) {
    $nome_categoria = $_POST["nome_categoria"];
    $categorias = $dao->FiltrarCategoria($nome_categoria);
} else if (isset($_GET['filtro']) && $_GET['filtro'] != '') {
    $nome_categoria = $_GET['filtro'];
    $categorias = $dao->FiltrarCategoria($nome_categoria);
   
} else {
    $categorias = $dao->ConsultarCategoria();
}



// echo '<pre>';
// print_r($categorias);
// echo '<pre/>';

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
                        <?php include_once '_msg.php'; ?>
                        <h2>Consultar Categorias</h2>
                        <h5>Aqui você pode consultar suas categorias: </h5>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="form-group">
                            <form action="consultar_categoria.php" method="POST">
                                <label>Pesquisar nome da Categoria:</label>
                                <input id="nome" onkeyup="Filtrar(this.value)" class="form-control" name='nome_categoria' value="<?= isset($nome_categoria) ? $nome_categoria : '' ?>" />
                        </div>
                        <center>
                            <button type="subimit" name='btnPesquisar' class="btn btn-success">Pesquisar</button>
                        </center>
                        </form>

                        <br><br>


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Categorias cadastradas. Caso queira alterar os dados, clique no botão.
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Categoria</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($categorias as $item) { ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $item ['nome_categoria'] ?></td>
                                                    <td>
                                                        <a href="alterar_categoria.php?cod=<?= $item ['id_categoria'] ?>" class="btn btn-warning btn-xs">Alterar</a>
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

</body>

<script>
    function Filtrar(palavra) {
        // alert(palavra)
        if (palavra.length > 2) {

            window.location = "consultar_categoria.php?filtro=" + palavra;
        }

    }
</script>

</html>