<?php
include '../../vendor/autoload.php';
$p = new App\Model\Usuario();
$p->setIdUsuario($_GET['id']);
$pDao = new App\Dao\UsuarioDao();
if($pDao->excluir($p))
    header("Location: pesquisar_publicador.php?msg=1");