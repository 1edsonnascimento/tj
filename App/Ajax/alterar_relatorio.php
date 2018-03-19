<?php
include '../../vendor/autoload.php';
/* NAO ESTA FUNCIONANDO AINDA
$r = $_GET['idRelatorio'];

$rel = new App\Model\Relatorio();
$rel->setIdRelatorio($r);
$relDao = new App\Dao\RelatorioDao();
if($relDao->alterar_relatorio($rel)){
    echo "<h2>Alterado com sucesso!!</h2>";
}else{
    echo "<h2>Erro na Alteração!!</h2>";
}
//TRABALHAR NA CAPUTRA DAS MENSAGENS DE RETORNO