<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao //extends é para herdar os dados da classe Conexao
{

    public function CadastrarCategorias($nome)
    {
        if (trim($nome) == '') {
            return 0;
        }
        //1 passo: crar uma variável que receberá o obj de conexao
        $conexao = parent::retornarConexao(); //parent é para chamar recursos da classe herdada

        //2 passo: criar uma variável que receberá o texto do comando SQL que deverá ser executado no DB
        $comando_sql = 'insert into tb_categoria
        (nome_categoria, id_usuario)
        values
        (?, ?);';

        //3 Passo: criar um obj que será configurado e levado no BD para ser executado
        $sql = new PDOStatement();

        //4 Passo: colocar dentro do obj $sql a conexão preparada para executar o comando_sql
        $sql = $conexao->prepare($comando_sql);

        //5 Passo: verificar se no comando_sql eu tenho ? para ser configurado. Se tiver, configurar os bindValues
        $sql->bindValue(1, $nome,);
        $sql->bindValue(2, UtilDAO::CodigoLogado()); // os dois pontos é para chamar uma classe static

        try { // para monitorar possiveis erros

            //6 Passo: executar no BD
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarCategoria($nome, $idCategoria)
    {
        if (trim($nome) == '' || $idCategoria == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'UPDATE tb_categoria
                        SET nome_categoria = ?
                        WHERE id_categoria = ?
                        AND id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $idCategoria);
        $sql->bindValue(3, UtilDAO::CodigoLogado());

        try{
            $sql->execute();
            return 1;

        } catch (Exception $ex){
            echo $ex->getMessage();
            return -1;

        }
        
    }



    public function ExcluirCategoria($idCategoria)
    {
        if (trim($idCategoria) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'DELETE 
                        FROM tb_categoria
                        WHERE id_categoria = ?
                        AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria,);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try{
            $sql->execute();
            return 1;

        } catch (Exception $ex){
            echo $ex->getMessage();
            return -4;

        }

        $sql->setFetchMode(PDO::FETCH_ASSOC); // tudo que volta do banco volta em array, assim esse comando serve para retirar o index

        $sql->execute();

        return $sql->fetchAll(); // para retornar o que foi consulatado no banco para a tela

    }




    public function ConsultarCategoria()
    {

        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_categoria, 
                        nome_categoria 
                        FROM tb_categoria
                        WHERE id_usuario = ?
                        ORDER BY nome_categoria ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC); // tudo que volta do banco volta em array, assim esse comando serve para retirar o index

        $sql->execute();

        return $sql->fetchAll(); // para retornar o que foi consulatado no banco para a tela

    }

    public function FiltrarCategoria($nome_categoria)
    {

        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_categoria, 
                        nome_categoria 
                        FROM tb_categoria
                        WHERE id_usuario = ? AND nome_categoria LIKE ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->bindValue(2, '%' . $nome_categoria . '%');

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharCategoria($idCategoria){
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_categoria, 
                        nome_categoria
                        FROM tb_categoria
                        WHERE id_categoria = ?
                        AND id_usuario = ?';
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();

    }
}
