<?php

namespace App\Dao;

use App\Helper;

class LoginDao extends Conexao
{
    public function inserir($usuario){
        $sql = "insert into login(username,senha,permissoes,idUsuario) values(:username,:senha,:permissoes, :idUsuario)";
        try{
            $inserir = $this->conexao->prepare($sql);
            $inserir->bindValue(":username",$usuario->getUsername());
            $inserir->bindValue(":senha",Helper::criptografar($usuario->getSenha()));
            $inserir->bindValue(":permissoes",$usuario->getPermissoes());
            $inserir->bindValue(":idUsuario",$usuario->getIdUsuario());
            $inserir->execute();
            return true;
        }catch(\PDOException $e){
            echo "<div class='alert alert-danger'{$e->getMessage()}</div>";
            return false;
        }
    }


    public function alterar($usuario){
        $sql = "update login set username = :username,senha = :senha, permissoes = :permissoes,idUsuario = :idUsuario where idLogin = :idLogin";
        try{
            $alterar = $this->conexao->prepare($sql);
            $alterar->bindValue(":username",$usuario->getUsername());
            $alterar->bindValue(":senha",Helper::criptografar($usuario->getSenha()));
            $alterar->bindValue(":permissoes",$usuario->getPermissoes());
            $alterar->bindValue(":idUsuario",$usuario->getIdUsuario());
            $alterar->bindValue(":idLogin",$usuario->getIdLogin());
            $alterar->execute();
            return true;
        }catch(\PDOException $e){
            echo "<div class='alert alert-danger'{$e->getMessage()}</div>";
            return false;
        }
    }

    public function excluir($usuario){
        $sql = "delete from login where idLogin = :idLogin";
        try{
            $excluir = $this->conexao->prepare($sql);
            $excluir->bindValue(":idLogin",$usuario->getIdLogin());
            $excluir->execute();
            return true;
        }catch(\PDOException $e){
            echo "<div class='alert alert-danger'{$e->getMessage()}</div>";
            return false;
        }
    }


    public function logar($login){
        $sql = "select l.idLogin, l.username,l.permissoes, u.idUsuario, u.nome from login as l inner join usuario as u on l.idUsuario = u.idUsuario where username = :username and senha = :senha";
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindValue(":username",$login->getUsername());
            $consulta->bindValue(":senha",Helper::criptografar($login->getSenha()));
            $consulta->execute();
            $resultado = $consulta->fetch();
            session_start();
            $_SESSION['idLogin'] = $resultado['idUsuario'];
            $_SESSION['permissoes'] = $resultado['permissoes'];
            $_SESSION['nome'] = $resultado['nome'];
            return $resultado;
        }catch (\PDOException $e){
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
            return false;
        }
    }

    public function logoff(){
        session_start();
        unset($_SESSION['idLogin']);
        unset($_SESSION['nome']);
        unset($_SESSION['permissoes']);
        session_destroy();
        header("Location: login.php");
    }

    public function statusLogin(){
        if(empty($_SESSION['idLogin']) && empty($_SESSION['nome']) && empty($_SESSION['permissoes']))
            header("Location: login.php");
    }
}