<?php

namespace App\View;

class Navegador
{
    private $navegador;
    private $cor = "blue"; //blue,gray,grey,
    private $class = 'class="w3-bar-item w3-button"';

    public function __construct($permissao,$nome)
    {
        $this->navegador = $this->nav($permissao, $nome);
    }
    private function nav($permissao,$nome){
        $complemento = "";
        $nav  = '<div class="w3-bar w3-brown" style="font-weight: bold;">';
        $nav .= '<a href="inicio.php" '.$this->class.'>Início</a>';
        switch($permissao){
            case "1":
                $complemento = $this->permissao1();
                break;
            case "2":
                $complemento = $this->permissao2();
                break;
            case "3":
                $complemento = $this->permissao3();
                break;
        }
        $nav .= $complemento;
        $nav .= '<div style="text-align: right; padding-right: 15px;"><a href="logoff.php">Sair</a></div>';
        $nav .= '</div>';
        $nav .= '<div><p style="text-align: right">Bem vindo '.$nome.'</p></div>';
        return $nav;
    }
    private function inicioMenu($menu){
        $nav  = '<div class="w3-dropdown-hover">';
        $nav .= '<button class="w3-button">'.$menu.'</button>';
        $nav .= '<div class="w3-dropdown-content w3-bar-block w3-card-4">';
        return $nav;
    }
    private function fimMenu(){
        $nav = '</div></div>';
        return $nav;
    }
    private function permissao1(){
        $publicador  = $this->inicioMenu("Publicadores");
        $publicador .= '<a href="inserir_publicador.php" '.$this->class.'>Inserir Publicador</a>';
        $publicador .= '<a href="inserir_usuario.php" '.$this->class.'>Novo Usuário</a>';
        $publicador .= '<a href="pesquisar_publicador.php" '.$this->class.'>Pesquisar</a>';
        $publicador .= '<a href="informacoes_pessoa.php" '.$this->class.'>Meus Dados</a>';
        $publicador .= $this->fimMenu();
        $relatorio  = $this->inicioMenu("Relatórios");
        $relatorio .= '<a href="inserir_relatorio.php" '.$this->class.'>Relatório</a>';
        $relatorio .= '<a href="pesquisar_relatorio.php" '.$this->class.'>Pesquisar</a>';
        $relatorio .= '<a href="minhas_atividades.php" '.$this->class.'>Minhas Atividades</a>';
        $relatorio .= $this->fimMenu();
        $nav = $publicador.$relatorio;
        return $nav;
    }
    private function permissao2(){
        $publicador  = $this->inicioMenu("Publicadores");
        $publicador .= '<a href="inserir_publicador.php" '.$this->class.'>Inserir Publicador</a>';
        $publicador .= '<a href="pesquisar_publicador.php" '.$this->class.'>Pesquisar</a>';
        $publicador .= '<a href="informacoes_pessoa.php" '.$this->class.'>Meus Dados</a>';
        $publicador .= $this->fimMenu();
        $relatorio = $this->inicioMenu("Relatórios");
        $relatorio .= '<a href="inserir_relatorio.php" '.$this->class.'>Relatório</a>';
        $relatorio .= '<a href="pesquisar_relatorio.php" '.$this->class.'>Pesquisar</a>';
        $relatorio .= '<a href="minhas_atividades.php" '.$this->class.'>Minhas Atividades</a>';
        $relatorio .= $this->fimMenu();
        $nav = $publicador.$relatorio;
        return $nav;
    }
    private function permissao3(){
        $publicador  = $this->inicioMenu("Publicadores");
        $publicador .= '<a href="informacoes_pessoa.php" '.$this->class.'>Meus Dados</a>';
        $publicador .= $this->fimMenu();
        $relatorio  = $this->inicioMenu("Relatórios");
        $relatorio .= '<a href="minhas_atividades.php" '.$this->class.'>Minhas Atividades</a>';
        $relatorio .= $this->fimMenu();
        $nav = $publicador.$relatorio;
        return $nav;
    }
    public function getNavegador(){
        return $this->navegador;
    }
}
