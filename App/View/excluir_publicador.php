<?php
include '../../vendor/autoload.php';
$p = new App\Model\Usuario();
$p->setIdUsuario($_GET['idUsuario']);
$pDao = new App\Dao\UsuarioDao();
if($pDao->excluir($p))
    header("Location: pesquisar_publicador.php?msg=1");

//ARQUIVO FUNCIONANDO CORRETAMENTE. NAO EXISTE TELA PARA ESSE ARQUIVO