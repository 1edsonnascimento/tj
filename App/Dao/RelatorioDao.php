<?php

namespace App\Dao;

use App\Helper;

class RelatorioDao extends Conexao
{
     public function inserir($rel){
        $sql = "insert into relatorio (publicacoes,videos,horas,visitas,estudos,idUsuario,dat) values(:publicacoes,:videos,:horas,:visitas,:estudos,:idUsuario,:dat)";
        try{
            $i = $this->conexao->prepare($sql);
            $i->bindValue(":publicacoes",$rel->getPublicacoes());
            $i->bindValue(":videos",$rel->getVideos());
            $i->bindValue(":horas",$rel->getHoras());
            $i->bindValue(":visitas",$rel->getVisitas());
            $i->bindValue(":estudos",$rel->getEstudos());
            $i->bindValue(":idUsuario",$rel->getIdUsuario());
            $i->bindValue(":dat",$rel->getDat());
            $i->execute();
            return true;
        }catch (\PDOException $e){
            echo "<div>ERRO: {$e->getMessage()}</div>";
        }
    }
    public function excluir_relatorio($relatorio){
        $sql = "delete from relatorio where idRelatorio = :idRel";
        try{
            $u = $this->conexao->prepare($sql);
            $u->bindValue(":idRel",$relatorio->getIdRelatorio());
            $u->execute();
            return true;
        }catch (\PDOException $e){
            echo "<div>ERRO: {$e->getMessage()}</div>";
        }
    }
    public function alterar_relatorio($relatorio){
         $sql = "update relatorio set publicacoes = :pub, videos = :vid, visitas = vis, estudos = :est, dat = :dat where idRelatorio = :idRel";
         try{
            $u = $this->conexao->prepare($sql);
            $u->bindValue(":pub",$relatorio->getPublicacoes());
            $u->bindValue(":vid",$relatorio->getVideos());
            $u->bindValue(":hor",$relatorio->getHoras());
            $u->bindValue(":vis",$relatorio->getVisitas());
            $u->bindValue(":est",$relatorio->getEstudos());
            $u->bindValue(":dat",$relatorio->getDat());
            $u->bindValue(":idRel",$relatorio->getIdRelatorio());
            $u->execute();
            return true;
         }catch (\PDOException $e){
             echo "<div>ERRO: {$e->getMessage()}</div>";
         }
    }

    public function consultar_por_Nome($usuario){
        $sql = "select * from relatorio as r INNER JOIN usuario as u on u.idUsuario = r.idUsuario where nome like :nome";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue(":nome",$usuario->getNome()."%");
            $p->execute();
            $res = $p->fetchAll(\PDO::FETCH_ASSOC);
            $this->dados = $res;
            return $res;
        }catch (\PDOException $e){
            echo "ERRO: {$e->getMessage()}";
        }
    }

    public function consultar_por_Data($usuario,$dtIni, $dtFin){
        $sql = "select * from relatorio as r inner join usuario as u on u.idUsuario = r.idUsuario where r.dat BETWEEN :dtIni and :dtFin order by r.dat";
        try{
            $p = $this->conexao->prepare($sql);
            $p->bindValue(":dtIni",Helper::setData($dtIni));
            $p->bindValue(":dtFin",Helper::setData($dtFin));
            $p->execute();
            $res = $p->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        }catch (\PDOException $e){
            echo "ERRO: {$e->getMessage()}";
        }
    }

}