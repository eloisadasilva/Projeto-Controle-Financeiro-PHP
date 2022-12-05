<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class ContaDAO extends Conexao{

    public function CadastrarConta($banco, $agencia, $conta, $saldo){
        if(trim($banco) == '' || trim($agencia) == '' || trim($conta) == '' || trim($saldo) == ''){
            return 0;
        }
        $conexao = parent::retornarConexao(); 
    
        $comando_sql = 'insert into tb_conta
        (banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
        values
        (?, ?, ?, ?, ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $banco,);
        $sql->bindValue(2, $agencia,);
        $sql->bindValue(3, $conta,);
        $sql->bindValue(4, $saldo,);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try{ 
            $sql->execute();
            return 1;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
            return-1;
        }
    }

    public function AlterarConta($idConta, $banco, $agencia, $conta, $saldo){
        
        if(trim($banco) == '' || trim($agencia) == '' || trim($conta) == '' || trim($saldo) == '' || $idConta == ''){
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'UPDATE tb_conta
                        SET banco_conta= ?, agencia_conta= ?, numero_conta= ?, saldo_conta= ? 
                        WHERE id_conta = ?
                        AND id_usuario = ?';


        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $banco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $conta);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, $idConta);
        $sql->bindValue(6, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirConta($idConta)
    {
        if (trim($idConta) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'DELETE 
                        FROM tb_conta
                        WHERE id_conta = ?
                        AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -4;
        }
    }

    public function ConsultarConta(){
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_conta, 
                        banco_conta, agencia_conta, numero_conta, saldo_conta 
                        FROM tb_conta
                        WHERE id_usuario = ?
                        ORDER BY banco_conta ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }


    public function DetalharConta($idConta)
    {

        if($idConta == ''){
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_conta, 
                        banco_conta, agencia_conta, numero_conta, saldo_conta
                        FROM tb_conta
                        WHERE id_conta = ?
                        AND id_usuario = ?';

        $sql = new PDOStatement();

        
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idConta);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
}