<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class EmpresaDAO extends Conexao
{

    public function CadastrarEmpresa($empresa, $telefone, $endereco)
    {
        if (trim($empresa) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();

        $comando_sql = 'insert into tb_empresa
        (nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
        values
        (?, ?, ?, ?);';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $empresa,);
        $sql->bindValue(2, $telefone == '' ? null : $telefone);
        $sql->bindValue(3, $telefone == '' ? null : $endereco);
        $sql->bindValue(4, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarEmpresa($idEmpresa, $empresa, $telefone, $endereco)
    {
        if (trim($empresa) == '' || $idEmpresa == '') {
            return 0;
            
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'UPDATE tb_empresa
                        SET nome_empresa = ?, telefone_empresa = ?, endereco_empresa = ?
                        WHERE id_empresa = ?
                        AND id_usuario = ?';


        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $empresa);
        $sql->bindValue(2, $telefone);
        $sql->bindValue(3, $endereco);
        $sql->bindValue(4, $idEmpresa);
        $sql->bindValue(5, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirEmpresa($idEmpresa)
    {
        if (trim($idEmpresa) == '') {
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'DELETE 
                        FROM tb_empresa
                        WHERE id_empresa = ?
                        AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idEmpresa);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -4;
        }
    }

    public function ConsultarEmpresa()
    {

        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_empresa, 
                        nome_empresa, telefone_empresa, endereco_empresa 
                        FROM tb_empresa
                        WHERE id_usuario = ?
                        ORDER BY nome_empresa ASC';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }


    public function Filtrar($tipo_filtro, $filtro)
    {
        $conexao = parent::retornarConexao();

        switch ($tipo_filtro) {

            case 'nome_empresa':
                $comando_sql = 'SELECT id_empresa, 
                nome_empresa, telefone_empresa, endereco_empresa 
                FROM tb_empresa
                WHERE id_usuario = ? AND nome_empresa LIKE ?';
                break;
            case 'telefone_empresa':
                $comando_sql = 'SELECT id_empresa, 
                nome_empresa, telefone_empresa, endereco_empresa 
                FROM tb_empresa
                WHERE id_usuario = ? AND telefone_empresa LIKE ?';
                break;
            case 'endereco_empresa':
                $comando_sql = 'SELECT id_empresa, 
                nome_empresa, telefone_empresa, endereco_empresa 
                FROM tb_empresa
                WHERE id_usuario = ? AND endereco_empresa LIKE ?';
                break;
        }

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::CodigoLogado());
        $sql->bindValue(2, '%' . $filtro . '%');

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }


    public function DetalharEmpresa($idEmpresa)
    {
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_empresa, 
                        nome_empresa, telefone_empresa, endereco_empresa
                        FROM tb_empresa
                        WHERE id_empresa = ?
                        AND id_usuario = ?';

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idEmpresa);
        $sql->bindValue(2, UtilDAO::CodigoLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
}
