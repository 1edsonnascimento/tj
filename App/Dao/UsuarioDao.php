<?php

namespace App\Dao;

class UsuarioDao extends Conexao
{
    public function inserir($usuario){
        $sql = "insert into usuario(nome,cpf,logradouro,endereco,numero,cep,cidade,bairro,uf,circuito,dtBatismo,dtNascimento,status,obs,telefone) values(:nome,:cpf,:logradouro,:endereco,:numero,:cep,:cidade,:bairro,:uf,:circuito,:dtBatismo,:dtNascimento,:status,:obs,:telefone)";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":nome",$usuario->getNome());
            $i->bindValue(":cpf",$usuario->getCpf());
            $i->bindValue(":logradouro",$usuario->getLogradouro());
            $i->bindValue(":endereco",$usuario->getEndereco());
            $i->bindValue(":numero",$usuario->getNumero());
            $i->bindValue(":cep",$usuario->getCep());
            $i->bindValue(":cidade",$usuario->getCidade());
            $i->bindValue(":bairro",$usuario->getBairro());
            $i->bindValue(":uf",$usuario->getUf());
            $i->bindValue(":circuito",$usuario->getCircuito());
            $i->bindValue(":dtBatismo",$usuario->getDtBatismo());
            $i->bindValue(":dtNascimento",$usuario->getDtNascimento());
            $i->bindValue(":status",$usuario->getStatus());
            $i->bindValue(":obs",$usuario->getObs());
            $i->bindValue(":telefone",$usuario->getTelefone());
            $i->execute();
            return true;
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'{$e->getMessage()}</div>";
            return false;
        }
    }
    public function alterar($usuario){
        $sql = "update usuario set nome= :nome, cpf= :cpf, logradouro= :logradouro, endereco= :endereco, numero= :numero, cep= :cep, cidade= :cidade, bairro= :bairro, uf= :uf, circuito= :circuito,dtBatismo= :dtBatismo, dtNascimento= :dtNascimento, status= :status, obs= :obs, telefone=:telefone where idUsuario= :idUsuario";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":nome",$usuario->getNome());
            $i->bindValue(":cpf",$usuario->getCpf());
            $i->bindValue(":logradouro",$usuario->getLogradouro());
            $i->bindValue(":endereco",$usuario->getEndereco());
            $i->bindValue(":numero",$usuario->getNumero());
            $i->bindValue(":cep",$usuario->getCep());
            $i->bindValue(":cidade",$usuario->getCidade());
            $i->bindValue(":bairro",$usuario->getBairro());
            $i->bindValue(":uf",$usuario->getUf());
            $i->bindValue(":circuito",$usuario->getCircuito());
            $i->bindValue(":dtBatismo",$usuario->getDtBatismo());
            $i->bindValue(":dtNascimento",$usuario->getDtNascimento());
            $i->bindValue(":status",$usuario->getStatus());
            $i->bindValue(":obs",$usuario->getObs());
            $i->bindValue(":telefone",$usuario->getTelefone());
            $i->bindValue(":idUsuario",$usuario->getIdUsuario());
            $i->execute();
            return true;
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'{$e->getMessage()}</div>";
            return false;
        }
    }
    public function excluir($usuario){
        $sql = "delete from usuario where idUsuario = :idUsuario";
        try{
            $e = $this->conexao->prepare($sql);
            $e->bindValue(":idUsuario",$usuario->getIdUsuario());
            $e->execute();
            return true;
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'{$e->getMessage()}</div>";
            return false;
        }
    }
    public function pesquisar($usuario){
        $sql = "select * from usuario where idUsuario = :idUsuario";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue(":idUsuario",$usuario->getIdUsuario());
            $p->execute();
            $objeto = $p->fetch(\PDO::FETCH_ASSOC);
            return $objeto;
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'{$e->getMessage()}</div>";
            return false;
        }
    }
    public function pesquisaAjax($usuario){
        $sql = "select idUsuario,nome,cpf,telefone from usuario where nome like :nome";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue(":nome","%".$usuario->getNome()."%");
            $p->execute();
            $objeto = $p->fetchAll(\PDO::FETCH_ASSOC);
            return $objeto;
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'{$e->getMessage()}</div>";
            return false;
        }
    }
}
