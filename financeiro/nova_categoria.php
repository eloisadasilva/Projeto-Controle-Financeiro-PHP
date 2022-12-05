<?php

require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();

require_once '../DAO/CategoriaDAO.php';

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];

    $objdao = new CategoriaDAO();

    $ret = $objdao->CadastrarCategorias($nome);
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
                        <h2>Cadastro de Categorias</h2>
                        <h5>Aqui você pode cadastrar suas categorias: </h5>

                    </div>
                </div>
                <hr />
                <form action="nova_categoria.php" method="POST">
                    <div class="form-group" id="divCategoria">
                        <!--id é para vincular lá no Java script a class do css em questão que será verificada -->
                        <label>Nome da Categoria:</label>
                        <input class="form-control" placeholder="Digite a nova categoria. Exemplo: Conta de luz" name="nome" id="nomecategoria" maxlength="35"/>
                    </div>

                    <button type="submit" onclick="return ValidarCategoria()" class="btn btn-success" name="btnGravar">Gravar</button>
                </form> <!-- o ValidarCategoria é função do arquivo validacao.js, que está vinculado no head. O onclick é para quando clicar nesse botão seja verificada a função. O return é para que a informação digitada vá para o servidor quando tiver passado pelas validações da função -->
            </div>
        </div>
</body>

</html>