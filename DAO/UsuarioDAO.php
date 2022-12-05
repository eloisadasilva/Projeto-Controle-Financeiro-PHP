<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class UsuarioDAO extends Conexao
{

    public function CarregarMeusDados()
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT nome_usuario, 
                        email_usuario 
                        FROM tb_usuario
                        WHERE id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, UtilDAO::CodigoLogado());

        //Remove os index dentro do array, permanecendo somente com as colunas do BD
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function VerificarEmailDuplicadoAlteracao($email)
    {
        if (trim($email) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT COUNT(email_usuario) AS contar
                    FROM tb_usuario
                    WHERE email_usuario = ?
                    AND id_usuario != ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $email);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        $contar = $sql->fetchAll();

        return $contar[0]['contar'];
    }


    public function GravarMeusDados($nome, $email)
    {

        if (trim($nome) == '' || trim($email) == '') {
            return 0;
        }

        if ($this->VerificarEmailDuplicadoAlteracao($email) != 0) {
            return -6;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'UPDATE tb_usuario
                        SET nome_usuario = ?,
                        email_usuario = ?
                        WHERE id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome,);
        $sql->bindValue(2, $email,);
        $sql->bindValue(3, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ValidarLogin($email, $senha)
    {
        if (trim($email) == '' || trim($senha) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_usuario, nome_usuario
                        FROM tb_usuario
                        WHERE email_usuario = ? 
                        AND senha_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $email);
        $sql->bindValue(2, $senha);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        $user = $sql->fetchAll();

        if(count($user) == 0){
            return -7;
        }

        $cod = $user[0]['id_usuario'];
        $nome = $user[0]['nome_usuario'];
       
        UtilDAO::CriarSessao($cod, $nome);
        header('location: inicial.php');
        exit;

    }

    public function VerificarEmailDuplicadoCadastro($email)
    {
        if (trim($email) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT COUNT(email_usuario) AS contar
                    FROM tb_usuario
                    WHERE email_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $email);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        $contar = $sql->fetchAll();

        return $contar[0]['contar'];
    }


    public function CriarCadastro($nome, $email, $senha, $repsenha)
    {

        if (trim($nome) == '' || trim($email) == '' || trim($senha) == '' || trim($repsenha) == '') {
            return 0;
        }
        if (strlen($senha) < 6) {
            return -2;
        }
        if ($repsenha != $senha) {
            return -3;
        }

        if ($this->VerificarEmailDuplicadoCadastro($email) != 0) {
            return -6;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'INSERT INTO tb_usuario
        (nome_usuario, email_usuario, senha_usuario, data_cadastro)
        VALUE
        (?, ?, ?, ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $nome);
        $sql->bindValue(2, $email);
        $sql->bindValue(3, $senha);
        $sql->bindValue(4, date('Y-m-d'),);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
}
